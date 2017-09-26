<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Create Your Own</span>
        <ol class="path">
            <li><a href="index.php">Home</a></li>
            <li class="active">Create Your Own</li>
        </ol>
    </div>
</div>


<div id="create-your-own">
    <div class="container hidden-xs">
        <div class="row">
            <!-- multistep form -->
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active"><i class="label">GENDER</i></li>
                    <li><i class="label">Character</i></li>
                    <li><i class="label">scent</i></li>
                    <li><i class="label">Notes</i></li>
                    <li><i class="label">Bottle</i></li>
                    <li><i class="label">Label</i></li>
                    <li><i class="label">Done!</i></li>
                </ul>
            </form>
        </div>
    </div>

    <!--    <div class="hint-border">
            <div class="container hint">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                    <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="images/create-your-own-arrw.png"/></button></a>
                    <input type="button" name="previous" class="previous action-button back" value="Previous" />
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                    <p class="hint-msg">Are you a...</p>
                </div>
            </div>
        </div>-->
    <div class="hint-border-bck">
    </div>
    <div class="container" style="min-height: 470px;">
        <form id="msform">
            <!-- Gender -->
            <fieldset>
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Are you a...</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <label class="image-toggler choose choose-grn" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab1" checked="">
                        <span>Women</span>
                    </label>
                    <label class="image-toggler choose" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab2" checked="">
                        <span>Men</span>
                    </label>
                </div>
                <div class="step_col_right">
                    <div id="tab1show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>

                    <div id="tab2show" class="tab-content">
                        <img  src="images/create-your-own/men.png" title="Men" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                </div>
                <!--<input type="button" name="previous" class="previous action-button prev" value="Previous" />-->
                <input type="button" name="next" class="next action-button nxt" value="Next" />
            </fieldset>

            <!-- Gender -->

            <!-- character-end -->

            <fieldset>
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">What character should the fragrance have?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <label class="image-toggler choose2 choose-grn" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab3" checked="">
                        <span class="span2">Dynamic</span>
                    </label>
                    <label class="image-toggler choose2" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab4">
                        <span class="span2">Charismatic</span>
                    </label>
                    <label class="image-toggler choose2" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab5">
                        <span class="span2">Musculine</span>
                    </label>
                </div>
                <div class="step_col_right">
                    <div id="tab3show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>

                    <div id="tab4show" class="tab-content">
                        <img  src="images/create-your-own/men.png" title="Men" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                    <div id="tab5show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <!-- character-end -->

            <!-- Scent -->

            <fieldset>
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Which scent do you prefer?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <label class="image-toggler choose2 choose-grn" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab6" checked="">
                        <span class="span2">Dynamic</span>
                    </label>
                    <label class="image-toggler choose2" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab7">
                        <span class="span2">Charismatic</span>
                    </label>
                    <label class="image-toggler choose2" data-image-id="#image1">
                        <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab8">
                        <span class="span2">Musculine</span>
                    </label>
                </div>
                <div class="step_col_right">
                    <div id="tab6show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>

                    <div id="tab7show" class="tab-content">
                        <img  src="images/create-your-own/men.png" title="Men" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                    <div id="tab8show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <!-- Scent-end -->
            <!-- Notes -->
            <fieldset>
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Which scent do you prefer?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <div id="notes">
                        <div class="product-info-tab">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#recommended">Recommended<span class="counter">(3)</span></a></li>
                                <li><a data-toggle="tab" href="#all">All<span class="counter">(5)</span></a></li>
                            </ul>

                            <div class="tab-content notes-selection">
                                <div id="recommended" class="tab-pane fade in active">
<!--                                    <span class="button-checkbox">
                                        <label class="image-toggler choose2 choose-grn btn" data-image-id="#image1" data-color="primary">
                                            <input type="checkbox" name="toggle" name2="service_frequency" value="1" class="tab hidden" id="tab9" checked="">
                                            <span class="span2">Dynamic</span>
                                        </label>
                                    </span>
                                    <span class="button-checkbox">
                                        <label class="image-toggler choose2 btn" data-image-id="#image1" data-color="success">
                                            <input type="checkbox" name="toggle" name2="service_frequency" value="1" class="tab hidden" id="tab10">
                                            <span class="span2">Charismatic</span>
                                        </label>
                                    </span>-->
                                    <span class="button-checkbox">
                                        <button id="tab9" type="button" class="btn image-toggler choose2 choose-grn tab"  data-image-id="#image1"><span class="span2">Violet Leaf</span></button>
                                        <!--<input type="checkbox" class="hidden" checked />-->
                                        <input type="checkbox" name="toggle" name2="service_frequency" value="1" id="tab9">
                                            <!--<span class="span2">Dynamic</span>-->
                                    </span>
                                    <span class="button-checkbox">
                                        <button id="tab10" type="button" class="btn image-toggler choose2 choose-grn tab"  data-image-id="#image1"><span class="span2">Lily</span></button>
                                        <!--<input type="checkbox" class="hidden" checked />-->
                                        <input type="checkbox" name="toggle" name2="service_frequency" value="1" class="tab" id="tab10">
                                            <!--<span class="span2">Dynamic</span>-->
                                    </span>
                                </div>
                                <div id="all" class="tab-pane fade">
                                    <span class="button-checkbox">
                                        <button id="tab11" type="button" class="btn image-toggler choose2 choose-grn tab"  data-image-id="#image1"><span class="span2">Violet Leaf</span></button>
                                        <!--<input type="checkbox" class="hidden" checked />-->
                                        <input type="checkbox" name="toggle" name2="service_frequency" value="1" id="tab9">
                                            <!--<span class="span2">Dynamic</span>-->
                                    </span>
                                    <span class="button-checkbox">
                                        <button id="tab12" type="button" class="btn image-toggler choose2 choose-grn tab"  data-image-id="#image1"><span class="span2">Lily</span></button>
                                        <!--<input type="checkbox" class="hidden" checked />-->
                                        <input type="checkbox" name="toggle" name2="service_frequency" value="1" class="tab" id="tab10">
                                            <!--<span class="span2">Dynamic</span>-->
                                    </span>
                                    <span class="button-checkbox">
                                        <button id="tab13" type="button" class="btn image-toggler choose2 choose-grn tab"  data-image-id="#image1"><span class="span2">Violet Leaf</span></button>
                                        <!--<input type="checkbox" class="hidden" checked />-->
                                        <input type="checkbox" name="toggle" name2="service_frequency" value="1" id="tab9">
                                            <!--<span class="span2">Dynamic</span>-->
                                    </span>
                                    <span class="button-checkbox">
                                        <button id="tab14" type="button" class="btn image-toggler choose2 choose-grn tab"  data-image-id="#image1"><span class="span2">Lily</span></button>
                                        <!--<input type="checkbox" class="hidden" checked />-->
                                        <input type="checkbox" name="toggle" name2="service_frequency" value="1" class="tab" id="tab10">
                                            <!--<span class="span2">Dynamic</span>-->
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                    <label class="image-toggler choose2 choose-grn" data-image-id="#image1">
                                            <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab3" checked="">
                                            <span class="span2">Dynamic</span>
                                        </label>
                                        <label class="image-toggler choose2" data-image-id="#image1">
                                            <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab4">
                                            <span class="span2">Charismatic</span>
                                        </label>
                                        <label class="image-toggler choose2" data-image-id="#image1">
                                            <input type="radio" name="toggle" name2="service_frequency" value="1" class="tab" id="tab5">
                                            <span class="span2">Musculine</span>
                                        </label>-->
                </div>
                <div class="step_col_right">
                    <div id="tab9show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>

                    <div id="tab10show" class="tab-content">
                        <img  src="images/create-your-own/men.png" title="Men" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                    <div id="tab11show" class="tab-content">
                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />
                    </div>
                    <div class="perfume-selectionbg">
                        <div class="thumb-contain">
                            <div id="container">

                                <div class="tmb-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <!-- Notes-end -->

            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">We will never sell it</h3>
                <input type="text" name="fname" placeholder="First Name" />
                <input type="text" name="lname" placeholder="Last Name" />
                <input type="text" name="phone" placeholder="Phone" />
                <textarea name="address" placeholder="Address"></textarea>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
            </fieldset>
        </form>
    </div>

    <div id="how-it-works" class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="innerpage-hdng text-center">Create Your Own Perfumes or Cologne</h3>
            </div>
            <h5 class="heading text-center">HOW IT WORKS</h5>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 marg-bttm-30">
                <div class="step-1 text-center">
                    <div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p class="sub-hdng">Choose a scent type for your own perfume </p>
                    <p class="details">We are using the best ingredients and raw materials available on the world market only. From Essences, over bottles  to packaging, we are working with realiable partners long term premium suppliers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 marg-bttm-30">
                <div class="step-2 text-center">
                    <div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p class="sub-hdng">Choose a scent type for your own perfume </p>
                    <p class="details">We are using the best ingredients and raw materials available on the world market only. From Essences, over bottles  to packaging, we are working with realiable partners long term premium suppliers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 marg-bttm-30">
                <div class="step-3 text-center">
                    <div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p class="sub-hdng">Choose a scent type for your own perfume </p>
                    <p class="details">We are using the best ingredients and raw materials available on the world market only. From Essences, over bottles  to packaging, we are working with realiable partners long term premium suppliers.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="happy-slider">
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:240px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:100%;height:240px;overflow:hidden;">
                <div>
                    <img data-u="image" src="images/happy-slider/1.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/4.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/1.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/4.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="images/happy-slider/2.jpg" />
                </div>
            </div>
        </div>
    </div>

</div>
<div style="clear: both" class="clearfix"></div>

<!--<div class="pad-20"></div>-->


