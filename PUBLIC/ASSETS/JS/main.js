$(function () {
  // Responsive nav toggle
  const $menuOpen = $(".ri-menu-fill");
  const $menuClose = $(".ri-close-large-line");
  const $dropNav = $("ul.responsive-nav-cont");

  $menuOpen.on("click", function () {
    $dropNav.removeClass("hidden");
    $menuOpen.addClass("hidden");
    $menuClose.removeClass("hidden");
  });

  $menuClose.on("click", function () {
    $dropNav.addClass("hidden");
    $menuOpen.removeClass("hidden");
    $menuClose.addClass("hidden");
  });

  $dropNav.find("a").on("click", function () {
    $dropNav.addClass("hidden");
    $menuOpen.removeClass("hidden");
    $menuClose.addClass("hidden");
  });

  $(document).on("click", function (e) {
    if (!$(e.target).closest("header").length) {
      $dropNav.addClass("hidden");
      $menuOpen.removeClass("hidden");
      $menuClose.addClass("hidden");
    }
  });

  // Logout confirmation → POST form submit
  $("#logout-btn").on("click", function () {
    const confirmed = window.confirm("Are you sure you want to logout?");
    if (confirmed) {
      $("#logout-form").submit();
    }
  });
});
