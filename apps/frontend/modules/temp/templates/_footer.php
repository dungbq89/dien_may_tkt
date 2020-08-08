<?php $conf = json_decode(sfConfig::get('app_config_web'), true); ?>
<footer id="footer" class="footer-wrapper">

    <section class="section top-footer" id="section_652101366">
        <div class="bg section-bg fill bg-fill  bg-loaded">


        </div><!-- .section-bg -->

        <div class="section-content relative">


            <div class="row row-small" id="row-150203600">

                <div class="col medium-5 small-12 large-5">
                    <div class="col-inner">

                        <h3><span style="font-size: 85%; color: #fcfafc;"><?php echo $conf['sitename'] ?></span></h3>
                        <p><span style="font-size: 85%; color: #fcfafc;"><?php echo $conf['des_footer'] ?><br/><span
                                        style="font-size: 100%;"><?php echo $conf['mobile'] ?><br/><?php echo $conf['email'] ?></span></span>
                        </p>
                        <div class="y-kien-ban-doc">
                            <p> </p>
                        </div>

                    </div>
                </div>
                <div class="col medium-3 small-12 large-3">
                    <div class="col-inner">

                        <h3><span style="color: #ffffff;">CHÍNH SÁCH</span></h3>
                        <h3><span style="color: #993300; font-size: 80%;">
                                <?php if (count($links)): ?>
                                    <?php foreach ($links as $link): ?>
                                        <?php /** @var $link AdLink */ ?>
                                        <a href="<?php echo $link->link ?>"><?php echo $link->name ?></a><br/>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </span>
                        </h3>

                    </div>
                </div>
                <div class="col medium-4 small-12 large-4">
                    <div class="col-inner">

                        <h3><span style="font-size: 85%; color: #ffffff;">Liên Hệ</span></h3>
                        <p>
                            <span style="color: #ffffff; font-size: 85%;"><?php echo $conf['address'] ?></span><br/><span
                                    style="color: #ffffff;"><span style="font-size: 85%;"><br/><?php echo $conf['mobile'] ?><br/></span><span
                                        style="font-size: 85%;"><?php echo $conf['email'] ?><br/><a style="color: #ffffff;"
                                                                                                 href="<?php $conf['sitehost'] ?>"><?php echo $conf['sitename'] ?></a><br/>| <a
                                            style="color: #ffffff;"
                                            href="<?php echo $conf['sitehost'] ?>"><?php echo $conf['sitename'] ?></a></span></span></p>

                    </div>
                </div>


                <style scope="scope">

                </style>
            </div>

        </div><!-- .section-content -->


        <style scope="scope">

            #section_652101366 {
                padding-top: 30px;
                padding-bottom: 30px;
                background-color: rgb(21, 18, 18);
            }
        </style>
    </section>


    <a href="#top" class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1"
       id="top-link"><i class="icon-angle-up"></i></a>

</footer><!-- .footer-wrapper -->