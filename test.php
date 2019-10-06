<?php


        $descriptorspec = array(
        0 => array("pipe", "r"), 
        1 => array("pipe", "w")
        );  
       
        $process = proc_open('ml.py', $descriptorspec, $pipes, null, null); // run script.py
        if (is_resource($process)) {
        fwrite($pipes[0], "1 39 4 0 0 0 0 0 0 195 106 70 26.97 80\n"); // input 1      

        fclose($pipes[0]); // has to be closed before reading output!
        $output = "";
        while (!feof($pipes[1])) {
            $output .= fgets($pipes[1]);
                }
        fclose($pipes[1]);
        proc_close($process);  // stop script.py
        echo ($output);
        echo "Yayy";
}

?>