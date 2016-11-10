<!--SLIDER START-->
<div id="ninja-slider">
    <div class="slider-inner">
        <ul>
            <?php 
            $numImages = 7;
            $captions = array(
                "Welcome to State Street Brats",
                "Caption 2",
                "Caption 3",
                "Caption 4",
                "Caption 5",
                "Caption 6",
                "Caption 7",
            ); 
            for ($i = 1 ; $i <= $numImages ; $i++) :
            ?>
                <li>
                    <a class="ns-img" href="images/header_slider/<?= $i ?>.jpg"></a>
                    <div class="caption"><?= $captions[$i - 1] ?></div>
                </li>
            <?php endfor ?>
        </ul>
        <div class="navsWrapper">
            <div id="ninja-slider-prev"></div>
            <div id="ninja-slider-next"></div>
        </div>
    </div>
</div>
<!--SLIDER END-->