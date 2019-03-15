<?php
echo '<ul class="tree">';
foreach ($dados as $k => $v) {
    $class = is_array($v["children"]) ? 'group' : '';
    $indicator = is_array($v["children"]) ? '<i class="indicator fa fa-caret-down"></i>' : '';
    echo '<li>';
    echo '<input type="checkbox" name="categoria[]" data-name="' . $v["name"] . '" data-mercado="' . $v["mercado"] . '" value="' . $v["empresa"] . '" class="input-show ' . $class . '"> 
            <input type="checkbox" name="categoria[]" data-name="' . $v["name"] . '" data-mercado="' . $v["mercado"] . '" value="' . $v["empresa"] . '" class="input-hidden"> 
            <a href="#" class="' . $class . '"><span>' . $v["name"] . '</span></a> ' . $indicator;
    if (is_array($v["children"])) {
        echo '<ul>';
        foreach ($v["children"] as $kk => $vv) {
            $class = is_array($vv["children"]) ? 'group' : '';
            $indicator = is_array($vv["children"]) ? '<i class="indicator fa fa-caret-down"></i>' : '';
            echo '<li>';
            echo '<input type="checkbox" name="categoria[]" data-name="' . $vv["name"] . '" data-mercado="' . $vv["mercado"] . '" value="' . $vv["empresa"] . '" class="input-show ' . $class . '"> 
                    <input type="checkbox" name="categoria[]" data-name="' . $vv["name"] . '" data-mercado="' . $vv["mercado"] . '" value="' . $vv["empresa"] . '" class="input-hidden"> 
                    <a href="#" class="' . $class . '"><span>' . $vv["name"] . '</span></a> ' . $indicator;
            if (is_array($vv["children"])) {
                echo '<ul>';
                foreach ($vv["children"] as $kkk => $vvv) {
                    $class = is_array($vvv["children"]) ? 'group' : '';
                    $indicator = is_array($vvv["children"]) ? '<i class="indicator fa fa-caret-down"></i>' : '';
                    echo '<li>';
                    echo '<input type="checkbox" name="categoria[]" data-name="' . $vvv["name"] . '" data-mercado="' . $vvv["mercado"] . '" value="' . $vvv["empresa"] . '" class="input-show ' . $class . '"> 
                            <input type="checkbox" name="categoria[]" data-name="' . $vvv["name"] . '" data-mercado="' . $vvv["mercado"] . '" value="' . $vvv["empresa"] . '" class="input-hidden"> 
                            <a href="#" class="' . $class . '"><span>' . $vvv["name"] . '</span></a> ' . $indicator;
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    echo '</li>';
}
echo '</ul>';
?>
