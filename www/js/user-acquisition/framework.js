/**
 * Framework for managing container display and users acquisition.
 * @file Manages your container display. Requires Configuration file.
 * @author Erin Nire <enire@engagednation.com
 */

var UserAcquisitonFramework = (
    function($) {
        /**
         * Framework.
         * @constructor
         */
        var Constructor = function() {
            this.configuration = {
                dynamicContent: '#dynamic-content',
                containerResizeId: null,
                iframeGame: '#iframe-game',
                cookieName: 'en-component-data',
                form: {}
            };

            this.addConfiguration(configuration);

            this.addWindowResizeEventListener();
            this.addWindowMessageEventListener();
            this.addButtonEventListener();
            this.addLoadingIconEventListener();
        };

        var GettersSetters = function() {};

        GettersSetters.prototype = {
            /**
             * @return {number}
             */
            getConfigurationIframeWidth: function() {
                return (this.isMobile()) ? this.configuration.device.width : this.configuration.desktop.width;
            },

            /**
             * @return {number}
             */
            getConfigurationIframeHeight: function() {
                return (this.isMobile()) ? this.configuration.device.height : this.configuration.desktop.height;
            },

            /**
             * @return {object}
             */
            getIframeGame: function() {
                return $(this.configuration.iframeGame);
            },

            /**
             * @return {string}|{null}
             */
            getFormURL: function() {
                return this.configuration.hasOwnProperty('url') ? '//' + this.configuration.url : null;
            },

            /**
             * @param {string} url
             * @return this
             */
            setFormURL: function(url) {
                this.configuration.url = url;
                return this;
            },

            /**
             * @return {number}
             */
            getComponentId: function() {
                return (this.configuration.hasOwnProperty('componentId')) ? this.configuration.componentId : null;
            },

            /**
             * @param {number} componentId
             * @return this
             */
            setComponentId: function(componentId) {
                this.configuration.componentId = parseInt(componentId);
                return this;
            },

            /**
             * @return {number}
             */
            getComponentPrizeId: function() {
                return this.isPropertySetNotNull(this.configuration, 'componentPrizeId') ? this.configuration.componentPrizeId : null;
            },

            /**
             * @param {number} componentPrizeId
             * @return this
             */
            setComponentPrizeId: function(componentPrizeId) {
                this.configuration.componentPrizeId = componentPrizeId;
                return this;
            },

            /**
             * @return {string}
             */
            getComponentPrizeTitle: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'prizeTitle') ? this.configuration.form.prizeTitle : null;
            },

            /**
             * @param {string} prizeTitle
             * @return this
             */
            setComponentPrizeTitle: function(prizeTitle) {
                this.configuration.form.prizeTitle = prizeTitle;
                return this;
            },

            /**
             * @return {number}
             */
            getComponentScore: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'componentScore') ? this.configuration.form.componentScore : null;
            },

            /**
             * @param {number} componentScore
             * @return this
             */
            setComponentScore: function(componentScore) {
                this.configuration.form.componentScore = componentScore;
                return this;
            },

            /**
             * @return {string}
             */
            getReferrer: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'referrer') ? this.configuration.form.referrer : null;
            },

            /**
             * @param {string} referrer
             * @return this
             */
            setRerrer: function(referrer) {
                this.configuration.form.referrer = referrer;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentDevice: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentDevice') ? this.configuration.form.userAgentDevice : null;
            },

            /**
             * @param {string} userAgentDevice
             * @return this
             */
            setUserAgentDevice: function(userAgentDevice) {
                this.configuration.form.userAgentDevice = userAgentDevice;
                return this;
            },

            getUserAgentBrand: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentBrand') ? this.configuration.form.userAgentBrand : null;
            },

            /**
             * @param {string} userAgentBrand
             * @return this
             */
            setUserAgentBrand: function(userAgentBrand) {
                this.configuration.form.userAgentBrand = userAgentBrand;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentModel: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentModel') ? this.configuration.form.userAgentModel : null;
            },

            /**
             * @param {string} userAgentModel
             * @return this
             */
            setUserAgentModel: function(userAgentModel) {
                this.configuration.form.userAgentModel = userAgentModel;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentOsName: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentOsName') ? this.configuration.form.userAgentOsName : null;
            },

            /**
             * @param {string} userAgentOsName
             * @return this
             */
            setUserAgentOsName: function(userAgentOsName) {
                this.configuration.form.userAgentOsName = userAgentOsName;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentOsVersion: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentOsVersion') ? this.configuration.form.userAgentOsVersion : null;
            },

            /**
             * @param {string} userAgentOsVersion
             * @return this
             */
            setUserAgentOsVersion: function(userAgentOsVersion) {
                this.configuration.form.userAgentOsVersion = userAgentOsVersion;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentOsPlatform: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentOsPlatform') ? this.configuration.form.userAgentOsPlatform : null;
            },

            /**
             * @param {string} userAgentOsPlatform
             * @return this
             */
            setUserAgentOsPlatform: function(userAgentOsPlatform) {
                this.configuration.form.userAgentOsPlatform = userAgentOsPlatform;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentClientType: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentClientType') ? this.configuration.form.userAgentClientType : null;
            },

            /**
             * @param {string} userAgentClientType
             * @return this
             */
            setUserAgentClientType: function(userAgentClientType) {
                this.configuration.form.userAgentClientType = userAgentClientType;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentClientName: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentClientName') ? this.configuration.form.userAgentClientName : null;
            },

            /**
             * @param {string} userAgentClientName
             * @return this
             */
            setUserAgentClientName: function(userAgentClientName) {
                this.configuration.form.userAgentClientName = userAgentClientName;
                return this;
            },

            /**
             * @return {string}
             */
            getUserAgentClientVersion: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userAgentClientVersion') ? this.configuration.form.userAgentClientVersion : null;
            },

            /**
             * @param {string} userAgentClientVersion
             * @return this
             */
            setUserAgentClientVersion: function(userAgentClientVersion) {
                this.configuration.form.userAgentClientVersion = userAgentClientVersion;
                return this;
            },

            /**
             * @return {string}
             */
            getUserVoucherCode: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userVoucherCode') ? this.configuration.form.userVoucherCode : null;
            },

            /**
             * @param {string} userVoucherCode
             * @return this
             */
            setUserVoucherCode: function(userVoucherCode) {
                this.configuration.form.userVoucherCode = userVoucherCode;
                return this;
            },

            /**
             * @return {string}
             */
            getUserVoucherExpireDate: function() {
                return this.isPropertySetNotNull(this.configuration.form, 'userVoucherExpireDate') ? this.configuration.form.userVoucherExpireDate : null;
            },

            /**
             * @param {string} userVoucherExpireDate
             * @return this
             */
            setUserVoucherExpireDate: function(userVoucherExpireDate) {
                this.configuration.form.userVoucherExpireDate = userVoucherExpireDate;
                return this;
            },

            /**
             * @return {string}
             */
            getFilename: function() {
                return this.configuration.filename;
            },

            /**
             * @filename {string}
             * @return this
             */
            setFilename: function(filename) {
                this.configuration.filename = filename.replace(/\s/g, '_');
                return this;
            },

            /**
             * @return {string}|{null}
             */
            getAfterplayURL: function() {
                return this.configuration.hasOwnProperty('afterplayUrl') ? '//' + this.configuration.afterplayUrl : null;
            },

            /**
             * @param {string} afterplayUrl
             * @return this
             */
            setAfterplayUrl: function(afterplayUrl) {
                this.configuration.afterplayUrl = afterplayUrl;
                return this;
            },

            /**
             * @return {string}|{null}
             */
            getEnIdToken: function() {
                return this.configuration.enIdToken;
            },

            /**
             * @param {string} enIdToken
             * @return this
             */
            setEnIdToken: function(enIdToken) {
                this.configuration.enIdToken = enIdToken;
                return this;
            },

            /**
             * @return {string}
             */
            getCookieName: function() {
                return this.configuration.cookieName;
            },

            /**
             * @returns {*|null}
             */
            getCookie: function() {
                name = this.getCookieName() + '=';
                var cookie = document.cookie.split(';');
                for(var i = 0; i < cookie.length; i++) {
                    var chars = cookie[i];
                    while (chars.charAt(0) === ' ') chars = chars.substring(1, chars.length);
                    if (chars.indexOf(name) === 0) return chars.substring(name.length, chars.length);
                }
                return null;
            },

            /**
             * @param {string} value
             * @param {number} days
             * @param {boolean} expiresAtMidnight
             * @return this
             */
            setCookie: function(value, days, expiresAtMidnight) {
                var expires = '';
                if (days) {
                    var currentDate = new Date();
                    currentDate.setTime(currentDate.getTime() + (days * 24 * 60 * 60 * 1000));

                    if (expiresAtMidnight) {
                        var atMidnight = new Date();
                        atMidnight.setHours(23, 59, 59, 0);

                        // Since we set hours, lets minus 1 the current set days.
                        atMidnight.setTime(atMidnight.getTime() + ((days - 1) * 24 * 60 * 60 * 1000));
                    }

                    expires = '; expires=' + ((expiresAtMidnight) ? atMidnight.toUTCString() : currentDate.toUTCString());
                }

                document.cookie = this.configuration.cookieName + '=' + (value || '')  + expires + '; path=/';
                return this;
            },

            /**
             * @param {object} data
             * @param {string} propertyName
             * @return {boolean}
             */
            isPropertySetNotNull: function(data, propertyName) {
                return Object.keys(data).length > 0 && data.hasOwnProperty(propertyName) && propertyName !== '';
            }
        };

        var EventListeners = function() {};

        EventListeners.prototype = {
            addWindowResizeEventListener: function() {
                var self = this;

                $(window).on('resize', function() {
                    clearTimeout(self.configuration.containerResizeId);
                    self.configuration.containerResizeId = setTimeout(
                        function() {
                            if (self.getIframeGame().length === 0) return;

                            self.checkOrientation();
                            self.resizeContainer();
                        },
                        250
                    );
                });
            },

            addWindowMessageEventListener: function() {
                var self = this;

                $(window).on('message', function(event) {
                    let eventData = event.originalEvent.data;

                    if (!eventData.hasOwnProperty('game')) return;

                    if (
                        eventData.game.hasOwnProperty('status') &&
                        eventData.game.status === 'configuration-ready'
                    ) {
                        self.getIframeGame()[0].contentWindow.postMessage(
                            {
                                en_game_config: {}
                            },
                            '*'
                        );
                        return;
                    }

                    if (
                        eventData.game.hasOwnProperty('status') &&
                        eventData.game.status === 'complete'
                    ) {
                        eventData.game.component = {};
                        eventData.game.component.id = self.getComponentId();
                        eventData.game.form = self.configuration.form;
                        eventData.game.isCompleted = true;

                        setTimeout(
                            function() {
                                self.postGame(eventData.game);
                            },
                            2000
                        );
                        return;
                    }
                });
            },

            addButtonEventListener: function() {
                var self = this;

                $(document).on('click', '.user-acquisition-path', function() {
                    var button = $(this);

                    $.ajax({
                        type: 'GET',
                        url: '//' + location.host + button.data('path') ,
                        success: function(response) {
                            $(self.configuration.dynamicContent).html(response);
                        }
                    });
                });
            },

            addLoadingIconEventListener: function() {
                $(document).ready(function() {
                    $('#loading-icon').removeClass('not-loaded').addClass('loaded');
                });

                $(document).ajaxStart(function() {
                  $('#loading-icon').removeClass('loaded').addClass('not-loaded');
                });

                $(document).ajaxStop(function() {
                  $('#loading-icon').removeClass('not-loaded').addClass('loaded');
                });
            }
        };

        var Utilities = function() {};

        Utilities.prototype = {
            loadGame: function() {
                $(this.configuration.dynamicContent).css('background', '#000')
                    .html(
                        '<div class="text-center" style="padding: 0;">'
                            + '<iframe id="iframe-game" width="100%" frameborder="0" allow="autoplay; fullscreen" scrolling="no" style="opacity: 0"></iframe>'
                        + '</div>'
                    );

                this.checkOrientation();
                this.resizeContainer();
                this.getIframeGame().attr('src', this.configuration.iframe.source);
            },

            /**
             * @param {object} data
             */
            postGame: function(data) {
                var self = this;

                if (typeof data !== 'object') {
                    self.log('Invalid post data type.');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: self.getAfterplayURL(),
                    data: data,
                    dataType: 'html',
                    success: function(response) {
                        $(self.configuration.dynamicContent).css('background', 'none').html(response);
                    }
                });
            },

            /**
             * @param {object} data
             */
            postCentralAdminApiProxy: function(data, callback) {
                var self = this;

                if (typeof data !== 'object') data = {};
                if (!data.hasOwnProperty('parameters')) data.parameters = {};

                data.parameters.component = {id: self.getComponentId()};
                data.parameters.en_id = self.getEnIdToken();

                if (self.getComponentPrizeId()) data.parameters.component_prize_id = parseInt(self.getComponentPrizeId());
                if (self.getComponentPrizeTitle()) data.parameters.component_prize_title = self.getComponentPrizeTitle();
                if (self.getComponentScore()) data.parameters.component_score = parseInt(self.getComponentScore());
                if (self.getReferrer()) data.parameters.referrer = self.getReferrer();
                if (self.getUserAgentDevice()) data.parameters.user_agent_device = self.getUserAgentDevice();
                if (self.getUserAgentBrand()) data.parameters.user_agent_brand = self.getUserAgentBrand();
                if (self.getUserAgentModel()) data.parameters.user_agent_model = self.getUserAgentModel();
                if (self.getUserAgentOsName()) data.parameters.user_agent_os_name = self.getUserAgentOsName();
                if (self.getUserAgentOsVersion()) data.parameters.user_agent_os_version = self.getUserAgentOsVersion();
                if (self.getUserAgentOsPlatform()) data.parameters.user_agent_os_platform = self.getUserAgentOsPlatform();
                if (self.getUserAgentClientType()) data.parameters.user_agent_client_type = self.getUserAgentClientType();
                if (self.getUserAgentClientName()) data.parameters.user_agent_client_name = self.getUserAgentClientName();
                if (self.getUserAgentClientVersion()) data.parameters.user_agent_client_version = self.getUserAgentClientVersion();
                if (self.getUserVoucherCode()) data.parameters.user_voucher_code = self.getUserVoucherCode();
                if (self.getUserVoucherExpireDate()) data.parameters.user_voucher_expire_date = self.getUserVoucherExpireDate();

                var cookie = this.getCookie();
                if (cookie) {
                    var cookieData = JSON.parse(cookie);

                    cookieData.user_date_of_birth = cookieData.user_date_of_birth_yyyy
                        + '-' + cookieData.user_date_of_birth_mm
                        + '-' + cookieData.user_date_of_birth_dd;

                    $.extend(data.parameters, cookieData);
                }

                $.ajax({
                    type: 'POST',
                    url: self.getFormURL(),
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(response) {
                        if (typeof callback == 'function') {
                            callback(response);
                        }
                    }
                });
            },

            /**
             * @return {int}
             */
            getFooterHeight: function() {
                return $('.sticky-bottom').height() + 7;
            },

            /**
             * @return {object}
             */
            calculateLandscapeSize: function() {
                var windowWidth = $(window).width(),
                    windowHeight = $(window).height() - this.getFooterHeight(),
                    iframeWidth = this.getConfigurationIframeWidth(),
                    iframeHeight = this.getConfigurationIframeHeight(),
                    iframeRatio = iframeHeight / iframeWidth,
                    newWidth = iframeWidth,
                    newHeight = iframeHeight;

                // Resize game width to the window width.
                if (iframeWidth > windowWidth) {
                    newWidth = windowWidth;
                    newHeight = iframeRatio * newWidth;
                }

                // If game height is greater than window height resize game to fit window.
                if (newHeight > windowHeight) {
                    newHeight = windowHeight;
                    newWidth = newHeight / iframeRatio;
                }

                // Resize game height.
                if (newHeight > windowHeight) {
                    var heightDiff = newHeight - windowHeight;

                    newWidth = Math.round(((newHeight - heightDiff) / newHeight) * newWidth);
                    newHeight -= heightDiff;
                }

                // Resize game width.
                if (newWidth > windowWidth) {
                    var widthDiff = newWidth - windowWidth;

                    newHeight = Math.round(((newWidth - widthDiff) / newWidth) * newHeight);
                    newWidth -= widthDiff;
                }

                return {
                    modalWidth: newWidth,
                    width: newWidth,
                    height: newHeight
                }
            },

            /**
             * @return {object}
             */
            calculatePortraitSize: function() {
                var windowWidth = $(window).width(),
                    windowHeight = $(window).height() - this.getFooterHeight(),
                    iframeWidth = this.getConfigurationIframeWidth(),
                    iframeHeight = this.getConfigurationIframeHeight(),
                    newWidth = iframeWidth,
                    newHeight = iframeHeight;

                // Resize game width to the window width.
                if (iframeWidth > windowWidth) {
                    newWidth = windowWidth;
                    newHeight = Math.round((newWidth / iframeWidth) * iframeHeight);
                }

                // If game height is greater than window height resize game to fit window.
                if (newHeight > windowHeight) {
                    newWidth = Math.round((windowHeight / newHeight) * newWidth);
                    newHeight = windowHeight;
                }

                // Resize game height.
                if (newHeight > windowHeight) {
                    var heightDiff = newHeight - windowHeight;

                    newWidth = Math.round(((newHeight - heightDiff) / newHeight) * newWidth);
                    newHeight -= heightDiff;
                }

                // Resize game width.
                if (newWidth > windowWidth) {
                    var widthDiff = newWidth - windowWidth;

                    newHeight = Math.round(((newWidth - widthDiff) / newWidth) * newHeight);
                    newWidth -= widthDiff;
                }

                return {
                    modalWidth: newWidth,
                    width: newWidth,
                    height: newHeight
                }
            },

            /**
             * @return this
             */
            checkOrientation: function() {
                if (
                    this.configuration.device.orientation !== 'default' &&
                    !window.matchMedia("(orientation: " + this.configuration.device.orientation + ")").matches &&
                    this.isMobile()
                ) {
                    this.getIframeGame().css(
                        {
                            'opacity': '0'
                        }
                    );

                    this.getIframeGame().parent().css(
                        {
                            'background': 'url(' + this.configuration.images.rotate + ') center center no-repeat',
                            'background-size': 'contain'
                        }
                    ).addClass('game-html-loader-orientation');
                    return this;
                }

                this.getIframeGame().css('opacity', '1');
                this.getIframeGame().parent().css('background', 'transparent').removeClass('game-html-loader-orientation');

                return this;
            },

            /**
             * @return this
             */
            resizeContainer: function() {
                var windowWidth = $(window).width(),
                    windowHeight = $(window).height() - this.getFooterHeight(),
                    calculatedSize = null;

                if (windowWidth > windowHeight) {
                    calculatedSize = this.calculateLandscapeSize();

                    this.getIframeGame().attr(
                        {
                            width: calculatedSize.modalWidth,
                            height: calculatedSize.height
                        }
                    );
                }

                if (windowHeight > windowWidth) {
                    calculatedSize = this.calculatePortraitSize();
                    this.getIframeGame().attr(
                        {
                            width: calculatedSize.modalWidth,
                            height: calculatedSize.height
                        }
                    );
                }

                // Make sure the container gets resize first before we resize the game.
                this.getIframeGame()[0].contentWindow.postMessage(
                    {
                        parent_width: parseInt(this.getIframeGame().attr('width')),
                        parent_height: parseInt(this.getIframeGame().attr('height'))
                    },
                    '*'
                );

                return this;
            },

            /**
             * @param {string|null} message
             */
            log: function(message) {
                console.log(message);
            },

            /**
             * @return {boolean}
             */
            isMobile: function() {
                return /Mobi|Android/i.test(navigator.userAgent);
            },

            /**
             * @param {object} configuration
             */
            addConfiguration: function(configuration) {
                if (typeof configuration !== 'object') {
                    this.log('Invalid configuration type.');
                    return;
                }

                // Set iframe height to 100% of container if it was set to null.
                if (!configuration.desktop.height) configuration.desktop.height = $(document).height();

                this.setComponentId(configuration.component.id);

                $.extend(this.configuration, configuration);
            },

            /**
             * Return form arrays of data in an object manner.
             * @param {object} $form Target element.
             */
            serializeDataFromForm: function($form) {
                var data = {};

                $.map(
                    $form.serializeArray(),
                    function(property){
                        var value = property['value'].trim();

                        if (value.length === 0) return true;
                        data[property['name']] = value;
                    }
                );

                return data;
            },

            setComponentCookie: function() {
                if (!this.isCookieEnabled() || !this.getComponentId()) return;

                var component = {};
                component.componentId = this.getComponentId();

                if (this.getComponentPrizeId()) component.componentPrizeId = this.getComponentPrizeId();
                if (this.getComponentScore()) component.componentScore = this.getComponentScore();
                if (this.getUserVoucherCode()) component.userVoucherCode = this.getUserVoucherCode();
                if (this.getUserVoucherExpireDate()) component.userVoucherExpireDate = this.getUserVoucherExpireDate();

                this.setCookie(JSON.stringify(component));
            },

            /**
             * @return this
             */
            removeCookie: function() {
                document.cookie = this.getCookieName() + '=; Max-Age=-99999999; path=/';
                return this;
            },

            /**
             * @return {boolean}
             */
            isCookieEnabled: function() {
                return this.configuration.cookieEnabled;
            }
        };

        Constructor.prototype = $.extend(
            GettersSetters.prototype,
            EventListeners.prototype,
            Utilities.prototype
        );

        return new Constructor();
    }
)(jQuery);
