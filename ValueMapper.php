<?php

class ValueMapper {
    private $spec;
    function __construct( $spec ) {
        $this->spec = $spec;
    }

    function mapToApiCall( array $values, $onItem ) {
        $calls = [];
        foreach ( $values as $id => $value ) {
            if ( !array_key_exists( $id, $this->spec ) ) {
                throw new UnexpectedValueException( "{$id} is not defind in spec." );
            }

            foreach ( $this->spec[$id]['triggers'] as $action => $actionData ) {
                switch ( $action ) {
                    case 'add':
                        $calls = array_merge(
                            $calls,
                            $this->buildAddCall( $actionData, $onItem, $this->spec[$id]['type'], $value )
                        );
                        break;
                    default:
                        throw new UnexpectedValueException( "{$action} is not understood" );
                }
            }
        }

        return $calls;
    }

    private function buildAddCall( array $data, $itemId, $valueType, $value ) {
        $calls = [];
        foreach ( $data as $property => $perPropertyData ) {
            $calls = array_merge(
                $calls,
                $this->buildAddCallPerProperty( $perPropertyData, $itemId, $valueType, $value, $property )
            );
        }

        return $calls;
    }

    private function buildAddCallPerProperty( array $data, $itemId, $valueType, $value, $property ) {
        $params = [ 'action' => 'wbcreateclaim', 'entity' => $itemId, 'property' => $property, 'snaktype' => 'value' ];
        $calls = [];
        switch ( $valueType ) {
            case 'item':
                $params['value'] = [ 'entity-type' => 'item', 'numeric-id' => (int)explode( 'Q', $value )[1] ];
                break;
            case 'number':
                $params['value'] = $value;
                break;
            case 'string':
                $params['value'] = $value;
                break;
            default:
                throw new UnexpectedValueException( "{$valueType} is not understood" );
        }
        return $calls;
    }

}
