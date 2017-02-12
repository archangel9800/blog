<?php
        function show404page(){
            
            header("HTTP/1.1 404 Not Found");
//            todo заменить на wiew
            echo '404 page';
        }

        function renderView($viewName){
            include 'core/views/'.$viewName.'.php';
        }