 <form id="searchform" method="post" action="<?php echo get_site_url(); ?>/search">
            <div class="col-md-12 col-sm-12 col-xs-12 top-space">
                <div class="col-md-3 col-sm-3 col-xs-12 ">                     
                    <div class="custom-select pricing-customseletbox p-type-advanced-search">     
                        <select id="posttype-multiple-selected" multiple="multiple" name="values">                                  
                          <option value="faq"         <?php if (in_array( 'faq',$post_types_is)) { echo "selected='selected'"; }?> >         <?php $name = ot_get_option( 'post_type_name_for_faq' );       if($name){ echo $name; } else {echo "FAQ";}?></option>
                          <option value="texthelpdoc" <?php if (in_array( 'texthelpdoc',$post_types_is)) { echo "selected='selected'"; }?> >  <?php $name = ot_get_option( 'post_type_name_for_text_help' ); if($name){ echo $name; } else {echo "Help Documents";}?></option>
                          <option value="videos"      <?php if (in_array( 'videos',$post_types_is)) { echo "selected='selected'"; }?> >       <?php $name = ot_get_option( 'post_type_name_for_videos' );    if($name){ echo $name; } else {echo "Videos";}?></option>
                          <option value="course"      <?php if (in_array( 'course',$post_types_is)) { echo "selected='selected'"; }?> >       <?php $name = ot_get_option( 'post_type_name_for_courses' );   if($name){ echo $name; } else {echo "Courses";}?></option>                                  
                          <option value="webinar"      <?php if (in_array( 'webinar',$post_types_is)) { echo "selected='selected'"; }?> >       <?php $name = ot_get_option( 'post_type_name_for_webinar' );   if($name){ echo $name; } else {echo "Webinar";}?></option>                                  
                        </select>
                        <input type="hidden" name="hidPostType" id="hidPostType" value=""/>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-8 text-center set-width">
                    <input id="custom_search"  placeholder="Type here to search anything " type="text" name="custom_search" value="<?php echo $s;?>" class="text" />
                    <input id="multiple_post"  placeholder=" " type="text" name="multiple_post" value="" class="text" style="display:none;" />
                    <div id="target" style="color:#FFEB4F;" > Enter a valid Search Key</div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4 text-center set-width">
                    <div id="searchsubmit" class="btn btn-block btn-primary btn-lg" onclick="selectFunctionClick();">Search Now
                    </div>
                </div>
            </div>                                  
            </form>