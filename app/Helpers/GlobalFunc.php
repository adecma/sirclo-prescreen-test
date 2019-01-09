<?php

/**
 * global function fivaa
 * soal pertama : https://gist.github.com/fandywie/737a7654132a4e97c9852a8fa91ceef9
 * 
 * @return array
 */
if(! function_exists('fivaa')) {
    function fivaa(Int $num) {
        // default data dalam range
        $default = range(0, $num + 1);
        
        // penyimpanan data
        $storedBox = [];

        // hitung loop yang berjalan
        $countingLoop = 0;
        foreach($default as $key => $item) {
            // tandai loop yang berjalan
            $countingLoop = $countingLoop + 1;

            // label pertama
            $firstLabel = str_repeat(
                $default[($countingLoop-1)],
                2
            );

            // label kedua
            $secondLabel = str_repeat(
                $default[($countingLoop+1)],
                $countingLoop
            );

            // combine label
            $result = $firstLabel . $secondLabel;

            // storing result
            array_push($storedBox, $result);

            // hentikan loop
            if($countingLoop === $num) break;
        }

        // reorder data
        rsort($storedBox);

        return $storedBox;
    }
}

/**
 * global function untuk enable toastr
 */
if(! function_exists('notifScript')) {
    function notifScript($type, $title, $message) {
        return view('template.partial._notif_script', compact('type', 'title', 'message'));
    }
}

/**
 * global function untuk menampilkan help-block validasi form
 */
if(! function_exists('inputAlert')) {
    function inputAlert($name, $errors) {
        if($errors->has($name)) {
            return '<div class="help-block">
                ' . $errors->first($name) . '
            </div>';
        }

        return null;
    }
}