<?php

function name_already_used() {
   if (empty($_SESSION['username']))  {
    echo 'hidden';
   };
}