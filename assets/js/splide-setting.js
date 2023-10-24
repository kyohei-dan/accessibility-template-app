(() => {
  const splidePageList = {
    mv: document.querySelector(".js-top-splide"),
  };

  if (splidePageList.mv) {
    const splide = new Splide(".js-top-splide", {
      autoplay: true,
      type: "fade",
      rewind: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      pagination: true,
      speed: 2000,
      interval: 5000,
      breakpoints: {
        980: {
          perPage: 1,
        },
      },
    });
    splide.mount();
  }
})();
