<?php

class FormGenerator {
    private $spec;
    function __construct( $spec ) {
        $this->spec = $spec;
    }

    function generate() {
        $header = "<form action=\"index.php\">";
        $footer = "<button type=\"submit\" class=\"ui primary button\">Publish</button></form>";

        $form = '';
        foreach ( $this->spec as $inputCase ) {
            $id = $inputCase['inputfieldId'];
            $form .= '<label for="' . $id .'">' . $inputCase['label'] . '</label><br>
            <div class="ui corner labeled input">
            <input style="margin-bottom: 0.5em" type="text" name="' . $id . '" id="' . $id . '" required>
            <div class="ui corner label"><i class="asterisk icon"></i></div></div><br>';
        }
        return $header . $form . $footer;
    }
}
