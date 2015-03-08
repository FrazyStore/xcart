<div class="mobile_header">
  <ul class="nav nav-pills">
    <li class="dropdown">
      <a id="main_menu" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-bars"></span></a>
      <div id="top-menu" class="dropdown-menu">
        <?php $this->displayViewListContent('header.menu'); ?>
        <ul class="language_list">

          <?php $this->displayViewListContent('header.language.menu'); ?>
        </ul>
      </div>
    </li>
    <li class="dropdown">
      <a id="search_menu" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-search"></span></a>
      <ul id="search_box" class="dropdown-menu" >
        <li role="presentation">
          <?php $this->displayViewListContent('layout.responsive.search'); ?>
        </li>
      </ul>
    </li>
    <li class="dropdown">
      <a id="account_menu" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-user"></span></a>
      <ul id="account_box" class="dropdown-menu">
        <li role="presentation">
          <?php $this->displayViewListContent('layout.responsive.account'); ?>
        </li>
      </ul>
    </li>
  </ul>
</div>
