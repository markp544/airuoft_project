<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo anchor('','Back') . "<br />";

if($flights != null) {
    echo $flights->generate(); 
}
?>
