<div id="top-bar" class="transparent-topbar light">
  <div class="container clearfix">

    <div class="row justify-content-between">
      <div class="col-12 col-md-auto">

        <div class="top-links">
          <ul class="top-links-container">
            <li class="top-links-item">
              <a href="tel:<?php echo e($web_information->information->phone ?? ''); ?>">
                <i class="icon-phone3"></i>
                <?php echo e($web_information->information->phone ?? ''); ?>

              </a>
            </li>
            <li class="top-links-item">
              <a href="mailto:<?php echo e($web_information->information->email ?? ''); ?>" class="nott">
                <i class="icon-envelope2"></i>
                <?php echo e($web_information->information->email ?? ''); ?>

              </a>
            </li>
          </ul>
        </div>

      </div>

      <div class="col-12 col-md-auto dark">

        <ul id="top-social">
          <?php if(isset($web_information->social->facebook)): ?>
            <li>
              <a href="<?php echo e($web_information->social->facebook); ?>" class="si-facebook" target="_blank">
                <span class="ts-icon"><i class="icon-facebook"></i></span>
                <span class="ts-text">Facebook</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if(isset($web_information->social->twitter)): ?>
            <li>
              <a href="<?php echo e($web_information->social->twitter); ?>" class="si-twitter" target="_blank">
                <span class="ts-icon"><i class="icon-twitter"></i></span>
                <span class="ts-text">Twitter</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if(isset($web_information->social->instagram)): ?>
            <li>
              <a href="<?php echo e($web_information->social->instagram); ?>" class="si-instagram" target="_blank">
                <span class="ts-icon"><i class="icon-instagram2"></i></span>
                <span class="ts-text">Instagram</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if(isset($web_information->social->youtube)): ?>
            <li>
              <a href="<?php echo e($web_information->social->youtube); ?>" class="si-youtube" target="_blank">
                <span class="ts-icon"><i class="icon-youtube"></i></span>
                <span class="ts-text">Youtube</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>

  </div>
</div>
<header id="header" class="transparent-header floating-header header-size-md">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row">

        <div id="logo">
          <a href="<?php echo e(route('frontend.home')); ?>" class="standard-logo"
            data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>">
            <img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Canvas Logo" style="height: 55px;">
          </a>
          <a href="<?php echo e(route('frontend.home')); ?>" class="retina-logo"
            data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>">
            <img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Canvas Logo">
          </a>
        </div>

        <div class="header-misc">

          <div id="top-search" class="header-misc-icon">
            <a href="#" id="top-search-trigger">
              <i class="icon-line-search"></i>
              <i class="icon-line-cross"></i>
            </a>
          </div>

          <a href="<?php echo e(route('frontend.contact')); ?>"
            class="button button-border button-rounded button-fill button-blue text-uppercase ms-3 d-none d-sm-block">
            <span>Liên hệ</span>
          </a>

        </div>

        <div id="primary-menu-trigger">
          <svg class="svg-trigger" viewBox="0 0 100 100">
            <path
              d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
            </path>
            <path d="m 30,50 h 40"></path>
            <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
            </path>
          </svg>
        </div>

        <nav class="primary-menu with-arrows">

          <ul class="menu-container">

            <?php if(isset($menu)): ?>
              <?php
                $main_menu = $menu->first(function ($item, $key) {
                    return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
                });
                if ($main_menu) {
                    $content = '';
                    foreach ($menu as $item) {
                        $url = $title = '';
                        if ($item->parent_id == $main_menu->id) {
                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                            $url = $item->url_link;
                            $active = $url == url()->full() ? 'current' : '';
                
                            $content .= '<li class="menu-item ' . $active . '"><a class="menu-link" href="' . $url . '"><div>' . $title . '</div></a>';
                
                            if ($item->sub > 0) {
                                $content .= '<ul class="sub-menu-container">';
                                foreach ($menu as $item_sub) {
                                    $url = $title = '';
                                    if ($item_sub->parent_id == $item->id) {
                                        $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                        $url = $item_sub->url_link;
                
                                        $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '"><div>' . $title . '</div></a>';
                
                                        if ($item_sub->sub > 0) {
                                            $content .= '<ul class="sub-menu-container">';
                                            foreach ($menu as $item_sub_2) {
                                                $url = $title = '';
                                                if ($item_sub_2->parent_id == $item_sub->id) {
                                                    $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                                    $url = $item_sub_2->url_link;
                
                                                    $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '"><div>' . $title . '</div></a></li>';
                                                }
                                            }
                                            $content .= '</ul>';
                                        }
                                        $content .= '</li>';
                                    }
                                }
                                $content .= '</ul>';
                            }
                            $content .= '</li>';
                        }
                    }
                    echo $content;
                }
              ?>
            <?php endif; ?>

          </ul>

        </nav>

        <form class="top-search-form" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
          <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>"
            class="form-control" />
        </form>

      </div>
    </div>
  </div>
  <div class="header-wrap-clone"></div>
</header>

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>


<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/header/styles/page.blade.php ENDPATH**/ ?>