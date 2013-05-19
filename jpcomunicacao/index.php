<?php get_header(); ?>
<!-- START ARCHIVE -->

<div id="archive" class="content-wrap last">
  <div class="divider-heading"></div>
  <div class="section-nav filterable">
    <ul id="archive-nav">
      <li><a href="#">Months</a></li>
      <li><a href="#">Categories</a></li>
      <li><a href="#">Tags</a></li>
    </ul>
    <!--END ARCHIVE-NAV-->
    <?php get_search_form(); ?>
  </div>
  <!--END SECTION-NAV-->
  <div class="archive-list">
    <div id="months">
      <ul>
        <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
      </ul>
    </div>
    <div id="categories">
      <?php

        $categories = wp_list_categories('echo=0&title_li=&exclude=1&hide_empty=0&show_count=1&hierarchical=0&taxonomy=category');

        $categories = str_replace("(", "<span>", $categories);

        $categories = str_replace(")", "</span>", $categories);

        

        $portfolio_categories = wp_list_categories('echo=0&title_li=&hide_empty=0&show_count=1&hierarchical=0&taxonomy=portfolio_category');

        $portfolio_categories = str_replace("(", "<span>", $portfolio_categories);

        $portfolio_categories = str_replace(")", "</span>", $portfolio_categories);



        

        ?>
      <ul>
        <?php echo $categories; ?>
      </ul>
      <ul>
        <?php echo $portfolio_categories; ?>
      </ul>
    </div>
    <div id="tags" class="tags">
      <?php wp_tag_cloud('smallest=8&largest=8'); ?>
    </div>
  </div>
  <!--END ARCHIVE-LIST-->
  <div id="inner-content">
    <?php

        

        ?>
    <h3 class="title">
      <?php 

            if (is_category()) 

            {

                $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

                single_cat_title('Archive: '); 

                if ($paged > 1) echo " - page $paged";

            }

            if (is_month()) 

            {

                $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

                echo "Monthly archive for: "; 

                single_month_title(' ');

                if ($paged > 1) echo " - page $paged";

            }

            if (is_tag()) 

            {

                $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

                echo "Tag archive for: "; 

                single_tag_title(' ');

                if ($paged > 1) echo " - page $paged";

            }

            if (is_search()) 

            {

                $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

                echo "Search results for: ". $_GET["s"]; 

                single_tag_title(' ');

                if ($paged > 1) echo " - page $paged";

            }

            if (is_tax()) 

            {

                $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

                echo "Portfolio archive for: "; 

                single_tag_title(' ');

                if ($paged > 1) echo " - page $paged";

            }

            ?>
    </h3>
    <ul class="archive-post-list">
      <?php 

if ( have_posts() ) : while ( have_posts() ) : the_post(); 

$comments = comments_open() && get_option("default_comment_status ") == "open"; 

?>
      <li>
        <h2 class="title"><a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a></h2>
        <p class="meta">posted on <span>
          <?php the_time('F d, Y'); ?>
          </span>
          <?php if ($comments) { ?>
          <span>with </span>
          <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); } ?>
        </p>
      </li>
      <?php





?>
      <?php endwhile; else: ?>
      <p>
        <?php _e('Sorry, no posts matched your criteria.'); ?>
      </p>
      <?php endif; ?>
    </ul>
    <!--END ARCHIVE-POST-LIST-->
    <?php if(function_exists('wp_pagenavi_bra')) { wp_pagenavi_bra(); } ?>
  </div>
  <!--END INNER-CONTENT-->
  <?php get_sidebar(); ?>
</div>
<!--END SECTION #ARCHIVE-->
<?php get_footer(); ?>
