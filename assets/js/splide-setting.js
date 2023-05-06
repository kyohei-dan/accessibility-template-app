export const splide = {
  slider: () => {
    const splidePageList = {
      mv: document.querySelector(".js-top-splide"),
    };

    if (splidePageList.mv) {
      const splide = new Splide(".js-top-splide", {
        type: "fade",
        preloadPages: 2,
        autoplay: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        rewind: true,
        speed: 4000,
        interval: 4500,
        breakpoints: {
          980: {
            perPage: 1,
          },
        },
      });
      splide.mount();
    }
  },
};
