/**
 * Configuration.
 * @file Manages your container configuration.
 * @author Erin Nire <enire@engagednation.com
 */
var configuration = {
    iframe: {
        source: 'https://en-games.s3-us-west-2.amazonaws.com/user-acquisition/tachi/v1-spin-it-credits/index.html'
    },
    component: {
        id: 100
    },
    desktop: {
        width: 800,
        height: null // Set to null will default it to 100% of view.
    },
    device: {
        width: 800,
        height: 1300,
        orientation: 'portrait'
    },
    images: {
        rotate: 'https://en-games.s3-us-west-2.amazonaws.com/user-acquisition/rotate-icon.png'
    }
};
