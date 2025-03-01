﻿/*
Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
CKEditor 4 LTS ("Long Term Support") is available under the terms of the Extended Support Model.
*/
(function () {
    if (window.CKEDITOR && window.CKEDITOR.dom) return; window.CKEDITOR || (window.CKEDITOR = function () {
        var a = /(^|.*[\\\/])ckeditor\.js(?:\?.*|;.*)?$/i, d = {
            timestamp: "O17A", version: "4.24.0-lts", revision: "d9ccba34d1", rnd: Math.floor(900 * Math.random()) + 100, _: { pending: [], basePathSrcPattern: a }, status: "unloaded", basePath: function () {
                var b = window.CKEDITOR_BASEPATH || ""; if (!b) for (var c = document.getElementsByTagName("script"), d = 0; d < c.length; d++) { var k = c[d].src.match(a); if (k) { b = k[1]; break } } -1 == b.indexOf(":/") && "//" != b.slice(0, 2) && (b = 0 === b.indexOf("/") ? location.href.match(/^.*?:\/\/[^\/]*/)[0] +
                    b : location.href.match(/^[^\?]*\/(?:)/)[0] + b); if (!b) throw 'The CKEditor installation path could not be automatically detected. Please set the global variable "CKEDITOR_BASEPATH" before creating editor instances.'; return b
            }(), getUrl: function (a) { -1 == a.indexOf(":/") && 0 !== a.indexOf("/") && (a = this.basePath + a); return a = this.appendTimestamp(a) }, appendTimestamp: function (a) { if (!this.timestamp || "/" === a.charAt(a.length - 1) || /[&?]t=/.test(a)) return a; var b = 0 <= a.indexOf("?") ? "\x26" : "?"; return a + b + "t\x3d" + this.timestamp },
            domReady: function () {
                function a() { try { document.addEventListener ? (document.removeEventListener("DOMContentLoaded", a, !1), window.removeEventListener("load", a, !1), b()) : document.attachEvent && "complete" === document.readyState && (document.detachEvent("onreadystatechange", a), window.detachEvent("onload", a), b()) } catch (c) { } } function b() { for (var a; a = c.shift();)a() } var c = []; return function (b) {
                    function e() { try { document.documentElement.doScroll("left") } catch (b) { setTimeout(e, 1); return } a() } c.push(b); "complete" === document.readyState &&
                        setTimeout(a, 1); if (1 == c.length) if (document.addEventListener) document.addEventListener("DOMContentLoaded", a, !1), window.addEventListener("load", a, !1); else if (document.attachEvent) { document.attachEvent("onreadystatechange", a); window.attachEvent("onload", a); b = !1; try { b = !window.frameElement } catch (d) { } document.documentElement.doScroll && b && e() }
                }
            }()
        }, b = window.CKEDITOR_GETURL; if (b) { var c = d.getUrl; d.getUrl = function (a) { return b.call(d, a) || c.call(d, a) } } return d
    }());
    (function () {
        var a = {}; CKEDITOR.event || (CKEDITOR.event = function () { }, CKEDITOR.event.implementOn = function (a) { var b = CKEDITOR.event.prototype, c; for (c in b) null == a[c] && (a[c] = b[c]) }, CKEDITOR.event.prototype = function () {
            function d(a) { var e = b(this); return e[a] || (e[a] = new c(a)) } var b = function (a) { a = a.getPrivate && a.getPrivate() || a._ || (a._ = {}); return a.events || (a.events = {}) }, c = function (a) { this.name = a; this.listeners = [] }; c.prototype = {
                getListenerIndex: function (a) {
                    for (var b = 0, c = this.listeners; b < c.length; b++)if (c[b].fn ==
                        a) return b; return -1
                }
            }; return {
                define: function (a, b) { var c = d.call(this, a); CKEDITOR.tools.extend(c, b, !0) }, on: function (b, c, h, k, l) {
                    function q(w, B, y, l) { w = { name: b, sender: this, editor: w, data: B, listenerData: k, stop: y, cancel: l, removeListener: f }; return !1 === c.call(h, w) ? a : w.data } function f() { w.removeListener(b, c) } var w = this, B = d.call(this, b); if (0 > B.getListenerIndex(c)) {
                        B = B.listeners; h || (h = this); isNaN(l) && (l = 10); q.fn = c; q.priority = l; for (var y = B.length - 1; 0 <= y; y--)if (B[y].priority <= l) return B.splice(y + 1, 0, q), { removeListener: f };
                        B.unshift(q)
                    } return { removeListener: f }
                }, once: function () { var a = Array.prototype.slice.call(arguments), b = a[1]; a[1] = function (a) { a.removeListener(); return b.apply(this, arguments) }; return this.on.apply(this, a) }, capture: function () { CKEDITOR.event.useCapture = 1; var a = this.on.apply(this, arguments); CKEDITOR.event.useCapture = 0; return a }, fire: function () {
                    var c = 0, e = function () { c = 1 }, d = 0, k = function () { d = 1 }; return function (l, q, f) {
                        var w = b(this)[l]; l = c; var B = d; c = d = 0; if (w) {
                            var y = w.listeners; if (y.length) for (var y = y.slice(0),
                                F, r = 0; r < y.length; r++) { if (w.errorProof) try { F = y[r].call(this, f, q, e, k) } catch (m) { } else F = y[r].call(this, f, q, e, k); F === a ? d = 1 : "undefined" != typeof F && (q = F); if (c || d) break }
                        } q = d ? !1 : "undefined" == typeof q ? !0 : q; c = l; d = B; return q
                    }
                }(), fireOnce: function (a, c, d) { c = this.fire(a, c, d); delete b(this)[a]; return c }, removeListener: function (a, c) { var d = b(this)[a]; if (d) { var k = d.getListenerIndex(c); 0 <= k && d.listeners.splice(k, 1) } }, removeAllListeners: function () { var a = b(this), c; for (c in a) delete a[c] }, hasListeners: function (a) {
                    return (a =
                        b(this)[a]) && 0 < a.listeners.length
                }
            }
        }())
    })(); CKEDITOR.editor || (CKEDITOR.editor = function () { CKEDITOR._.pending.push([this, arguments]); CKEDITOR.event.call(this) }, CKEDITOR.editor.prototype.fire = function (a, d) { a in { instanceReady: 1, loaded: 1 } && (this[a] = !0); return CKEDITOR.event.prototype.fire.call(this, a, d, this) }, CKEDITOR.editor.prototype.fireOnce = function (a, d) { a in { instanceReady: 1, loaded: 1 } && (this[a] = !0); return CKEDITOR.event.prototype.fireOnce.call(this, a, d, this) }, CKEDITOR.event.implementOn(CKEDITOR.editor.prototype));
    CKEDITOR.env || (CKEDITOR.env = function () {
        var a = navigator.userAgent.toLowerCase(), d = a.match(/edge[ \/](\d+.?\d*)/), b = -1 < a.indexOf("trident/"), b = !(!d && !b), b = {
            ie: b, edge: !!d, webkit: !b && -1 < a.indexOf(" applewebkit/"), air: -1 < a.indexOf(" adobeair/"), mac: -1 < a.indexOf("macintosh"), quirks: "BackCompat" == document.compatMode && (!document.documentMode || 10 > document.documentMode), mobile: -1 < a.indexOf("mobile"), iOS: /(ipad|iphone|ipod)/.test(a), isCustomDomain: function () {
                if (!this.ie) return !1; var a = document.domain, b = window.location.hostname;
                return a != b && a != "[" + b + "]"
            }, secure: "https:" == location.protocol
        }; b.gecko = "Gecko" == navigator.product && !b.webkit && !b.ie; b.webkit && (-1 < a.indexOf("chrome") ? b.chrome = !0 : b.safari = !0); var c = 0; b.ie && (c = d ? parseFloat(d[1]) : b.quirks || !document.documentMode ? parseFloat(a.match(/msie (\d+)/)[1]) : document.documentMode, b.ie9Compat = 9 == c, b.ie8Compat = 8 == c, b.ie7Compat = 7 == c, b.ie6Compat = 7 > c || b.quirks); b.gecko && (d = a.match(/rv:([\d\.]+)/)) && (d = d[1].split("."), c = 1E4 * d[0] + 100 * (d[1] || 0) + 1 * (d[2] || 0)); b.air && (c = parseFloat(a.match(/ adobeair\/(\d+)/)[1]));
        b.webkit && (c = parseFloat(a.match(/ applewebkit\/(\d+)/)[1])); b.version = c; b.isCompatible = !(b.ie && 7 > c) && !(b.gecko && 4E4 > c) && !(b.webkit && 534 > c); b.hidpi = 2 <= window.devicePixelRatio; b.needsBrFiller = b.gecko || b.webkit || b.ie && 10 < c; b.needsNbspFiller = b.ie && 11 > c; b.cssClass = "cke_browser_" + (b.ie ? "ie" : b.gecko ? "gecko" : b.webkit ? "webkit" : "unknown"); b.quirks && (b.cssClass += " cke_browser_quirks"); b.ie && (b.cssClass += " cke_browser_ie" + (b.quirks ? "6 cke_browser_iequirks" : b.version)); b.air && (b.cssClass += " cke_browser_air");
        b.iOS && (b.cssClass += " cke_browser_ios"); b.hidpi && (b.cssClass += " cke_hidpi"); return b
    }());
    "unloaded" == CKEDITOR.status && function () {
        CKEDITOR.event.implementOn(CKEDITOR); CKEDITOR.loadFullCore = function () { if ("basic_ready" != CKEDITOR.status) CKEDITOR.loadFullCore._load = 1; else { delete CKEDITOR.loadFullCore; var a = document.createElement("script"); a.type = "text/javascript"; a.src = CKEDITOR.basePath + "ckeditor.js"; document.getElementsByTagName("head")[0].appendChild(a) } }; CKEDITOR.loadFullCoreTimeout = 0; CKEDITOR.add = function (a) { (this._.pending || (this._.pending = [])).push(a) }; (function () {
            CKEDITOR.domReady(function () {
                var a =
                    CKEDITOR.loadFullCore, d = CKEDITOR.loadFullCoreTimeout; a && (CKEDITOR.status = "basic_ready", a && a._load ? a() : d && setTimeout(function () { CKEDITOR.loadFullCore && CKEDITOR.loadFullCore() }, 1E3 * d))
            })
        })(); CKEDITOR.status = "basic_loaded"
    }(); "use strict"; CKEDITOR.VERBOSITY_WARN = 1; CKEDITOR.VERBOSITY_ERROR = 2; CKEDITOR.verbosity = CKEDITOR.VERBOSITY_WARN | CKEDITOR.VERBOSITY_ERROR; CKEDITOR.warn = function (a, d) { CKEDITOR.verbosity & CKEDITOR.VERBOSITY_WARN && CKEDITOR.fire("log", { type: "warn", errorCode: a, additionalData: d }) };
    CKEDITOR.error = function (a, d) { CKEDITOR.verbosity & CKEDITOR.VERBOSITY_ERROR && CKEDITOR.fire("log", { type: "error", errorCode: a, additionalData: d }) };
    CKEDITOR.on("log", function (a) { if (window.console && window.console.log) { var d = console[a.data.type] ? a.data.type : "log", b = a.data.errorCode; } }, null, null, 999); CKEDITOR.dom = {};
    (function () {
        function a(a, b, c) { this._minInterval = a; this._context = c; this._lastOutput = this._scheduledTimer = 0; this._output = CKEDITOR.tools.bind(b, c || {}); var f = this; this.input = function () { function a() { f._lastOutput = (new Date).getTime(); f._scheduledTimer = 0; f._call() } if (!f._scheduledTimer || !1 !== f._reschedule()) { var w = (new Date).getTime() - f._lastOutput; w < f._minInterval ? f._scheduledTimer = setTimeout(a, f._minInterval - w) : a() } } } function d(w, b, c) {
            a.call(this, w, b, c); this._args = []; var f = this; this.input = CKEDITOR.tools.override(this.input,
                function (a) { return function () { f._args = Array.prototype.slice.call(arguments); a.call(this) } })
        } var b = [], c = CKEDITOR.env.gecko ? "-moz-" : CKEDITOR.env.webkit ? "-webkit-" : CKEDITOR.env.ie ? "-ms-" : "", g = /&/g, e = />/g, h = /</g, k = /"/g, l = /&(lt|gt|amp|quot|nbsp|shy|#\d{1,5});/g, q = { lt: "\x3c", gt: "\x3e", amp: "\x26", quot: '"', nbsp: " ", shy: "­" }, f = function (a, b) { return "#" == b[0] ? String.fromCharCode(parseInt(b.slice(1), 10)) : q[b] }; CKEDITOR.on("reset", function () { b = [] }); CKEDITOR.tools = {
            arrayCompare: function (a, b) {
                if (!a && !b) return !0;
                if (!a || !b || a.length != b.length) return !1; for (var c = 0; c < a.length; c++)if (a[c] != b[c]) return !1; return !0
            }, getIndex: function (a, b) { for (var c = 0; c < a.length; ++c)if (b(a[c])) return c; return -1 }, clone: function (a) {
                var b; if (a && a instanceof Array) { b = []; for (var c = 0; c < a.length; c++)b[c] = CKEDITOR.tools.clone(a[c]); return b } if (null === a || "object" != typeof a || a instanceof String || a instanceof Number || a instanceof Boolean || a instanceof Date || a instanceof RegExp || a.nodeType || a.window === a) return a; b = new a.constructor; for (c in a) b[c] =
                    CKEDITOR.tools.clone(a[c]); return b
            }, capitalize: function (a, b) { return a.charAt(0).toUpperCase() + (b ? a.slice(1) : a.slice(1).toLowerCase()) }, extend: function (a) { var b = arguments.length, c, f; "boolean" == typeof (c = arguments[b - 1]) ? b-- : "boolean" == typeof (c = arguments[b - 2]) && (f = arguments[b - 1], b -= 2); for (var k = 1; k < b; k++) { var m = arguments[k] || {}; CKEDITOR.tools.array.forEach(CKEDITOR.tools.object.keys(m), function (b) { if (!0 === c || null == a[b]) if (!f || b in f) a[b] = m[b] }) } return a }, prototypedCopy: function (a) {
                var b = function () { };
                b.prototype = a; return new b
            }, copy: function (a) { var b = {}, c; for (c in a) b[c] = a[c]; return b }, isArray: function (a) { return "[object Array]" == Object.prototype.toString.call(a) }, isEmpty: function (a) { for (var b in a) if (a.hasOwnProperty(b)) return !1; return !0 }, cssVendorPrefix: function (a, b, f) { if (f) return c + a + ":" + b + ";" + a + ":" + b; f = {}; f[a] = b; f[c + a] = b; return f }, cssStyleToDomStyle: function () {
                var a = document.createElement("div").style, b = "undefined" != typeof a.cssFloat ? "cssFloat" : "undefined" != typeof a.styleFloat ? "styleFloat" :
                    "float"; return function (a) { return "float" == a ? b : a.replace(/-./g, function (a) { return a.substr(1).toUpperCase() }) }
            }(), buildStyleHtml: function (a) { a = [].concat(a); for (var b, c = [], f = 0; f < a.length; f++)if (b = a[f]) /@import|[{}]/.test(b) ? c.push("\x3cstyle\x3e" + b + "\x3c/style\x3e") : (b = CKEDITOR.appendTimestamp(b), c.push('\x3clink type\x3d"text/css" rel\x3dstylesheet href\x3d"' + b + '"\x3e')); return c.join("") }, htmlEncode: function (a) {
                return void 0 === a || null === a ? "" : String(a).replace(g, "\x26amp;").replace(e, "\x26gt;").replace(h,
                    "\x26lt;")
            }, htmlDecode: function (a) { return a.replace(l, f) }, htmlEncodeAttr: function (a) { return CKEDITOR.tools.htmlEncode(a).replace(k, "\x26quot;") }, htmlDecodeAttr: function (a) { return CKEDITOR.tools.htmlDecode(a) }, transformPlainTextToHtml: function (a, b) {
                var c = b == CKEDITOR.ENTER_BR, f = this.htmlEncode(a.replace(/\r\n/g, "\n")), f = f.replace(/\t/g, "\x26nbsp;\x26nbsp; \x26nbsp;"), k = b == CKEDITOR.ENTER_P ? "p" : "div"; if (!c) {
                    var m = /\n{2}/g; if (m.test(f)) var e = "\x3c" + k + "\x3e", l = "\x3c/" + k + "\x3e", f = e + f.replace(m, function () {
                        return l +
                            e
                    }) + l
                } f = f.replace(/\n/g, "\x3cbr\x3e"); c || (f = f.replace(new RegExp("\x3cbr\x3e(?\x3d\x3c/" + k + "\x3e)"), function (a) { return CKEDITOR.tools.repeat(a, 2) })); f = f.replace(/^ | $/g, "\x26nbsp;"); return f = f.replace(/(>|\s) /g, function (a, b) { return b + "\x26nbsp;" }).replace(/ (?=<)/g, "\x26nbsp;")
            }, getNextNumber: function () { var a = 0; return function () { return ++a } }(), getNextId: function () { return "cke_" + this.getNextNumber() }, getUniqueId: function () {
                for (var a = "e", b = 0; 8 > b; b++)a += Math.floor(65536 * (1 + Math.random())).toString(16).substring(1);
                return a
            }, override: function (a, b) { var c = b(a); c.prototype = a.prototype; return c }, setTimeout: function (a, b, c, f, k) { k || (k = window); c || (c = k); return k.setTimeout(function () { f ? a.apply(c, [].concat(f)) : a.apply(c) }, b || 0) }, debounce: function (a, b) { var c; return function () { var f = this, k = arguments; clearTimeout(c); c = setTimeout(function () { c = null; a.apply(f, k) }, b) } }, throttle: function (a, b, c) { return new this.buffers.throttle(a, b, c) }, trim: function () {
                var a = /(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g; return function (b) {
                    return b.replace(a,
                        "")
                }
            }(), ltrim: function () { var a = /^[ \t\n\r]+/g; return function (b) { return b.replace(a, "") } }(), rtrim: function () { var a = /[ \t\n\r]+$/g; return function (b) { return b.replace(a, "") } }(), indexOf: function (a, b) { if ("function" == typeof b) for (var c = 0, f = a.length; c < f; c++) { if (b(a[c])) return c } else { if (a.indexOf) return a.indexOf(b); c = 0; for (f = a.length; c < f; c++)if (a[c] === b) return c } return -1 }, search: function (a, b) { var c = CKEDITOR.tools.indexOf(a, b); return 0 <= c ? a[c] : null }, bind: function (a, b) {
                var c = Array.prototype.slice.call(arguments,
                    2); return function () { return a.apply(b, c.concat(Array.prototype.slice.call(arguments))) }
            }, createClass: function (a) {
                var b = a.$, c = a.base, f = a.privates || a._, k = a.proto; a = a.statics; !b && (b = function () { c && this.base.apply(this, arguments) }); if (f) var m = b, b = function () { var a = this._ || (this._ = {}), b; for (b in f) { var c = f[b]; a[b] = "function" == typeof c ? CKEDITOR.tools.bind(c, this) : c } m.apply(this, arguments) }; c && (b.prototype = this.prototypedCopy(c.prototype), b.prototype.constructor = b, b.base = c, b.baseProto = c.prototype, b.prototype.base =
                    function v() { this.base = c.prototype.base; c.apply(this, arguments); this.base = v }); k && this.extend(b.prototype, k, !0); a && this.extend(b, a, !0); return b
            }, addFunction: function (a, c) { return b.push(function () { return a.apply(c || this, arguments) }) - 1 }, removeFunction: function (a) { b[a] = null }, callFunction: function (a) { var c = b[a]; return c && c.apply(window, Array.prototype.slice.call(arguments, 1)) }, cssLength: function () { var a = /^-?\d+\.?\d*px$/, b; return function (c) { b = CKEDITOR.tools.trim(c + "") + "px"; return a.test(b) ? b : c || "" } }(),
            convertToPx: function () { var a, b; return function (c) { if (!a || a.isDetached()) a = CKEDITOR.dom.element.createFromHtml('\x3cdiv style\x3d"position:absolute;left:-9999px;top:-9999px;margin:0px;padding:0px;border:0px;"\x3e\x3c/div\x3e', CKEDITOR.document), CKEDITOR.document.getBody().append(a); if (!/%$/.test(c)) { var f = 0 > parseFloat(c); f && (c = c.replace("-", "")); a.setStyle("width", c); b = a.getClientRect(); c = Math.round(b.width); return f ? -c : c } return c } }(), repeat: function (a, b) { return Array(b + 1).join(a) }, tryThese: function () {
                for (var a,
                    b = 0, c = arguments.length; b < c; b++) { var f = arguments[b]; try { a = f(); break } catch (k) { } } return a
            }, genKey: function () { return Array.prototype.slice.call(arguments).join("-") }, defer: function (a) { return function () { var b = arguments, c = this; window.setTimeout(function () { a.apply(c, b) }, 0) } }, normalizeCssText: function (a, b) { var c = [], f, k = CKEDITOR.tools.parseCssText(a, !0, b); for (f in k) c.push(f + ":" + k[f]); c.sort(); return c.length ? c.join(";") + ";" : "" }, convertRgbToHex: function (a) {
                return a.replace(/(?:rgb\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\))/gi,
                    function (a, b, c, f) { a = [b, c, f]; for (b = 0; 3 > b; b++)a[b] = ("0" + parseInt(a[b], 10).toString(16)).slice(-2); return "#" + a.join("") })
            }, normalizeHex: function (a) { return a.replace(/#(([0-9a-f]{3}){1,2})($|;|\s+)/gi, function (a, b, c, f) { a = b.toLowerCase(); 3 == a.length && (a = a.split(""), a = [a[0], a[0], a[1], a[1], a[2], a[2]].join("")); return "#" + a + f }) }, _isValidColorFormat: function (a) { if (!a) return !1; a = a.replace(/\s+/g, ""); return /^[a-z0-9()#%,./]+$/i.test(a) }, parseCssText: function (a, b, c) {
                var f = {}; c && (a = (new CKEDITOR.dom.element("span")).setAttribute("style",
                    a).getAttribute("style") || ""); a && (a = CKEDITOR.tools.normalizeHex(CKEDITOR.tools.convertRgbToHex(a))); if (!a || ";" == a) return f; a.replace(/&quot;/g, '"').replace(/\s*([^:;\s]+)\s*:\s*([^;]+)\s*(?=;|$)/g, function (a, c, w) { b && (c = c.toLowerCase(), "font-family" == c && (w = w.replace(/\s*,\s*/g, ",")), w = CKEDITOR.tools.trim(w)); f[c] = w }); return f
            }, writeCssText: function (a, b) { var c, f = []; for (c in a) f.push(c + ":" + a[c]); b && f.sort(); return f.join("; ") }, objectCompare: function (a, b, c) {
                var f; if (!a && !b) return !0; if (!a || !b) return !1;
                for (f in a) if (a[f] != b[f]) return !1; if (!c) for (f in b) if (a[f] != b[f]) return !1; return !0
            }, objectKeys: function (a) { return CKEDITOR.tools.object.keys(a) }, convertArrayToObject: function (a, b) { var c = {}; 1 == arguments.length && (b = !0); for (var f = 0, k = a.length; f < k; ++f)c[a[f]] = b; return c }, getStyledSpans: function (a, b) { var c = CKEDITOR.env.ie && 8 == CKEDITOR.env.version ? a.toUpperCase() : a, c = b.find("span[style*\x3d" + c + "]").toArray(); return CKEDITOR.tools.array.filter(c, function (b) { return !!b.getStyle(a) }) }, fixDomain: function () {
                for (var a; ;)try {
                    a =
                    window.parent.document.domain; break
                } catch (b) { a = a ? a.replace(/.+?(?:\.|$)/, "") : document.domain; if (!a) break; document.domain = a } return !!a
            }, eventsBuffer: function (a, b, c) { return new this.buffers.event(a, b, c) }, enableHtml5Elements: function (a, b) { for (var c = "abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup main mark meter nav output progress section summary time video".split(" "), f = c.length, k; f--;)k = a.createElement(c[f]), b && a.appendChild(k) }, checkIfAnyArrayItemMatches: function (a,
                b) { for (var c = 0, f = a.length; c < f; ++c)if (a[c].match(b)) return !0; return !1 }, checkIfAnyObjectPropertyMatches: function (a, b) { for (var c in a) if (c.match(b)) return !0; return !1 }, keystrokeToString: function (a, b) { var c = this.keystrokeToArray(a, b); c.display = c.display.join("+"); c.aria = c.aria.join("+"); return c }, keystrokeToArray: function (a, b) {
                    var c = b & 16711680, f = b & 65535, k = CKEDITOR.env.mac, m = [], e = []; c & CKEDITOR.CTRL && (m.push(k ? "⌘" : a[17]), e.push(k ? a[224] : a[17])); c & CKEDITOR.ALT && (m.push(k ? "⌥" : a[18]), e.push(a[18])); c & CKEDITOR.SHIFT &&
                        (m.push(k ? "⇧" : a[16]), e.push(a[16])); f && (a[f] ? (m.push(a[f]), e.push(a[f])) : (m.push(String.fromCharCode(f)), e.push(String.fromCharCode(f)))); return { display: m, aria: e }
                }, transparentImageData: "data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw\x3d\x3d", getCookie: function (a) {
                    a = a.toLowerCase(); for (var b = document.cookie.split(";"), c, f, k = 0; k < b.length; k++)if (c = b[k].split("\x3d"), f = decodeURIComponent(CKEDITOR.tools.trim(c[0]).toLowerCase()), f === a) return decodeURIComponent(1 < c.length ?
                        c[1] : ""); return null
                }, setCookie: function (a, b) { document.cookie = encodeURIComponent(a) + "\x3d" + encodeURIComponent(b) + ";path\x3d/" }, getCsrfToken: function () {
                    var a = CKEDITOR.tools.getCookie("ckCsrfToken"); if (!a || 40 != a.length) {
                        var a = [], b = ""; if (window.crypto && window.crypto.getRandomValues) a = new Uint8Array(40), window.crypto.getRandomValues(a); else for (var c = 0; 40 > c; c++)a.push(Math.floor(256 * Math.random())); for (c = 0; c < a.length; c++)var f = "abcdefghijklmnopqrstuvwxyz0123456789".charAt(a[c] % 36), b = b + (.5 < Math.random() ?
                            f.toUpperCase() : f); a = b; CKEDITOR.tools.setCookie("ckCsrfToken", a)
                    } return a
                }, escapeCss: function (a) { if (a) if (window.CSS && CSS.escape) a = CSS.escape(a); else { a = String(a); for (var b = a.length, c = -1, f, k = "", m = a.charCodeAt(0); ++c < b;)f = a.charCodeAt(c), k = 0 == f ? k + "�" : 127 == f || 1 <= f && 31 >= f || 0 == c && 48 <= f && 57 >= f || 1 == c && 48 <= f && 57 >= f && 45 == m ? k + ("\\" + f.toString(16) + " ") : 0 == c && 1 == b && 45 == f ? k + ("\\" + a.charAt(c)) : 128 <= f || 45 == f || 95 == f || 48 <= f && 57 >= f || 65 <= f && 90 >= f || 97 <= f && 122 >= f ? k + a.charAt(c) : k + ("\\" + a.charAt(c)); a = k } else a = ""; return a },
            getMouseButton: function (a) { return (a = a && a.data ? a.data.$ : a) ? CKEDITOR.tools.normalizeMouseButton(a.button) : !1 }, normalizeMouseButton: function (a, b) { if (!CKEDITOR.env.ie || 9 <= CKEDITOR.env.version && !CKEDITOR.env.ie6Compat) return a; for (var c = [[CKEDITOR.MOUSE_BUTTON_LEFT, 1], [CKEDITOR.MOUSE_BUTTON_MIDDLE, 4], [CKEDITOR.MOUSE_BUTTON_RIGHT, 2]], f = 0; f < c.length; f++) { var k = c[f]; if (k[0] === a && b) return k[1]; if (!b && k[1] === a) return k[0] } }, convertHexStringToBytes: function (a) {
                var b = [], c = a.length / 2, f; for (f = 0; f < c; f++)b.push(parseInt(a.substr(2 *
                    f, 2), 16)); return b
            }, convertBytesToBase64: function (a) { var b = "", c = a.length, f; for (f = 0; f < c; f += 3) { var k = a.slice(f, f + 3), m = k.length, e = [], l; if (3 > m) for (l = m; 3 > l; l++)k[l] = 0; e[0] = (k[0] & 252) >> 2; e[1] = (k[0] & 3) << 4 | k[1] >> 4; e[2] = (k[1] & 15) << 2 | (k[2] & 192) >> 6; e[3] = k[2] & 63; for (l = 0; 4 > l; l++)b = l <= m ? b + "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/".charAt(e[l]) : b + "\x3d" } return b }, style: {
                parse: {
                    _borderStyle: "none hidden dotted dashed solid double groove ridge inset outset".split(" "), _widthRegExp: /^(thin|medium|thick|[\+-]?\d+(\.\d+)?[a-z%]+|[\+-]?0+(\.0+)?|\.\d+[a-z%]+)$/,
                    _rgbaRegExp: /rgba?\(\s*\d+%?\s*,\s*\d+%?\s*,\s*\d+%?\s*(?:,\s*[0-9.]+\s*)?\)/gi, _hslaRegExp: /hsla?\(\s*[0-9.]+\s*,\s*\d+%\s*,\s*\d+%\s*(?:,\s*[0-9.]+\s*)?\)/gi, background: function (a) { var b = {}, c = this._findColor(a); c.length && (b.color = c[0], CKEDITOR.tools.array.forEach(c, function (b) { a = a.replace(b, "") })); if (a = CKEDITOR.tools.trim(a)) b.unprocessed = a; return b }, margin: function (a) {
                        return CKEDITOR.tools.style.parse.sideShorthand(a, function (a) {
                            return a.match(/(?:\-?[\.\d]+(?:%|\w*)|auto|inherit|initial|unset|revert)/g) ||
                                ["0px"]
                        })
                    }, sideShorthand: function (a, b) { function c(a) { f.top = k[a[0]]; f.right = k[a[1]]; f.bottom = k[a[2]]; f.left = k[a[3]] } var f = {}, k = b ? b(a) : a.split(/\s+/); switch (k.length) { case 1: c([0, 0, 0, 0]); break; case 2: c([0, 1, 0, 1]); break; case 3: c([0, 1, 2, 1]); break; case 4: c([0, 1, 2, 3]) }return f }, border: function (a) { return CKEDITOR.tools.style.border.fromCssRule(a) }, _findColor: function (a) {
                        var b = [], c = CKEDITOR.tools.array, b = b.concat(a.match(this._rgbaRegExp) || []), b = b.concat(a.match(this._hslaRegExp) || []); return b = b.concat(c.filter(a.split(/\s+/),
                            function (a) { return a.match(/^\#[a-f0-9]{3}(?:[a-f0-9]{3})?$/gi) ? !0 : a.toLowerCase() in CKEDITOR.tools.style.parse._colors }))
                    }
                }
            }, array: {
                filter: function (a, b, c) { var f = []; this.forEach(a, function (k, e) { b.call(c, k, e, a) && f.push(k) }); return f }, find: function (a, b, c) { for (var f = a.length, k = 0; k < f;) { if (b.call(c, a[k], k, a)) return a[k]; k++ } }, forEach: function (a, b, c) { var f = a.length, k; for (k = 0; k < f; k++)b.call(c, a[k], k, a) }, map: function (a, b, c) { for (var f = [], k = 0; k < a.length; k++)f.push(b.call(c, a[k], k, a)); return f }, reduce: function (a,
                    b, c, f) { for (var k = 0; k < a.length; k++)c = b.call(f, c, a[k], k, a); return c }, every: function (a, b, c) { if (!a.length) return !0; b = this.filter(a, b, c); return a.length === b.length }, some: function (a, b, c) { for (var f = 0; f < a.length; f++)if (b.call(c, a[f], f, a)) return !0; return !1 }, zip: function (a, b) { return CKEDITOR.tools.array.map(a, function (a, c) { return [a, b[c]] }) }, unique: function (a) { return this.filter(a, function (b, c) { return c === CKEDITOR.tools.array.indexOf(a, b) }) }
            }, object: {
                DONT_ENUMS: "toString toLocaleString valueOf hasOwnProperty isPrototypeOf propertyIsEnumerable constructor".split(" "),
                entries: function (a) { return CKEDITOR.tools.array.map(CKEDITOR.tools.object.keys(a), function (b) { return [b, a[b]] }) }, values: function (a) { return CKEDITOR.tools.array.map(CKEDITOR.tools.object.keys(a), function (b) { return a[b] }) }, keys: function (a) {
                    var b = Object.prototype.hasOwnProperty, c = [], f = CKEDITOR.tools.object.DONT_ENUMS; if (CKEDITOR.env.ie && 9 > CKEDITOR.env.version && (!a || "object" !== typeof a)) { b = []; if ("string" === typeof a) for (c = 0; c < a.length; c++)b.push(String(c)); return b } for (var k in a) c.push(k); if (CKEDITOR.env.ie &&
                        9 > CKEDITOR.env.version) for (k = 0; k < f.length; k++)b.call(a, f[k]) && c.push(f[k]); return c
                }, findKey: function (a, b) { if ("object" !== typeof a) return null; for (var c in a) if (a[c] === b) return c; return null }, merge: function (a, b) { var c = CKEDITOR.tools, f = c.clone(a), k = c.clone(b); c.array.forEach(c.object.keys(k), function (a) { f[a] = "object" === typeof k[a] && "object" === typeof f[a] ? c.object.merge(f[a], k[a]) : k[a] }); return f }
            }, getAbsoluteRectPosition: function (a, b) {
                function c(a) {
                    if (a) {
                        var b = a.getClientRect(); f.top += b.top; f.left +=
                            b.left; "x" in f && "y" in f && (f.x += b.x, f.y += b.y); c(a.getWindow().getFrame())
                    }
                } var f = CKEDITOR.tools.copy(b); c(a.getFrame()); var k = CKEDITOR.document.getWindow().getScrollPosition(); f.top += k.y; f.left += k.x; "x" in f && "y" in f && (f.y += k.y, f.x += k.x); f.right = f.left + f.width; f.bottom = f.top + f.height; return f
            }
        }; a.prototype = {
            reset: function () { this._lastOutput = 0; this._clearTimer() }, _reschedule: function () { return !1 }, _call: function () { this._output() }, _clearTimer: function () {
                this._scheduledTimer && clearTimeout(this._scheduledTimer);
                this._scheduledTimer = 0
            }
        }; d.prototype = CKEDITOR.tools.prototypedCopy(a.prototype); d.prototype._reschedule = function () { this._scheduledTimer && this._clearTimer() }; d.prototype._call = function () { this._output.apply(this._context, this._args) }; CKEDITOR.tools.buffers = {}; CKEDITOR.tools.buffers.event = a; CKEDITOR.tools.buffers.throttle = d; CKEDITOR.tools.style.border = CKEDITOR.tools.createClass({
            $: function (a) { a = a || {}; this.width = a.width; this.style = a.style; this.color = a.color; this._.normalize() }, _: {
                normalizeMap: {
                    color: [[/windowtext/g,
                        "black"]]
                }, normalize: function () { for (var a in this._.normalizeMap) { var b = this[a]; b && (this[a] = CKEDITOR.tools.array.reduce(this._.normalizeMap[a], function (a, b) { return a.replace(b[0], b[1]) }, b)) } }
            }, proto: { toString: function () { return CKEDITOR.tools.array.filter([this.width, this.style, this.color], function (a) { return !!a }).join(" ") } }, statics: {
                fromCssRule: function (a) {
                    var b = {}, c = a.split(/\s+/g); a = CKEDITOR.tools.style.parse._findColor(a); a.length && (b.color = a[0]); CKEDITOR.tools.array.forEach(c, function (a) {
                        b.style ||
                        -1 === CKEDITOR.tools.indexOf(CKEDITOR.tools.style.parse._borderStyle, a) ? !b.width && CKEDITOR.tools.style.parse._widthRegExp.test(a) && (b.width = a) : b.style = a
                    }); return new CKEDITOR.tools.style.border(b)
                }, splitCssValues: function (a, b) {
                    b = b || {}; var c = CKEDITOR.tools.array.reduce(["width", "style", "color"], function (c, f) { var k = a["border-" + f] || b[f]; c[f] = k ? CKEDITOR.tools.style.parse.sideShorthand(k) : null; return c }, {}); return CKEDITOR.tools.array.reduce(["top", "right", "bottom", "left"], function (b, f) {
                        var k = {}, e; for (e in c) {
                            var l =
                                a["border-" + f + "-" + e]; k[e] = l ? l : c[e] && c[e][f]
                        } b["border-" + f] = new CKEDITOR.tools.style.border(k); return b
                    }, {})
                }
            }
        }); CKEDITOR.tools.array.indexOf = CKEDITOR.tools.indexOf; CKEDITOR.tools.array.isArray = CKEDITOR.tools.isArray; CKEDITOR.MOUSE_BUTTON_LEFT = 0; CKEDITOR.MOUSE_BUTTON_MIDDLE = 1; CKEDITOR.MOUSE_BUTTON_RIGHT = 2
    })();
    CKEDITOR.dtd = function () {
        var a = CKEDITOR.tools.extend, d = function (a, b) { for (var c = CKEDITOR.tools.clone(a), k = 1; k < arguments.length; k++) { b = arguments[k]; for (var e in b) delete c[e] } return c }, b = {}, c = {}, g = { address: 1, article: 1, aside: 1, blockquote: 1, details: 1, div: 1, dl: 1, fieldset: 1, figure: 1, footer: 1, form: 1, h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1, header: 1, hgroup: 1, hr: 1, main: 1, menu: 1, nav: 1, ol: 1, p: 1, pre: 1, section: 1, table: 1, ul: 1 }, e = { command: 1, link: 1, meta: 1, noscript: 1, script: 1, style: 1 }, h = {}, k = { "#": 1 }, l = { center: 1, dir: 1, noframes: 1 };
        a(b, { a: 1, abbr: 1, area: 1, audio: 1, b: 1, bdi: 1, bdo: 1, br: 1, button: 1, canvas: 1, cite: 1, code: 1, command: 1, datalist: 1, del: 1, dfn: 1, em: 1, embed: 1, i: 1, iframe: 1, img: 1, input: 1, ins: 1, kbd: 1, keygen: 1, label: 1, map: 1, mark: 1, meter: 1, noscript: 1, object: 1, output: 1, progress: 1, q: 1, ruby: 1, s: 1, samp: 1, script: 1, select: 1, small: 1, span: 1, strong: 1, sub: 1, sup: 1, textarea: 1, time: 1, u: 1, "var": 1, video: 1, wbr: 1 }, k, { acronym: 1, applet: 1, basefont: 1, big: 1, font: 1, isindex: 1, strike: 1, style: 1, tt: 1 }); a(c, g, b, l); d = {
            a: d(b, { a: 1, button: 1 }), abbr: b, address: c,
            area: h, article: c, aside: c, audio: a({ source: 1, track: 1 }, c), b: b, base: h, bdi: b, bdo: b, blockquote: c, body: c, br: h, button: d(b, { a: 1, button: 1 }), canvas: b, caption: c, cite: b, code: b, col: h, colgroup: { col: 1 }, command: h, datalist: a({ option: 1 }, b), dd: c, del: b, details: a({ summary: 1 }, c), dfn: b, div: c, dl: { dt: 1, dd: 1 }, dt: c, em: b, embed: h, fieldset: a({ legend: 1 }, c), figcaption: c, figure: a({ figcaption: 1 }, c), footer: c, form: c, h1: b, h2: b, h3: b, h4: b, h5: b, h6: b, head: a({ title: 1, base: 1 }, e), header: c, hgroup: { h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1 }, hr: h, html: a({
                head: 1,
                body: 1
            }, c, e), i: b, iframe: k, img: h, input: h, ins: b, kbd: b, keygen: h, label: b, legend: b, li: c, link: h, main: c, map: c, mark: b, menu: a({ li: 1 }, c), meta: h, meter: d(b, { meter: 1 }), nav: c, noscript: a({ link: 1, meta: 1, style: 1 }, b), object: a({ param: 1 }, b), ol: { li: 1 }, optgroup: { option: 1 }, option: k, output: b, p: b, param: h, pre: b, progress: d(b, { progress: 1 }), q: b, rp: b, rt: b, ruby: a({ rp: 1, rt: 1 }, b), s: b, samp: b, script: k, section: c, select: { optgroup: 1, option: 1 }, small: b, source: h, span: b, strong: b, style: k, sub: b, summary: a({ h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1 }, b),
            sup: b, table: { caption: 1, colgroup: 1, thead: 1, tfoot: 1, tbody: 1, tr: 1 }, tbody: { tr: 1 }, td: c, textarea: k, tfoot: { tr: 1 }, th: c, thead: { tr: 1 }, time: d(b, { time: 1 }), title: k, tr: { th: 1, td: 1 }, track: h, u: b, ul: { li: 1 }, "var": b, video: a({ source: 1, track: 1 }, c), wbr: h, acronym: b, applet: a({ param: 1 }, c), basefont: h, big: b, center: c, dialog: h, dir: { li: 1 }, font: b, isindex: h, noframes: c, strike: b, tt: b
        }; a(d, {
            $block: a({ audio: 1, dd: 1, dt: 1, figcaption: 1, li: 1, video: 1 }, g, l), $blockLimit: {
                article: 1, aside: 1, audio: 1, body: 1, caption: 1, details: 1, dir: 1, div: 1, dl: 1,
                fieldset: 1, figcaption: 1, figure: 1, footer: 1, form: 1, header: 1, hgroup: 1, main: 1, menu: 1, nav: 1, ol: 1, section: 1, table: 1, td: 1, th: 1, tr: 1, ul: 1, video: 1
            }, $cdata: { script: 1, style: 1 }, $editable: { address: 1, article: 1, aside: 1, blockquote: 1, body: 1, details: 1, div: 1, fieldset: 1, figcaption: 1, footer: 1, form: 1, h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1, header: 1, hgroup: 1, main: 1, nav: 1, p: 1, pre: 1, section: 1 }, $empty: {
                area: 1, base: 1, basefont: 1, br: 1, col: 1, command: 1, dialog: 1, embed: 1, hr: 1, img: 1, input: 1, isindex: 1, keygen: 1, link: 1, meta: 1, param: 1, source: 1,
                track: 1, wbr: 1
            }, $inline: b, $list: { dl: 1, ol: 1, ul: 1 }, $listItem: { dd: 1, dt: 1, li: 1 }, $nonBodyContent: a({ body: 1, head: 1, html: 1 }, d.head), $nonEditable: { applet: 1, audio: 1, button: 1, embed: 1, iframe: 1, map: 1, object: 1, option: 1, param: 1, script: 1, textarea: 1, video: 1 }, $object: { applet: 1, audio: 1, button: 1, hr: 1, iframe: 1, img: 1, input: 1, object: 1, select: 1, table: 1, textarea: 1, video: 1 }, $removeEmpty: {
                abbr: 1, acronym: 1, b: 1, bdi: 1, bdo: 1, big: 1, cite: 1, code: 1, del: 1, dfn: 1, em: 1, font: 1, i: 1, ins: 1, label: 1, kbd: 1, mark: 1, meter: 1, output: 1, q: 1, ruby: 1,
                s: 1, samp: 1, small: 1, span: 1, strike: 1, strong: 1, sub: 1, sup: 1, time: 1, tt: 1, u: 1, "var": 1
            }, $tabIndex: { a: 1, area: 1, button: 1, input: 1, object: 1, select: 1, textarea: 1 }, $tableContent: { caption: 1, col: 1, colgroup: 1, tbody: 1, td: 1, tfoot: 1, th: 1, thead: 1, tr: 1 }, $transparent: { a: 1, audio: 1, canvas: 1, del: 1, ins: 1, map: 1, noscript: 1, object: 1, video: 1 }, $intermediate: { caption: 1, colgroup: 1, dd: 1, dt: 1, figcaption: 1, legend: 1, li: 1, optgroup: 1, option: 1, rp: 1, rt: 1, summary: 1, tbody: 1, td: 1, tfoot: 1, th: 1, thead: 1, tr: 1 }
        }); return d
    }();
    CKEDITOR.dom.event = function (a) { this.$ = a };
    CKEDITOR.dom.event.prototype = {
        getKey: function () { return this.$.keyCode || this.$.which }, getKeystroke: function () { var a = this.getKey(); if (this.$.ctrlKey || this.$.metaKey) a += CKEDITOR.CTRL; this.$.shiftKey && (a += CKEDITOR.SHIFT); this.$.altKey && (a += CKEDITOR.ALT); return a }, preventDefault: function (a) { var d = this.$; d.preventDefault ? d.preventDefault() : d.returnValue = !1; a && this.stopPropagation() }, stopPropagation: function () { var a = this.$; a.stopPropagation ? a.stopPropagation() : a.cancelBubble = !0 }, getTarget: function () {
            var a =
                this.$.target || this.$.srcElement; return a ? new CKEDITOR.dom.node(a) : null
        }, getPhase: function () { return this.$.eventPhase || 2 }, getPageOffset: function () { var a = this.getTarget().getDocument().$; return { x: this.$.pageX || this.$.clientX + (a.documentElement.scrollLeft || a.body.scrollLeft), y: this.$.pageY || this.$.clientY + (a.documentElement.scrollTop || a.body.scrollTop) } }
    }; CKEDITOR.CTRL = 1114112; CKEDITOR.SHIFT = 2228224; CKEDITOR.ALT = 4456448; CKEDITOR.EVENT_PHASE_CAPTURING = 1; CKEDITOR.EVENT_PHASE_AT_TARGET = 2;
    CKEDITOR.EVENT_PHASE_BUBBLING = 3; CKEDITOR.HISTORY_NATIVE = 1; CKEDITOR.HISTORY_HASH = 2; CKEDITOR.HISTORY_OFF = 0; CKEDITOR.dom.domObject = function (a) { a && (this.$ = a) };
    CKEDITOR.dom.domObject.prototype = function () {
        var a = function (a, b) { return function (c) { "undefined" != typeof CKEDITOR && a.fire(b, new CKEDITOR.dom.event(c)) } }; return {
            getPrivate: function () { var a; (a = this.getCustomData("_")) || this.setCustomData("_", a = {}); return a }, on: function (d) {
                var b = this.getCustomData("_cke_nativeListeners"); b || (b = {}, this.setCustomData("_cke_nativeListeners", b)); b[d] || (b = b[d] = a(this, d), this.$.addEventListener ? this.$.addEventListener(d, b, !!CKEDITOR.event.useCapture) : this.$.attachEvent && this.$.attachEvent("on" +
                    d, b)); return CKEDITOR.event.prototype.on.apply(this, arguments)
            }, removeListener: function (a) { CKEDITOR.event.prototype.removeListener.apply(this, arguments); if (!this.hasListeners(a)) { var b = this.getCustomData("_cke_nativeListeners"), c = b && b[a]; c && (this.$.removeEventListener ? this.$.removeEventListener(a, c, !1) : this.$.detachEvent && this.$.detachEvent("on" + a, c), delete b[a]) } }, removeAllListeners: function () {
                try {
                    var a = this.getCustomData("_cke_nativeListeners"), b; for (b in a) {
                        var c = a[b]; this.$.detachEvent ? this.$.detachEvent("on" +
                            b, c) : this.$.removeEventListener && this.$.removeEventListener(b, c, !1); delete a[b]
                    }
                } catch (g) { if (!CKEDITOR.env.edge || -2146828218 !== g.number) throw g; } CKEDITOR.event.prototype.removeAllListeners.call(this)
            }
        }
    }();
    (function (a) {
        var d = {}; CKEDITOR.on("reset", function () { d = {} }); a.equals = function (a) { try { return a && a.$ === this.$ } catch (c) { return !1 } }; a.setCustomData = function (a, c) { var g = this.getUniqueId(); (d[g] || (d[g] = {}))[a] = c; return this }; a.getCustomData = function (a) { var c = this.$["data-cke-expando"]; return (c = c && d[c]) && a in c ? c[a] : null }; a.removeCustomData = function (a) { var c = this.$["data-cke-expando"], c = c && d[c], g, e; c && (g = c[a], e = a in c, delete c[a]); return e ? g : null }; a.clearCustomData = function () {
            this.removeAllListeners(); var a =
                this.getUniqueId(); a && delete d[a]
        }; a.getUniqueId = function () { return this.$["data-cke-expando"] || (this.$["data-cke-expando"] = CKEDITOR.tools.getNextNumber()) }; CKEDITOR.event.implementOn(a)
    })(CKEDITOR.dom.domObject.prototype);
    CKEDITOR.dom.node = function (a) { return a ? new CKEDITOR.dom[a.nodeType == CKEDITOR.NODE_DOCUMENT ? "document" : a.nodeType == CKEDITOR.NODE_ELEMENT ? "element" : a.nodeType == CKEDITOR.NODE_TEXT ? "text" : a.nodeType == CKEDITOR.NODE_COMMENT ? "comment" : a.nodeType == CKEDITOR.NODE_DOCUMENT_FRAGMENT ? "documentFragment" : "domObject"](a) : this }; CKEDITOR.dom.node.prototype = new CKEDITOR.dom.domObject; CKEDITOR.NODE_ELEMENT = 1; CKEDITOR.NODE_DOCUMENT = 9; CKEDITOR.NODE_TEXT = 3; CKEDITOR.NODE_COMMENT = 8; CKEDITOR.NODE_DOCUMENT_FRAGMENT = 11;
    CKEDITOR.POSITION_IDENTICAL = 0; CKEDITOR.POSITION_DISCONNECTED = 1; CKEDITOR.POSITION_FOLLOWING = 2; CKEDITOR.POSITION_PRECEDING = 4; CKEDITOR.POSITION_IS_CONTAINED = 8; CKEDITOR.POSITION_CONTAINS = 16;
    CKEDITOR.tools.extend(CKEDITOR.dom.node.prototype, {
        appendTo: function (a, d) { a.append(this, d); return a }, clone: function (a, d) {
            function b(c) { c["data-cke-expando"] && (c["data-cke-expando"] = !1); if (c.nodeType == CKEDITOR.NODE_ELEMENT || c.nodeType == CKEDITOR.NODE_DOCUMENT_FRAGMENT) if (d || c.nodeType != CKEDITOR.NODE_ELEMENT || c.removeAttribute("id", !1), a) { c = c.childNodes; for (var g = 0; g < c.length; g++)b(c[g]) } } function c(b) {
                if (b.type == CKEDITOR.NODE_ELEMENT || b.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT) {
                    if (b.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT) {
                        var d =
                            b.getName(); ":" == d[0] && b.renameNode(d.substring(1))
                    } if (a) for (d = 0; d < b.getChildCount(); d++)c(b.getChild(d))
                }
            } var g = this.$.cloneNode(a); b(g); g = new CKEDITOR.dom.node(g); CKEDITOR.env.ie && 9 > CKEDITOR.env.version && (this.type == CKEDITOR.NODE_ELEMENT || this.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT) && c(g); return g
        }, hasPrevious: function () { return !!this.$.previousSibling }, hasNext: function () { return !!this.$.nextSibling }, insertAfter: function (a) { a.$.parentNode.insertBefore(this.$, a.$.nextSibling); return a }, insertBefore: function (a) {
            a.$.parentNode.insertBefore(this.$,
                a.$); return a
        }, insertBeforeMe: function (a) { this.$.parentNode.insertBefore(a.$, this.$); return a }, getAddress: function (a) { for (var d = [], b = this.getDocument().$.documentElement, c = this; c && c != b;) { var g = c.getParent(); g && d.unshift(this.getIndex.call(c, a)); c = g } return d }, getDocument: function () { return new CKEDITOR.dom.document(this.$.ownerDocument || this.$.parentNode.ownerDocument) }, getIndex: function (a) {
            function d(a, b) {
                var c = b ? a.getNext() : a.getPrevious(); return c && c.type == CKEDITOR.NODE_TEXT ? c.isEmpty() ? d(c, b) : c :
                    null
            } var b = this, c = -1, g; if (!this.getParent() || a && b.type == CKEDITOR.NODE_TEXT && b.isEmpty() && !d(b) && !d(b, !0)) return -1; do if (!a || b.equals(this) || b.type != CKEDITOR.NODE_TEXT || !g && !b.isEmpty()) c++, g = b.type == CKEDITOR.NODE_TEXT; while (b = b.getPrevious()); return c
        }, getNextSourceNode: function (a, d, b) {
            if (b && !b.call) { var c = b; b = function (a) { return !a.equals(c) } } a = !a && this.getFirst && this.getFirst(); var g; if (!a) { if (this.type == CKEDITOR.NODE_ELEMENT && b && !1 === b(this, !0)) return null; a = this.getNext() } for (; !a && (g = (g || this).getParent());) {
                if (b &&
                    !1 === b(g, !0)) return null; a = g.getNext()
            } return !a || b && !1 === b(a) ? null : d && d != a.type ? a.getNextSourceNode(!1, d, b) : a
        }, getPreviousSourceNode: function (a, d, b) {
            if (b && !b.call) { var c = b; b = function (a) { return !a.equals(c) } } a = !a && this.getLast && this.getLast(); var g; if (!a) { if (this.type == CKEDITOR.NODE_ELEMENT && b && !1 === b(this, !0)) return null; a = this.getPrevious() } for (; !a && (g = (g || this).getParent());) { if (b && !1 === b(g, !0)) return null; a = g.getPrevious() } return !a || b && !1 === b(a) ? null : d && a.type != d ? a.getPreviousSourceNode(!1, d, b) :
                a
        }, getPrevious: function (a) { var d = this.$, b; do b = (d = d.previousSibling) && 10 != d.nodeType && new CKEDITOR.dom.node(d); while (b && a && !a(b)); return b }, getNext: function (a) { var d = this.$, b; do b = (d = d.nextSibling) && new CKEDITOR.dom.node(d); while (b && a && !a(b)); return b }, getParent: function (a) { var d = this.$.parentNode; return d && (d.nodeType == CKEDITOR.NODE_ELEMENT || a && d.nodeType == CKEDITOR.NODE_DOCUMENT_FRAGMENT) ? new CKEDITOR.dom.node(d) : null }, getParents: function (a) {
            var d = this, b = []; do b[a ? "push" : "unshift"](d); while (d = d.getParent());
            return b
        }, getCommonAncestor: function (a) { if (a.equals(this)) return this; if (a.contains && a.contains(this)) return a; var d = this.contains ? this : this.getParent(); do if (d.contains(a)) return d; while (d = d.getParent()); return null }, getPosition: function (a) {
            var d = this.$, b = a.$; if (d.compareDocumentPosition) return d.compareDocumentPosition(b); if (d == b) return CKEDITOR.POSITION_IDENTICAL; if (this.type == CKEDITOR.NODE_ELEMENT && a.type == CKEDITOR.NODE_ELEMENT) {
                if (d.contains) {
                    if (d.contains(b)) return CKEDITOR.POSITION_CONTAINS +
                        CKEDITOR.POSITION_PRECEDING; if (b.contains(d)) return CKEDITOR.POSITION_IS_CONTAINED + CKEDITOR.POSITION_FOLLOWING
                } if ("sourceIndex" in d) return 0 > d.sourceIndex || 0 > b.sourceIndex ? CKEDITOR.POSITION_DISCONNECTED : d.sourceIndex < b.sourceIndex ? CKEDITOR.POSITION_PRECEDING : CKEDITOR.POSITION_FOLLOWING
            } d = this.getAddress(); a = a.getAddress(); for (var b = Math.min(d.length, a.length), c = 0; c < b; c++)if (d[c] != a[c]) return d[c] < a[c] ? CKEDITOR.POSITION_PRECEDING : CKEDITOR.POSITION_FOLLOWING; return d.length < a.length ? CKEDITOR.POSITION_CONTAINS +
                CKEDITOR.POSITION_PRECEDING : CKEDITOR.POSITION_IS_CONTAINED + CKEDITOR.POSITION_FOLLOWING
        }, getAscendant: function (a, d) { var b = this.$, c, g; d || (b = b.parentNode); "function" == typeof a ? (g = !0, c = a) : (g = !1, c = function (b) { b = "string" == typeof b.nodeName ? b.nodeName.toLowerCase() : ""; return "string" == typeof a ? b == a : b in a }); for (; b;) { if (c(g ? new CKEDITOR.dom.node(b) : b)) return new CKEDITOR.dom.node(b); try { b = b.parentNode } catch (e) { b = null } } return null }, hasAscendant: function (a, d) {
            var b = this.$; d || (b = b.parentNode); for (; b;) {
                if (b.nodeName &&
                    b.nodeName.toLowerCase() == a) return !0; b = b.parentNode
            } return !1
        }, move: function (a, d) { a.append(this.remove(), d) }, remove: function (a) { var d = this.$, b = d.parentNode; if (b) { if (a) for (; a = d.firstChild;)b.insertBefore(d.removeChild(a), d); b.removeChild(d) } return this }, replace: function (a) { this.insertBefore(a); a.remove() }, trim: function () { this.ltrim(); this.rtrim() }, ltrim: function () {
            for (var a; this.getFirst && (a = this.getFirst());) {
                if (a.type == CKEDITOR.NODE_TEXT) {
                    var d = CKEDITOR.tools.ltrim(a.getText()), b = a.getLength(); if (d) d.length <
                        b && (a.split(b - d.length), this.$.removeChild(this.$.firstChild)); else { a.remove(); continue }
                } break
            }
        }, rtrim: function () { for (var a; this.getLast && (a = this.getLast());) { if (a.type == CKEDITOR.NODE_TEXT) { var d = CKEDITOR.tools.rtrim(a.getText()), b = a.getLength(); if (d) d.length < b && (a.split(d.length), this.$.lastChild.parentNode.removeChild(this.$.lastChild)); else { a.remove(); continue } } break } CKEDITOR.env.needsBrFiller && (a = this.$.lastChild) && 1 == a.type && "br" == a.nodeName.toLowerCase() && a.parentNode.removeChild(a) }, isReadOnly: function (a) {
            var d =
                this; this.type != CKEDITOR.NODE_ELEMENT && (d = this.getParent()); CKEDITOR.env.edge && d && d.is("textarea", "input") && (a = !0); if (!a && d && "undefined" != typeof d.$.isContentEditable) return !(d.$.isContentEditable || d.data("cke-editable")); for (; d;) { if (d.data("cke-editable")) return !1; if (d.hasAttribute("contenteditable")) return "false" == d.getAttribute("contenteditable"); d = d.getParent() } return !0
        }
    }); CKEDITOR.dom.window = function (a) { CKEDITOR.dom.domObject.call(this, a) }; CKEDITOR.dom.window.prototype = new CKEDITOR.dom.domObject;
    CKEDITOR.tools.extend(CKEDITOR.dom.window.prototype, {
        focus: function () { this.$.focus() }, getViewPaneSize: function () { var a = this.$.document, d = "CSS1Compat" == a.compatMode; return { width: (d ? a.documentElement.clientWidth : a.body.clientWidth) || 0, height: (d ? a.documentElement.clientHeight : a.body.clientHeight) || 0 } }, getScrollPosition: function () {
            var a = this.$; if ("pageXOffset" in a) return { x: a.pageXOffset || 0, y: a.pageYOffset || 0 }; a = a.document; return {
                x: a.documentElement.scrollLeft || a.body.scrollLeft || 0, y: a.documentElement.scrollTop ||
                    a.body.scrollTop || 0
            }
        }, getFrame: function () { var a = this.$.frameElement; return a ? new CKEDITOR.dom.element.get(a) : null }
    }); CKEDITOR.dom.document = function (a) { CKEDITOR.dom.domObject.call(this, a) }; CKEDITOR.dom.document.prototype = new CKEDITOR.dom.domObject;
    CKEDITOR.tools.extend(CKEDITOR.dom.document.prototype, {
        type: CKEDITOR.NODE_DOCUMENT, appendStyleSheet: function (a) { a = CKEDITOR.appendTimestamp(a); if (this.$.createStyleSheet) this.$.createStyleSheet(a); else { var d = new CKEDITOR.dom.element("link"); d.setAttributes({ rel: "stylesheet", type: "text/css", href: a }); this.getHead().append(d) } }, appendStyleText: function (a) {
            if (this.$.createStyleSheet) { var d = this.$.createStyleSheet(""); d.cssText = a } else {
                var b = new CKEDITOR.dom.element("style", this); b.append(new CKEDITOR.dom.text(a,
                    this)); this.getHead().append(b)
            } return d || b.$.sheet
        }, createElement: function (a, d) { var b = new CKEDITOR.dom.element(a, this); d && (d.attributes && b.setAttributes(d.attributes), d.styles && b.setStyles(d.styles)); return b }, createText: function (a) { return new CKEDITOR.dom.text(a, this) }, focus: function () { this.getWindow().focus() }, getActive: function () { var a; try { a = this.$.activeElement } catch (d) { return null } return new CKEDITOR.dom.element(a) }, getById: function (a) {
            return (a = this.$.getElementById(a)) ? new CKEDITOR.dom.element(a) :
                null
        }, getByAddress: function (a, d) { for (var b = this.$.documentElement, c = 0; b && c < a.length; c++) { var g = a[c]; if (d) for (var e = -1, h = 0; h < b.childNodes.length; h++) { var k = b.childNodes[h]; if (!0 !== d || 3 != k.nodeType || !k.previousSibling || 3 != k.previousSibling.nodeType) if (e++, e == g) { b = k; break } } else b = b.childNodes[g] } return b ? new CKEDITOR.dom.node(b) : null }, getElementsByTag: function (a, d) { CKEDITOR.env.ie && 8 >= document.documentMode || !d || (a = d + ":" + a); return new CKEDITOR.dom.nodeList(this.$.getElementsByTagName(a)) }, getHead: function () {
            var a =
                this.$.getElementsByTagName("head")[0]; return a = a ? new CKEDITOR.dom.element(a) : this.getDocumentElement().append(new CKEDITOR.dom.element("head"), !0)
        }, getBody: function () { return new CKEDITOR.dom.element(this.$.body) }, getDocumentElement: function () { return new CKEDITOR.dom.element(this.$.documentElement) }, getWindow: function () { return new CKEDITOR.dom.window(this.$.parentWindow || this.$.defaultView) }, write: function (a) {
            this.$.open("text/html", "replace"); CKEDITOR.env.ie && (a = a.replace(/(?:^\s*<!DOCTYPE[^>]*?>)|^/i,
                '$\x26\n\x3cscript data-cke-temp\x3d"1"\x3e(' + CKEDITOR.tools.fixDomain + ")();\x3c/script\x3e")); this.$.write(a); this.$.close()
        }, find: function (a) { return new CKEDITOR.dom.nodeList(this.$.querySelectorAll(a)) }, findOne: function (a) { return (a = this.$.querySelector(a)) ? new CKEDITOR.dom.element(a) : null }, _getHtml5ShivFrag: function () { var a = this.getCustomData("html5ShivFrag"); a || (a = this.$.createDocumentFragment(), CKEDITOR.tools.enableHtml5Elements(a, !0), this.setCustomData("html5ShivFrag", a)); return a }
    });
    CKEDITOR.dom.nodeList = function (a) { this.$ = a }; CKEDITOR.dom.nodeList.prototype = { count: function () { return this.$.length }, getItem: function (a) { return 0 > a || a >= this.$.length ? null : (a = this.$[a]) ? new CKEDITOR.dom.node(a) : null }, toArray: function () { return CKEDITOR.tools.array.map(this.$, function (a) { return new CKEDITOR.dom.node(a) }) } }; CKEDITOR.dom.element = function (a, d) { "string" == typeof a && (a = (d ? d.$ : document).createElement(a)); CKEDITOR.dom.domObject.call(this, a) };
    CKEDITOR.dom.element.get = function (a) { return (a = "string" == typeof a ? document.getElementById(a) || document.getElementsByName(a)[0] : a) && (a.$ ? a : new CKEDITOR.dom.element(a)) }; CKEDITOR.dom.element.prototype = new CKEDITOR.dom.node; CKEDITOR.dom.element.createFromHtml = function (a, d) { var b = new CKEDITOR.dom.element("div", d); b.setHtml(a); return b.getFirst().remove() };
    CKEDITOR.dom.element.setMarker = function (a, d, b, c) { var g = d.getCustomData("list_marker_id") || d.setCustomData("list_marker_id", CKEDITOR.tools.getNextNumber()).getCustomData("list_marker_id"), e = d.getCustomData("list_marker_names") || d.setCustomData("list_marker_names", {}).getCustomData("list_marker_names"); a[g] = d; e[b] = 1; return d.setCustomData(b, c) }; CKEDITOR.dom.element.clearAllMarkers = function (a) { for (var d in a) CKEDITOR.dom.element.clearMarkers(a, a[d], 1) };
    CKEDITOR.dom.element.clearMarkers = function (a, d, b) { var c = d.getCustomData("list_marker_names"), g = d.getCustomData("list_marker_id"), e; for (e in c) d.removeCustomData(e); d.removeCustomData("list_marker_names"); b && (d.removeCustomData("list_marker_id"), delete a[g]) };
    (function () {
        function a(a, b) { return -1 < (" " + a + " ").replace(e, " ").indexOf(" " + b + " ") } function d(a) { var b = !0; a.$.id || (a.$.id = "cke_tmp_" + CKEDITOR.tools.getNextNumber(), b = !1); return function () { b || a.removeAttribute("id") } } function b(a, b) { var c = CKEDITOR.tools.escapeCss(a.$.id); return "#" + c + " " + b.split(/,\s*/).join(", #" + c + " ") } function c(a) { for (var b = 0, c = 0, f = h[a].length; c < f; c++)b += parseFloat(this.getComputedStyle(h[a][c]) || 0, 10) || 0; return b } var g = document.createElement("_").classList, g = "undefined" !== typeof g &&
            null !== String(g.add).match(/\[Native code\]/gi), e = /[\n\t\r]/g; CKEDITOR.tools.extend(CKEDITOR.dom.element.prototype, {
                type: CKEDITOR.NODE_ELEMENT, addClass: g ? function (a) { this.$.classList.add(a); return this } : function (b) { var c = this.$.className; c && (a(c, b) || (c += " " + b)); this.$.className = c || b; return this }, removeClass: g ? function (a) { var b = this.$; b.classList.remove(a); b.className || b.removeAttribute("class"); return this } : function (b) {
                    var c = this.getAttribute("class"); c && a(c, b) && ((c = c.replace(new RegExp("(?:^|\\s+)" +
                        b + "(?\x3d\\s|$)"), "").replace(/^\s+/, "")) ? this.setAttribute("class", c) : this.removeAttribute("class")); return this
                }, hasClass: function (b) { return a(this.$.className, b) }, append: function (a, b) { "string" == typeof a && (a = this.getDocument().createElement(a)); b ? this.$.insertBefore(a.$, this.$.firstChild) : this.$.appendChild(a.$); return a }, appendHtml: function (a) { if (this.$.childNodes.length) { var b = new CKEDITOR.dom.element("div", this.getDocument()); b.setHtml(a); b.moveChildren(this) } else this.setHtml(a) }, appendText: function (a) {
                    null !=
                    this.$.text && CKEDITOR.env.ie && 9 > CKEDITOR.env.version ? this.$.text += a : this.append(new CKEDITOR.dom.text(a))
                }, appendBogus: function (a) { if (a || CKEDITOR.env.needsBrFiller) { for (a = this.getLast(); a && a.type == CKEDITOR.NODE_TEXT && !CKEDITOR.tools.rtrim(a.getText());)a = a.getPrevious(); a && a.is && a.is("br") || (a = this.getDocument().createElement("br"), CKEDITOR.env.gecko && a.setAttribute("type", "_moz"), this.append(a)) } }, breakParent: function (a, b) {
                    var c = new CKEDITOR.dom.range(this.getDocument()); c.setStartAfter(this); c.setEndAfter(a);
                    var f = c.extractContents(!1, b || !1), e; c.insertNode(this.remove()); if (CKEDITOR.env.ie && !CKEDITOR.env.edge) { for (c = new CKEDITOR.dom.element("div"); e = f.getFirst();)e.$.style.backgroundColor && (e.$.style.backgroundColor = e.$.style.backgroundColor), c.append(e); c.insertAfter(this); c.remove(!0) } else f.insertAfterNode(this)
                }, contains: document.compareDocumentPosition ? function (a) { return !!(this.$.compareDocumentPosition(a.$) & 16) } : function (a) {
                    var b = this.$; return a.type != CKEDITOR.NODE_ELEMENT ? b.contains(a.getParent().$) :
                        b != a.$ && b.contains(a.$)
                }, focus: function () { function a() { try { this.$.focus() } catch (b) { } } return function (b) { b ? CKEDITOR.tools.setTimeout(a, 100, this) : a.call(this) } }(), getHtml: function () { var a = this.$.innerHTML; return CKEDITOR.env.ie ? a.replace(/<\?[^>]*>/g, "") : a }, getOuterHtml: function () { if (this.$.outerHTML) return this.$.outerHTML.replace(/<\?[^>]*>/, ""); var a = this.$.ownerDocument.createElement("div"); a.appendChild(this.$.cloneNode(!0)); return a.innerHTML }, getClientRect: function (a) {
                    var b = CKEDITOR.tools.extend({},
                        this.$.getBoundingClientRect()); !b.width && (b.width = b.right - b.left); !b.height && (b.height = b.bottom - b.top); return a ? CKEDITOR.tools.getAbsoluteRectPosition(this.getWindow(), b) : b
                }, setHtml: CKEDITOR.env.ie && 9 > CKEDITOR.env.version ? function (a) {
                    try { var b = this.$; if (this.getParent()) return b.innerHTML = a; var c = this.getDocument()._getHtml5ShivFrag(); c.appendChild(b); b.innerHTML = a; c.removeChild(b); return a } catch (f) {
                        this.$.innerHTML = ""; b = new CKEDITOR.dom.element("body", this.getDocument()); b.$.innerHTML = a; for (b = b.getChildren(); b.count();)this.append(b.getItem(0));
                        return a
                    }
                } : function (a) { return this.$.innerHTML = a }, setText: function () { var a = document.createElement("p"); a.innerHTML = "x"; a = a.textContent; return function (b) { this.$[a ? "textContent" : "innerText"] = b } }(), getAttribute: function () {
                    var a = function (a) { return this.$.getAttribute(a, 2) }; return CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function (a) {
                        switch (a) {
                            case "class": a = "className"; break; case "http-equiv": a = "httpEquiv"; break; case "name": return this.$.name; case "tabindex": return a = this.$.getAttribute(a,
                                2), 0 !== a && 0 === this.$.tabIndex && (a = null), a; case "checked": return a = this.$.attributes.getNamedItem(a), (a.specified ? a.nodeValue : this.$.checked) ? "checked" : null; case "hspace": case "value": return this.$[a]; case "style": return this.$.style.cssText; case "contenteditable": case "contentEditable": return this.$.attributes.getNamedItem("contentEditable").specified ? this.$.getAttribute("contentEditable") : null
                        }return this.$.getAttribute(a, 2)
                    } : a
                }(), getAttributes: function (a) {
                    var b = {}, c = this.$.attributes, f; a = CKEDITOR.tools.isArray(a) ?
                        a : []; for (f = 0; f < c.length; f++)-1 === CKEDITOR.tools.indexOf(a, c[f].name) && (b[c[f].name] = c[f].value); return b
                }, getChildren: function () { return new CKEDITOR.dom.nodeList(this.$.childNodes) }, getClientSize: function () { return { width: this.$.clientWidth, height: this.$.clientHeight } }, getComputedStyle: document.defaultView && document.defaultView.getComputedStyle ? function (a) { var b = this.getWindow().$.getComputedStyle(this.$, null); return b ? b.getPropertyValue(a) : "" } : function (a) { return this.$.currentStyle[CKEDITOR.tools.cssStyleToDomStyle(a)] },
                getDtd: function () { var a = CKEDITOR.dtd[this.getName()]; this.getDtd = function () { return a }; return a }, getElementsByTag: CKEDITOR.dom.document.prototype.getElementsByTag, getTabIndex: function () { var a = this.$.tabIndex; return 0 !== a || CKEDITOR.dtd.$tabIndex[this.getName()] || 0 === parseInt(this.getAttribute("tabindex"), 10) ? a : -1 }, getText: function () { return this.$.textContent || this.$.innerText || "" }, getWindow: function () { return this.getDocument().getWindow() }, getId: function () { return this.$.id || null }, getNameAtt: function () {
                    return this.$.name ||
                        null
                }, getName: function () { var a = this.$.nodeName.toLowerCase(); if (CKEDITOR.env.ie && 8 >= document.documentMode) { var b = this.$.scopeName; "HTML" != b && (a = b.toLowerCase() + ":" + a) } this.getName = function () { return a }; return this.getName() }, getValue: function () { return this.$.value }, getFirst: function (a) { var b = this.$.firstChild; (b = b && new CKEDITOR.dom.node(b)) && a && !a(b) && (b = b.getNext(a)); return b }, getLast: function (a) { var b = this.$.lastChild; (b = b && new CKEDITOR.dom.node(b)) && a && !a(b) && (b = b.getPrevious(a)); return b }, getStyle: function (a) { return this.$.style[CKEDITOR.tools.cssStyleToDomStyle(a)] },
                is: function () { var a = this.getName(); if ("object" == typeof arguments[0]) return !!arguments[0][a]; for (var b = 0; b < arguments.length; b++)if (arguments[b] == a) return !0; return !1 }, isEditable: function (a) {
                    var b = this.getName(); return this.isReadOnly() || "none" == this.getComputedStyle("display") || "hidden" == this.getComputedStyle("visibility") || CKEDITOR.dtd.$nonEditable[b] || CKEDITOR.dtd.$empty[b] || this.is("a") && (this.data("cke-saved-name") || this.hasAttribute("name")) && !this.getChildCount() ? !1 : !1 !== a ? (a = CKEDITOR.dtd[b] ||
                        CKEDITOR.dtd.span, !(!a || !a["#"])) : !0
                }, isIdentical: function (a) {
                    var b = this.clone(0, 1); a = a.clone(0, 1); b.removeAttributes(["_moz_dirty", "data-cke-expando", "data-cke-saved-href", "data-cke-saved-name"]); a.removeAttributes(["_moz_dirty", "data-cke-expando", "data-cke-saved-href", "data-cke-saved-name"]); if (b.$.isEqualNode) return b.$.style.cssText = CKEDITOR.tools.normalizeCssText(b.$.style.cssText), a.$.style.cssText = CKEDITOR.tools.normalizeCssText(a.$.style.cssText), b.$.isEqualNode(a.$); b = b.getOuterHtml(); a =
                        a.getOuterHtml(); if (CKEDITOR.env.ie && 9 > CKEDITOR.env.version && this.is("a")) { var c = this.getParent(); c.type == CKEDITOR.NODE_ELEMENT && (c = c.clone(), c.setHtml(b), b = c.getHtml(), c.setHtml(a), a = c.getHtml()) } return b == a
                }, isVisible: function () { var a = (this.$.offsetHeight || this.$.offsetWidth) && "hidden" != this.getComputedStyle("visibility"), b, c; a && CKEDITOR.env.webkit && (b = this.getWindow(), !b.equals(CKEDITOR.document.getWindow()) && (c = b.$.frameElement) && (a = (new CKEDITOR.dom.element(c)).isVisible())); return !!a }, isEmptyInlineRemoveable: function () {
                    if (!CKEDITOR.dtd.$removeEmpty[this.getName()]) return !1;
                    for (var a = this.getChildren(), b = 0, c = a.count(); b < c; b++) { var f = a.getItem(b); if (f.type != CKEDITOR.NODE_ELEMENT || !f.data("cke-bookmark")) if (f.type == CKEDITOR.NODE_ELEMENT && !f.isEmptyInlineRemoveable() || f.type == CKEDITOR.NODE_TEXT && CKEDITOR.tools.trim(f.getText())) return !1 } return !0
                }, hasAttributes: CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function () {
                    for (var a = this.$.attributes, b = 0; b < a.length; b++) {
                        var c = a[b]; switch (c.nodeName) {
                            case "class": if (this.getAttribute("class")) return !0; case "data-cke-expando": continue;
                            default: if (c.specified) return !0
                        }
                    } return !1
                } : function () { var a = this.$.attributes, b = a.length, c = { "data-cke-expando": 1, _moz_dirty: 1 }; return 0 < b && (2 < b || !c[a[0].nodeName] || 2 == b && !c[a[1].nodeName]) }, hasAttribute: function () {
                    function a(b) {
                        var c = this.$.attributes.getNamedItem(b); if ("input" == this.getName()) switch (b) { case "class": return 0 < this.$.className.length; case "checked": return !!this.$.checked; case "value": return b = this.getAttribute("type"), "checkbox" == b || "radio" == b ? "on" != this.$.value : !!this.$.value }return c ?
                            c.specified : !1
                    } return CKEDITOR.env.ie ? 8 > CKEDITOR.env.version ? function (b) { return "name" == b ? !!this.$.name : a.call(this, b) } : a : function (a) { return !!this.$.attributes.getNamedItem(a) }
                }(), hide: function () { this.setStyle("display", "none") }, moveChildren: function (a, b) { var c = this.$; a = a.$; if (c != a) { var f; if (b) for (; f = c.lastChild;)a.insertBefore(c.removeChild(f), a.firstChild); else for (; f = c.firstChild;)a.appendChild(c.removeChild(f)) } }, mergeSiblings: function () {
                    function a(b, c, f) {
                        if (c && c.type == CKEDITOR.NODE_ELEMENT) {
                            for (var e =
                                []; c.data("cke-bookmark") || c.isEmptyInlineRemoveable();)if (e.push(c), c = f ? c.getNext() : c.getPrevious(), !c || c.type != CKEDITOR.NODE_ELEMENT) return; if (b.isIdentical(c)) { for (var k = f ? b.getLast() : b.getFirst(); e.length;)e.shift().move(b, !f); c.moveChildren(b, !f); c.remove(); k && k.type == CKEDITOR.NODE_ELEMENT && k.mergeSiblings() }
                        }
                    } return function (b) { if (!1 === b || CKEDITOR.dtd.$removeEmpty[this.getName()] || this.is("a")) a(this, this.getNext(), !0), a(this, this.getPrevious()) }
                }(), show: function () {
                    this.setStyles({
                        display: "",
                        visibility: ""
                    })
                }, setAttribute: function () {
                    var a = function (a, b) { this.$.setAttribute(a, b); return this }; return CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function (b, c) { "class" == b ? this.$.className = c : "style" == b ? this.$.style.cssText = c : "tabindex" == b ? this.$.tabIndex = c : "checked" == b ? this.$.checked = c : "contenteditable" == b ? a.call(this, "contentEditable", c) : a.apply(this, arguments); return this } : CKEDITOR.env.ie8Compat && CKEDITOR.env.secure ? function (b, c) {
                        if ("src" == b && c.match(/^http:\/\//)) try {
                            a.apply(this,
                                arguments)
                        } catch (f) { } else a.apply(this, arguments); return this
                    } : a
                }(), setAttributes: function (a) { for (var b in a) this.setAttribute(b, a[b]); return this }, setValue: function (a) { this.$.value = a; return this }, removeAttribute: function () { var a = function (a) { this.$.removeAttribute(a) }; return CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function (a) { "class" == a ? a = "className" : "tabindex" == a ? a = "tabIndex" : "contenteditable" == a && (a = "contentEditable"); this.$.removeAttribute(a) } : a }(), removeAttributes: function (a) {
                    if (CKEDITOR.tools.isArray(a)) for (var b =
                        0; b < a.length; b++)this.removeAttribute(a[b]); else for (b in a = a || this.getAttributes(), a) a.hasOwnProperty(b) && this.removeAttribute(b)
                }, removeStyle: function (a) {
                    var b = this.$.style; if (b.removeProperty || "border" != a && "margin" != a && "padding" != a) b.removeProperty ? b.removeProperty(a) : b.removeAttribute(CKEDITOR.tools.cssStyleToDomStyle(a)), this.$.style.cssText || this.removeAttribute("style"); else {
                        var c = ["top", "left", "right", "bottom"], f; "border" == a && (f = ["color", "style", "width"]); for (var b = [], e = 0; e < c.length; e++)if (f) for (var d =
                            0; d < f.length; d++)b.push([a, c[e], f[d]].join("-")); else b.push([a, c[e]].join("-")); for (a = 0; a < b.length; a++)this.removeStyle(b[a])
                    }
                }, setStyle: function (a, b) { this.$.style[CKEDITOR.tools.cssStyleToDomStyle(a)] = b; return this }, setStyles: function (a) { for (var b in a) this.setStyle(b, a[b]); return this }, setOpacity: function (a) { CKEDITOR.env.ie && 9 > CKEDITOR.env.version ? (a = Math.round(100 * a), this.setStyle("filter", 100 <= a ? "" : "progid:DXImageTransform.Microsoft.Alpha(opacity\x3d" + a + ")")) : this.setStyle("opacity", a) }, unselectable: function () {
                    this.setStyles(CKEDITOR.tools.cssVendorPrefix("user-select",
                        "none")); if (CKEDITOR.env.ie) { this.setAttribute("unselectable", "on"); for (var a, b = this.getElementsByTag("*"), c = 0, f = b.count(); c < f; c++)a = b.getItem(c), a.setAttribute("unselectable", "on") }
                }, getPositionedAncestor: function () { for (var a = this; "html" != a.getName();) { if ("static" != a.getComputedStyle("position")) return a; a = a.getParent() } return null }, getDocumentPosition: function (a) {
                    var b = 0, c = 0, f = this.getDocument(), e = f.getBody(), d = "BackCompat" == f.$.compatMode; if (document.documentElement.getBoundingClientRect && (CKEDITOR.env.ie ?
                        8 !== CKEDITOR.env.version : 1)) { var g = this.$.getBoundingClientRect(), h = f.$.documentElement, r = h.clientTop || e.$.clientTop || 0, m = h.clientLeft || e.$.clientLeft || 0, L = !0; CKEDITOR.env.ie && (L = f.getDocumentElement().contains(this), f = f.getBody().contains(this), L = d && f || !d && L); L && (CKEDITOR.env.webkit || CKEDITOR.env.ie && 12 <= CKEDITOR.env.version ? (b = e.$.scrollLeft || h.scrollLeft, c = e.$.scrollTop || h.scrollTop) : (c = d ? e.$ : h, b = c.scrollLeft, c = c.scrollTop), b = g.left + b - m, c = g.top + c - r) } else for (r = this, m = null; r && "body" != r.getName() &&
                            "html" != r.getName();) { b += r.$.offsetLeft - r.$.scrollLeft; c += r.$.offsetTop - r.$.scrollTop; r.equals(this) || (b += r.$.clientLeft || 0, c += r.$.clientTop || 0); for (; m && !m.equals(r);)b -= m.$.scrollLeft, c -= m.$.scrollTop, m = m.getParent(); m = r; r = (g = r.$.offsetParent) ? new CKEDITOR.dom.element(g) : null } a && (g = this.getWindow(), r = a.getWindow(), !g.equals(r) && g.$.frameElement && (a = (new CKEDITOR.dom.element(g.$.frameElement)).getDocumentPosition(a), b += a.x, c += a.y)); document.documentElement.getBoundingClientRect || !CKEDITOR.env.gecko ||
                                d || (b += this.$.clientLeft ? 1 : 0, c += this.$.clientTop ? 1 : 0); return { x: b, y: c }
                }, scrollIntoView: function (a) { var b = this.getParent(); if (b) { do if ((b.$.clientWidth && b.$.clientWidth < b.$.scrollWidth || b.$.clientHeight && b.$.clientHeight < b.$.scrollHeight) && !b.is("body") && this.scrollIntoParent(b, a, 1), b.is("html")) { var c = b.getWindow(); try { var f = c.$.frameElement; f && (b = new CKEDITOR.dom.element(f)) } catch (e) { } } while (b = b.getParent()) } }, scrollIntoParent: function (a, b, c) {
                    var f, e, d, g; function h(b, c) {
                        /body|html/.test(a.getName()) ?
                        a.getWindow().$.scrollBy(b, c) : (a.$.scrollLeft += b, a.$.scrollTop += c)
                    } function r(a, b) { var c = { x: 0, y: 0 }; if (!a.is(L ? "body" : "html")) { var f = a.$.getBoundingClientRect(); c.x = f.left; c.y = f.top } f = a.getWindow(); f.equals(b) || (f = r(CKEDITOR.dom.element.get(f.$.frameElement), b), c.x += f.x, c.y += f.y); return c } function m(a, b) { return parseInt(a.getComputedStyle("margin-" + b) || 0, 10) || 0 } !a && (a = this.getWindow()); d = a.getDocument(); var L = "BackCompat" == d.$.compatMode; a instanceof CKEDITOR.dom.window && (a = L ? d.getBody() : d.getDocumentElement());
                    CKEDITOR.env.webkit && (d = this.getEditor(!1)) && (d._.previousScrollTop = null); d = a.getWindow(); e = r(this, d); var v = r(a, d), J = this.$.offsetHeight; f = this.$.offsetWidth; var G = a.$.clientHeight, p = a.$.clientWidth; d = e.x - m(this, "left") - v.x || 0; g = e.y - m(this, "top") - v.y || 0; f = e.x + f + m(this, "right") - (v.x + p) || 0; e = e.y + J + m(this, "bottom") - (v.y + G) || 0; (0 > g || 0 < e) && h(0, !0 === b ? g : !1 === b ? e : 0 > g ? g : e); c && (0 > d || 0 < f) && h(0 > d ? d : f, 0)
                }, setState: function (a, b, c) {
                    b = b || "cke"; switch (a) {
                        case CKEDITOR.TRISTATE_ON: this.addClass(b + "_on"); this.removeClass(b +
                            "_off"); this.removeClass(b + "_disabled"); c && this.setAttribute("aria-pressed", !0); c && this.removeAttribute("aria-disabled"); break; case CKEDITOR.TRISTATE_DISABLED: this.addClass(b + "_disabled"); this.removeClass(b + "_off"); this.removeClass(b + "_on"); c && this.setAttribute("aria-disabled", !0); c && this.removeAttribute("aria-pressed"); break; default: this.addClass(b + "_off"), this.removeClass(b + "_on"), this.removeClass(b + "_disabled"), c && this.removeAttribute("aria-pressed"), c && this.removeAttribute("aria-disabled")
                    }
                },
                getFrameDocument: function () { var a = this.$; try { a.contentWindow.document } catch (b) { a.src = a.src } return a && new CKEDITOR.dom.document(a.contentWindow.document) }, copyAttributes: function (a, b) {
                    var c = this.$.attributes; b = b || {}; for (var f = 0; f < c.length; f++) { var e = c[f], d = e.nodeName.toLowerCase(), g; if (!(d in b)) if ("checked" == d && (g = this.getAttribute(d))) a.setAttribute(d, g); else if (!CKEDITOR.env.ie || this.hasAttribute(d)) g = this.getAttribute(d), null === g && (g = e.nodeValue), a.setAttribute(d, g) } "" !== this.$.style.cssText &&
                        (a.$.style.cssText = this.$.style.cssText)
                }, renameNode: function (a) { if (this.getName() != a) { var b = this.getDocument(); a = new CKEDITOR.dom.element(a, b); this.copyAttributes(a); this.moveChildren(a); this.getParent(!0) && this.$.parentNode.replaceChild(a.$, this.$); a.$["data-cke-expando"] = this.$["data-cke-expando"]; this.$ = a.$; delete this.getName } }, getChild: function () {
                    function a(b, c) { var f = b.childNodes; if (0 <= c && c < f.length) return f[c] } return function (b) {
                        var c = this.$; if (b.slice) for (b = b.slice(); 0 < b.length && c;)c = a(c,
                            b.shift()); else c = a(c, b); return c ? new CKEDITOR.dom.node(c) : null
                    }
                }(), getChildCount: function () { return this.$.childNodes.length }, disableContextMenu: function () { function a(b) { return b.type == CKEDITOR.NODE_ELEMENT && b.hasClass("cke_enable_context_menu") } this.on("contextmenu", function (b) { b.data.getTarget().getAscendant(a, !0) || b.data.preventDefault() }) }, getDirection: function (a) {
                    return a ? this.getComputedStyle("direction") || this.getDirection() || this.getParent() && this.getParent().getDirection(1) || this.getDocument().$.dir ||
                        "ltr" : this.getStyle("direction") || this.getAttribute("dir")
                }, data: function (a, b) { a = "data-" + a; if (void 0 === b) return this.getAttribute(a); !1 === b ? this.removeAttribute(a) : this.setAttribute(a, b); return null }, getEditor: function (a) { var b = CKEDITOR.instances, c, f, e; a = a || void 0 === a; for (c in b) if (f = b[c], f.element.equals(this) && f.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO || !a && (e = f.editable()) && (e.equals(this) || e.contains(this))) return f; return null }, find: function (a) {
                    var c = d(this); a = new CKEDITOR.dom.nodeList(this.$.querySelectorAll(b(this,
                        a))); c(); return a
                }, findOne: function (a) { var c = d(this); a = this.$.querySelector(b(this, a)); c(); return a ? new CKEDITOR.dom.element(a) : null }, forEach: function (a, b, c) { if (!(c || b && this.type != b)) var f = a(this); if (!1 !== f) { c = this.getChildren(); for (var e = 0; e < c.count(); e++)f = c.getItem(e), f.type == CKEDITOR.NODE_ELEMENT ? f.forEach(a, b) : b && f.type != b || a(f) } }, fireEventHandler: function (a, b) {
                    var c = "on" + a, f = this.$; if (CKEDITOR.env.ie && 9 > CKEDITOR.env.version) {
                        var e = f.ownerDocument.createEventObject(), d; for (d in b) e[d] = b[d]; f.fireEvent(c,
                            e)
                    } else f[f[a] ? a : c](b)
                }, isDetached: function () { var a = this.getDocument(), b = a.getDocumentElement(); return b.equals(this) || b.contains(this) ? !CKEDITOR.env.ie || 8 < CKEDITOR.env.version && !CKEDITOR.env.quirks ? !a.$.defaultView : !1 : !0 }
            }); var h = { width: ["border-left-width", "border-right-width", "padding-left", "padding-right"], height: ["border-top-width", "border-bottom-width", "padding-top", "padding-bottom"] }; CKEDITOR.dom.element.prototype.setSize = function (a, b, e) {
                "number" == typeof b && (!e || CKEDITOR.env.ie && CKEDITOR.env.quirks ||
                    (b -= c.call(this, a)), this.setStyle(a, b + "px"))
            }; CKEDITOR.dom.element.prototype.getSize = function (a, b) { var e = Math.max(this.$["offset" + CKEDITOR.tools.capitalize(a)], this.$["client" + CKEDITOR.tools.capitalize(a)]) || 0; b && (e -= c.call(this, a)); return e }
    })(); CKEDITOR.dom.documentFragment = function (a) { a = a || CKEDITOR.document; this.$ = a.type == CKEDITOR.NODE_DOCUMENT ? a.$.createDocumentFragment() : a };
    CKEDITOR.tools.extend(CKEDITOR.dom.documentFragment.prototype, CKEDITOR.dom.element.prototype, { type: CKEDITOR.NODE_DOCUMENT_FRAGMENT, insertAfterNode: function (a) { a = a.$; a.parentNode.insertBefore(this.$, a.nextSibling) }, getHtml: function () { var a = new CKEDITOR.dom.element("div"); this.clone(1, 1).appendTo(a); return a.getHtml().replace(/\s*data-cke-expando=".*?"/g, "") } }, !0, {
        append: 1, appendBogus: 1, clone: 1, getFirst: 1, getHtml: 1, getLast: 1, getParent: 1, getNext: 1, getPrevious: 1, appendTo: 1, moveChildren: 1, insertBefore: 1,
        insertAfterNode: 1, replace: 1, trim: 1, type: 1, ltrim: 1, rtrim: 1, getDocument: 1, getChildCount: 1, getChild: 1, getChildren: 1
    }); CKEDITOR.tools.extend(CKEDITOR.dom.documentFragment.prototype, CKEDITOR.dom.document.prototype, !0, { find: 1, findOne: 1 });
    (function () {
        function a(a, b) {
            var c = this.range; if (this._.end) return null; if (!this._.start) { this._.start = 1; if (c.collapsed) return this.end(), null; c.optimize() } var f, e = c.startContainer; f = c.endContainer; var d = c.startOffset, g = c.endOffset, w, k = this.guard, h = this.type, q = a ? "getPreviousSourceNode" : "getNextSourceNode"; if (!a && !this._.guardLTR) {
                var l = f.type == CKEDITOR.NODE_ELEMENT ? f : f.getParent(), E = f.type == CKEDITOR.NODE_ELEMENT ? f.getChild(g) : f.getNext(); this._.guardLTR = function (a, b) {
                    return (!b || !l.equals(a)) && (!E ||
                        !a.equals(E)) && (a.type != CKEDITOR.NODE_ELEMENT || !b || !a.equals(c.root))
                }
            } if (a && !this._.guardRTL) { var z = e.type == CKEDITOR.NODE_ELEMENT ? e : e.getParent(), t = e.type == CKEDITOR.NODE_ELEMENT ? d ? e.getChild(d - 1) : null : e.getPrevious(); this._.guardRTL = function (a, b) { return (!b || !z.equals(a)) && (!t || !a.equals(t)) && (a.type != CKEDITOR.NODE_ELEMENT || !b || !a.equals(c.root)) } } var D = a ? this._.guardRTL : this._.guardLTR; w = k ? function (a, b) { return !1 === D(a, b) ? !1 : k(a, b) } : D; this.current ? f = this.current[q](!1, h, w) : (a ? f.type == CKEDITOR.NODE_ELEMENT &&
                (f = 0 < g ? f.getChild(g - 1) : !1 === w(f, !0) ? null : f.getPreviousSourceNode(!0, h, w)) : (f = e, f.type == CKEDITOR.NODE_ELEMENT && ((f = f.getChild(d)) || (f = !1 === w(e, !0) ? null : e.getNextSourceNode(!0, h, w)))), f && !1 === w(f) && (f = null)); for (; f && !this._.end;) { this.current = f; if (!this.evaluator || !1 !== this.evaluator(f)) { if (!b) return f } else if (b && this.evaluator) return !1; f = f[q](!1, h, w) } this.end(); return this.current = null
        } function d(b) { for (var c, f = null; c = a.call(this, b);)f = c; return f } CKEDITOR.dom.walker = CKEDITOR.tools.createClass({
            $: function (a) {
                this.range =
                a; this._ = {}
            }, proto: { end: function () { this._.end = 1 }, next: function () { return a.call(this) }, previous: function () { return a.call(this, 1) }, checkForward: function () { return !1 !== a.call(this, 0, 1) }, checkBackward: function () { return !1 !== a.call(this, 1, 1) }, lastForward: function () { return d.call(this) }, lastBackward: function () { return d.call(this, 1) }, reset: function () { delete this.current; this._ = {} } }
        }); var b = {
            block: 1, "list-item": 1, table: 1, "table-row-group": 1, "table-header-group": 1, "table-footer-group": 1, "table-row": 1, "table-column-group": 1,
            "table-column": 1, "table-cell": 1, "table-caption": 1
        }, c = { absolute: 1, fixed: 1 }; CKEDITOR.dom.element.prototype.isBlockBoundary = function (a) { return "none" != this.getComputedStyle("float") || this.getComputedStyle("position") in c || !b[this.getComputedStyle("display")] ? !!(this.is(CKEDITOR.dtd.$block) || a && this.is(a)) : !0 }; CKEDITOR.dom.walker.blockBoundary = function (a) { return function (b) { return !(b.type == CKEDITOR.NODE_ELEMENT && b.isBlockBoundary(a)) } }; CKEDITOR.dom.walker.listItemBoundary = function () { return this.blockBoundary({ br: 1 }) };
        CKEDITOR.dom.walker.bookmark = function (a, b) { function c(a) { return a && a.getName && "span" == a.getName() && a.data("cke-bookmark") } return function (f) { var e, d; e = f && f.type != CKEDITOR.NODE_ELEMENT && (d = f.getParent()) && c(d); e = a ? e : e || c(f); return !!(b ^ e) } }; CKEDITOR.dom.walker.whitespaces = function (a) { return function (b) { var c; b && b.type == CKEDITOR.NODE_TEXT && (c = !CKEDITOR.tools.trim(b.getText()) || CKEDITOR.env.webkit && b.getText() == CKEDITOR.dom.selection.FILLING_CHAR_SEQUENCE); return !!(a ^ c) } }; CKEDITOR.dom.walker.invisible =
            function (a) { var b = CKEDITOR.dom.walker.whitespaces(), c = CKEDITOR.env.webkit ? 1 : 0; return function (f) { b(f) ? f = 1 : (f.type == CKEDITOR.NODE_TEXT && (f = f.getParent()), f = f.$.offsetWidth <= c); return !!(a ^ f) } }; CKEDITOR.dom.walker.nodeType = function (a, b) { return function (c) { return !!(b ^ c.type == a) } }; CKEDITOR.dom.walker.bogus = function (a) {
                function b(a) { return !e(a) && !h(a) } return function (c) {
                    var f = CKEDITOR.env.needsBrFiller ? c.is && c.is("br") : c.getText && g.test(c.getText()); f && (f = c.getParent(), c = c.getNext(b), f = f.isBlockBoundary() &&
                        (!c || c.type == CKEDITOR.NODE_ELEMENT && c.isBlockBoundary())); return !!(a ^ f)
                }
            }; CKEDITOR.dom.walker.temp = function (a) { return function (b) { b.type != CKEDITOR.NODE_ELEMENT && (b = b.getParent()); b = b && b.hasAttribute("data-cke-temp"); return !!(a ^ b) } }; var g = /^[\t\r\n ]*(?:&nbsp;|\xa0)$/, e = CKEDITOR.dom.walker.whitespaces(), h = CKEDITOR.dom.walker.bookmark(), k = CKEDITOR.dom.walker.temp(), l = function (a) { return h(a) || e(a) || a.type == CKEDITOR.NODE_ELEMENT && a.is(CKEDITOR.dtd.$inline) && !a.is(CKEDITOR.dtd.$empty) }; CKEDITOR.dom.walker.ignored =
                function (a) { return function (b) { b = e(b) || h(b) || k(b); return !!(a ^ b) } }; var q = CKEDITOR.dom.walker.ignored(); CKEDITOR.dom.walker.empty = function (a) { return function (b) { for (var c = 0, f = b.getChildCount(); c < f; ++c)if (!q(b.getChild(c))) return !!a; return !a } }; var f = CKEDITOR.dom.walker.empty(), w = CKEDITOR.dom.walker.validEmptyBlockContainers = CKEDITOR.tools.extend(function (a) { var b = {}, c; for (c in a) CKEDITOR.dtd[c]["#"] && (b[c] = 1); return b }(CKEDITOR.dtd.$block), { caption: 1, td: 1, th: 1 }); CKEDITOR.dom.walker.editable = function (a) {
                    return function (b) {
                        b =
                        q(b) ? !1 : b.type == CKEDITOR.NODE_TEXT || b.type == CKEDITOR.NODE_ELEMENT && (b.is(CKEDITOR.dtd.$inline) || b.is("hr") || "false" == b.getAttribute("contenteditable") || !CKEDITOR.env.needsBrFiller && b.is(w) && f(b)) ? !0 : !1; return !!(a ^ b)
                    }
                }; CKEDITOR.dom.element.prototype.getBogus = function () { var a = this; do a = a.getPreviousSourceNode(); while (l(a)); return a && (CKEDITOR.env.needsBrFiller ? a.is && a.is("br") : a.getText && g.test(a.getText())) ? a : !1 }
    })(); "use strict";
    CKEDITOR.dom.range = function (a) { this.endOffset = this.endContainer = this.startOffset = this.startContainer = null; this.collapsed = !0; var d = a instanceof CKEDITOR.dom.document; this.document = d ? a : a.getDocument(); this.root = d ? a.getBody() : a };
    (function () {
        function a(a) { a.collapsed = a.startContainer && a.endContainer && a.startContainer.equals(a.endContainer) && a.startOffset == a.endOffset } function d(a, b, c, e, d) {
            function g(a, b, c, f) { var Q = c ? a.getPrevious() : a.getNext(); if (f && h) return Q; l || f ? b.append(a.clone(!0, d), c) : (a.remove(), q && b.append(a, c)); return Q } function m() { var a, b, c, f = Math.min(N.length, x.length); for (a = 0; a < f; a++)if (b = N[a], c = x[a], !b.equals(c)) return a; return a - 1 } function k() {
                var b = H - 1, c = D && C && !p.equals(u); b < M - 1 || b < n - 1 || c ? (c ? a.moveToPosition(u,
                    CKEDITOR.POSITION_BEFORE_START) : n == b + 1 && t ? a.moveToPosition(x[b], CKEDITOR.POSITION_BEFORE_END) : a.moveToPosition(x[b + 1], CKEDITOR.POSITION_BEFORE_START), e && (b = N[b + 1]) && b.type == CKEDITOR.NODE_ELEMENT && (c = CKEDITOR.dom.element.createFromHtml('\x3cspan data-cke-bookmark\x3d"1" style\x3d"display:none"\x3e\x26nbsp;\x3c/span\x3e', a.document), c.insertAfter(b), b.mergeSiblings(!1), a.moveToBookmark({ startNode: c }))) : a.collapse(!0)
            } a.optimizeBookmark(); var h = 0 === b, q = 1 == b, l = 2 == b; b = l || q; var p = a.startContainer, u = a.endContainer,
                K = a.startOffset, E = a.endOffset, z, t, D, C, I, T; if (l && u.type == CKEDITOR.NODE_TEXT && (p.equals(u) || p.type === CKEDITOR.NODE_ELEMENT && p.getFirst().equals(u))) c.append(a.document.createText(u.substring(K, E))); else {
                    u.type == CKEDITOR.NODE_TEXT ? l ? T = !0 : u = u.split(E) : 0 < u.getChildCount() ? E >= u.getChildCount() ? (u = u.getChild(E - 1), t = !0) : u = u.getChild(E) : C = t = !0; p.type == CKEDITOR.NODE_TEXT ? l ? I = !0 : p.split(K) : 0 < p.getChildCount() ? 0 === K ? (p = p.getChild(K), z = !0) : p = p.getChild(K - 1) : D = z = !0; for (var N = p.getParents(), x = u.getParents(), H = m(),
                        M = N.length - 1, n = x.length - 1, A = c, Q, aa, X, ea = -1, V = H; V <= M; V++) { aa = N[V]; X = aa.getNext(); for (V != M || aa.equals(x[V]) && M < n ? b && (Q = A.append(aa.clone(0, d))) : z ? g(aa, A, !1, D) : I && A.append(a.document.createText(aa.substring(K))); X;) { if (X.equals(x[V])) { ea = V; break } X = g(X, A) } A = Q } A = c; for (V = H; V <= n; V++)if (c = x[V], X = c.getPrevious(), c.equals(N[V])) b && (A = A.getChild(0)); else { V != n || c.equals(N[V]) && n < M ? b && (Q = A.append(c.clone(0, d))) : t ? g(c, A, !1, C) : T && A.append(a.document.createText(c.substring(0, E))); if (V > ea) for (; X;)X = g(X, A, !0); A = Q } l ||
                            k()
                }
        } function b() { var a = !1, b = CKEDITOR.dom.walker.whitespaces(), c = CKEDITOR.dom.walker.bookmark(!0), d = CKEDITOR.dom.walker.bogus(); return function (g) { return c(g) || b(g) ? !0 : d(g) && !a ? a = !0 : g.type == CKEDITOR.NODE_TEXT && (g.hasAscendant("pre") || CKEDITOR.tools.trim(g.getText()).length) || g.type == CKEDITOR.NODE_ELEMENT && !g.is(e) ? !1 : !0 } } function c(a) { var b = CKEDITOR.dom.walker.whitespaces(), c = CKEDITOR.dom.walker.bookmark(1); return function (e) { return c(e) || b(e) ? !0 : !a && h(e) || e.type == CKEDITOR.NODE_ELEMENT && e.is(CKEDITOR.dtd.$removeEmpty) } }
        function g(a) { return function () { var b; return this[a ? "getPreviousNode" : "getNextNode"](function (a) { !b && q(a) && (b = a); return l(a) && !(h(a) && a.equals(b)) }) } } var e = { abbr: 1, acronym: 1, b: 1, bdo: 1, big: 1, cite: 1, code: 1, del: 1, dfn: 1, em: 1, font: 1, i: 1, ins: 1, label: 1, kbd: 1, q: 1, samp: 1, small: 1, span: 1, strike: 1, strong: 1, sub: 1, sup: 1, tt: 1, u: 1, "var": 1 }, h = CKEDITOR.dom.walker.bogus(), k = /^[\t\r\n ]*(?:&nbsp;|\xa0)$/, l = CKEDITOR.dom.walker.editable(), q = CKEDITOR.dom.walker.ignored(!0); CKEDITOR.dom.range.prototype = {
            clone: function () {
                var a =
                    new CKEDITOR.dom.range(this.root); a._setStartContainer(this.startContainer); a.startOffset = this.startOffset; a._setEndContainer(this.endContainer); a.endOffset = this.endOffset; a.collapsed = this.collapsed; return a
            }, collapse: function (a) { a ? (this._setEndContainer(this.startContainer), this.endOffset = this.startOffset) : (this._setStartContainer(this.endContainer), this.startOffset = this.endOffset); this.collapsed = !0 }, cloneContents: function (a) {
                var b = new CKEDITOR.dom.documentFragment(this.document); this.collapsed ||
                    d(this, 2, b, !1, "undefined" == typeof a ? !0 : a); return b
            }, deleteContents: function (a) { this.collapsed || d(this, 0, null, a) }, extractContents: function (a, b) { var c = new CKEDITOR.dom.documentFragment(this.document); this.collapsed || d(this, 1, c, a, "undefined" == typeof b ? !0 : b); return c }, equals: function (a) { return this.startOffset === a.startOffset && this.endOffset === a.endOffset && this.startContainer.equals(a.startContainer) && this.endContainer.equals(a.endContainer) }, createBookmark: function (a) {
                function b(a) {
                    return a.getAscendant(function (a) {
                        var b;
                        if (b = a.data && a.data("cke-temp")) b = -1 === CKEDITOR.tools.array.indexOf(["cke_copybin", "cke_pastebin"], a.getAttribute("id")); return b
                    }, !0)
                } var c = this.startContainer, e = this.endContainer, d = this.collapsed, g, m, k, h; g = this.document.createElement("span"); g.data("cke-bookmark", 1); g.setStyle("display", "none"); g.setHtml("\x26nbsp;"); a && (k = "cke_bm_" + CKEDITOR.tools.getNextNumber(), g.setAttribute("id", k + (d ? "C" : "S"))); d || (m = g.clone(), m.setHtml("\x26nbsp;"), a && m.setAttribute("id", k + "E"), h = this.clone(), b(e) && (e = b(e),
                    h.moveToPosition(e, CKEDITOR.POSITION_AFTER_END)), h.collapse(), h.insertNode(m)); h = this.clone(); b(c) && (e = b(c), h.moveToPosition(e, CKEDITOR.POSITION_BEFORE_START)); h.collapse(!0); h.insertNode(g); m ? (this.setStartAfter(g), this.setEndBefore(m)) : this.moveToPosition(g, CKEDITOR.POSITION_AFTER_END); return { startNode: a ? k + (d ? "C" : "S") : g, endNode: a ? k + "E" : m, serializable: a, collapsed: d }
            }, createBookmark2: function () {
                function a(b) {
                    var f = b.container, e = b.offset, d; d = f; var g = e; d = d.type != CKEDITOR.NODE_ELEMENT || 0 === g || g == d.getChildCount() ?
                        0 : d.getChild(g - 1).type == CKEDITOR.NODE_TEXT && d.getChild(g).type == CKEDITOR.NODE_TEXT; d && (f = f.getChild(e - 1), e = f.getLength()); if (f.type == CKEDITOR.NODE_ELEMENT && 0 < e) { a: { for (d = f; e--;)if (g = d.getChild(e).getIndex(!0), 0 <= g) { e = g; break a } e = -1 } e += 1 } if (f.type == CKEDITOR.NODE_TEXT) {
                            d = f; for (g = 0; (d = d.getPrevious()) && d.type == CKEDITOR.NODE_TEXT;)g += d.getText().replace(CKEDITOR.dom.selection.FILLING_CHAR_SEQUENCE, "").length; d = g; f.isEmpty() ? (g = f.getPrevious(c), d ? (e = d, f = g ? g.getNext() : f.getParent().getFirst()) : (f = f.getParent(),
                                e = g ? g.getIndex(!0) + 1 : 0)) : e += d
                        } b.container = f; b.offset = e
                } function b(a, c) { var f = c.getCustomData("cke-fillingChar"); if (f) { var e = a.container; f.equals(e) && (a.offset -= CKEDITOR.dom.selection.FILLING_CHAR_SEQUENCE.length, 0 >= a.offset && (a.offset = e.getIndex(), a.container = e.getParent())) } } var c = CKEDITOR.dom.walker.nodeType(CKEDITOR.NODE_TEXT, !0); return function (c) {
                    var e = this.collapsed, d = { container: this.startContainer, offset: this.startOffset }, m = { container: this.endContainer, offset: this.endOffset }; c && (a(d), b(d, this.root),
                        e || (a(m), b(m, this.root))); return { start: d.container.getAddress(c), end: e ? null : m.container.getAddress(c), startOffset: d.offset, endOffset: m.offset, normalized: c, collapsed: e, is2: !0 }
                }
            }(), moveToBookmark: function (a) {
                if (a.is2) { var b = this.document.getByAddress(a.start, a.normalized), c = a.startOffset, e = a.end && this.document.getByAddress(a.end, a.normalized); a = a.endOffset; this.setStart(b, c); e ? this.setEnd(e, a) : this.collapse(!0) } else b = (c = a.serializable) ? this.document.getById(a.startNode) : a.startNode, a = c ? this.document.getById(a.endNode) :
                    a.endNode, this.setStartBefore(b), b.remove(), a ? (this.setEndBefore(a), a.remove()) : this.collapse(!0)
            }, getBoundaryNodes: function () {
                var a = this.startContainer, b = this.endContainer, c = this.startOffset, e = this.endOffset, d; if (a.type == CKEDITOR.NODE_ELEMENT) if (d = a.getChildCount(), d > c) a = a.getChild(c); else if (1 > d) a = a.getPreviousSourceNode(); else { for (a = a.$; a.lastChild;)a = a.lastChild; a = new CKEDITOR.dom.node(a); a = a.getNextSourceNode() || a } if (b.type == CKEDITOR.NODE_ELEMENT) if (d = b.getChildCount(), d > e) b = b.getChild(e).getPreviousSourceNode(!0);
                else if (1 > d) b = b.getPreviousSourceNode(); else { for (b = b.$; b.lastChild;)b = b.lastChild; b = new CKEDITOR.dom.node(b) } a.getPosition(b) & CKEDITOR.POSITION_FOLLOWING && (a = b); return { startNode: a, endNode: b }
            }, getCommonAncestor: function (a, b) { var c = this.startContainer, e = this.endContainer, c = c.equals(e) ? a && c.type == CKEDITOR.NODE_ELEMENT && this.startOffset == this.endOffset - 1 ? c.getChild(this.startOffset) : c : c.getCommonAncestor(e); return b && !c.is ? c.getParent() : c }, optimize: function () {
                var a = this.startContainer, b = this.startOffset;
                a.type != CKEDITOR.NODE_ELEMENT && (b ? b >= a.getLength() && this.setStartAfter(a) : this.setStartBefore(a)); a = this.endContainer; b = this.endOffset; a.type != CKEDITOR.NODE_ELEMENT && (b ? b >= a.getLength() && this.setEndAfter(a) : this.setEndBefore(a))
            }, optimizeBookmark: function () { var a = this.startContainer, b = this.endContainer; a.is && a.is("span") && a.data("cke-bookmark") && this.setStartAt(a, CKEDITOR.POSITION_BEFORE_START); b && b.is && b.is("span") && b.data("cke-bookmark") && this.setEndAt(b, CKEDITOR.POSITION_AFTER_END) }, trim: function (a,
                b) {
                    var c = this.startContainer, e = this.startOffset, d = this.collapsed; if ((!a || d) && c && c.type == CKEDITOR.NODE_TEXT) { if (e) if (e >= c.getLength()) e = c.getIndex() + 1, c = c.getParent(); else { var g = c.split(e), e = c.getIndex() + 1, c = c.getParent(); this.startContainer.equals(this.endContainer) ? this.setEnd(g, this.endOffset - this.startOffset) : c.equals(this.endContainer) && (this.endOffset += 1) } else e = c.getIndex(), c = c.getParent(); this.setStart(c, e); if (d) { this.collapse(!0); return } } c = this.endContainer; e = this.endOffset; b || d || !c || c.type !=
                        CKEDITOR.NODE_TEXT || (e ? (e >= c.getLength() || c.split(e), e = c.getIndex() + 1) : e = c.getIndex(), c = c.getParent(), this.setEnd(c, e))
            }, enlarge: function (a, b) {
                function c(a) { return a && a.type == CKEDITOR.NODE_ELEMENT && a.hasAttribute("contenteditable") ? null : a } function e(a, b, c) {
                    var f = new CKEDITOR.dom.range(c); f.setStart(a, b); f.setEndAt(c, CKEDITOR.POSITION_BEFORE_END); c = new CKEDITOR.dom.walker(f); for (c.guard = function (a) { return !(a.type == CKEDITOR.NODE_ELEMENT && a.isBlockBoundary()) }; f = c.next();) {
                        if (f.type != CKEDITOR.NODE_TEXT) return !1;
                        g = f != a ? f.getText() : f.substring(b); if (d.test(g)) return !1
                    } return !0
                } var d = new RegExp(/[^\s\ufeff]/), g, m; switch (a) {
                    case CKEDITOR.ENLARGE_INLINE: var k = 1; case CKEDITOR.ENLARGE_ELEMENT: if (this.collapsed) break; var h = this.getCommonAncestor(); m = this.root; var q, l, p, u, K, E = !1, z; z = this.startContainer; var t = this.startOffset; z.type == CKEDITOR.NODE_TEXT ? (t && (z = !CKEDITOR.tools.trim(z.substring(0, t)).length && z, E = !!z), z && ((u = z.getPrevious()) || (p = z.getParent()))) : (t && (u = z.getChild(t - 1) || z.getLast()), u || (p = z)); for (p = c(p); p ||
                        u;) {
                            if (p && !u) { !K && p.equals(h) && (K = !0); if (k ? p.isBlockBoundary() : !m.contains(p)) break; E && "inline" == p.getComputedStyle("display") || (E = !1, K ? q = p : this.setStartBefore(p)); u = p.getPrevious() } for (; u;)if (z = !1, u.type == CKEDITOR.NODE_COMMENT) u = u.getPrevious(); else {
                                if (u.type == CKEDITOR.NODE_TEXT) g = u.getText(), d.test(g) && (u = null), z = /[\s\ufeff]$/.test(g); else if ((u.$.offsetWidth > (CKEDITOR.env.webkit ? 1 : 0) || b && u.is("br")) && !u.data("cke-bookmark")) if (E && CKEDITOR.dtd.$removeEmpty[u.getName()]) {
                                    g = u.getText(); if (d.test(g)) u =
                                        null; else for (var t = u.$.getElementsByTagName("*"), D = 0, C; C = t[D++];)if (!CKEDITOR.dtd.$removeEmpty[C.nodeName.toLowerCase()]) { u = null; break } u && (z = !!g.length)
                                } else u = null; z && (E ? K ? q = p : p && this.setStartBefore(p) : E = !0); if (u) { z = u.getPrevious(); if (!p && !z) { p = u; u = null; break } u = z } else p = null
                            } p && (p = c(p.getParent()))
                    } z = this.endContainer; t = this.endOffset; p = u = null; K = E = !1; z.type == CKEDITOR.NODE_TEXT ? CKEDITOR.tools.trim(z.substring(t)).length ? E = !0 : (E = !z.getLength(), t == z.getLength() ? (u = z.getNext()) || (p = z.getParent()) : e(z,
                        t, m) && (p = z.getParent())) : (u = z.getChild(t)) || (p = z); for (; p || u;) {
                            if (p && !u) { !K && p.equals(h) && (K = !0); if (k ? p.isBlockBoundary() : !m.contains(p)) break; E && "inline" == p.getComputedStyle("display") || (E = !1, K ? l = p : p && this.setEndAfter(p)); u = p.getNext() } for (; u;) {
                                z = !1; if (u.type == CKEDITOR.NODE_TEXT) g = u.getText(), e(u, 0, m) || (u = null), z = /^[\s\ufeff]/.test(g); else if (u.type == CKEDITOR.NODE_ELEMENT) {
                                    if ((0 < u.$.offsetWidth || b && u.is("br")) && !u.data("cke-bookmark")) if (E && CKEDITOR.dtd.$removeEmpty[u.getName()]) {
                                        g = u.getText(); if (d.test(g)) u =
                                            null; else for (t = u.$.getElementsByTagName("*"), D = 0; C = t[D++];)if (!CKEDITOR.dtd.$removeEmpty[C.nodeName.toLowerCase()]) { u = null; break } u && (z = !!g.length)
                                    } else u = null
                                } else z = 1; z && E && (K ? l = p : this.setEndAfter(p)); if (u) { z = u.getNext(); if (!p && !z) { p = u; u = null; break } u = z } else p = null
                            } p && (p = c(p.getParent()))
                        } q && l && (h = q.contains(l) ? l : q, this.setStartBefore(h), this.setEndAfter(h)); break; case CKEDITOR.ENLARGE_BLOCK_CONTENTS: case CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS: p = new CKEDITOR.dom.range(this.root); m = this.root; p.setStartAt(m,
                            CKEDITOR.POSITION_AFTER_START); p.setEnd(this.startContainer, this.startOffset); p = new CKEDITOR.dom.walker(p); var I, T, N = CKEDITOR.dom.walker.blockBoundary(a == CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS ? { br: 1 } : null), x = null, H = function (a) { if (a.type == CKEDITOR.NODE_ELEMENT && "false" == a.getAttribute("contenteditable")) if (x) { if (x.equals(a)) { x = null; return } } else x = a; else if (x) return; var b = N(a); b || (I = a); return b }, k = function (a) { var b = H(a); !b && a.is && a.is("br") && (T = a); return b }; p.guard = H; p = p.lastBackward(); I = I || m; this.setStartAt(I,
                                !I.is("br") && (!p && this.checkStartOfBlock() || p && I.contains(p)) ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_AFTER_END); if (a == CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS) { p = this.clone(); p = new CKEDITOR.dom.walker(p); var M = CKEDITOR.dom.walker.whitespaces(), n = CKEDITOR.dom.walker.bookmark(); p.evaluator = function (a) { return !M(a) && !n(a) }; if ((p = p.previous()) && p.type == CKEDITOR.NODE_ELEMENT && p.is("br")) break } p = this.clone(); p.collapse(); p.setEndAt(m, CKEDITOR.POSITION_BEFORE_END); p = new CKEDITOR.dom.walker(p); p.guard =
                                    a == CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS ? k : H; I = x = T = null; p = p.lastForward(); I = I || m; this.setEndAt(I, !p && this.checkEndOfBlock() || p && I.contains(p) ? CKEDITOR.POSITION_BEFORE_END : CKEDITOR.POSITION_BEFORE_START); T && this.setEndAfter(T)
                }
            }, shrink: function (a, b, c) {
                var e = "boolean" === typeof c ? c : c && "boolean" === typeof c.shrinkOnBlockBoundary ? c.shrinkOnBlockBoundary : !0, d = c && c.skipBogus; if (!this.collapsed) {
                    a = a || CKEDITOR.SHRINK_TEXT; var g = this.clone(), m = this.startContainer, h = this.endContainer, k = this.startOffset, q = this.endOffset,
                        l = c = 1; m && m.type == CKEDITOR.NODE_TEXT && (k ? k >= m.getLength() ? g.setStartAfter(m) : (g.setStartBefore(m), c = 0) : g.setStartBefore(m)); h && h.type == CKEDITOR.NODE_TEXT && (q ? q >= h.getLength() ? g.setEndAfter(h) : (g.setEndAfter(h), l = 0) : g.setEndBefore(h)); var g = new CKEDITOR.dom.walker(g), p = CKEDITOR.dom.walker.bookmark(), u = CKEDITOR.dom.walker.bogus(); g.evaluator = function (b) { return b.type == (a == CKEDITOR.SHRINK_ELEMENT ? CKEDITOR.NODE_ELEMENT : CKEDITOR.NODE_TEXT) }; var K; g.guard = function (b, c) {
                            if (d && u(b) || p(b)) return !0; if (a == CKEDITOR.SHRINK_ELEMENT &&
                                b.type == CKEDITOR.NODE_TEXT || c && b.equals(K) || !1 === e && b.type == CKEDITOR.NODE_ELEMENT && b.isBlockBoundary() || b.type == CKEDITOR.NODE_ELEMENT && b.hasAttribute("contenteditable")) return !1; c || b.type != CKEDITOR.NODE_ELEMENT || (K = b); return !0
                        }; c && (m = g[a == CKEDITOR.SHRINK_ELEMENT ? "lastForward" : "next"]()) && this.setStartAt(m, b ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_BEFORE_START); l && (g.reset(), (g = g[a == CKEDITOR.SHRINK_ELEMENT ? "lastBackward" : "previous"]()) && this.setEndAt(g, b ? CKEDITOR.POSITION_BEFORE_END : CKEDITOR.POSITION_AFTER_END));
                    return !(!c && !l)
                }
            }, insertNode: function (a) { this.optimizeBookmark(); this.trim(!1, !0); var b = this.startContainer, c = b.getChild(this.startOffset); c ? a.insertBefore(c) : b.append(a); a.getParent() && a.getParent().equals(this.endContainer) && this.endOffset++; this.setStartBefore(a) }, moveToPosition: function (a, b) { this.setStartAt(a, b); this.collapse(!0) }, moveToRange: function (a) { this.setStart(a.startContainer, a.startOffset); this.setEnd(a.endContainer, a.endOffset) }, selectNodeContents: function (a) {
                this.setStart(a, 0); this.setEnd(a,
                    a.type == CKEDITOR.NODE_TEXT ? a.getLength() : a.getChildCount())
            }, setStart: function (b, c) { b.type == CKEDITOR.NODE_ELEMENT && CKEDITOR.dtd.$empty[b.getName()] && (c = b.getIndex(), b = b.getParent()); this._setStartContainer(b); this.startOffset = c; this.endContainer || (this._setEndContainer(b), this.endOffset = c); a(this) }, setEnd: function (b, c) {
                b.type == CKEDITOR.NODE_ELEMENT && CKEDITOR.dtd.$empty[b.getName()] && (c = b.getIndex() + 1, b = b.getParent()); this._setEndContainer(b); this.endOffset = c; this.startContainer || (this._setStartContainer(b),
                    this.startOffset = c); a(this)
            }, setStartAfter: function (a) { this.setStart(a.getParent(), a.getIndex() + 1) }, setStartBefore: function (a) { this.setStart(a.getParent(), a.getIndex()) }, setEndAfter: function (a) { this.setEnd(a.getParent(), a.getIndex() + 1) }, setEndBefore: function (a) { this.setEnd(a.getParent(), a.getIndex()) }, setStartAt: function (b, c) {
                switch (c) {
                    case CKEDITOR.POSITION_AFTER_START: this.setStart(b, 0); break; case CKEDITOR.POSITION_BEFORE_END: b.type == CKEDITOR.NODE_TEXT ? this.setStart(b, b.getLength()) : this.setStart(b,
                        b.getChildCount()); break; case CKEDITOR.POSITION_BEFORE_START: this.setStartBefore(b); break; case CKEDITOR.POSITION_AFTER_END: this.setStartAfter(b)
                }a(this)
            }, setEndAt: function (b, c) { switch (c) { case CKEDITOR.POSITION_AFTER_START: this.setEnd(b, 0); break; case CKEDITOR.POSITION_BEFORE_END: b.type == CKEDITOR.NODE_TEXT ? this.setEnd(b, b.getLength()) : this.setEnd(b, b.getChildCount()); break; case CKEDITOR.POSITION_BEFORE_START: this.setEndBefore(b); break; case CKEDITOR.POSITION_AFTER_END: this.setEndAfter(b) }a(this) }, fixBlock: function (a,
                b) { var c = this.createBookmark(), e = this.document.createElement(b); this.collapse(a); this.enlarge(CKEDITOR.ENLARGE_BLOCK_CONTENTS); this.extractContents().appendTo(e); e.trim(); this.insertNode(e); var d = e.getBogus(); d && d.remove(); e.appendBogus(); this.moveToBookmark(c); return e }, splitBlock: function (a, b) {
                    var c = new CKEDITOR.dom.elementPath(this.startContainer, this.root), e = new CKEDITOR.dom.elementPath(this.endContainer, this.root), d = c.block, g = e.block, m = null; if (!c.blockLimit.equals(e.blockLimit)) return null; "br" !=
                        a && (d || (d = this.fixBlock(!0, a), g = (new CKEDITOR.dom.elementPath(this.endContainer, this.root)).block), g || (g = this.fixBlock(!1, a))); c = d && this.checkStartOfBlock(); e = g && this.checkEndOfBlock(); this.deleteContents(); d && d.equals(g) && (e ? (m = new CKEDITOR.dom.elementPath(this.startContainer, this.root), this.moveToPosition(g, CKEDITOR.POSITION_AFTER_END), g = null) : c ? (m = new CKEDITOR.dom.elementPath(this.startContainer, this.root), this.moveToPosition(d, CKEDITOR.POSITION_BEFORE_START), d = null) : (g = this.splitElement(d, b ||
                            !1), d.is("ul", "ol") || d.appendBogus())); return { previousBlock: d, nextBlock: g, wasStartOfBlock: c, wasEndOfBlock: e, elementPath: m }
                }, splitElement: function (a, b) { if (!this.collapsed) return null; this.setEndAt(a, CKEDITOR.POSITION_BEFORE_END); var c = this.extractContents(!1, b || !1), e = a.clone(!1, b || !1); c.appendTo(e); e.insertAfter(a); this.moveToPosition(a, CKEDITOR.POSITION_AFTER_END); return e }, removeEmptyBlocksAtEnd: function () {
                    function a(f) {
                        return function (a) {
                            return b(a) || c(a) || a.type == CKEDITOR.NODE_ELEMENT && a.isEmptyInlineRemoveable() ||
                                f.is("table") && a.is("caption") ? !1 : !0
                        }
                    } var b = CKEDITOR.dom.walker.whitespaces(), c = CKEDITOR.dom.walker.bookmark(!1); return function (b) { for (var c = this.createBookmark(), e = this[b ? "endPath" : "startPath"](), d = e.block || e.blockLimit, g; d && !d.equals(e.root) && !d.getFirst(a(d));)g = d.getParent(), this[b ? "setEndAt" : "setStartAt"](d, CKEDITOR.POSITION_AFTER_END), d.remove(1), d = g; this.moveToBookmark(c) }
                }(), startPath: function () { return new CKEDITOR.dom.elementPath(this.startContainer, this.root) }, endPath: function () {
                    return new CKEDITOR.dom.elementPath(this.endContainer,
                        this.root)
                }, checkBoundaryOfElement: function (a, b) { var e = b == CKEDITOR.START, d = this.clone(); d.collapse(e); d[e ? "setStartAt" : "setEndAt"](a, e ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_BEFORE_END); d = new CKEDITOR.dom.walker(d); d.evaluator = c(e); return d[e ? "checkBackward" : "checkForward"]() }, checkStartOfBlock: function (a) {
                    var c = this.startContainer, e = this.startOffset; CKEDITOR.env.ie && e && c.type == CKEDITOR.NODE_TEXT && (c = CKEDITOR.tools.ltrim(c.substring(0, e)), k.test(c) && this.trim(0, 1)); a || this.trim(); a = new CKEDITOR.dom.elementPath(this.startContainer,
                        this.root); c = this.clone(); c.collapse(!0); c.setStartAt(a.block || a.blockLimit, CKEDITOR.POSITION_AFTER_START); a = new CKEDITOR.dom.walker(c); a.evaluator = b(); return a.checkBackward()
                }, checkEndOfBlock: function (a) {
                    var c = this.endContainer, e = this.endOffset; CKEDITOR.env.ie && c.type == CKEDITOR.NODE_TEXT && (c = CKEDITOR.tools.rtrim(c.substring(e)), k.test(c) && this.trim(1, 0)); a || this.trim(); a = new CKEDITOR.dom.elementPath(this.endContainer, this.root); c = this.clone(); c.collapse(!1); c.setEndAt(a.block || a.blockLimit, CKEDITOR.POSITION_BEFORE_END);
                    a = new CKEDITOR.dom.walker(c); a.evaluator = b(); return a.checkForward()
                }, getPreviousNode: function (a, b, c) { var e = this.clone(); e.collapse(1); e.setStartAt(c || this.root, CKEDITOR.POSITION_AFTER_START); c = new CKEDITOR.dom.walker(e); c.evaluator = a; c.guard = b; return c.previous() }, getNextNode: function (a, b, c) { var e = this.clone(); e.collapse(); e.setEndAt(c || this.root, CKEDITOR.POSITION_BEFORE_END); c = new CKEDITOR.dom.walker(e); c.evaluator = a; c.guard = b; return c.next() }, checkReadOnly: function () {
                    function a(b, c) {
                        for (; b;) {
                            if (b.type ==
                                CKEDITOR.NODE_ELEMENT) { if ("false" == b.getAttribute("contentEditable") && !b.data("cke-editable")) return 0; if (b.is("html") || "true" == b.getAttribute("contentEditable") && (b.contains(c) || b.equals(c))) break } b = b.getParent()
                        } return 1
                    } return function () { var b = this.startContainer, c = this.endContainer; return !(a(b, c) && a(c, b)) }
                }(), moveToElementEditablePosition: function (a, b) {
                    if (a.type == CKEDITOR.NODE_ELEMENT && !a.isEditable(!1)) return this.moveToPosition(a, b ? CKEDITOR.POSITION_AFTER_END : CKEDITOR.POSITION_BEFORE_START),
                        !0; for (var c = 0; a;) {
                            if (a.type == CKEDITOR.NODE_TEXT) { b && this.endContainer && this.checkEndOfBlock() && k.test(a.getText()) ? this.moveToPosition(a, CKEDITOR.POSITION_BEFORE_START) : this.moveToPosition(a, b ? CKEDITOR.POSITION_AFTER_END : CKEDITOR.POSITION_BEFORE_START); c = 1; break } if (a.type == CKEDITOR.NODE_ELEMENT) if (a.isEditable()) this.moveToPosition(a, b ? CKEDITOR.POSITION_BEFORE_END : CKEDITOR.POSITION_AFTER_START), c = 1; else if (b && a.is("br") && this.endContainer && this.checkEndOfBlock()) this.moveToPosition(a, CKEDITOR.POSITION_BEFORE_START);
                            else if ("false" == a.getAttribute("contenteditable") && a.is(CKEDITOR.dtd.$block)) return this.setStartBefore(a), this.setEndAfter(a), !0; var e = a, d = c, g = void 0; e.type == CKEDITOR.NODE_ELEMENT && e.isEditable(!1) && (g = e[b ? "getLast" : "getFirst"](q)); d || g || (g = e[b ? "getPrevious" : "getNext"](q)); a = g
                        } return !!c
                }, moveToClosestEditablePosition: function (a, b) {
                    var c, e = 0, d, g, m = [CKEDITOR.POSITION_AFTER_END, CKEDITOR.POSITION_BEFORE_START]; a ? (c = new CKEDITOR.dom.range(this.root), c.moveToPosition(a, m[b ? 0 : 1])) : c = this.clone(); if (a &&
                        !a.is(CKEDITOR.dtd.$block)) e = 1; else if (d = c[b ? "getNextEditableNode" : "getPreviousEditableNode"]()) e = 1, (g = d.type == CKEDITOR.NODE_ELEMENT) && d.is(CKEDITOR.dtd.$block) && "false" == d.getAttribute("contenteditable") ? (c.setStartAt(d, CKEDITOR.POSITION_BEFORE_START), c.setEndAt(d, CKEDITOR.POSITION_AFTER_END)) : !CKEDITOR.env.needsBrFiller && g && d.is(CKEDITOR.dom.walker.validEmptyBlockContainers) ? (c.setEnd(d, 0), c.collapse()) : c.moveToPosition(d, m[b ? 1 : 0]); e && this.moveToRange(c); return !!e
                }, moveToElementEditStart: function (a) { return this.moveToElementEditablePosition(a) },
            moveToElementEditEnd: function (a) { return this.moveToElementEditablePosition(a, !0) }, getEnclosedNode: function () { var a = this.clone(); a.optimize(); if (a.startContainer.type != CKEDITOR.NODE_ELEMENT || a.endContainer.type != CKEDITOR.NODE_ELEMENT) return null; var a = new CKEDITOR.dom.walker(a), b = CKEDITOR.dom.walker.bookmark(!1, !0), c = CKEDITOR.dom.walker.whitespaces(!0); a.evaluator = function (a) { return c(a) && b(a) }; var e = a.next(); a.reset(); return e && e.equals(a.previous()) ? e : null }, getTouchedStartNode: function () {
                var a = this.startContainer;
                return this.collapsed || a.type != CKEDITOR.NODE_ELEMENT ? a : a.getChild(this.startOffset) || a
            }, getTouchedEndNode: function () { var a = this.endContainer; return this.collapsed || a.type != CKEDITOR.NODE_ELEMENT ? a : a.getChild(this.endOffset - 1) || a }, getNextEditableNode: g(), getPreviousEditableNode: g(1), _getTableElement: function (a) {
                a = a || { td: 1, th: 1, tr: 1, tbody: 1, thead: 1, tfoot: 1, table: 1 }; var b = this.getTouchedStartNode(), c = this.getTouchedEndNode(), e = b.getAscendant("table", !0), c = c.getAscendant("table", !0); return e && !this.root.contains(e) ?
                    null : this.getEnclosedNode() ? this.getEnclosedNode().getAscendant(a, !0) : e && c && (e.equals(c) || e.contains(c) || c.contains(e)) ? b.getAscendant(a, !0) : null
            }, scrollIntoView: function () {
                var a = new CKEDITOR.dom.element.createFromHtml("\x3cspan\x3e\x26nbsp;\x3c/span\x3e", this.document), b, c, e, d = this.clone(); d.optimize(); (e = d.startContainer.type == CKEDITOR.NODE_TEXT) ? (c = d.startContainer.getText(), b = d.startContainer.split(d.startOffset), a.insertAfter(d.startContainer)) : d.insertNode(a); a.scrollIntoView(); e && (d.startContainer.setText(c),
                    b.remove()); a.remove()
            }, getClientRects: function () {
                function a(b, c) {
                    var e = CKEDITOR.tools.array.map(b, function (a) { return a }), d = new CKEDITOR.dom.range(c.root), f, g, h; c.startContainer instanceof CKEDITOR.dom.element && (g = 0 === c.startOffset && c.startContainer.hasAttribute("data-widget")); c.endContainer instanceof CKEDITOR.dom.element && (h = (h = c.endOffset === (c.endContainer.getChildCount ? c.endContainer.getChildCount() : c.endContainer.length)) && c.endContainer.hasAttribute("data-widget")); g && d.setStart(c.startContainer.getParent(),
                        c.startContainer.getIndex()); h && d.setEnd(c.endContainer.getParent(), c.endContainer.getIndex() + 1); if (g || h) c = d; d = c.cloneContents().find("[data-cke-widget-id]").toArray(); if (d = CKEDITOR.tools.array.map(d, function (a) { var b = c.root.editor; a = a.getAttribute("data-cke-widget-id"); return b.widgets.instances[a].element })) return d = CKEDITOR.tools.array.map(d, function (a) {
                            var b; b = a.getParent().hasClass("cke_widget_wrapper") ? a.getParent() : a; f = this.root.getDocument().$.createRange(); f.setStart(b.getParent().$, b.getIndex());
                            f.setEnd(b.getParent().$, b.getIndex() + 1); b = f.getClientRects(); b.widgetRect = a.getClientRect(); return b
                        }, c), CKEDITOR.tools.array.forEach(d, function (a) { function b(d) { CKEDITOR.tools.array.forEach(e, function (b, f) { var g = CKEDITOR.tools.objectCompare(a[d], b); g || (g = CKEDITOR.tools.objectCompare(a.widgetRect, b)); g && (Array.prototype.splice.call(e, f, a.length - d, a.widgetRect), c = !0) }); c || (d < e.length - 1 ? b(d + 1) : e.push(a.widgetRect)) } var c; b(0) }), e
                } function b(a, c, d) {
                    var f; c.collapsed ? d.startContainer instanceof CKEDITOR.dom.element ?
                        (a = d.checkStartOfBlock(), f = new CKEDITOR.dom.text("​"), a ? d.startContainer.append(f, !0) : 0 === d.startOffset ? f.insertBefore(d.startContainer.getFirst()) : (d = d.startContainer.getChildren().getItem(d.startOffset - 1), f.insertAfter(d)), c.setStart(f.$, 0), c.setEnd(f.$, 0), a = c.getClientRects(), f.remove()) : d.startContainer instanceof CKEDITOR.dom.text && ("" === d.startContainer.getText() ? (d.startContainer.setText("​"), a = c.getClientRects(), d.startContainer.setText("")) : a = [e(d.createBookmark())]) : a = [e(d.createBookmark())];
                    return a
                } function c(a, b, e) { a = CKEDITOR.tools.extend({}, a); b && (a = CKEDITOR.tools.getAbsoluteRectPosition(e.document.getWindow(), a)); !a.width && (a.width = a.right - a.left); !a.height && (a.height = a.bottom - a.top); return a } function e(a) {
                    var b = a.startNode; a = a.endNode; var c; b.setText("​"); b.removeStyle("display"); a ? (a.setText("​"), a.removeStyle("display"), c = [b.getClientRect(), a.getClientRect()], a.remove()) : c = [b.getClientRect(), b.getClientRect()]; b.remove(); return {
                        right: Math.max(c[0].right, c[1].right), bottom: Math.max(c[0].bottom,
                            c[1].bottom), left: Math.min(c[0].left, c[1].left), top: Math.min(c[0].top, c[1].top), width: Math.abs(c[0].left - c[1].left), height: Math.max(c[0].bottom, c[1].bottom) - Math.min(c[0].top, c[1].top)
                    }
                } return void 0 !== document.getSelection ? function (e) {
                    var d = this.root.getDocument().$.createRange(), g; d.setStart(this.startContainer.$, this.startOffset); d.setEnd(this.endContainer.$, this.endOffset); g = d.getClientRects(); g = a(g, this); g.length || (g = b(g, d, this)); return CKEDITOR.tools.array.map(g, function (a) { return c(a, e, this) },
                        this)
                } : function (a) { return [c(e(this.createBookmark()), a, this)] }
            }(), _setStartContainer: function (a) { this.startContainer = a }, _setEndContainer: function (a) { this.endContainer = a }, _find: function (a, b) {
                var c = this.getCommonAncestor(), e = this.getBoundaryNodes(), d = [], g, m, h, k; if (c && c.find) for (m = c.find(a), g = 0; g < m.count(); g++)if (c = m.getItem(g), b || !c.isReadOnly()) h = c.getPosition(e.startNode) & CKEDITOR.POSITION_FOLLOWING || e.startNode.equals(c), k = c.getPosition(e.endNode) & CKEDITOR.POSITION_PRECEDING + CKEDITOR.POSITION_IS_CONTAINED ||
                    e.endNode.equals(c), h && k && d.push(c); return d
            }
        }; CKEDITOR.dom.range.mergeRanges = function (a) {
            return CKEDITOR.tools.array.reduce(a, function (a, b) {
                var c = a[a.length - 1], e = !1; b = b.clone(); b.enlarge(CKEDITOR.ENLARGE_ELEMENT); if (c) { var d = new CKEDITOR.dom.range(b.root), e = new CKEDITOR.dom.walker(d), f = CKEDITOR.dom.walker.whitespaces(); d.setStart(c.endContainer, c.endOffset); d.setEnd(b.startContainer, b.startOffset); for (d = e.next(); f(d) || b.endContainer.equals(d);)d = e.next(); e = !d } e ? c.setEnd(b.endContainer, b.endOffset) :
                    a.push(b); return a
            }, [])
        }
    })(); CKEDITOR.POSITION_AFTER_START = 1; CKEDITOR.POSITION_BEFORE_END = 2; CKEDITOR.POSITION_BEFORE_START = 3; CKEDITOR.POSITION_AFTER_END = 4; CKEDITOR.ENLARGE_ELEMENT = 1; CKEDITOR.ENLARGE_BLOCK_CONTENTS = 2; CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS = 3; CKEDITOR.ENLARGE_INLINE = 4; CKEDITOR.START = 1; CKEDITOR.END = 2; CKEDITOR.SHRINK_ELEMENT = 1; CKEDITOR.SHRINK_TEXT = 2; "use strict";
    (function () {
        function a(a) { 1 > arguments.length || (this.range = a, this.forceBrBreak = 0, this.enlargeBr = 1, this.enforceRealBlocks = 0, this._ || (this._ = {})) } function d(a) { var b = []; a.forEach(function (a) { if ("true" == a.getAttribute("contenteditable")) return b.push(a), !1 }, CKEDITOR.NODE_ELEMENT, !0); return b } function b(a, c, e, g) {
            a: { null == g && (g = d(e)); for (var h; h = g.shift();)if (h.getDtd().p) { g = { element: h, remaining: g }; break a } g = null } if (!g) return 0; if ((h = CKEDITOR.filter.instances[g.element.data("cke-filter")]) && !h.check(c)) return b(a,
                c, e, g.remaining); c = new CKEDITOR.dom.range(g.element); c.selectNodeContents(g.element); c = c.createIterator(); c.enlargeBr = a.enlargeBr; c.enforceRealBlocks = a.enforceRealBlocks; c.activeFilter = c.filter = h; a._.nestedEditable = { element: g.element, container: e, remaining: g.remaining, iterator: c }; return 1
        } function c(a, b, c) { if (!b) return !1; a = a.clone(); a.collapse(!c); return a.checkBoundaryOfElement(b, c ? CKEDITOR.START : CKEDITOR.END) } var g = /^[\r\n\t ]+$/, e = CKEDITOR.dom.walker.bookmark(!1, !0), h = CKEDITOR.dom.walker.whitespaces(!0),
            k = function (a) { return e(a) && h(a) }, l = { dd: 1, dt: 1, li: 1 }; a.prototype = {
                getNextParagraph: function (a) {
                    var d, h, B, y, F; a = a || "p"; if (this._.nestedEditable) {
                        if (d = this._.nestedEditable.iterator.getNextParagraph(a)) return this.activeFilter = this._.nestedEditable.iterator.activeFilter, d; this.activeFilter = this.filter; if (b(this, a, this._.nestedEditable.container, this._.nestedEditable.remaining)) return this.activeFilter = this._.nestedEditable.iterator.activeFilter, this._.nestedEditable.iterator.getNextParagraph(a); this._.nestedEditable =
                            null
                    } if (!this.range.root.getDtd()[a]) return null; if (!this._.started) {
                        var r = this.range.clone(); h = r.startPath(); var m = r.endPath(), L = !r.collapsed && c(r, h.block), v = !r.collapsed && c(r, m.block, 1); r.shrink(CKEDITOR.SHRINK_ELEMENT, !0); L && r.setStartAt(h.block, CKEDITOR.POSITION_BEFORE_END); v && r.setEndAt(m.block, CKEDITOR.POSITION_AFTER_START); h = r.endContainer.hasAscendant("pre", !0) || r.startContainer.hasAscendant("pre", !0); r.enlarge(this.forceBrBreak && !h || !this.enlargeBr ? CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS : CKEDITOR.ENLARGE_BLOCK_CONTENTS);
                        r.collapsed || (h = new CKEDITOR.dom.walker(r.clone()), m = CKEDITOR.dom.walker.bookmark(!0, !0), h.evaluator = m, this._.nextNode = h.next(), h = new CKEDITOR.dom.walker(r.clone()), h.evaluator = m, h = h.previous(), this._.lastNode = h.getNextSourceNode(!0, null, r.root), this._.lastNode && this._.lastNode.type == CKEDITOR.NODE_TEXT && !CKEDITOR.tools.trim(this._.lastNode.getText()) && this._.lastNode.getParent().isBlockBoundary() && (m = this.range.clone(), m.moveToPosition(this._.lastNode, CKEDITOR.POSITION_AFTER_END), m.checkEndOfBlock() &&
                            (m = new CKEDITOR.dom.elementPath(m.endContainer, m.root), this._.lastNode = (m.block || m.blockLimit).getNextSourceNode(!0))), this._.lastNode && r.root.contains(this._.lastNode) || (this._.lastNode = this._.docEndMarker = r.document.createText(""), this._.lastNode.insertAfter(h)), r = null); this._.started = 1; h = r
                    } m = this._.nextNode; r = this._.lastNode; for (this._.nextNode = null; m;) {
                        var L = 0, v = m.hasAscendant("pre"), J = m.type != CKEDITOR.NODE_ELEMENT, G = 0; if (J) m.type == CKEDITOR.NODE_TEXT && g.test(m.getText()) && (J = 0); else {
                            var p = m.getName();
                            if (CKEDITOR.dtd.$block[p] && "false" == m.getAttribute("contenteditable")) { d = m; b(this, a, d); break } else if (m.isBlockBoundary(this.forceBrBreak && !v && { br: 1 })) { if ("br" == p) J = 1; else if (!h && !m.getChildCount() && "hr" != p) { d = m; B = m.equals(r); break } h && (h.setEndAt(m, CKEDITOR.POSITION_BEFORE_START), "br" != p && (this._.nextNode = m)); L = 1 } else { if (m.getFirst()) { h || (h = this.range.clone(), h.setStartAt(m, CKEDITOR.POSITION_BEFORE_START)); m = m.getFirst(); continue } J = 1 }
                        } J && !h && (h = this.range.clone(), h.setStartAt(m, CKEDITOR.POSITION_BEFORE_START));
                        B = (!L || J) && m.equals(r); if (h && !L) for (; !m.getNext(k) && !B;) { p = m.getParent(); if (p.isBlockBoundary(this.forceBrBreak && !v && { br: 1 })) { L = 1; J = 0; B || p.equals(r); h.setEndAt(p, CKEDITOR.POSITION_BEFORE_END); break } m = p; J = 1; B = m.equals(r); G = 1 } J && h.setEndAt(m, CKEDITOR.POSITION_AFTER_END); m = this._getNextSourceNode(m, G, r); if ((B = !m) || L && h) break
                    } if (!d) {
                        if (!h) return this._.docEndMarker && this._.docEndMarker.remove(), this._.nextNode = null; d = new CKEDITOR.dom.elementPath(h.startContainer, h.root); m = d.blockLimit; L = { div: 1, th: 1, td: 1 };
                        d = d.block; !d && m && !this.enforceRealBlocks && L[m.getName()] && h.checkStartOfBlock() && h.checkEndOfBlock() && !m.equals(h.root) ? d = m : !d || this.enforceRealBlocks && d.is(l) ? (d = this.range.document.createElement(a), h.extractContents().appendTo(d), d.trim(), h.insertNode(d), y = F = !0) : "li" != d.getName() ? h.checkStartOfBlock() && h.checkEndOfBlock() || (d = d.clone(!1), h.extractContents().appendTo(d), d.trim(), F = h.splitBlock(), y = !F.wasStartOfBlock, F = !F.wasEndOfBlock, h.insertNode(d)) : B || (this._.nextNode = d.equals(r) ? null : this._getNextSourceNode(h.getBoundaryNodes().endNode,
                            1, r))
                    } y && (y = d.getPrevious()) && y.type == CKEDITOR.NODE_ELEMENT && ("br" == y.getName() ? y.remove() : y.getLast() && "br" == y.getLast().$.nodeName.toLowerCase() && y.getLast().remove()); F && (y = d.getLast()) && y.type == CKEDITOR.NODE_ELEMENT && "br" == y.getName() && (!CKEDITOR.env.needsBrFiller || y.getPrevious(e) || y.getNext(e)) && y.remove(); this._.nextNode || (this._.nextNode = B || d.equals(r) || !r ? null : this._getNextSourceNode(d, 1, r)); return d
                }, _getNextSourceNode: function (a, b, c) {
                    function d(a) { return !(a.equals(c) || a.equals(g)) } var g =
                        this.range.root; for (a = a.getNextSourceNode(b, null, d); !e(a);)a = a.getNextSourceNode(b, null, d); return a
                }
            }; CKEDITOR.dom.range.prototype.createIterator = function () { return new a(this) }
    })();
    CKEDITOR.command = function (a, d) {
        this.uiItems = []; this.exec = function (b) { if (this.state == CKEDITOR.TRISTATE_DISABLED || !this.checkAllowed()) return !1; this.editorFocus && a.focus(); return !1 === this.fire("exec") ? !0 : !1 !== d.exec.call(this, a, b) }; this.refresh = function (a, b) {
            if (!this.readOnly && a.readOnly) return !0; if (this.context && !b.isContextFor(this.context) || !this.checkAllowed(!0)) return this.disable(), !0; this.startDisabled || this.enable(); this.modes && !this.modes[a.mode] && this.disable(); return !1 === this.fire("refresh",
                { editor: a, path: b }) ? !0 : d.refresh && !1 !== d.refresh.apply(this, arguments)
        }; var b; this.checkAllowed = function (c) { return c || "boolean" != typeof b ? b = a.activeFilter.checkFeature(this) : b }; CKEDITOR.tools.extend(this, d, { modes: { wysiwyg: 1 }, editorFocus: 1, contextSensitive: !!d.context, state: CKEDITOR.TRISTATE_DISABLED }); CKEDITOR.event.call(this)
    };
    CKEDITOR.command.prototype = {
        enable: function () { this.state == CKEDITOR.TRISTATE_DISABLED && this.checkAllowed() && this.setState(this.preserveState && "undefined" != typeof this.previousState ? this.previousState : CKEDITOR.TRISTATE_OFF) }, disable: function () { this.setState(CKEDITOR.TRISTATE_DISABLED) }, setState: function (a) { if (this.state == a || a != CKEDITOR.TRISTATE_DISABLED && !this.checkAllowed()) return !1; this.previousState = this.state; this.state = a; this.fire("state"); return !0 }, toggleState: function () {
            this.state == CKEDITOR.TRISTATE_OFF ?
            this.setState(CKEDITOR.TRISTATE_ON) : this.state == CKEDITOR.TRISTATE_ON && this.setState(CKEDITOR.TRISTATE_OFF)
        }
    }; CKEDITOR.event.implementOn(CKEDITOR.command.prototype); CKEDITOR.ENTER_P = 1; CKEDITOR.ENTER_BR = 2; CKEDITOR.ENTER_DIV = 3;
    CKEDITOR.config = {
        customConfig: "config.js", autoUpdateElement: !0, language: "", licenseKey: "", defaultLanguage: "en", contentsLangDirection: "", enterMode: CKEDITOR.ENTER_P, forceEnterMode: !1, shiftEnterMode: CKEDITOR.ENTER_BR, docType: "\x3c!DOCTYPE html\x3e", bodyId: "", bodyClass: "", fullPage: !1, height: 200, contentsCss: CKEDITOR.getUrl("contents.css"), extraPlugins: "", removePlugins: "", protectedSource: [], tabIndex: 0, useComputedState: !0, width: "", baseFloatZIndex: 1E4, blockedKeystrokes: [CKEDITOR.CTRL + 66, CKEDITOR.CTRL + 73, CKEDITOR.CTRL +
            85]
    };
    (function () {
        function a(a, b, c, e, d) {
            var g, f; a = []; for (g in b) {
                f = b[g]; f = "boolean" == typeof f ? {} : "function" == typeof f ? { match: f } : D(f); "$" != g.charAt(0) && (f.elements = g); c && (f.featureName = c.toLowerCase()); var n = f; n.elements = h(n.elements, /\s+/) || null; n.propertiesOnly = n.propertiesOnly || !0 === n.elements; var t = /\s*,\s*/, x = void 0; for (x in T) {
                    n[x] = h(n[x], t) || null; var m = n, C = N[x], k = h(n[N[x]], t), E = n[x], A = [], I = !0, H = void 0; k ? I = !1 : k = {}; for (H in E) "!" == H.charAt(0) && (H = H.slice(1), A.push(H), k[H] = !0, I = !1); for (; H = A.pop();)E[H] = E["!" +
                        H], delete E["!" + H]; m[C] = (I ? !1 : k) || null
                } n.match = n.match || null; e.push(f); a.push(f)
            } b = d.elements; d = d.generic; var z; c = 0; for (e = a.length; c < e; ++c) {
                g = D(a[c]); f = !0 === g.classes || !0 === g.styles || !0 === g.attributes; n = g; x = C = t = void 0; for (t in T) n[t] = L(n[t]); m = !0; for (x in N) { t = N[x]; C = n[t]; k = []; E = void 0; for (E in C) -1 < E.indexOf("*") ? k.push(new RegExp("^" + E.replace(/\*/g, ".*") + "$")) : k.push(E); C = k; C.length && (n[t] = C, m = !1) } n.nothingRequired = m; n.noProperties = !(n.attributes || n.classes || n.styles); if (!0 === g.elements || null ===
                    g.elements) d[f ? "unshift" : "push"](g); else for (z in n = g.elements, delete g.elements, n) if (b[z]) b[z][f ? "unshift" : "push"](g); else b[z] = [g]
            }
        } function d(a, c, e, d) {
            if (!a.match || a.match(c)) if (d || k(a, c)) if (a.propertiesOnly || (e.valid = !0), e.allAttributes || (e.allAttributes = b(a.attributes, c.attributes, e.validAttributes)), e.allStyles || (e.allStyles = b(a.styles, c.styles, e.validStyles)), !e.allClasses) {
                a = a.classes; c = c.classes; d = e.validClasses; if (a) if (!0 === a) a = !0; else {
                    for (var g = 0, f = c.length, n; g < f; ++g)n = c[g], d[n] || (d[n] =
                        a(n)); a = !1
                } else a = !1; e.allClasses = a
            }
        } function b(a, b, c) { if (!a) return !1; if (!0 === a) return !0; for (var e in b) c[e] || (c[e] = a(e)); return !1 } function c(a, b, c) { if (!a.match || a.match(b)) { if (a.noProperties) return !1; c.hadInvalidAttribute = g(a.attributes, b.attributes) || c.hadInvalidAttribute; c.hadInvalidStyle = g(a.styles, b.styles) || c.hadInvalidStyle; a = a.classes; b = b.classes; if (a) { for (var e = !1, d = !0 === a, f = b.length; f--;)if (d || a(b[f])) b.splice(f, 1), e = !0; a = e } else a = !1; c.hadInvalidClass = a || c.hadInvalidClass } } function g(a,
            b) { if (!a) return !1; var c = !1, e = !0 === a, d; for (d in b) if (e || a(d)) delete b[d], c = !0; return c } function e(a, b, c) { if (a.disabled || a.customConfig && !c || !b) return !1; a._.cachedChecks = {}; return !0 } function h(a, b) { if (!a) return !1; if (!0 === a) return a; if ("string" == typeof a) return a = C(a), "*" == a ? !0 : CKEDITOR.tools.convertArrayToObject(a.split(b)); if (CKEDITOR.tools.isArray(a)) return a.length ? CKEDITOR.tools.convertArrayToObject(a) : !1; var c = {}, e = 0, d; for (d in a) c[d] = a[d], e++; return e ? c : !1 } function k(a, b) {
                if (a.nothingRequired) return !0;
                var c, e, d, g; if (d = a.requiredClasses) for (g = b.classes, c = 0; c < d.length; ++c)if (e = d[c], "string" == typeof e) { if (-1 == CKEDITOR.tools.indexOf(g, e)) return !1 } else if (!CKEDITOR.tools.checkIfAnyArrayItemMatches(g, e)) return !1; return l(b.styles, a.requiredStyles) && l(b.attributes, a.requiredAttributes)
            } function l(a, b) { if (!b) return !0; for (var c = 0, e; c < b.length; ++c)if (e = b[c], "string" == typeof e) { if (!(e in a)) return !1 } else if (!CKEDITOR.tools.checkIfAnyObjectPropertyMatches(a, e)) return !1; return !0 } function q(a) {
                if (!a) return {};
                a = a.split(/\s*,\s*/).sort(); for (var b = {}; a.length;)b[a.shift()] = "cke-test"; return b
            } function f(a) { var b, c, e, d, g = {}, f = 1; for (a = C(a); b = a.match(x);)(c = b[2]) ? (e = w(c, "styles"), d = w(c, "attrs"), c = w(c, "classes")) : e = d = c = null, g["$" + f++] = { elements: b[1], classes: c, styles: e, attributes: d }, a = a.slice(b[0].length); return g } function w(a, b) { var c = a.match(H[b]); return c ? C(c[1]) : null } function B(a) {
                var b = a.styleBackup = a.attributes.style, c = a.classBackup = a.attributes["class"]; a.styles || (a.styles = CKEDITOR.tools.parseCssText(b ||
                    "", 1)); a.classes || (a.classes = c ? c.split(/\s+/) : [])
            } function y(a, b, e, g) {
                var f = 0, t; g.toHtml && (b.name = b.name.replace(M, "$1")); if (g.doCallbacks && a.elementCallbacks) { a: { t = a.elementCallbacks; for (var h = 0, x = t.length, C; h < x; ++h)if (C = t[h](b)) { t = C; break a } t = void 0 } if (t) return t } if (g.doTransform && (t = a._.transformations[b.name])) { B(b); for (h = 0; h < t.length; ++h)p(a, b, t[h]); r(b) } if (g.doFilter) {
                    a: {
                        h = b.name; x = a._; a = x.allowedRules.elements[h]; t = x.allowedRules.generic; h = x.disallowedRules.elements[h]; x = x.disallowedRules.generic;
                        C = g.skipRequired; var D = { valid: !1, validAttributes: {}, validClasses: {}, validStyles: {}, allAttributes: !1, allClasses: !1, allStyles: !1, hadInvalidAttribute: !1, hadInvalidClass: !1, hadInvalidStyle: !1 }, k, E; if (a || t) { B(b); if (h) for (k = 0, E = h.length; k < E; ++k)if (!1 === c(h[k], b, D)) { a = null; break a } if (x) for (k = 0, E = x.length; k < E; ++k)c(x[k], b, D); if (a) for (k = 0, E = a.length; k < E; ++k)d(a[k], b, D, C); if (t) for (k = 0, E = t.length; k < E; ++k)d(t[k], b, D, C); a = D } else a = null
                    } if (!a || !a.valid) return e.push(b), 1; E = a.validAttributes; var A = a.validStyles;
                    t = a.validClasses; var h = b.attributes, I = b.styles, x = b.classes; C = b.classBackup; var N = b.styleBackup, H, z, l = [], D = [], T = /^data-cke-/; k = !1; delete h.style; delete h["class"]; delete b.classBackup; delete b.styleBackup; if (!a.allAttributes) for (H in h) E[H] || (T.test(H) ? H == (z = H.replace(/^data-cke-saved-/, "")) || E[z] || (delete h[H], k = !0) : (delete h[H], k = !0)); if (!a.allStyles || a.hadInvalidStyle) { for (H in I) a.allStyles || A[H] ? l.push(H + ":" + I[H]) : k = !0; l.length && (h.style = l.sort().join("; ")) } else N && (h.style = N); if (!a.allClasses ||
                        a.hadInvalidClass) { for (H = 0; H < x.length; ++H)(a.allClasses || t[x[H]]) && D.push(x[H]); D.length && (h["class"] = D.sort().join(" ")); C && D.length < C.split(/\s+/).length && (k = !0) } else C && (h["class"] = C); k && (f = 1); if (!g.skipFinalValidation && !m(b)) return e.push(b), 1
                } g.toHtml && (b.name = b.name.replace(n, "cke:$1")); return f
            } function F(a) { var b = [], c; for (c in a) -1 < c.indexOf("*") && b.push(c.replace(/\*/g, ".*")); return b.length ? new RegExp("^(?:" + b.join("|") + ")$") : null } function r(a) {
                var b = a.attributes, c; delete b.style; delete b["class"];
                if (c = CKEDITOR.tools.writeCssText(a.styles, !0)) b.style = c; a.classes.length && (b["class"] = a.classes.sort().join(" "))
            } function m(a) { switch (a.name) { case "a": if (!(a.children.length || a.attributes.name || a.attributes.id)) return !1; break; case "img": if (!a.attributes.src) return !1 }return !0 } function L(a) { if (!a) return !1; if (!0 === a) return !0; var b = F(a); return function (c) { return c in a || b && c.match(b) } } function v() { return new CKEDITOR.htmlParser.element("br") } function J(a) {
                return a.type == CKEDITOR.NODE_ELEMENT && ("br" ==
                    a.name || t.$block[a.name])
            } function G(a, b, c) {
                var e = a.name; if (t.$empty[e] || !a.children.length) "hr" == e && "br" == b ? a.replaceWith(v()) : (a.parent && c.push({ check: "it", el: a.parent }), a.remove()); else if (t.$block[e] || "tr" == e) if ("br" == b) a.previous && !J(a.previous) && (b = v(), b.insertBefore(a)), a.next && !J(a.next) && (b = v(), b.insertAfter(a)), a.replaceWithChildren(); else {
                    var e = a.children, d; b: { d = t[b]; for (var g = 0, f = e.length, n; g < f; ++g)if (n = e[g], n.type == CKEDITOR.NODE_ELEMENT && !d[n.name]) { d = !1; break b } d = !0 } if (d) a.name = b, a.attributes =
                        {}, c.push({ check: "parent-down", el: a }); else { d = a.parent; for (var g = d.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT || "body" == d.name, h, x, f = e.length; 0 < f;)n = e[--f], g && (n.type == CKEDITOR.NODE_TEXT || n.type == CKEDITOR.NODE_ELEMENT && t.$inline[n.name]) ? (h || (h = new CKEDITOR.htmlParser.element(b), h.insertAfter(a), c.push({ check: "parent-down", el: h })), h.add(n, 0)) : (h = null, x = t[d.name] || t.span, n.insertAfter(a), d.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT || n.type != CKEDITOR.NODE_ELEMENT || x[n.name] || c.push({ check: "el-up", el: n })); a.remove() }
                } else e in
                    { style: 1, script: 1 } ? a.remove() : (a.parent && c.push({ check: "it", el: a.parent }), a.replaceWithChildren())
            } function p(a, b, c) { var e, d; for (e = 0; e < c.length; ++e)if (d = c[e], !(d.check && !a.check(d.check, !1) || d.left && !d.left(b))) { d.right(b, A); break } } function u(a, b) {
                var c = b.getDefinition(), e = c.attributes, d = c.styles, g, f, n, t; if (a.name != c.element) return !1; for (g in e) if ("class" == g) for (c = e[g].split(/\s+/), n = a.classes.join("|"); t = c.pop();) { if (-1 == n.indexOf(t)) return !1 } else if (a.attributes[g] != e[g]) return !1; for (f in d) if (a.styles[f] !=
                    d[f]) return !1; return !0
            } function K(a, b) { var c, e; "string" == typeof a ? c = a : a instanceof CKEDITOR.style ? e = a : (c = a[0], e = a[1]); return [{ element: c, left: e, right: function (a, c) { c.transform(a, b) } }] } function E(a) { return function (b) { return u(b, a) } } function z(a) { return function (b, c) { c[a](b) } } var t = CKEDITOR.dtd, D = CKEDITOR.tools.copy, C = CKEDITOR.tools.trim, I = ["", "p", "br", "div"]; CKEDITOR.FILTER_SKIP_TREE = 2; CKEDITOR.filter = function (a, b) {
                this.allowedContent = []; this.disallowedContent = []; this.elementCallbacks = null; this.disabled =
                    !1; this.editor = null; this.id = CKEDITOR.tools.getNextNumber(); this._ = { allowedRules: { elements: {}, generic: [] }, disallowedRules: { elements: {}, generic: [] }, transformations: {}, cachedTests: {}, cachedChecks: {} }; CKEDITOR.filter.instances[this.id] = this; var c = this.editor = a instanceof CKEDITOR.editor ? a : null; if (c && !b) {
                        this.customConfig = !0; var e = c.config.allowedContent; !0 === e ? this.disabled = !0 : (e || (this.customConfig = !1), this.allow(e, "config", 1), this.allow(c.config.extraAllowedContent, "extra", 1), this.allow(I[c.enterMode] +
                            " " + I[c.shiftEnterMode], "default", 1), this.disallow(c.config.disallowedContent))
                    } else this.customConfig = !1, this.allow(b || a, "default", 1)
            }; CKEDITOR.filter.instances = {}; CKEDITOR.filter.prototype = {
                allow: function (b, c, d) {
                    if (!e(this, b, d)) return !1; var g, n; if ("string" == typeof b) b = f(b); else if (b instanceof CKEDITOR.style) {
                        if (b.toAllowedContentRules) return this.allow(b.toAllowedContentRules(this.editor), c, d); g = b.getDefinition(); b = {}; d = g.attributes; b[g.element] = g = { styles: g.styles, requiredStyles: g.styles && CKEDITOR.tools.object.keys(g.styles) };
                        d && (d = D(d), g.classes = d["class"] ? d["class"].split(/\s+/) : null, g.requiredClasses = g.classes, delete d["class"], g.attributes = d, g.requiredAttributes = d && CKEDITOR.tools.object.keys(d))
                    } else if (CKEDITOR.tools.isArray(b)) { for (g = 0; g < b.length; ++g)n = this.allow(b[g], c, d); return n } a(this, b, c, this.allowedContent, this._.allowedRules); return !0
                }, applyTo: function (a, b, c, e) {
                    if (this.disabled) return !1; var d = this, g = [], f = this.editor && this.editor.config.protectedSource, n, h = !1, x = { doFilter: !c, doTransform: !0, doCallbacks: !0, toHtml: b };
                    a.forEach(function (a) {
                        if (a.type == CKEDITOR.NODE_ELEMENT) { if ("off" == a.attributes["data-cke-filter"]) return !1; if (!b || "span" != a.name || !~CKEDITOR.tools.object.keys(a.attributes).join("|").indexOf("data-cke-")) if (n = y(d, a, g, x), n & 1) h = !0; else if (n & 2) return !1 } else if (a.type == CKEDITOR.NODE_COMMENT && a.value.match(/^\{cke_protected\}(?!\{C\})/)) {
                            var c; a: {
                                var e = decodeURIComponent(a.value.replace(/^\{cke_protected\}/, "")); c = []; var t, C, m; if (f) for (C = 0; C < f.length; ++C)if ((m = e.match(f[C])) && m[0].length == e.length) {
                                    c =
                                    !0; break a
                                } e = CKEDITOR.htmlParser.fragment.fromHtml(e); 1 == e.children.length && (t = e.children[0]).type == CKEDITOR.NODE_ELEMENT && y(d, t, c, x); c = !c.length
                            } c || g.push(a)
                        }
                    }, null, !0); g.length && (h = !0); var C; a = []; e = I[e || (this.editor ? this.editor.enterMode : CKEDITOR.ENTER_P)]; for (var D; c = g.pop();)c.type == CKEDITOR.NODE_ELEMENT ? G(c, e, a) : c.remove(); for (; C = a.pop();)if (c = C.el, c.parent) switch (D = t[c.parent.name] || t.span, C.check) {
                        case "it": t.$removeEmpty[c.name] && !c.children.length ? G(c, e, a) : m(c) || G(c, e, a); break; case "el-up": c.parent.type ==
                            CKEDITOR.NODE_DOCUMENT_FRAGMENT || D[c.name] || G(c, e, a); break; case "parent-down": c.parent.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT || D[c.name] || G(c.parent, e, a)
                    }return h
                }, checkFeature: function (a) { if (this.disabled || !a) return !0; a.toFeature && (a = a.toFeature(this.editor)); return !a.requiredContent || this.check(a.requiredContent) }, disable: function () { this.disabled = !0 }, disallow: function (b) { if (!e(this, b, !0)) return !1; "string" == typeof b && (b = f(b)); a(this, b, null, this.disallowedContent, this._.disallowedRules); return !0 },
                addContentForms: function (a) { if (!this.disabled && a) { var b, c, e = [], d; for (b = 0; b < a.length && !d; ++b)c = a[b], ("string" == typeof c || c instanceof CKEDITOR.style) && this.check(c) && (d = c); if (d) { for (b = 0; b < a.length; ++b)e.push(K(a[b], d)); this.addTransformations(e) } } }, addElementCallback: function (a) { this.elementCallbacks || (this.elementCallbacks = []); this.elementCallbacks.push(a) }, addFeature: function (a) {
                    if (this.disabled || !a) return !0; a.toFeature && (a = a.toFeature(this.editor)); this.allow(a.allowedContent, a.name); this.addTransformations(a.contentTransformations);
                    this.addContentForms(a.contentForms); return a.requiredContent && (this.customConfig || this.disallowedContent.length) ? this.check(a.requiredContent) : !0
                }, addTransformations: function (a) {
                    var b, c; if (!this.disabled && a) {
                        var e = this._.transformations, d; for (d = 0; d < a.length; ++d) {
                            b = a[d]; var g = void 0, f = void 0, n = void 0, t = void 0, h = void 0, x = void 0; c = []; for (f = 0; f < b.length; ++f)n = b[f], "string" == typeof n ? (n = n.split(/\s*:\s*/), t = n[0], h = null, x = n[1]) : (t = n.check, h = n.left, x = n.right), g || (g = n, g = g.element ? g.element : t ? t.match(/^([a-z0-9]+)/i)[0] :
                                g.left.getDefinition().element), h instanceof CKEDITOR.style && (h = E(h)), c.push({ check: t == g ? null : t, left: h, right: "string" == typeof x ? z(x) : x }); b = g; e[b] || (e[b] = []); e[b].push(c)
                        }
                    }
                }, check: function (a, b, c) {
                    if (this.disabled) return !0; if (CKEDITOR.tools.isArray(a)) { for (var e = a.length; e--;)if (this.check(a[e], b, c)) return !0; return !1 } var d, g; if ("string" == typeof a) {
                        g = a + "\x3c" + (!1 === b ? "0" : "1") + (c ? "1" : "0") + "\x3e"; if (g in this._.cachedChecks) return this._.cachedChecks[g]; d = f(a).$1; var n = d.styles, e = d.classes; d.name = d.elements;
                        d.classes = e = e ? e.split(/\s*,\s*/) : []; d.styles = q(n); d.attributes = q(d.attributes); d.children = []; e.length && (d.attributes["class"] = e.join(" ")); n && (d.attributes.style = CKEDITOR.tools.writeCssText(d.styles))
                    } else d = a.getDefinition(), n = d.styles, e = d.attributes || {}, n && !CKEDITOR.tools.isEmpty(n) ? (n = D(n), e.style = CKEDITOR.tools.writeCssText(n, !0)) : n = {}, d = { name: d.element, attributes: e, classes: e["class"] ? e["class"].split(/\s+/) : [], styles: n, children: [] }; var n = CKEDITOR.tools.clone(d), t = [], h; if (!1 !== b && (h = this._.transformations[d.name])) {
                        for (e =
                            0; e < h.length; ++e)p(this, d, h[e]); r(d)
                    } y(this, n, t, { doFilter: !0, doTransform: !1 !== b, skipRequired: !c, skipFinalValidation: !c }); 0 < t.length ? c = !1 : ((b = d.attributes["class"]) && (d.attributes["class"] = d.attributes["class"].split(" ").sort().join(" ")), c = CKEDITOR.tools.objectCompare(d.attributes, n.attributes, !0), b && (d.attributes["class"] = b)); "string" == typeof a && (this._.cachedChecks[g] = c); return c
                }, getAllowedEnterMode: function () {
                    var a = ["p", "div", "br"], b = { p: CKEDITOR.ENTER_P, div: CKEDITOR.ENTER_DIV, br: CKEDITOR.ENTER_BR };
                    return function (c, e) { var d = a.slice(), g; if (this.check(I[c])) return c; for (e || (d = d.reverse()); g = d.pop();)if (this.check(g)) return b[g]; return CKEDITOR.ENTER_BR }
                }(), clone: function () { var a = new CKEDITOR.filter, b = CKEDITOR.tools.clone; a.allowedContent = b(this.allowedContent); a._.allowedRules = b(this._.allowedRules); a.disallowedContent = b(this.disallowedContent); a._.disallowedRules = b(this._.disallowedRules); a._.transformations = b(this._.transformations); a.disabled = this.disabled; a.editor = this.editor; return a }, destroy: function () {
                    delete CKEDITOR.filter.instances[this.id];
                    delete this._; delete this.allowedContent; delete this.disallowedContent
                }
            }; var T = { styles: 1, attributes: 1, classes: 1 }, N = { styles: "requiredStyles", attributes: "requiredAttributes", classes: "requiredClasses" }, x = /^([a-z0-9\-*\s]+)((?:\s*\{[!\w\-,\s\*]+\}\s*|\s*\[[!\w\-,\s\*]+\]\s*|\s*\([!\w\-,\s\*]+\)\s*){0,3})(?:;\s*|$)/i, H = { styles: /{([^}]+)}/, attrs: /\[([^\]]+)\]/, classes: /\(([^\)]+)\)/ }, M = /^cke:(object|embed|param)$/, n = /^(object|embed|param)$/, A; A = CKEDITOR.filter.transformationsTools = {
                sizeToStyle: function (a) {
                    this.lengthToStyle(a,
                        "width"); this.lengthToStyle(a, "height")
                }, sizeToAttribute: function (a) { this.lengthToAttribute(a, "width"); this.lengthToAttribute(a, "height") }, lengthToStyle: function (a, b, c) { c = c || b; if (!(c in a.styles)) { var e = a.attributes[b]; e && (/^\d+$/.test(e) && (e += "px"), a.styles[c] = e) } delete a.attributes[b] }, lengthToAttribute: function (a, b, c) { c = c || b; if (!(c in a.attributes)) { var e = a.styles[b], d = e && e.match(/^(\d+)(?:\.\d*)?px$/); d ? a.attributes[c] = d[1] : "cke-test" == e && (a.attributes[c] = "cke-test") } delete a.styles[b] }, alignmentToStyle: function (a) {
                    if (!("float" in
                        a.styles)) { var b = a.attributes.align; if ("left" == b || "right" == b) a.styles["float"] = b } delete a.attributes.align
                }, alignmentToAttribute: function (a) { if (!("align" in a.attributes)) { var b = a.styles["float"]; if ("left" == b || "right" == b) a.attributes.align = b } delete a.styles["float"] }, splitBorderShorthand: function (a) {
                    if (a.styles.border) {
                        var b = CKEDITOR.tools.style.parse.border(a.styles.border); b.color && (a.styles["border-color"] = b.color); b.style && (a.styles["border-style"] = b.style); b.width && (a.styles["border-width"] = b.width);
                        delete a.styles.border
                    }
                }, listTypeToStyle: function (a) { if (a.attributes.type) switch (a.attributes.type) { case "a": a.styles["list-style-type"] = "lower-alpha"; break; case "A": a.styles["list-style-type"] = "upper-alpha"; break; case "i": a.styles["list-style-type"] = "lower-roman"; break; case "I": a.styles["list-style-type"] = "upper-roman"; break; case "1": a.styles["list-style-type"] = "decimal"; break; default: a.styles["list-style-type"] = a.attributes.type } }, splitMarginShorthand: function (a) {
                    function b(e) {
                        a.styles["margin-top"] =
                        c[e[0]]; a.styles["margin-right"] = c[e[1]]; a.styles["margin-bottom"] = c[e[2]]; a.styles["margin-left"] = c[e[3]]
                    } if (a.styles.margin) { var c = a.styles.margin.match(/(auto|0|(?:\-?[\.\d]+(?:\w+|%)))/g) || ["0px"]; switch (c.length) { case 1: b([0, 0, 0, 0]); break; case 2: b([0, 1, 0, 1]); break; case 3: b([0, 1, 2, 1]); break; case 4: b([0, 1, 2, 3]) }delete a.styles.margin }
                }, matchesStyle: u, transform: function (a, b) {
                    if ("string" == typeof b) a.name = b; else {
                        var c = b.getDefinition(), e = c.styles, d = c.attributes, g, f, n, t; a.name = c.element; for (g in d) if ("class" ==
                            g) for (c = a.classes.join("|"), n = d[g].split(/\s+/); t = n.pop();)-1 == c.indexOf(t) && a.classes.push(t); else a.attributes[g] = d[g]; for (f in e) a.styles[f] = e[f]
                    }
                }
            }
    })();
    (function () {
        CKEDITOR.focusManager = function (a) { if (a.focusManager) return a.focusManager; this.hasFocus = !1; this.currentActive = null; this._ = { editor: a }; return this }; CKEDITOR.focusManager._ = { blurDelay: 200 }; CKEDITOR.focusManager.prototype = {
            focus: function (a) { this._.timer && clearTimeout(this._.timer); a && (this.currentActive = a); this.hasFocus || this._.locked || ((a = CKEDITOR.currentInstance) && a.focusManager.blur(1), this.hasFocus = !0, (a = this._.editor.container) && a.addClass("cke_focus"), this._.editor.fire("focus")) }, lock: function () {
                this._.locked =
                1
            }, unlock: function () { delete this._.locked }, blur: function (a) { function d() { if (this.hasFocus) { this.hasFocus = !1; var a = this._.editor.container; a && a.removeClass("cke_focus"); this._.editor.fire("blur") } } if (!this._.locked) { this._.timer && clearTimeout(this._.timer); var b = CKEDITOR.focusManager._.blurDelay; a || !b ? d.call(this) : this._.timer = CKEDITOR.tools.setTimeout(function () { delete this._.timer; d.call(this) }, b, this) } }, add: function (a, d) {
                var b = a.getCustomData("focusmanager"); if (!b || b != this) {
                    b && b.remove(a); var b =
                        "focus", c = "blur"; d && (CKEDITOR.env.ie ? (b = "focusin", c = "focusout") : CKEDITOR.event.useCapture = 1); var g = { blur: function () { a.equals(this.currentActive) && this.blur() }, focus: function () { this.focus(a) } }; a.on(b, g.focus, this); a.on(c, g.blur, this); d && (CKEDITOR.event.useCapture = 0); a.setCustomData("focusmanager", this); a.setCustomData("focusmanager_handlers", g)
                }
            }, remove: function (a) {
                a.removeCustomData("focusmanager"); var d = a.removeCustomData("focusmanager_handlers"); a.removeListener("blur", d.blur); a.removeListener("focus",
                    d.focus)
            }
        }
    })(); CKEDITOR.keystrokeHandler = function (a) { if (a.keystrokeHandler) return a.keystrokeHandler; this.keystrokes = {}; this.blockedKeystrokes = {}; this._ = { editor: a }; return this };
    (function () { var a, d = function (b) { b = b.data; var d = b.getKeystroke(), e = this.keystrokes[d], h = this._.editor; a = !1 === h.fire("key", { keyCode: d, domEvent: b }); a || (e && (a = !1 !== h.execCommand(e, { from: "keystrokeHandler" })), a || (a = !!this.blockedKeystrokes[d])); a && b.preventDefault(!0); return !a }, b = function (b) { a && (a = !1, b.data.preventDefault(!0)) }; CKEDITOR.keystrokeHandler.prototype = { attach: function (a) { a.on("keydown", d, this); if (CKEDITOR.env.gecko && CKEDITOR.env.mac) a.on("keypress", b, this) } } })();
    (function () {
        CKEDITOR.lang = {
            languages: { af: 1, ar: 1, az: 1, bg: 1, bn: 1, bs: 1, ca: 1, cs: 1, cy: 1, da: 1, de: 1, "de-ch": 1, el: 1, "en-au": 1, "en-ca": 1, "en-gb": 1, en: 1, eo: 1, es: 1, "es-mx": 1, et: 1, eu: 1, fa: 1, fi: 1, fo: 1, "fr-ca": 1, fr: 1, gl: 1, gu: 1, he: 1, hi: 1, hr: 1, hu: 1, id: 1, is: 1, it: 1, ja: 1, ka: 1, km: 1, ko: 1, ku: 1, lt: 1, lv: 1, mk: 1, mn: 1, ms: 1, nb: 1, nl: 1, no: 1, oc: 1, pl: 1, "pt-br": 1, pt: 1, ro: 1, ru: 1, si: 1, sk: 1, sl: 1, sq: 1, "sr-latn": 1, sr: 1, sv: 1, th: 1, tr: 1, tt: 1, ug: 1, uk: 1, vi: 1, "zh-cn": 1, zh: 1 }, rtl: { ar: 1, fa: 1, he: 1, ku: 1, ug: 1 }, load: function (a, d, b) {
                a && CKEDITOR.lang.languages[a] ||
                (a = this.detect(d, a)); var c = this; d = function () { c[a].dir = c.rtl[a] ? "rtl" : "ltr"; b(a, c[a]) }; this[a] ? d() : CKEDITOR.scriptLoader.load(CKEDITOR.getUrl("lang/" + a + ".js"), d, this)
            }, detect: function (a, d) { var b = this.languages; d = d || navigator.userLanguage || navigator.language || a; var c = d.toLowerCase().match(/([a-z]+)(?:-([a-z]+))?/), g = c[1], c = c[2]; b[g + "-" + c] ? g = g + "-" + c : b[g] || (g = null); CKEDITOR.lang.detect = g ? function () { return g } : function (a) { return a }; return g || a }
        }
    })();
    CKEDITOR.scriptLoader = function () {
        var a = {}, d = {}; return {
            load: function (b, c, g, e) {
                var h = "string" == typeof b; h && (b = [b]); g || (g = CKEDITOR); var k = b.length, l = k, q = [], f = [], w = function (a) { c && (h ? c.call(g, a) : c.call(g, q, f)) }; if (0 === l) w(!0); else {
                    var B = function (a, b) { (b ? q : f).push(a); 0 >= --l && (e && CKEDITOR.document.getDocumentElement().removeStyle("cursor"), w(b)) }, y = function (b, c) { a[b] = 1; var e = d[b]; delete d[b]; for (var g = 0; g < e.length; g++)e[g](b, c) }, F = function (b) {
                        if (a[b]) B(b, !0); else {
                            var e = d[b] || (d[b] = []); e.push(B); if (!(1 < e.length)) {
                                var g =
                                    new CKEDITOR.dom.element("script"); g.setAttributes({ type: "text/javascript", src: b }); c && (CKEDITOR.env.ie && (8 >= CKEDITOR.env.version || CKEDITOR.env.ie9Compat) ? g.$.onreadystatechange = function () { if ("loaded" == g.$.readyState || "complete" == g.$.readyState) g.$.onreadystatechange = null, y(b, !0) } : (g.$.onload = function () { setTimeout(function () { g.$.onload = null; g.$.onerror = null; y(b, !0) }, 0) }, g.$.onerror = function () { g.$.onload = null; g.$.onerror = null; y(b, !1) })); g.appendTo(CKEDITOR.document.getHead())
                            }
                        }
                    }; e && CKEDITOR.document.getDocumentElement().setStyle("cursor",
                        "wait"); for (var r = 0; r < k; r++)F(b[r])
                }
            }, queue: function () { function a() { var b; (b = c[0]) && this.load(b.scriptUrl, b.callback, CKEDITOR, 0) } var c = []; return function (d, e) { var h = this; c.push({ scriptUrl: d, callback: function () { e && e.apply(this, arguments); c.shift(); a.call(h) } }); 1 == c.length && a.call(this) } }()
        }
    }(); CKEDITOR.resourceManager = function (a, d) { this.basePath = a; this.fileName = d; this.registered = {}; this.loaded = {}; this.externals = {}; this._ = { waitingList: {} } };
    CKEDITOR.resourceManager.prototype = {
        add: function (a, d) { if (this.registered[a]) throw Error('[CKEDITOR.resourceManager.add] The resource name "' + a + '" is already registered.'); var b = this.registered[a] = d || {}; b.name = a; b.path = this.getPath(a); CKEDITOR.fire(a + CKEDITOR.tools.capitalize(this.fileName) + "Ready", b); return this.get(a) }, get: function (a) { return this.registered[a] || null }, getPath: function (a) { var d = this.externals[a]; return CKEDITOR.getUrl(d && d.dir || this.basePath + a + "/") }, getFilePath: function (a) {
            var d = this.externals[a];
            return CKEDITOR.getUrl(this.getPath(a) + (d ? d.file : this.fileName + ".js"))
        }, addExternal: function (a, d, b) { b || (d = d.replace(/[^\/]+$/, function (a) { b = a; return "" })); b = b || this.fileName + ".js"; a = a.split(","); for (var c = 0; c < a.length; c++)this.externals[a[c]] = { dir: d, file: b } }, load: function (a, d, b) {
            CKEDITOR.tools.isArray(a) || (a = a ? [a] : []); for (var c = this.loaded, g = this.registered, e = [], h = {}, k = {}, l = 0; l < a.length; l++) { var q = a[l]; if (q) if (c[q] || g[q]) k[q] = this.get(q); else { var f = this.getFilePath(q); e.push(f); f in h || (h[f] = []); h[f].push(q) } } CKEDITOR.scriptLoader.load(e,
                function (a, e) { if (e.length) throw Error('[CKEDITOR.resourceManager.load] Resource name "' + h[e[0]].join(",") + '" was not found at "' + e[0] + '".'); for (var g = 0; g < a.length; g++)for (var f = h[a[g]], l = 0; l < f.length; l++) { var m = f[l]; k[m] = this.get(m); c[m] = 1 } d.call(b, k) }, this)
        }
    }; CKEDITOR.plugins = new CKEDITOR.resourceManager("plugins/", "plugin");
    CKEDITOR.plugins.load = CKEDITOR.tools.override(CKEDITOR.plugins.load, function (a) {
        var d = {}; return function (b, c, g) {
            var e = {}, h = function (b) {
                a.call(this, b, function (a) {
                    CKEDITOR.tools.extend(e, a); var b = [], f; for (f in a) {
                        var k = a[f], B = k && k.requires; if (!d[f]) { if (k.icons) for (var y = k.icons.split(","), F = y.length; F--;)CKEDITOR.skin.addIcon(y[F], k.path + "icons/" + (CKEDITOR.env.hidpi && k.hidpi ? "hidpi/" : "") + y[F] + ".png"); k.isSupportedEnvironment = k.isSupportedEnvironment || function () { return !0 }; d[f] = 1 } if (B) for (B.split && (B =
                            B.split(",")), k = 0; k < B.length; k++)e[B[k]] || b.push(B[k])
                    } if (b.length) h.call(this, b); else { for (f in e) k = e[f], k.onLoad && !k.onLoad._called && (!1 === k.onLoad() && delete e[f], k.onLoad._called = 1); c && c.call(g || window, e) }
                }, this)
            }; h.call(this, b)
        }
    }); CKEDITOR.plugins.setLang = function (a, d, b) { var c = this.get(a); a = c.langEntries || (c.langEntries = {}); c = c.lang || (c.lang = []); c.split && (c = c.split(",")); -1 == CKEDITOR.tools.indexOf(c, d) && c.push(d); a[d] = b };
    CKEDITOR.ui = function (a) { if (a.ui) return a.ui; this.items = {}; this.instances = {}; this.editor = a; this._ = { handlers: {} }; return this };
    CKEDITOR.ui.prototype = {
        add: function (a, d, b) { b.name = a.toLowerCase(); var c = this.items[a] = { type: d, command: b.command || null, args: Array.prototype.slice.call(arguments, 2) }; CKEDITOR.tools.extend(c, b) }, get: function (a) { return this.instances[a] }, create: function (a) { var d = this.items[a], b = d && this._.handlers[d.type], c = d && d.command && this.editor.getCommand(d.command), b = b && b.create.apply(this, d.args); this.instances[a] = b; c && c.uiItems.push(b); b && !b.type && (b.type = d.type); return b }, addHandler: function (a, d) {
            this._.handlers[a] =
            d
        }, space: function (a) { return CKEDITOR.document.getById(this.spaceId(a)) }, spaceId: function (a) { return this.editor.id + "_" + a }
    }; CKEDITOR.event.implementOn(CKEDITOR.ui);
    (function () {
        function a(a, g, f) {
            CKEDITOR.event.call(this); a = a && CKEDITOR.tools.clone(a); if (void 0 !== g) {
                if (!(g instanceof CKEDITOR.dom.element)) throw Error("Expect element of type CKEDITOR.dom.element."); if (!f) throw Error("One of the element modes must be specified."); if (CKEDITOR.env.ie && CKEDITOR.env.quirks && f == CKEDITOR.ELEMENT_MODE_INLINE) throw Error("Inline element mode is not supported on IE quirks."); if (!b(g, f)) throw Error('The specified element mode is not supported on element: "' + g.getName() + '".');
                this.element = g; this.elementMode = f; this.name = this.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO && (g.getId() || g.getNameAtt())
            } else this.elementMode = CKEDITOR.ELEMENT_MODE_NONE; this._ = {}; this.commands = {}; this.templates = {}; this.name = this.name || d(); this.id = CKEDITOR.tools.getNextId(); this.status = "unloaded"; this.config = CKEDITOR.tools.prototypedCopy(CKEDITOR.config); this.ui = new CKEDITOR.ui(this); this.focusManager = new CKEDITOR.focusManager(this); this.keystrokeHandler = new CKEDITOR.keystrokeHandler(this); this.on("readOnly",
                c); this.on("selectionChange", function (a) { e(this, a.data.path) }); this.on("activeFilterChange", function () { e(this, this.elementPath(), !0) }); this.on("mode", c); CKEDITOR.dom.selection.setupEditorOptimization(this); this.on("instanceReady", function () { if (this.config.startupFocus) { if ("end" === this.config.startupFocus) { var a = this.createRange(); a.selectNodeContents(this.editable()); a.shrink(CKEDITOR.SHRINK_ELEMENT, !0); a.collapse(); this.getSelection().selectRanges([a]) } this.focus() } }); CKEDITOR.fire("instanceCreated",
                    null, this); CKEDITOR.add(this); CKEDITOR.tools.setTimeout(function () { this.isDestroyed() || this.isDetached() || k(this, a) }, 0, this)
        } function d() { do var a = "editor" + ++F; while (CKEDITOR.instances[a]); return a } function b(a, b) { return b == CKEDITOR.ELEMENT_MODE_INLINE ? a.is(CKEDITOR.dtd.$editable) || a.is("textarea") : b == CKEDITOR.ELEMENT_MODE_REPLACE ? !a.is(CKEDITOR.dtd.$nonBodyContent) : 1 } function c() { var a = this.commands, b; for (b in a) g(this, a[b]) } function g(a, b) {
            b[b.startDisabled ? "disable" : a.readOnly && !b.readOnly ? "disable" :
                b.modes[a.mode] ? "enable" : "disable"]()
        } function e(a, b, c) { if (b) { var e, d, g = a.commands; for (d in g) e = g[d], (c || e.contextSensitive) && e.refresh(a, b) } } function h(a) { var b = a.config.customConfig; if (!b) return !1; var b = CKEDITOR.getUrl(b), c = r[b] || (r[b] = {}); c.fn ? (c.fn.call(a, a.config), CKEDITOR.getUrl(a.config.customConfig) != b && h(a) || a.fireOnce("customConfigLoaded")) : CKEDITOR.scriptLoader.queue(b, function () { c.fn = c.fn || CKEDITOR.editorConfig || function () { }; h(a) }); return !0 } function k(a, b) {
            a.on("customConfigLoaded", function () {
                if (b) {
                    if (b.on) for (var c in b.on) a.on(c,
                        b.on[c]); CKEDITOR.tools.extend(a.config, b, !0); delete a.config.on
                } c = a.config; a.readOnly = c.readOnly ? !0 : a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? a.element.is("textarea") ? a.element.hasAttribute("disabled") || a.element.hasAttribute("readonly") : a.element.isReadOnly() : a.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE ? a.element.hasAttribute("disabled") || a.element.hasAttribute("readonly") : !1; a.blockless = a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? !(a.element.is("textarea") || CKEDITOR.dtd[a.element.getName()].p) :
                    !1; a.tabIndex = c.tabIndex || a.element && a.element.getAttribute("tabindex") || 0; a.activeEnterMode = a.enterMode = a.blockless ? CKEDITOR.ENTER_BR : c.enterMode; a.activeShiftEnterMode = a.shiftEnterMode = a.blockless ? CKEDITOR.ENTER_BR : c.shiftEnterMode; c.skin && (CKEDITOR.skinName = c.skin); a.fireOnce("configLoaded"); a.dataProcessor = new CKEDITOR.htmlDataProcessor(a); a.filter = a.activeFilter = new CKEDITOR.filter(a); l(a)
            }); b && null != b.customConfig && (a.config.customConfig = b.customConfig); h(a) || a.fireOnce("customConfigLoaded")
        }
        function l(a) { CKEDITOR.skin.loadPart("editor", function () { q(a) }) } function q(a) {
            CKEDITOR.lang.load(a.config.language, a.config.defaultLanguage, function (b, c) {
                var e = a.config.title, d = a.config.applicationTitle; a.langCode = b; a.lang = CKEDITOR.tools.prototypedCopy(c); a.title = "string" == typeof e || !1 === e ? e : [a.lang.editor, a.name].join(", "); a.applicationTitle = "string" == typeof d || !1 === d ? d : [a.lang.application, a.name].join(", "); a.config.contentsLangDirection || (a.config.contentsLangDirection = a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ?
                    a.element.getDirection(1) : a.lang.dir); a.fire("langLoaded"); f(a)
            })
        } function f(a) { a.getStylesSet(function (b) { a.once("loaded", function () { a.fire("stylesSet", { styles: b }) }, null, null, 1); w(a) }) } function w(a) {
            function b(a) { if (!a) return ""; CKEDITOR.tools.isArray(a) && (a = a.join(",")); return a.replace(/\s/g, "") } var c = a.config, e = b(c.plugins), d = b(c.extraPlugins), g = b(c.removePlugins); if (d) var f = new RegExp("(?:^|,)(?:" + d.replace(/,/g, "|") + ")(?\x3d,|$)", "g"), e = e.replace(f, ""), e = e + ("," + d); if (g) var h = new RegExp("(?:^|,)(?:" +
                g.replace(/,/g, "|") + ")(?\x3d,|$)", "g"), e = e.replace(h, ""); CKEDITOR.env.air && (e += ",adobeair"); CKEDITOR.plugins.load(e.split(","), function (b) {
                    var e = [], d = [], g = []; a.plugins = CKEDITOR.tools.extend({}, a.plugins, b); for (var f in b) {
                        var k = b[f], l = k.lang, N = null, x = k.requires, H; CKEDITOR.tools.isArray(x) && (x = x.join(",")); if (x && (H = x.match(h))) for (; x = H.pop();)CKEDITOR.error("editor-plugin-required", { plugin: x.replace(",", ""), requiredBy: f }); l && !a.lang[f] && (l.split && (l = l.split(",")), 0 <= CKEDITOR.tools.indexOf(l, a.langCode) ?
                            N = a.langCode : (N = a.langCode.replace(/-.*/, ""), N = N != a.langCode && 0 <= CKEDITOR.tools.indexOf(l, N) ? N : 0 <= CKEDITOR.tools.indexOf(l, "en") ? "en" : l[0]), k.langEntries && k.langEntries[N] ? (a.lang[f] = k.langEntries[N], N = null) : g.push(CKEDITOR.getUrl(k.path + "lang/" + N + ".js"))); d.push(N); e.push(k)
                    } CKEDITOR.scriptLoader.load(g, function () {
                        if (!a.isDestroyed() && !a.isDetached()) {
                            for (var b = ["beforeInit", "init", "afterInit"], g = 0; g < b.length; g++)for (var f = 0; f < e.length; f++) {
                                var h = e[f]; 0 === g && d[f] && h.lang && h.langEntries && (a.lang[h.name] =
                                    h.langEntries[d[f]]); if (h[b[g]]) h[b[g]](a)
                            } a.fireOnce("pluginsLoaded"); c.keystrokes && a.setKeystroke(a.config.keystrokes); for (f = 0; f < a.config.blockedKeystrokes.length; f++)a.keystrokeHandler.blockedKeystrokes[a.config.blockedKeystrokes[f]] = 1; a.status = "loaded"; a.fireOnce("loaded"); CKEDITOR.fire("instanceLoaded", null, a)
                        }
                    })
                })
        } function B() {
            var a = this.element; if (a && this.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO) {
                var b = this.getData(); this.config.htmlEncodeOutput && (b = CKEDITOR.tools.htmlEncode(b)); a.is("textarea") ?
                    a.setValue(b) : a.setHtml(b); return !0
            } return !1
        } function y(a, b) {
            function c(a) { var b = a.startContainer, e = a.endContainer, d = b.is && b.is("tr"), g = b.is && b.is("td"); a = g && b.equals(e) && a.endOffset === b.getChildCount(); b = g && 1 === b.getChildCount() && "img" === b.getChildren().getItem(0).getName(); return d || a && !b ? !0 : !1 } function e(a) { var b = a.startContainer; return b.is("tr") ? a.cloneContents() : b.clone(!0) } for (var d = new CKEDITOR.dom.documentFragment, g, f, h, k = 0; k < a.length; k++) {
                var z = a[k], t = z.startContainer.getAscendant("tr",
                    !0); c(z) ? (g || (g = t.getAscendant("table").clone(), g.append(t.getAscendant({ thead: 1, tbody: 1, tfoot: 1 }).clone()), d.append(g), g = g.findOne("thead, tbody, tfoot")), f && f.equals(t) || (f = t, h = t.clone(), g.append(h)), h.append(e(z))) : d.append(z.cloneContents())
            } return g ? d : b.getHtmlFromRange(a[0])
        } a.prototype = CKEDITOR.editor.prototype; CKEDITOR.editor = a; var F = 0, r = {}; CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
            plugins: {
                detectConflict: function (a, b) {
                    for (var c = 0; c < b.length; c++) {
                        var e = b[c]; if (this[e]) return CKEDITOR.warn("editor-plugin-conflict",
                            { plugin: a, replacedWith: e }), !0
                    } return !1
                }
            }, addCommand: function (a, b) { b.name = a.toLowerCase(); var c = b instanceof CKEDITOR.command ? b : new CKEDITOR.command(this, b); this.mode && g(this, c); return this.commands[a] = c }, _attachToForm: function () {
                function a(b) { c.updateElement(); c._.required && !e.getValue() && !1 === c.fire("required") && b.data.preventDefault() } function b(a) { return !!(a && a.call && a.apply) } var c = this, e = c.element, d = new CKEDITOR.dom.element(e.$.form); e.is("textarea") && d && (d.on("submit", a), b(d.$.submit) && (d.$.submit =
                    CKEDITOR.tools.override(d.$.submit, function (b) { return function () { a(); b.apply ? b.apply(this) : b() } })), c.on("destroy", function () { d.removeListener("submit", a) }))
            }, destroy: function (a) {
                var b = CKEDITOR.filter.instances, c = this; this.fire("beforeDestroy"); !a && B.call(this); this.editable(null); this.filter && delete this.filter; CKEDITOR.tools.array.forEach(CKEDITOR.tools.object.keys(b), function (a) { a = b[a]; c === a.editor && a.destroy() }); delete this.activeFilter; this.status = "destroyed"; this.fire("destroy"); this.removeAllListeners();
                CKEDITOR.remove(this); CKEDITOR.fire("instanceDestroyed", null, this)
            }, elementPath: function (a) { if (!a) { a = this.getSelection(); if (!a) return null; a = a.getStartElement() } return a ? new CKEDITOR.dom.elementPath(a, this.editable()) : null }, createRange: function () { var a = this.editable(); return a ? new CKEDITOR.dom.range(a) : null }, execCommand: function (a, b) {
                var c = this.getCommand(a), e = { name: a, commandData: b || {}, command: c }; return c && c.state != CKEDITOR.TRISTATE_DISABLED && !1 !== this.fire("beforeCommandExec", e) && (e.returnValue =
                    c.exec(e.commandData), !c.async && !1 !== this.fire("afterCommandExec", e)) ? e.returnValue : !1
            }, getCommand: function (a) { return this.commands[a] }, getData: function (a) { !a && this.fire("beforeGetData"); var b = this._.data; "string" != typeof b && (b = (b = this.element) && this.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE ? b.is("textarea") ? b.getValue() : b.getHtml() : ""); b = { dataValue: b }; !a && this.fire("getData", b); return b.dataValue }, getSnapshot: function () {
                var a = this.fire("getSnapshot"); "string" != typeof a && (a = (a = this.element) && this.elementMode ==
                    CKEDITOR.ELEMENT_MODE_REPLACE ? a.is("textarea") ? a.getValue() : a.getHtml() : ""); return a
            }, loadSnapshot: function (a) { this.fire("loadSnapshot", a) }, setData: function (a, b, c) { var e = !0, d = b; b && "object" == typeof b && (c = b.internal, d = b.callback, e = !b.noSnapshot); !c && e && this.fire("saveSnapshot"); if (d || !c) this.once("dataReady", function (a) { !c && e && this.fire("saveSnapshot"); d && d.call(a.editor) }); a = { dataValue: a }; !c && this.fire("setData", a); this._.data = a.dataValue; !c && this.fire("afterSetData", a) }, setReadOnly: function (a) {
                a =
                null == a || a; this.readOnly != a && (this.readOnly = a, this.keystrokeHandler.blockedKeystrokes[8] = +a, this.editable().setReadOnly(a), this.fire("readOnly"))
            }, insertHtml: function (a, b, c) { this.fire("insertHtml", { dataValue: a, mode: b, range: c }) }, insertText: function (a) { this.fire("insertText", a) }, insertElement: function (a) { this.fire("insertElement", a) }, getSelectedHtml: function (a) { var b = this.editable(), c = this.getSelection(), c = c && c.getRanges(); if (!b || !c || 0 === c.length) return null; b = y(c, b); return a ? b.getHtml() : b }, extractSelectedHtml: function (a,
                b) { var c = this.editable(), e = this.getSelection().getRanges(), d = new CKEDITOR.dom.documentFragment, g; if (!c || 0 === e.length) return null; for (g = 0; g < e.length; g++)d.append(c.extractHtmlFromRange(e[g], b)); b || this.getSelection().selectRanges([e[0]]); return a ? d.getHtml() : d }, focus: function () { this.fire("beforeFocus") }, checkDirty: function () { return "ready" == this.status && this._.previousValue !== this.getSnapshot() }, resetDirty: function () { this._.previousValue = this.getSnapshot() }, updateElement: function () { return B.call(this) },
            setKeystroke: function () { for (var a = this.keystrokeHandler.keystrokes, b = CKEDITOR.tools.isArray(arguments[0]) ? arguments[0] : [[].slice.call(arguments, 0)], c, e, d = b.length; d--;)c = b[d], e = 0, CKEDITOR.tools.isArray(c) && (e = c[1], c = c[0]), e ? a[c] = e : delete a[c] }, getCommandKeystroke: function (a, b) {
                var c = "string" === typeof a ? this.getCommand(a) : a, e = []; if (c) { var d = CKEDITOR.tools.object.findKey(this.commands, c), g = this.keystrokeHandler.keystrokes; if (c.fakeKeystroke) e.push(c.fakeKeystroke); else for (var f in g) g[f] === d && e.push(f) } return b ?
                    e : e[0] || null
            }, addFeature: function (a) { return this.filter.addFeature(a) }, setActiveFilter: function (a) { a || (a = this.filter); this.activeFilter !== a && (this.activeFilter = a, this.fire("activeFilterChange"), a === this.filter ? this.setActiveEnterMode(null, null) : this.setActiveEnterMode(a.getAllowedEnterMode(this.enterMode), a.getAllowedEnterMode(this.shiftEnterMode, !0))) }, setActiveEnterMode: function (a, b) {
                a = a ? this.blockless ? CKEDITOR.ENTER_BR : a : this.enterMode; b = b ? this.blockless ? CKEDITOR.ENTER_BR : b : this.shiftEnterMode;
                if (this.activeEnterMode != a || this.activeShiftEnterMode != b) this.activeEnterMode = a, this.activeShiftEnterMode = b, this.fire("activeEnterModeChange")
            }, showNotification: function (a) { alert(a) }, isDetached: function () { return !!this.container && this.container.isDetached() }, isDestroyed: function () { return "destroyed" === this.status }
        }); CKEDITOR.editor._getEditorElement = function (a) {
            if (!CKEDITOR.env.isCompatible) return null; var b = CKEDITOR.dom.element.get(a); return b ? b.getEditor() ? (CKEDITOR.error("editor-element-conflict",
                { editorName: b.getEditor().name }), null) : b : (CKEDITOR.error("editor-incorrect-element", { element: a }), null)
        }; CKEDITOR.editor.initializeDelayedEditorCreation = function (a, b, c) {
            if (b.delayIfDetached_callback) return CKEDITOR.warn("editor-delayed-creation", { method: "callback" }), b.delayIfDetached_callback(function () { CKEDITOR[c](a, b); CKEDITOR.warn("editor-delayed-creation-success", { method: "callback" }) }), null; var e = void 0 === b.delayIfDetached_interval ? CKEDITOR.config.delayIfDetached_interval : b.delayIfDetached_interval;
            CKEDITOR.warn("editor-delayed-creation", { method: "interval - " + e + " ms" }); var d = setInterval(function () { a.isDetached() || (clearInterval(d), CKEDITOR[c](a, b), CKEDITOR.warn("editor-delayed-creation-success", { method: "interval - " + e + " ms" })) }, e); return function () { clearInterval(d) }
        }; CKEDITOR.editor.shouldDelayEditorCreation = function (a, b) { CKEDITOR.editor.mergeDelayedCreationConfigs(b); return b && b.delayIfDetached && a.isDetached() }; CKEDITOR.editor.mergeDelayedCreationConfigs = function (a) {
            a && (a.delayIfDetached = "boolean" ===
                typeof a.delayIfDetached ? a.delayIfDetached : CKEDITOR.config.delayIfDetached, a.delayIfDetached_interval = isNaN(a.delayIfDetached_interval) ? CKEDITOR.config.delayIfDetached_interval : a.delayIfDetached_interval, a.delayIfDetached_callback = a.delayIfDetached_callback || CKEDITOR.config.delayIfDetached_callback)
        }
    })(); CKEDITOR.ELEMENT_MODE_NONE = 0; CKEDITOR.ELEMENT_MODE_REPLACE = 1; CKEDITOR.ELEMENT_MODE_APPENDTO = 2; CKEDITOR.ELEMENT_MODE_INLINE = 3; CKEDITOR.config.delayIfDetached = !1;
    CKEDITOR.config.delayIfDetached_callback = void 0; CKEDITOR.config.delayIfDetached_interval = 50; CKEDITOR.htmlParser = function () { this._ = { htmlPartsRegex: /<(?:(?:\/([^>]+)>)|(?:!--([\S|\s]*?)--!?>)|(?:([^\/\s>]+)((?:\s+[\w\-:.]+(?:\s*=\s*?(?:(?:"[^"]*")|(?:'[^']*')|[^\s"'\/>]+))?)*)[\S\s]*?(\/?)>))/g } };
    (function () {
        var a = /([\w\-:.]+)(?:(?:\s*=\s*(?:(?:"([^"]*)")|(?:'([^']*)')|([^\s>]+)))|(?=\s|$))/g, d = { checked: 1, compact: 1, declare: 1, defer: 1, disabled: 1, ismap: 1, multiple: 1, nohref: 1, noresize: 1, noshade: 1, nowrap: 1, readonly: 1, selected: 1 }; CKEDITOR.htmlParser.prototype = {
            onTagOpen: function () { }, onTagClose: function () { }, onText: function () { }, onCDATA: function () { }, onComment: function () { }, parse: function (b) {
                for (var c, g, e = 0, h; c = this._.htmlPartsRegex.exec(b);) {
                    g = c.index; g > e && (e = b.substring(e, g), this.onText(e)); e = this._.htmlPartsRegex.lastIndex;
                    if (g = c[1]) if (g = g.toLowerCase(), h && CKEDITOR.dtd.$cdata[g] && (this.onCDATA(h), h = null), !h) { this.onTagClose(g); continue } if (g = c[3]) {
                        if (g = g.toLowerCase(), !/="/.test(g)) {
                            var k = {}, l, q = c[4]; c = !!c[5]; if (q) for (; l = a.exec(q);) { var f = l[1].toLowerCase(); l = l[2] || l[3] || l[4] || ""; k[f] = !l && d[f] ? f : CKEDITOR.tools.htmlDecodeAttr(l) } this.onTagOpen(g, k, c); CKEDITOR.dtd.$cdata[g] && (g = new RegExp("\x3c/" + g + "\x3e", "i"), h = b.substring(e), g = h.search(g), -1 === g && (g = h.length), h = h.substring(0, g), this._.htmlPartsRegex.lastIndex = e + h.length,
                                e = this._.htmlPartsRegex.lastIndex)
                        }
                    } else if (g = c[2]) this.onComment(g)
                } if (b.length > e) this.onText(b.substring(e, b.length))
            }
        }
    })();
    CKEDITOR.htmlParser.basicWriter = CKEDITOR.tools.createClass({
        $: function () { this._ = { output: [] } }, proto: {
            openTag: function (a) { this._.output.push("\x3c", a) }, openTagClose: function (a, d) { d ? this._.output.push(" /\x3e") : this._.output.push("\x3e") }, attribute: function (a, d) { "string" == typeof d && (d = CKEDITOR.tools.htmlEncodeAttr(d)); this._.output.push(" ", a, '\x3d"', d, '"') }, closeTag: function (a) { this._.output.push("\x3c/", a, "\x3e") }, text: function (a) { this._.output.push(a) }, comment: function (a) {
                this._.output.push("\x3c!--",
                    a, "--\x3e")
            }, write: function (a) { this._.output.push(a) }, reset: function () { this._.output = []; this._.indent = !1 }, getHtml: function (a) { var d = this._.output.join(""); a && this.reset(); return d }
        }
    }); "use strict";
    (function () {
        CKEDITOR.htmlParser.node = function () { }; CKEDITOR.htmlParser.node.prototype = {
            remove: function () { var a = this.parent.children, d = CKEDITOR.tools.indexOf(a, this), b = this.previous, c = this.next; b && (b.next = c); c && (c.previous = b); a.splice(d, 1); this.parent = null }, replaceWith: function (a) { var d = this.parent.children, b = CKEDITOR.tools.indexOf(d, this), c = a.previous = this.previous, g = a.next = this.next; c && (c.next = a); g && (g.previous = a); d[b] = a; a.parent = this.parent; this.parent = null }, insertAfter: function (a) {
                var d = a.parent.children,
                b = CKEDITOR.tools.indexOf(d, a), c = a.next; d.splice(b + 1, 0, this); this.next = a.next; this.previous = a; a.next = this; c && (c.previous = this); this.parent = a.parent
            }, insertBefore: function (a) { var d = a.parent.children, b = CKEDITOR.tools.indexOf(d, a); d.splice(b, 0, this); this.next = a; (this.previous = a.previous) && (a.previous.next = this); a.previous = this; this.parent = a.parent }, getAscendant: function (a) {
                var d = "function" == typeof a ? a : "string" == typeof a ? function (b) { return b.name == a } : function (b) { return b.name in a }, b = this.parent; for (; b &&
                    b.type == CKEDITOR.NODE_ELEMENT;) { if (d(b)) return b; b = b.parent } return null
            }, wrapWith: function (a) { this.replaceWith(a); a.add(this); return a }, getIndex: function () { return CKEDITOR.tools.indexOf(this.parent.children, this) }, getFilterContext: function (a) { return a || {} }
        }
    })(); "use strict"; CKEDITOR.htmlParser.comment = function (a) { this.value = a; this._ = { isBlockLike: !1 } };
    CKEDITOR.htmlParser.comment.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, { type: CKEDITOR.NODE_COMMENT, filter: function (a, d) { var b = this.value; if (!(b = a.onComment(d, b, this))) return this.remove(), !1; if ("string" != typeof b) return this.replaceWith(b), !1; this.value = b; return !0 }, writeHtml: function (a, d) { d && this.filter(d); a.comment(this.value) } }); "use strict";
    (function () { CKEDITOR.htmlParser.text = function (a) { this.value = a; this._ = { isBlockLike: !1 } }; CKEDITOR.htmlParser.text.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, { type: CKEDITOR.NODE_TEXT, filter: function (a, d) { if (!(this.value = a.onText(d, this.value, this))) return this.remove(), !1 }, writeHtml: function (a, d) { d && this.filter(d); a.text(this.value) } }) })(); "use strict";
    (function () { CKEDITOR.htmlParser.cdata = function (a) { this.value = a }; CKEDITOR.htmlParser.cdata.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, { type: CKEDITOR.NODE_TEXT, filter: function (a) { var d = this.getAscendant("style"); if (d && d.getAscendant({ math: 1, svg: 1 })) { var d = CKEDITOR.htmlParser.fragment.fromHtml(this.value), b = new CKEDITOR.htmlParser.basicWriter; a.applyTo(d); d.writeHtml(b); this.value = b.getHtml() } }, writeHtml: function (a) { a.write(this.value) } }) })(); "use strict";
    CKEDITOR.htmlParser.fragment = function () { this.children = []; this.parent = null; this._ = { isBlockLike: !0, hasInlineStarted: !1 } };
    (function () {
        function a(a) { return a.attributes["data-cke-survive"] ? !1 : "a" == a.name && a.attributes.href || CKEDITOR.dtd.$removeEmpty[a.name] } var d = CKEDITOR.tools.extend({ table: 1, ul: 1, ol: 1, dl: 1 }, CKEDITOR.dtd.table, CKEDITOR.dtd.ul, CKEDITOR.dtd.ol, CKEDITOR.dtd.dl), b = { ol: 1, ul: 1 }, c = CKEDITOR.tools.extend({}, { html: 1 }, CKEDITOR.dtd.html, CKEDITOR.dtd.body, CKEDITOR.dtd.head, { style: 1, script: 1 }), g = { ul: "li", ol: "li", dl: "dd", table: "tbody", tbody: "tr", thead: "tr", tfoot: "tr", tr: "td" }; CKEDITOR.htmlParser.fragment.fromHtml =
            function (e, h, k) {
                function l(a) { var b; if (0 < m.length) for (var c = 0; c < m.length; c++) { var e = m[c], d = e.name, g = CKEDITOR.dtd[d], f = v.name && CKEDITOR.dtd[v.name]; f && !f[d] || a && g && !g[a] && CKEDITOR.dtd[a] ? d == v.name && (w(v, v.parent, 1), c--) : (b || (q(), b = 1), e = e.clone(), e.parent = v, v = e, m.splice(c, 1), c--) } } function q() { for (; L.length;)w(L.shift(), v) } function f(a) {
                    if (a._.isBlockLike && "pre" != a.name && "textarea" != a.name) {
                        var b = a.children.length, c = a.children[b - 1], e; c && c.type == CKEDITOR.NODE_TEXT && ((e = CKEDITOR.tools.rtrim(c.value)) ?
                            c.value = e : a.children.length = b - 1)
                    }
                } function w(b, c, e) { c = c || v || r; var d = v; void 0 === b.previous && (B(c, b) && (v = c, F.onTagOpen(k, {}), b.returnPoint = c = v), f(b), a(b) && !b.children.length || c.add(b), "pre" == b.name && (G = !1), "textarea" == b.name && (J = !1)); b.returnPoint ? (v = b.returnPoint, delete b.returnPoint) : v = e ? c : d } function B(a, b) {
                    if ((a == r || "body" == a.name) && k && (!a.name || CKEDITOR.dtd[a.name][k])) {
                        var c, e; return (c = b.attributes && (e = b.attributes["data-cke-real-element-type"]) ? e : b.name) && c in CKEDITOR.dtd.$inline && !(c in CKEDITOR.dtd.head) &&
                            !b.isOrphan || b.type == CKEDITOR.NODE_TEXT
                    }
                } function y(a, b) { return a in CKEDITOR.dtd.$listItem || a in CKEDITOR.dtd.$tableContent ? a == b || "dt" == a && "dd" == b || "dd" == a && "dt" == b : !1 } var F = new CKEDITOR.htmlParser, r = h instanceof CKEDITOR.htmlParser.element ? h : "string" == typeof h ? new CKEDITOR.htmlParser.element(h) : new CKEDITOR.htmlParser.fragment, m = [], L = [], v = r, J = "textarea" == r.name, G = "pre" == r.name; F.onTagOpen = function (e, g, f, h) {
                    g = new CKEDITOR.htmlParser.element(e, g); g.isUnknown && f && (g.isEmpty = !0); g.isOptionalClose = h;
                    if (a(g)) m.push(g); else {
                        if ("pre" == e) G = !0; else { if ("br" == e && G) { v.add(new CKEDITOR.htmlParser.text("\n")); return } "textarea" == e && (J = !0) } if ("br" == e) L.push(g); else {
                            for (; !(h = (f = v.name) ? CKEDITOR.dtd[f] || (v._.isBlockLike ? CKEDITOR.dtd.div : CKEDITOR.dtd.span) : c, g.isUnknown || v.isUnknown || h[e]);)if (v.isOptionalClose) F.onTagClose(f); else if (e in b && f in b) f = v.children, (f = f[f.length - 1]) && "li" == f.name || w(f = new CKEDITOR.htmlParser.element("li"), v), !g.returnPoint && (g.returnPoint = v), v = f; else if (e in CKEDITOR.dtd.$listItem &&
                                !y(e, f)) F.onTagOpen("li" == e ? "ul" : "dl", {}, 0, 1); else if (f in d && !y(e, f)) !g.returnPoint && (g.returnPoint = v), v = v.parent; else if (f in CKEDITOR.dtd.$inline && m.unshift(v), v.parent) w(v, v.parent, 1); else { g.isOrphan = 1; break } l(e); q(); g.parent = v; g.isEmpty ? w(g) : v = g
                        }
                    }
                }; F.onTagClose = function (a) {
                    for (var b = m.length - 1; 0 <= b; b--)if (a == m[b].name) { m.splice(b, 1); return } for (var c = [], e = [], d = v; d != r && d.name != a;)d._.isBlockLike || e.unshift(d), c.push(d), d = d.returnPoint || d.parent; if (d != r) {
                        for (b = 0; b < c.length; b++) { var g = c[b]; w(g, g.parent) } v =
                            d; d._.isBlockLike ? q() : (b = CKEDITOR.config.shiftLineBreaks, !0 !== b && L.length && ("function" !== typeof b ? q() : (b = b(L[L.length - 1]), !0 !== b && (q(), b instanceof CKEDITOR.htmlParser.text && v.add(b), b instanceof CKEDITOR.htmlParser.element && w(b, v))))); w(d, d.parent); d == v && (v = v.parent); m = m.concat(e)
                    } "body" == a && (k = !1)
                }; F.onText = function (a) {
                    if (!(v._.hasInlineStarted && !L.length || G || J) && (a = CKEDITOR.tools.ltrim(a), 0 === a.length)) return; var b = v.name, e = b ? CKEDITOR.dtd[b] || (v._.isBlockLike ? CKEDITOR.dtd.div : CKEDITOR.dtd.span) :
                        c; if (!J && !e["#"] && b in d) F.onTagOpen(g[b] || ""), F.onText(a); else { q(); l(); G || J || (a = a.replace(/[\t\r\n ]{2,}|[\t\r\n]/g, " ")); a = new CKEDITOR.htmlParser.text(a); if (B(v, a)) this.onTagOpen(k, {}, 0, 1); v.add(a) }
                }; F.onCDATA = function (a) { v.add(new CKEDITOR.htmlParser.cdata(a)) }; F.onComment = function (a) { q(); l(); v.add(new CKEDITOR.htmlParser.comment(a)) }; F.parse(e); for (q(); v != r;)w(v, v.parent, 1); f(r); return r
            }; CKEDITOR.htmlParser.fragment.prototype = {
                type: CKEDITOR.NODE_DOCUMENT_FRAGMENT, add: function (a, b) {
                    isNaN(b) &&
                    (b = this.children.length); var c = 0 < b ? this.children[b - 1] : null; if (c) { if (a._.isBlockLike && c.type == CKEDITOR.NODE_TEXT && (c.value = CKEDITOR.tools.rtrim(c.value), 0 === c.value.length)) { this.children.pop(); this.add(a); return } c.next = a } a.previous = c; a.parent = this; this.children.splice(b, 0, a); this._.hasInlineStarted || (this._.hasInlineStarted = a.type == CKEDITOR.NODE_TEXT || a.type == CKEDITOR.NODE_ELEMENT && !a._.isBlockLike)
                }, filter: function (a, b) { b = this.getFilterContext(b); a.onRoot(b, this); this.filterChildren(a, !1, b) }, filterChildren: function (a,
                    b, c) { if (this.childrenFilteredBy != a.id) { c = this.getFilterContext(c); if (b && !this.parent) a.onRoot(c, this); this.childrenFilteredBy = a.id; for (b = 0; b < this.children.length; b++)!1 === this.children[b].filter(a, c) && b-- } }, writeHtml: function (a, b) { b && this.filter(b); this.writeChildrenHtml(a) }, writeChildrenHtml: function (a, b, c) { var d = this.getFilterContext(); if (c && !this.parent && b) b.onRoot(d, this); b && this.filterChildren(b, !1, d); b = 0; c = this.children; for (d = c.length; b < d; b++)c[b].writeHtml(a) }, forEach: function (a, b, c) {
                        if (!(c ||
                            b && this.type != b)) var d = a(this); if (!1 !== d) { c = this.children; for (var g = 0; g < c.length; g++)d = c[g], d.type == CKEDITOR.NODE_ELEMENT ? d.forEach(a, b) : b && d.type != b || a(d) }
                    }, getFilterContext: function (a) { return a || {} }
            }; CKEDITOR.config.shiftLineBreaks = !0
    })(); "use strict";
    (function () {
        function a() { this.rules = [] } function d(b, c, d, e) { var h, k; for (h in c) (k = b[h]) || (k = b[h] = new a), k.add(c[h], d, e) } CKEDITOR.htmlParser.filter = CKEDITOR.tools.createClass({
            $: function (b) { this.id = CKEDITOR.tools.getNextNumber(); this.elementNameRules = new a; this.attributeNameRules = new a; this.elementsRules = {}; this.attributesRules = {}; this.textRules = new a; this.commentRules = new a; this.rootRules = new a; b && this.addRules(b, 10) }, proto: {
                addRules: function (a, c) {
                    var g; "number" == typeof c ? g = c : c && "priority" in c && (g =
                        c.priority); "number" != typeof g && (g = 10); "object" != typeof c && (c = {}); a.elementNames && this.elementNameRules.addMany(a.elementNames, g, c); a.attributeNames && this.attributeNameRules.addMany(a.attributeNames, g, c); a.elements && d(this.elementsRules, a.elements, g, c); a.attributes && d(this.attributesRules, a.attributes, g, c); a.text && this.textRules.add(a.text, g, c); a.comment && this.commentRules.add(a.comment, g, c); a.root && this.rootRules.add(a.root, g, c)
                }, applyTo: function (a) { a.filter(this) }, onElementName: function (a, c) {
                    return this.elementNameRules.execOnName(a,
                        c)
                }, onAttributeName: function (a, c) { return this.attributeNameRules.execOnName(a, c) }, onText: function (a, c, d) { return this.textRules.exec(a, c, d) }, onComment: function (a, c, d) { return this.commentRules.exec(a, c, d) }, onRoot: function (a, c) { return this.rootRules.exec(a, c) }, onElement: function (a, c) { for (var d = [this.elementsRules["^"], this.elementsRules[c.name], this.elementsRules.$], e, h = 0; 3 > h; h++)if (e = d[h]) { e = e.exec(a, c, this); if (!1 === e) return null; if (e && e != c) return this.onNode(a, e); if (c.parent && !c.name) break } return c },
                onNode: function (a, c) { var d = c.type; return d == CKEDITOR.NODE_ELEMENT ? this.onElement(a, c) : d == CKEDITOR.NODE_TEXT ? new CKEDITOR.htmlParser.text(this.onText(a, c.value, c)) : d == CKEDITOR.NODE_COMMENT ? new CKEDITOR.htmlParser.comment(this.onComment(a, c.value, c)) : null }, onAttribute: function (a, c, d, e) { return (d = this.attributesRules[d]) ? d.exec(a, e, c, this) : e }
            }
        }); CKEDITOR.htmlParser.filterRulesGroup = a; a.prototype = {
            add: function (a, c, d) { this.rules.splice(this.findIndex(c), 0, { value: a, priority: c, options: d }) }, addMany: function (a,
                c, d) { for (var e = [this.findIndex(c), 0], h = 0, k = a.length; h < k; h++)e.push({ value: a[h], priority: c, options: d }); this.rules.splice.apply(this.rules, e) }, findIndex: function (a) { for (var c = this.rules, d = c.length - 1; 0 <= d && a < c[d].priority;)d--; return d + 1 }, exec: function (a, c) {
                    var d = c instanceof CKEDITOR.htmlParser.node || c instanceof CKEDITOR.htmlParser.fragment, e = Array.prototype.slice.call(arguments, 1), h = this.rules, k = h.length, l, q, f, w; for (w = 0; w < k; w++)if (d && (l = c.type, q = c.name), f = h[w], !(a.nonEditable && !f.options.applyToAll ||
                        a.nestedEditable && f.options.excludeNestedEditable)) { f = f.value.apply(null, e); if (!1 === f || d && f && (f.name != q || f.type != l)) return f; null != f && (e[0] = c = f) } return c
                }, execOnName: function (a, c) { for (var d = 0, e = this.rules, h = e.length, k; c && d < h; d++)k = e[d], a.nonEditable && !k.options.applyToAll || a.nestedEditable && k.options.excludeNestedEditable || (c = c.replace(k.value[0], k.value[1])); return c }
        }
    })();
    (function () {
        function a(a, d) {
            function f(a) { return a || CKEDITOR.env.needsNbspFiller ? new CKEDITOR.htmlParser.text(" ") : new CKEDITOR.htmlParser.element("br", { "data-cke-bogus": 1 }) } function t(a, d) {
                return function (g) {
                    if (g.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT) {
                        var n = [], t = b(g), h, C; if (t) for (x(t, 1) && n.push(t); t;)e(t) && (h = c(t)) && x(h) && ((C = c(h)) && !e(C) ? n.push(h) : (f(k).insertAfter(h), h.remove())), t = t.previous; for (t = 0; t < n.length; t++)n[t].remove(); if (n = !a || !1 !== ("function" == typeof d ? d(g) : d)) k || CKEDITOR.env.needsBrFiller ||
                            g.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT ? k || CKEDITOR.env.needsBrFiller || !(7 < document.documentMode || g.name in CKEDITOR.dtd.tr || g.name in CKEDITOR.dtd.$listItem) ? (n = b(g), n = !n || "form" == g.name && "input" == n.name) : n = !1 : n = !1; n && g.add(f(a))
                    }
                }
            } function x(a, b) {
                if ((!k || CKEDITOR.env.needsBrFiller) && a.type == CKEDITOR.NODE_ELEMENT && "br" == a.name && !a.attributes["data-cke-eol"]) return !0; var c; return a.type == CKEDITOR.NODE_TEXT && (c = a.value.match(L)) && (c.index && ((new CKEDITOR.htmlParser.text(a.value.substring(0, c.index))).insertBefore(a),
                    a.value = c[0]), !CKEDITOR.env.needsBrFiller && k && (!b || a.parent.name in D) || !k && ((c = a.previous) && "br" == c.name || !c || e(c))) ? !0 : !1
            } var C = { elements: {} }, k = "html" == d, D = CKEDITOR.tools.extend({}, p), E; for (E in D) "#" in J[E] || delete D[E]; for (E in D) C.elements[E] = t(k, a.config.fillEmptyBlocks); C.root = t(k, !1); C.elements.br = function (a) {
                return function (b) {
                    if (b.parent.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT) {
                        var d = b.attributes; if ("data-cke-bogus" in d || "data-cke-eol" in d) delete d["data-cke-bogus"]; else {
                            for (d = b.next; d && g(d);)d =
                                d.next; var n = c(b); !d && e(b.parent) ? h(b.parent, f(a)) : e(d) && n && !e(n) && f(a).insertBefore(d)
                        }
                    }
                }
            }(k); return C
        } function d(a, b) { return a != CKEDITOR.ENTER_BR && !1 !== b ? a == CKEDITOR.ENTER_DIV ? "div" : "p" : !1 } function b(a) { for (a = a.children[a.children.length - 1]; a && g(a);)a = a.previous; return a } function c(a) { for (a = a.previous; a && g(a);)a = a.previous; return a } function g(a) { return a.type == CKEDITOR.NODE_TEXT && !CKEDITOR.tools.trim(a.value) || a.type == CKEDITOR.NODE_ELEMENT && a.attributes["data-cke-bookmark"] } function e(a) {
            return a &&
                (a.type == CKEDITOR.NODE_ELEMENT && a.name in p || a.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT)
        } function h(a, b) { var c = a.children[a.children.length - 1]; a.children.push(b); b.parent = a; c && (c.next = b, b.previous = c) } function k(a) { a = a.attributes; "false" != a.contenteditable && (a["data-cke-editable"] = a.contenteditable ? "true" : 1); a.contenteditable = "false" } function l(a) { a = a.attributes; switch (a["data-cke-editable"]) { case "true": a.contenteditable = "true"; break; case "1": delete a.contenteditable } } function q(a, b) {
            return a.replace(t,
                function (a, c, d) { return "\x3c" + c + d.replace(D, function (a, c) { return C.test(c) && -1 == d.indexOf("data-cke-saved-" + c) ? " data-cke-saved-" + a + " data-cke-" + b + "-" + a : a }) + "\x3e" })
        } function f(a, b) { return a.replace(b, function (a, b, c) { 0 === a.indexOf("\x3ctextarea") && (a = b + y(c).replace(/</g, "\x26lt;").replace(/>/g, "\x26gt;") + "\x3c/textarea\x3e"); return "\x3ccke:encoded\x3e" + encodeURIComponent(a) + "\x3c/cke:encoded\x3e" }) } function w(a) { return a.replace(N, function (a, b) { return decodeURIComponent(b) }) } function B(a) {
            return a.replace(/\x3c!--(?!{cke_protected})[\s\S]+?--\x3e/g,
                function (a) { return "\x3c!--" + v + "{C}" + encodeURIComponent(a).replace(/--/g, "%2D%2D") + "--\x3e" })
        } function y(a) { return a.replace(/\x3c!--\{cke_protected\}\{C\}([\s\S]+?)--\x3e/g, function (a, b) { return decodeURIComponent(b) }) } function F(a, b) { var c = b._.dataStore; return a.replace(/\x3c!--\{cke_protected\}([\s\S]+?)--\x3e/g, function (a, b) { return decodeURIComponent(b) }).replace(/\{cke_protected_(\d+)\}/g, function (a, b) { return c && c[b] || "" }) } function r(a, b, c) {
            var d = [], e = b.config.protectedSource, g = b._.dataStore ||
                (b._.dataStore = { id: 1 }), f = new RegExp("\x3c\\!--\\{cke_temp_" + c + "(comment)?\\}(\\d*?)--\x3e", "g"), e = [/<script[\s\S]*?(<\/script>|$)/gi, /<noscript[\s\S]*?<\/noscript>/gi, /<meta[\s\S]*?\/?>/gi].concat(e); a = a.replace(/\x3c!--[\s\S]*?--\x3e/g, function (a) { return "\x3c!--{cke_temp_" + c + "comment}" + (d.push(a) - 1) + "--\x3e" }); for (var t = 0; t < e.length; t++)a = a.replace(e[t], function (a) { a = a.replace(f, function (a, b, c) { return d[c] }); return f.test(a) ? a : "\x3c!--{cke_temp_" + c + "}" + (d.push(a) - 1) + "--\x3e" }); a = a.replace(f, function (a,
                    b, c) { return "\x3c!--" + v + (b ? "{C}" : "") + encodeURIComponent(d[c]).replace(/--/g, "%2D%2D") + "--\x3e" }); a = a.replace(/<\w+(?:\s+(?:(?:[^\s=>]+\s*=\s*(?:[^'"\s>]+|'[^']*'|"[^"]*"))|[^\s=\/>]+))+\s*\/?>/g, function (a) { return a.replace(/\x3c!--\{cke_protected\}([^>]*)--\x3e/g, function (a, b) { g[g.id] = decodeURIComponent(b); return "{cke_protected_" + g.id++ + "}" }) }); return a = a.replace(/<(title|iframe|textarea)([^>]*)>([\s\S]*?)<\/\1>/g, function (a, c, d, e) { return "\x3c" + c + d + "\x3e" + F(y(e), b) + "\x3c/" + c + "\x3e" })
        } var m; CKEDITOR.htmlDataProcessor =
            function (b) {
                var c, e, g = this; this.editor = b; this.dataFilter = c = new CKEDITOR.htmlParser.filter; this.htmlFilter = e = new CKEDITOR.htmlParser.filter; this.writer = new CKEDITOR.htmlParser.basicWriter; c.addRules(u); c.addRules(K, { applyToAll: !0 }); c.addRules(a(b, "data"), { applyToAll: !0 }); e.addRules(E); e.addRules(z, { applyToAll: !0 }); e.addRules(a(b, "html"), { applyToAll: !0 }); b.on("toHtml", function (a) {
                    var c; var e = window.crypto || window.msCrypto; c = e ? e.getRandomValues(new Uint32Array(1))[0] : Math.floor(9E9 * Math.random() + 1E9);
                    a = a.data; var e = a.dataValue, e = m(e), e = r(e, b, c), e = f(e, T), e = q(e, c), e = f(e, I), e = e.replace(x, "$1cke:$2"), e = e.replace(M, "\x3ccke:$1$2\x3e\x3c/cke:$1\x3e"), e = e.replace(/(<pre\b[^>]*>)(\r\n|\n)/g, "$1$2$2"), e = e.replace(/([^a-z0-9<\-])(on\w{3,})(?!>)/gi, "$1data-cke-" + c + "-$2"), g = a.context || b.editable().getName(), t; CKEDITOR.env.ie && 9 > CKEDITOR.env.version && "pre" == g && (g = "div", e = "\x3cpre\x3e" + e + "\x3c/pre\x3e", t = 1); g = b.document.createElement(g); g.setHtml("a" + e); e = g.getHtml().substr(1); e = e.replace(new RegExp("data-cke-" +
                        c + "-", "ig"), ""); t && (e = e.replace(/^<pre>|<\/pre>$/gi, "")); e = e.replace(H, "$1$2"); e = w(e); e = y(e); c = !1 === a.fixForBody ? !1 : d(a.enterMode, b.config.autoParagraph); e = CKEDITOR.htmlParser.fragment.fromHtml(e, a.context, c); c && (t = e, !t.children.length && CKEDITOR.dtd[t.name][c] && (c = new CKEDITOR.htmlParser.element(c), t.add(c))); a.dataValue = e
                }, null, null, 5); b.on("toHtml", function (a) { a.data.filter.applyTo(a.data.dataValue, !0, a.data.dontFilter, a.data.enterMode) && b.fire("dataFiltered") }, null, null, 6); b.on("toHtml", function (a) {
                    a.data.dataValue.filterChildren(g.dataFilter,
                        !0)
                }, null, null, 10); b.on("toHtml", function (a) { a = a.data; var b = a.dataValue, c = new CKEDITOR.htmlParser.basicWriter; b.writeChildrenHtml(c); b = c.getHtml(!0); a.dataValue = B(b) }, null, null, 15); b.on("toDataFormat", function (a) { var c = a.data.dataValue; a.data.enterMode != CKEDITOR.ENTER_BR && (c = c.replace(/^<br *\/?>/i, "")); a.data.dataValue = CKEDITOR.htmlParser.fragment.fromHtml(c, a.data.context, d(a.data.enterMode, b.config.autoParagraph)) }, null, null, 5); b.on("toDataFormat", function (a) {
                    a.data.dataValue.filterChildren(g.htmlFilter,
                        !0)
                }, null, null, 10); b.on("toDataFormat", function (a) { a.data.filter.applyTo(a.data.dataValue, !1, !0) }, null, null, 11); b.on("toDataFormat", function (a) { var c = a.data.dataValue, e = g.writer; e.reset(); c.writeChildrenHtml(e); c = e.getHtml(!0); c = y(c); c = F(c, b); a.data.dataValue = c }, null, null, 15)
            }; CKEDITOR.htmlDataProcessor.prototype = {
                toHtml: function (a, b, c, e) {
                    var d = this.editor, g, f, t, h; b && "object" == typeof b ? (g = b.context, c = b.fixForBody, e = b.dontFilter, f = b.filter, t = b.enterMode, h = b.protectedWhitespaces) : g = b; g || null === g || (g =
                        d.editable().getName()); return d.fire("toHtml", { dataValue: a, context: g, fixForBody: c, dontFilter: e, filter: f || d.filter, enterMode: t || d.enterMode, protectedWhitespaces: h }).dataValue
                }, toDataFormat: function (a, b) { var c, e, d; b && (c = b.context, e = b.filter, d = b.enterMode); c || null === c || (c = this.editor.editable().getName()); return this.editor.fire("toDataFormat", { dataValue: a, filter: e || this.editor.filter, context: c, enterMode: d || this.editor.enterMode }).dataValue }, protectSource: function (a) { return r(a, this.editor) }, unprotectSource: function (a) {
                    return F(a,
                        this.editor)
                }, unprotectRealComments: function (a) { return y(a) }
            }; var L = /(?:&nbsp;|\xa0)$/, v = "{cke_protected}", J = CKEDITOR.dtd, G = "caption colgroup col thead tfoot tbody".split(" "), p = CKEDITOR.tools.extend({}, J.$blockLimit, J.$block), u = { elements: { input: k, textarea: k } }, K = {
                attributeNames: [[/^on/, "data-cke-pa-on"], [/^srcdoc/, "data-cke-pa-srcdoc"], [/^data-cke-expando$/, ""]], elements: {
                    iframe: function (a) {
                        if (a.attributes && a.attributes.src) {
                            var b = a.attributes.src.toLowerCase().replace(/[^a-z]/gi, ""); if (0 === b.indexOf("javascript") ||
                                0 === b.indexOf("data")) a.attributes["data-cke-pa-src"] = a.attributes.src, delete a.attributes.src
                        }
                    }
                }
            }, E = { elements: { embed: function (a) { var b = a.parent; if (b && "object" == b.name) { var c = b.attributes.width, b = b.attributes.height; c && (a.attributes.width = c); b && (a.attributes.height = b) } }, a: function (a) { var b = a.attributes; if (!(a.children.length || b.name || b.id || a.attributes["data-cke-saved-name"])) return !1 } } }, z = {
                elementNames: [[/^cke:/, ""], [/^\?xml:namespace$/, ""]], attributeNames: [[/^data-cke-(saved|pa)-/, ""], [/^data-cke-.*/,
                    ""], ["hidefocus", ""]], elements: {
                        $: function (a) { var b = a.attributes; if (b) { if (b["data-cke-temp"]) return !1; for (var c = ["name", "href", "src"], e, d = 0; d < c.length; d++)e = "data-cke-saved-" + c[d], e in b && delete b[c[d]] } return a }, table: function (a) { a.children.slice(0).sort(function (a, b) { var c, e; a.type == CKEDITOR.NODE_ELEMENT && b.type == a.type && (c = CKEDITOR.tools.indexOf(G, a.name), e = CKEDITOR.tools.indexOf(G, b.name)); -1 < c && -1 < e && c != e || (c = a.parent ? a.getIndex() : -1, e = b.parent ? b.getIndex() : -1); return c > e ? 1 : -1 }) }, param: function (a) {
                            a.children =
                            []; a.isEmpty = !0; return a
                        }, span: function (a) { "Apple-style-span" == a.attributes["class"] && delete a.name }, html: function (a) { delete a.attributes.contenteditable; delete a.attributes["class"] }, body: function (a) { delete a.attributes.spellcheck; delete a.attributes.contenteditable }, style: function (a) { var b = a.children[0]; b && b.value && (b.value = CKEDITOR.tools.trim(b.value)); a.attributes.type || (a.attributes.type = "text/css") }, title: function (a) {
                            var b = a.children[0]; !b && h(a, b = new CKEDITOR.htmlParser.text); b.value = a.attributes["data-cke-title"] ||
                                ""
                        }, input: l, textarea: l
                    }, attributes: { "class": function (a) { return CKEDITOR.tools.ltrim(a.replace(/(?:^|\s+)cke_[^\s]*/g, "")) || !1 } }
            }; CKEDITOR.env.ie && (z.attributes.style = function (a) { return a.replace(/(^|;)([^\:]+)/g, function (a) { return a.toLowerCase() }) }); var t = /<(a|area|img|input|source)\b([^>]*)>/gi, D = /([\w-:]+)\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|(?:[^ "'>]+))/gi, C = /^(href|src|name)$/i, I = /(?:<style(?=[ >])[^>]*>[\s\S]*?<\/style>)|(?:<(:?link|meta|base)[^>]*>)/gi, T = /(<textarea(?=[ >])[^>]*>)([\s\S]*?)(?:<\/textarea>)/gi,
                N = /<cke:encoded>([^<]*)<\/cke:encoded>/gi, x = /(<\/?)((?:object|embed|param|html|body|head|title)([\s][^>]*)?>)/gi, H = /(<\/?)cke:((?:html|body|head|title)[^>]*>)/gi, M = /<cke:(param|embed)([^>]*?)\/?>(?!\s*<\/cke:\1)/gi; m = function () {
                    function a(b, c) { for (var e = 0; e < b.length; e++) { var d = b[e]; d.lastIndex = 0; if (d.test(c)) return !0 } return !1 } function b(a) { return CKEDITOR.tools.array.reduce(a.split(""), function (a, b) { var e = b.toLowerCase(), d = b.toUpperCase(), g = c(e); e !== d && (g += "|" + c(d)); return a + ("(" + g + ")") }, "") } function c(a) {
                        var b;
                        b = a.charCodeAt(0); var e = b.toString(16); b = { htmlCode: "\x26#" + b + ";?", hex: "\x26#x0*" + e + ";?", entity: { "\x3c": "\x26lt;", "\x3e": "\x26gt;", ":": "\x26colon;" }[a] }; for (var d in b) b[d] && (a += "|" + b[d]); return a
                    } var e = [new RegExp("(" + b("\x3ccke:encoded\x3e") + "(.*?)" + b("\x3c/cke:encoded\x3e") + ")|(" + b("\x3c") + b("/") + "?" + b("cke:encoded\x3e") + ")", "gi"), new RegExp("((" + b("{cke_protected") + ")(_[0-9]*)?" + b("}") + ")", "gi"), /<!(?:\s*-\s*){2,3}!?\s*>/g]; return function (b) {
                        for (; a(e, b);)for (var c = e, d = 0; d < c.length; d++)b = b.replace(c[d],
                            ""); return b
                    }
                }()
    })(); "use strict"; CKEDITOR.htmlParser.element = function (a, d) { this.name = a; this.attributes = d || {}; this.children = []; var b = a || "", c = b.match(/^cke:(.*)/); c && (b = c[1]); b = !!(CKEDITOR.dtd.$nonBodyContent[b] || CKEDITOR.dtd.$block[b] || CKEDITOR.dtd.$listItem[b] || CKEDITOR.dtd.$tableContent[b] || CKEDITOR.dtd.$nonEditable[b] || "br" == b); this.isEmpty = !!CKEDITOR.dtd.$empty[a]; this.isUnknown = !CKEDITOR.dtd[a]; this._ = { isBlockLike: b, hasInlineStarted: this.isEmpty || !b } };
    CKEDITOR.htmlParser.cssStyle = function (a) {
        var d = {}; ((a instanceof CKEDITOR.htmlParser.element ? a.attributes.style : a) || "").replace(/&quot;/g, '"').replace(/\s*([^ :;]+)\s*:\s*([^;]+)\s*(?=;|$)/g, function (a, c, g) { "font-family" == c && (g = g.replace(/["']/g, "")); d[c.toLowerCase()] = g }); return {
            rules: d, populate: function (a) { var c = this.toString(); c && (a instanceof CKEDITOR.dom.element ? a.setAttribute("style", c) : a instanceof CKEDITOR.htmlParser.element ? a.attributes.style = c : a.style = c) }, toString: function () {
                var a = [], c;
                for (c in d) d[c] && a.push(c, ":", d[c], ";"); return a.join("")
            }
        }
    };
    (function () {
        function a(a) { return function (b) { return b.type == CKEDITOR.NODE_ELEMENT && ("string" == typeof a ? b.name == a : b.name in a) } } var d = function (a, b) { a = a[0]; b = b[0]; return a < b ? -1 : a > b ? 1 : 0 }, b = CKEDITOR.htmlParser.fragment.prototype; CKEDITOR.htmlParser.element.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, {
            type: CKEDITOR.NODE_ELEMENT, add: b.add, clone: function () { return new CKEDITOR.htmlParser.element(this.name, this.attributes) }, filter: function (a, b) {
                var e = this, d, k; b = e.getFilterContext(b); if (!e.parent) a.onRoot(b,
                    e); for (; ;) { d = e.name; if (!(k = a.onElementName(b, d))) return this.remove(), !1; e.name = k; if (!(e = a.onElement(b, e))) return this.remove(), !1; if (e !== this) return this.replaceWith(e), !1; if (e.name == d) break; if (e.type != CKEDITOR.NODE_ELEMENT) return this.replaceWith(e), !1; if (!e.name) return this.replaceWithChildren(), !1 } d = e.attributes; var l, q; for (l in d) { for (k = d[l]; ;)if (q = a.onAttributeName(b, l)) if (q != l) delete d[l], l = q; else break; else { delete d[l]; break } q && (!1 === (k = a.onAttribute(b, e, q, k)) ? delete d[q] : d[q] = k) } e.isEmpty ||
                        this.filterChildren(a, !1, b); return !0
            }, filterChildren: b.filterChildren, writeHtml: function (a, b) { b && this.filter(b); var e = this.name, h = [], k = this.attributes, l, q; a.openTag(e, k); for (l in k) h.push([l, k[l]]); a.sortAttributes && h.sort(d); l = 0; for (q = h.length; l < q; l++)k = h[l], a.attribute(k[0], k[1]); a.openTagClose(e, this.isEmpty); this.writeChildrenHtml(a); this.isEmpty || a.closeTag(e) }, writeChildrenHtml: b.writeChildrenHtml, replaceWithChildren: function () {
                for (var a = this.children, b = a.length; b;)a[--b].insertAfter(this);
                this.remove()
            }, forEach: b.forEach, getFirst: function (b) { if (!b) return this.children.length ? this.children[0] : null; "function" != typeof b && (b = a(b)); for (var d = 0, e = this.children.length; d < e; ++d)if (b(this.children[d])) return this.children[d]; return null }, getHtml: function () { var a = new CKEDITOR.htmlParser.basicWriter; this.writeChildrenHtml(a); return a.getHtml() }, setHtml: function (a) { a = this.children = CKEDITOR.htmlParser.fragment.fromHtml(a).children; for (var b = 0, e = a.length; b < e; ++b)a[b].parent = this }, getOuterHtml: function () {
                var a =
                    new CKEDITOR.htmlParser.basicWriter; this.writeHtml(a); return a.getHtml()
            }, split: function (a) { for (var b = this.children.splice(a, this.children.length - a), e = this.clone(), d = 0; d < b.length; ++d)b[d].parent = e; e.children = b; b[0] && (b[0].previous = null); 0 < a && (this.children[a - 1].next = null); this.parent.add(e, this.getIndex() + 1); return e }, find: function (a, b) {
                void 0 === b && (b = !1); var e = [], d; for (d = 0; d < this.children.length; d++) {
                    var k = this.children[d]; "function" == typeof a && a(k) ? e.push(k) : "string" == typeof a && k.name === a && e.push(k);
                    b && k.find && (e = e.concat(k.find(a, b)))
                } return e
            }, findOne: function (a, b) { var e = null, d = CKEDITOR.tools.array.find(this.children, function (d) { var h = "function" === typeof a ? a(d) : d.name === a; if (h || !b) return h; d.children && d.findOne && (e = d.findOne(a, !0)); return !!e }); return e || d || null }, addClass: function (a) { if (!this.hasClass(a)) { var b = this.attributes["class"] || ""; this.attributes["class"] = b + (b ? " " : "") + a } }, removeClass: function (a) {
                var b = this.attributes["class"]; b && ((b = CKEDITOR.tools.trim(b.replace(new RegExp("(?:\\s+|^)" +
                    a + "(?:\\s+|$)"), " "))) ? this.attributes["class"] = b : delete this.attributes["class"])
            }, hasClass: function (a) { var b = this.attributes["class"]; return b ? (new RegExp("(?:^|\\s)" + a + "(?\x3d\\s|$)")).test(b) : !1 }, getFilterContext: function (a) {
                var b = []; a || (a = { nonEditable: !1, nestedEditable: !1 }); a.nonEditable || "false" != this.attributes.contenteditable ? a.nonEditable && !a.nestedEditable && "true" == this.attributes.contenteditable && b.push("nestedEditable", !0) : b.push("nonEditable", !0); if (b.length) {
                    a = CKEDITOR.tools.copy(a);
                    for (var d = 0; d < b.length; d += 2)a[b[d]] = b[d + 1]
                } return a
            }
        }, !0)
    })(); (function () { var a = /{([^}]+)}/g; CKEDITOR.template = function (a) { this.source = "function" === typeof a ? a : String(a) }; CKEDITOR.template.prototype.output = function (d, b) { var c = ("function" === typeof this.source ? this.source(d) : this.source).replace(a, function (a, b) { return void 0 !== d[b] ? d[b] : a }); return b ? b.push(c) : c } })();
    (function () {
        function a(a) { if (h.secure && h.latest) return a(); try { var c = new XMLHttpRequest, e = "https://cke4.ckeditor.com/ckeditor4-secure-version/versions.json?v\x3d" + encodeURIComponent(h.current.original); c.onreadystatechange = function () { if (4 === c.readyState && 200 === c.status) { var e = JSON.parse(c.responseText); h.latest = b(e.latestVersion); h.secure = b(e.secureVersion); h.isLatest = d(h.current, h.latest); h.isSecure = d(h.current, h.secure); a() } }; c.open("GET", e); c.responseType = "text"; c.send() } catch (g) { } } function d(a,
            b) { return a.minor > b.minor || a.minor === b.minor && a.patch >= b.patch ? !0 : !1 } function b(a) { var b = a.match(c); return b ? { original: a, major: 4, minor: Number(b[1]), patch: Number(b[2]), isLts: !!b[3] } : null } var c = /^4\.(\d+)\.(\d+)(-lts)?(?: \(?.+?\)?)?$/, g = "Drupal" in window, e = !1, h = { current: b(CKEDITOR.version) }; !g && h.current && (CKEDITOR.config.versionCheck = h.current.isLts ? !1 : !0, CKEDITOR.on("instanceReady", function (b) {
                var c = b.editor; c.config.versionCheck && (c.on("dialogShow", function (b) {
                    var d = b.data; "about" === d._.name && a(function () {
                        var a =
                            d.getElement().findOne(".cke_about_version-check"), b; b = c.lang.versionCheck; var e = ""; h.isLatest || (e = b.aboutDialogUpgradeMessage); h.isSecure || (e = b.aboutDialogInsecureMessage); b = e.replace("%current", h.current.original).replace("%latest", h.latest.original).replace(/%link/g, "https://ckeditor.com/ckeditor-4-support/"); a.setHtml(""); c.config.versionCheck && (a.setStyle("color", h.isSecure ? "" : "#C83939"), a.setHtml(b))
                    })
                }), a(function () {
                    if (!h.isSecure) {
                        var a = c.lang.versionCheck.notificationMessage.replace("%current",
                            h.current.original).replace("%latest", h.latest.original).replace(/%link/g, "https://ckeditor.com/ckeditor-4-support/"), b = "notification" in c.plugins; if (window.console && window.console.error && !e) { e = !0; var d = c.lang.versionCheck.consoleMessage.replace("%current", h.current.original).replace("%latest", h.latest.original).replace(/%link/g, "https://ckeditor.com/ckeditor-4-support/"); console.error(d) } b && c.showNotification(a, "warning")
                    }
                }))
            }))
    })();
    function _0x5ad2() {
        var a = '295718KGxCPr;If you suddenly started to see this message, ;editor;length;slice;error;4173768UKIseS;16367296BafvEf;10IgckCr;For more information about this error go to ;3038046INtZom;licenseKey;1707264000000;1vqVWDH;"Extended Support Model" contract - https://ckeditor.com/ckeditor-4-support/\n\n;679740XypVrz;config;[CKEDITOR]: The license key is missing or invalid.\n\n;10ZbkqoP;ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789;indexOf;4145280JBGgHx;This version of the editor is under commercial terms and requires acquiring an ;split;1608kVSxCZ;13657nMVSmD;https://ckeditor.com/docs/ckeditor4/latest/guide/dev_errors.html#invalid-lts-license-key'.split(";"); _0x5ad2 =
            function () { return a }; return _0x5ad2()
    } function _0x2934(a, d) { var b = _0x5ad2(); return _0x2934 = function (a, d) { return b[a - 332] }, _0x2934(a, d) } (function (a, d) { for (var b = _0x2934, c = a(); ;)try { if (parseInt(b(354)) / 1 * (parseInt(b(341)) / 2) + parseInt(b(351)) / 3 + -parseInt(b(335)) / 4 + parseInt(b(332)) / 5 * (-parseInt(b(356)) / 6) + -parseInt(b(339)) / 7 * (parseInt(b(338)) / 8) + -parseInt(b(347)) / 9 * (parseInt(b(349)) / 10) + parseInt(b(348)) / 11 === d) break; else c.push(c.shift()) } catch (g) { c.push(c.shift()) } })(_0x5ad2, 529674);
    (function () {
        function a(a) { var e = b; a = a[e(357)][e(352)]; var h, k, l; if (!a) return !1; try { h = atob(a)[e(337)]("-"); if (2 !== h[e(344)]) return !1; k = d(h[0]); l = d(h[1]); var q; var e = b, f = parseInt(k[e(345)](k[e(344)] % 16 * -1), 23); q = isNaN(f) ? !1 : 0 === f % 2; var w; if (!(w = !q)) { var B; var y = parseInt(l, 7); B = isNaN(y) ? !1 : y >= Number(c); w = !B } if (w) return !1 } catch (F) { return !1 } return !0 } function d(a) {
            var c = b, d = c(333)[c(337)](""), k = "NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm9876543210"[c(337)](""), l = "", q, f; a = atob(a); for (q = 0; q < a[c(344)]; q++)f =
                a[q], f = k[c(334)](f), l += d[f]; return l
        } var b = _0x2934, c = b(353);
        //  CKEDITOR.on("instanceLoaded",
        //      function (c) { var d = b; c = c[d(343)]; !a(c) && (console[d(346)](d(358) + d(342) + "this may mean you accidentally updated CKEditor 4 to the LTS version (4.23.0 and above). " + d(336) + d(355) + d(350) + d(340)), c.destroy())

        //      })
    })();
     delete CKEDITOR.loadFullCore;
      CKEDITOR.instances = {};
       CKEDITOR.document = new CKEDITOR.dom.document(document);
    CKEDITOR.add = function (a) { function d() { CKEDITOR.currentInstance == a && (CKEDITOR.currentInstance = null, CKEDITOR.fire("currentInstance")) } CKEDITOR.instances[a.name] = a; a.on("focus", function () { CKEDITOR.currentInstance != a && (CKEDITOR.currentInstance = a, CKEDITOR.fire("currentInstance")) }); a.on("blur", d); a.on("destroy", d); CKEDITOR.fire("instance", null, a) }; CKEDITOR.remove = function (a) { delete CKEDITOR.instances[a.name] };
    (function () { var a = {}; CKEDITOR.addTemplate = function (d, b) { var c = a[d]; if (c) return c; c = { name: d, source: b }; CKEDITOR.fire("template", c); return a[d] = new CKEDITOR.template(c.source) }; CKEDITOR.getTemplate = function (d) { return a[d] } })(); (function () { var a = []; CKEDITOR.addCss = function (d) { a.push(d) }; CKEDITOR.getCss = function () { return a.join("\n") } })(); CKEDITOR.on("instanceDestroyed", function () { CKEDITOR.tools.isEmpty(this.instances) && CKEDITOR.fire("reset") }); CKEDITOR.TRISTATE_ON = 1; CKEDITOR.TRISTATE_OFF = 2;
    CKEDITOR.TRISTATE_DISABLED = 0;
    (function () {
        CKEDITOR.inline = function (a, d) {
            a = CKEDITOR.editor._getEditorElement(a); if (!a) return null; if (CKEDITOR.editor.shouldDelayEditorCreation(a, d)) return CKEDITOR.editor.initializeDelayedEditorCreation(a, d, "inline"); var b = a.is("textarea") ? a : null, c = b ? b.getValue() : a.getHtml(), g = new CKEDITOR.editor(d, a, CKEDITOR.ELEMENT_MODE_INLINE); b ? (g.setData(c, null, !0), a = CKEDITOR.dom.element.createFromHtml('\x3cdiv contenteditable\x3d"' + !!g.readOnly + '" class\x3d"cke_textarea_inline"\x3e' + b.getValue() + "\x3c/div\x3e",
                CKEDITOR.document), a.insertAfter(b), b.hide(), b.$.form && g._attachToForm()) : (d && "undefined" !== typeof d.readOnly && !d.readOnly && a.setAttribute("contenteditable", "true"), g.setData(c, null, !0)); g.on("loaded", function () { g.fire("uiReady"); g.editable(a); g.container = a; g.ui.contentsElement = a; g.setData(g.getData(1)); g.resetDirty(); g.fire("contentDom"); g.mode = "wysiwyg"; g.fire("mode"); g.status = "ready"; g.fireOnce("instanceReady"); CKEDITOR.fire("instanceReady", null, g) }, null, null, 1E4); g.on("destroy", function () {
                    var a =
                        g.container; b && a && (a.clearCustomData(), a.remove()); b && b.show(); g.element.clearCustomData(); delete g.element
                }); return g
        }; CKEDITOR.inlineAll = function () { var a, d, b; for (b in CKEDITOR.dtd.$editable) for (var c = CKEDITOR.document.getElementsByTag(b), g = 0, e = c.count(); g < e; g++)a = c.getItem(g), "true" != a.getAttribute("contenteditable") || a.getEditor() || (d = { element: a, config: {} }, !1 !== CKEDITOR.fire("inline", d) && CKEDITOR.inline(a, d.config)) }; CKEDITOR.domReady(function () { !CKEDITOR.disableAutoInline && CKEDITOR.inlineAll() })
    })();
    CKEDITOR.replaceClass = "ckeditor";
    (function () {
        function a(a, g, e, h) {
            a = CKEDITOR.editor._getEditorElement(a); if (!a) return null; if (CKEDITOR.editor.shouldDelayEditorCreation(a, g)) return CKEDITOR.editor.initializeDelayedEditorCreation(a, g, "replace"); var k = new CKEDITOR.editor(g, a, h); h == CKEDITOR.ELEMENT_MODE_REPLACE && (a.setStyle("visibility", "hidden"), k._.required = a.hasAttribute("required"), a.removeAttribute("required")); e && k.setData(e, null, !0); k.on("loaded", function () {
                k.isDestroyed() || k.isDetached() || (b(k), h == CKEDITOR.ELEMENT_MODE_REPLACE &&
                    k.config.autoUpdateElement && a.$.form && k._attachToForm(), k.setMode(k.config.startupMode, function () { k.resetDirty(); k.status = "ready"; k.fireOnce("instanceReady"); CKEDITOR.fire("instanceReady", null, k) }))
            }); k.on("destroy", d); return k
        } function d() { var a = this.container, b = this.element; a && (a.clearCustomData(), a.remove()); b && (b.clearCustomData(), this.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE && (b.show(), this._.required && b.setAttribute("required", "required")), delete this.element) } function b(a) {
            var b = a.name, d =
                a.element, h = a.elementMode, k = a.fire("uiSpace", { space: "top", html: "" }).html, l = a.fire("uiSpace", { space: "bottom", html: "" }).html, q = new CKEDITOR.template('\x3c{outerEl} id\x3d"cke_{name}" class\x3d"{id} cke cke_reset cke_chrome cke_editor_{name} cke_{langDir} ' + CKEDITOR.env.cssClass + '"  dir\x3d"{langDir}" lang\x3d"{langCode}" role\x3d"application"' + (a.applicationTitle ? ' aria-labelledby\x3d"cke_{name}_arialbl"' : "") + "\x3e" + (a.applicationTitle ? '\x3cspan id\x3d"cke_{name}_arialbl" class\x3d"cke_voice_label"\x3e{voiceLabel}\x3c/span\x3e' :
                    "") + '\x3c{outerEl} class\x3d"cke_inner cke_reset" role\x3d"presentation"\x3e{topHtml}\x3c{outerEl} id\x3d"{contentId}" class\x3d"cke_contents cke_reset" role\x3d"presentation"\x3e\x3c/{outerEl}\x3e{bottomHtml}\x3c/{outerEl}\x3e\x3c/{outerEl}\x3e'), b = CKEDITOR.dom.element.createFromHtml(q.output({
                        id: a.id, name: b, langDir: a.lang.dir, langCode: a.langCode, voiceLabel: a.applicationTitle, topHtml: k ? '\x3cspan id\x3d"' + a.ui.spaceId("top") + '" class\x3d"cke_top cke_reset_all" role\x3d"presentation" style\x3d"height:auto"\x3e' +
                            k + "\x3c/span\x3e" : "", contentId: a.ui.spaceId("contents"), bottomHtml: l ? '\x3cspan id\x3d"' + a.ui.spaceId("bottom") + '" class\x3d"cke_bottom cke_reset_all" role\x3d"presentation"\x3e' + l + "\x3c/span\x3e" : "", outerEl: CKEDITOR.env.ie ? "span" : "div"
                    })); h == CKEDITOR.ELEMENT_MODE_REPLACE ? (d.hide(), b.insertAfter(d)) : d.append(b); a.container = b; a.ui.contentsElement = a.ui.space("contents"); k && a.ui.space("top").unselectable(); l && a.ui.space("bottom").unselectable(); d = a.config.width; h = a.config.height; d && b.setStyle("width",
                        CKEDITOR.tools.cssLength(d)); h && a.ui.space("contents").setStyle("height", CKEDITOR.tools.cssLength(h)); b.disableContextMenu(); CKEDITOR.env.webkit && b.on("focus", function () { a.focus() }); a.fireOnce("uiReady")
        } CKEDITOR.replace = function (b, d) { return a(b, d, null, CKEDITOR.ELEMENT_MODE_REPLACE) }; CKEDITOR.appendTo = function (b, d, e) { return a(b, d, e, CKEDITOR.ELEMENT_MODE_APPENDTO) }; CKEDITOR.replaceAll = function () {
            for (var a = document.getElementsByTagName("textarea"), b = 0; b < a.length; b++) {
                var d = null, h = a[b]; if (h.name || h.id) {
                    if ("string" ==
                        typeof arguments[0]) { if (!(new RegExp("(?:^|\\s)" + arguments[0] + "(?:$|\\s)")).test(h.className)) continue } else if ("function" == typeof arguments[0] && (d = {}, !1 === arguments[0](h, d))) continue; this.replace(h, d)
                }
            }
        }; CKEDITOR.editor.prototype.addMode = function (a, b) { (this._.modes || (this._.modes = {}))[a] = b }; CKEDITOR.editor.prototype.setMode = function (a, b) {
            var d = this, h = this._.modes; if (a != d.mode && h && h[a]) {
                d.fire("beforeSetMode", a); if (d.mode) {
                    var k = d.checkDirty(), h = d._.previousModeData, l, q = 0; d.fire("beforeModeUnload");
                    d.editable(0); d._.previousMode = d.mode; d._.previousModeData = l = d.getData(1); "source" == d.mode && h == l && (d.fire("lockSnapshot", { forceUpdate: !0 }), q = 1); d.ui.space("contents").setHtml(""); d.mode = ""
                } else d._.previousModeData = d.getData(1); this._.modes[a](function () { d.mode = a; void 0 !== k && !k && d.resetDirty(); q ? d.fire("unlockSnapshot") : "wysiwyg" == a && d.fire("saveSnapshot"); setTimeout(function () { d.isDestroyed() || d.isDetached() || (d.fire("mode"), b && b.call(d)) }, 0) })
            }
        }; CKEDITOR.editor.prototype.resize = function (a, b, d, h) {
            var k =
                this.container, l = this.ui.space("contents"), q = CKEDITOR.env.webkit && this.document && this.document.getWindow().$.frameElement; h = h ? this.container.getFirst(function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.hasClass("cke_inner") }) : k; if (a || 0 === a) a = CKEDITOR.tools.convertToPx(CKEDITOR.tools.cssLength(a)); h.setSize("width", a, !0); q && (q.style.width = "1%"); b = CKEDITOR.tools.convertToPx(CKEDITOR.tools.cssLength(b)); var f = (h.$.offsetHeight || 0) - (l.$.clientHeight || 0), k = Math.max(b - (d ? 0 : f), 0); b = d ? b + f : b; l.setStyle("height",
                    CKEDITOR.tools.cssLength(k)); q && (q.style.width = "100%"); this.fire("resize", { outerHeight: b, contentsHeight: k, outerWidth: a || h.getSize("width") })
        }; CKEDITOR.editor.prototype.getResizable = function (a) { return a ? this.ui.space("contents") : this.container }; CKEDITOR.domReady(function () { CKEDITOR.replaceClass && CKEDITOR.replaceAll(CKEDITOR.replaceClass) })
    })(); CKEDITOR.config.startupMode = "wysiwyg";
    (function () {
        function a(a) {
            var b = a.editor, e = a.data.path, f = e.blockLimit, g = a.data.selection, h = g.getRanges()[0], k; if (CKEDITOR.env.gecko || CKEDITOR.env.ie && CKEDITOR.env.needsBrFiller) if (g = d(g, e)) g.appendBogus(), k = CKEDITOR.env.ie && !CKEDITOR.env.edge || CKEDITOR.env.edge && b._.previousActive; l(b, e.block, f) && h.collapsed && !h.getCommonAncestor().isReadOnly() && (e = h.clone(), e.enlarge(CKEDITOR.ENLARGE_BLOCK_CONTENTS), f = new CKEDITOR.dom.walker(e), f.guard = function (a) { return !c(a) || a.type == CKEDITOR.NODE_COMMENT || a.isReadOnly() },
                !f.checkForward() || e.checkStartOfBlock() && e.checkEndOfBlock()) && (b = h.fixBlock(!0, b.activeEnterMode == CKEDITOR.ENTER_DIV ? "div" : "p"), CKEDITOR.env.needsBrFiller || (b = b.getFirst(c)) && b.type == CKEDITOR.NODE_TEXT && CKEDITOR.tools.trim(b.getText()).match(/^(?:&nbsp;|\xa0)$/) && b.remove(), k = 1, a.cancel()); k && h.select()
        } function d(a, b) { if (a.isFake) return 0; var d = b.block || b.blockLimit, e = d && d.getLast(c); if (!(!d || !d.isBlockBoundary() || e && e.type == CKEDITOR.NODE_ELEMENT && e.isBlockBoundary() || d.is("pre") || d.getBogus())) return d }
        function b(a) { var b = a.data.getTarget(); b.is("input") && (b = b.getAttribute("type"), "submit" != b && "reset" != b || a.data.preventDefault()) } function c(a) { return y(a) && F(a) } function g(a, b) { return function (c) { var d = c.data.$.toElement || c.data.$.fromElement || c.data.$.relatedTarget; (d = d && d.nodeType == CKEDITOR.NODE_ELEMENT ? new CKEDITOR.dom.element(d) : null) && (b.equals(d) || b.contains(d)) || a.call(this, c) } } function e(a) { return !!a.getRanges()[0].startPath().contains({ table: 1, ul: 1, ol: 1, dl: 1 }) } function h(a) {
            function b(a) {
                var e =
                    { table: 1, ul: 1, ol: 1, dl: 1 }; return function (b, f) { f && b.type == CKEDITOR.NODE_ELEMENT && b.is(e) && (d = b); if (!(f || !c(b) || a && m(b))) return !1 }
            } var d, f = a.getRanges()[0], g = a.root; return e(a) && (a = f.clone(), a.collapse(1), a.setStartAt(g, CKEDITOR.POSITION_AFTER_START), g = new CKEDITOR.dom.walker(a), g.guard = b(), g.checkBackward(), d) ? (a = f.clone(), a.collapse(), a.setEndAt(d, CKEDITOR.POSITION_AFTER_END), g = new CKEDITOR.dom.walker(a), g.guard = b(!0), d = !1, g.checkForward(), d) : null
        } function k(a) { return a.block.getParent().getChildCount() }
        function l(a, b, c) { return !1 !== a.config.autoParagraph && a.activeEnterMode != CKEDITOR.ENTER_BR && (a.editable().equals(c) && !b || b && "true" == b.getAttribute("contenteditable")) } function q(a) { return a.activeEnterMode != CKEDITOR.ENTER_BR && !1 !== a.config.autoParagraph ? a.activeEnterMode == CKEDITOR.ENTER_DIV ? "div" : "p" : !1 } function f(a) { a && a.isEmptyInlineRemoveable() && a.remove() } function w(a) { var b = a.editor; b.getSelection().scrollIntoView(); setTimeout(function () { b.fire("saveSnapshot") }, 0) } function B(a, b, c) {
            var d = a.getCommonAncestor(b);
            for (b = a = c ? b : a; (a = a.getParent()) && !d.equals(a) && 1 == a.getChildCount();)b = a; b.remove()
        } var y, F, r, m, L, v, J, G, p, u, K = { ul: 1, ol: 1, dl: 1 }; CKEDITOR.editable = CKEDITOR.tools.createClass({
            base: CKEDITOR.dom.element, $: function (a, b) { this.base(b.$ || b); this.editor = a; this.status = "unloaded"; this.hasFocus = !1; this.setup() }, proto: {
                focus: function () {
                    var a; if (CKEDITOR.env.webkit && !this.hasFocus && (a = this.editor._.previousActive || this.getDocument().getActive(), this.contains(a))) { a.focus(); return } CKEDITOR.env.edge && 14 < CKEDITOR.env.version &&
                        !this.hasFocus && this.getDocument().equals(CKEDITOR.document) && (this.editor._.previousScrollTop = this.$.scrollTop); try { if (!CKEDITOR.env.ie || CKEDITOR.env.edge && 14 < CKEDITOR.env.version || !this.getDocument().equals(CKEDITOR.document)) if (CKEDITOR.env.chrome) { var b = this.$.scrollTop; this.$.focus(); this.$.scrollTop = b } else this.$.focus(); else this.$.setActive() } catch (c) { if (!CKEDITOR.env.ie) throw c; } CKEDITOR.env.safari && !this.isInline() && (a = CKEDITOR.document.getActive(), a.equals(this.getWindow().getFrame()) ||
                            this.getWindow().focus())
                }, on: function (a, b) { var c = Array.prototype.slice.call(arguments, 0); CKEDITOR.env.ie && /^focus|blur$/.exec(a) && (a = "focus" == a ? "focusin" : "focusout", b = g(b, this), c[0] = a, c[1] = b); return CKEDITOR.dom.element.prototype.on.apply(this, c) }, attachListener: function (a) { !this._.listeners && (this._.listeners = []); var b = Array.prototype.slice.call(arguments, 1), b = a.on.apply(a, b); this._.listeners.push(b); return b }, clearListeners: function () { var a = this._.listeners; try { for (; a.length;)a.pop().removeListener() } catch (b) { } },
                restoreAttrs: function () { var a = this._.attrChanges, b, c; for (c in a) a.hasOwnProperty(c) && (b = a[c], null !== b ? this.setAttribute(c, b) : this.removeAttribute(c)) }, attachClass: function (a) { var b = this.getCustomData("classes"); this.hasClass(a) || (!b && (b = []), b.push(a), this.setCustomData("classes", b), this.addClass(a)) }, changeAttr: function (a, b) { var c = this.getAttribute(a); b !== c && (!this._.attrChanges && (this._.attrChanges = {}), a in this._.attrChanges || (this._.attrChanges[a] = c), this.setAttribute(a, b)) }, insertText: function (a) {
                    this.editor.focus();
                    this.insertHtml(this.transformPlainTextToHtml(a), "text")
                }, transformPlainTextToHtml: function (a) { var b = this.editor.getSelection().getStartElement().hasAscendant("pre", !0) ? CKEDITOR.ENTER_BR : this.editor.activeEnterMode; return CKEDITOR.tools.transformPlainTextToHtml(a, b) }, insertHtml: function (a, b, c) { var d = this.editor; d.focus(); d.fire("saveSnapshot"); c || (c = d.getSelection().getRanges()[0]); v(this, b || "html", a, c); c.select(); w(this); this.editor.fire("afterInsertHtml", {}) }, insertHtmlIntoRange: function (a, b, c) {
                    v(this,
                        c || "html", a, b); this.editor.fire("afterInsertHtml", { intoRange: b })
                }, insertElement: function (a, b) {
                    var d = this.editor; d.focus(); d.fire("saveSnapshot"); var e = d.activeEnterMode, d = d.getSelection(), f = a.getName(), f = CKEDITOR.dtd.$block[f]; b || (b = d.getRanges()[0]); this.insertElementIntoRange(a, b) && (b.moveToPosition(a, CKEDITOR.POSITION_AFTER_END), f && ((f = a.getNext(function (a) { return c(a) && !m(a) })) && f.type == CKEDITOR.NODE_ELEMENT && f.is(CKEDITOR.dtd.$block) ? f.getDtd()["#"] ? b.moveToElementEditStart(f) : b.moveToElementEditEnd(a) :
                        f || e == CKEDITOR.ENTER_BR || (f = b.fixBlock(!0, e == CKEDITOR.ENTER_DIV ? "div" : "p"), b.moveToElementEditStart(f)))); d.selectRanges([b]); w(this)
                }, insertElementIntoSelection: function (a) { this.insertElement(a) }, insertElementIntoRange: function (a, b) {
                    var c = this.editor, d = c.config.enterMode, e = a.getName(), g = CKEDITOR.dtd.$block[e]; if (b.checkReadOnly()) return !1; b.deleteContents(1); b.startContainer.type == CKEDITOR.NODE_ELEMENT && (b.startContainer.is({ tr: 1, table: 1, tbody: 1, thead: 1, tfoot: 1 }) ? J(b) : b.startContainer.is(CKEDITOR.dtd.$list) &&
                        G(b)); var h, k; if (g) for (; (h = b.getCommonAncestor(0, 1)) && (k = CKEDITOR.dtd[h.getName()]) && (!k || !k[e]);)if (h.getName() in CKEDITOR.dtd.span) { var g = b.splitElement(h), x = b.createBookmark(); f(h); f(g); b.moveToBookmark(x) } else b.checkStartOfBlock() && b.checkEndOfBlock() ? (b.setStartBefore(h), b.collapse(!0), h.remove()) : b.splitBlock(d == CKEDITOR.ENTER_DIV ? "div" : "p", c.editable()); b.insertNode(a); return !0
                }, setData: function (a, b) {
                    b || (a = this.editor.dataProcessor.toHtml(a)); this.setHtml(a); this.fixInitialSelection(); "unloaded" ==
                        this.status && (this.status = "ready"); this.editor.fire("dataReady")
                }, getData: function (a) { var b = this.getHtml(); a || (b = this.editor.dataProcessor.toDataFormat(b)); return b }, setReadOnly: function (a) { this.setAttribute("contenteditable", String(!a)); this.setAttribute("aria-readonly", String(a)) }, detach: function () {
                    this.status = "detached"; this.editor.setData(this.editor.getData(), { internal: !0 }); this.clearListeners(); try { this._.cleanCustomData() } catch (a) { if (!CKEDITOR.env.ie || -2146828218 !== a.number) throw a; } this.editor.fire("contentDomUnload");
                    delete this.editor.document; delete this.editor.window; delete this.editor
                }, isInline: function () { return this.getDocument().equals(CKEDITOR.document) }, fixInitialSelection: function () {
                    function a() {
                        var b = c.getDocument().$, d = b.getSelection(), e; a: if (d.anchorNode && d.anchorNode == c.$) e = !0; else { if (CKEDITOR.env.webkit && (e = c.getDocument().getActive()) && e.equals(c) && !d.anchorNode) { e = !0; break a } e = void 0 } e && (e = new CKEDITOR.dom.range(c), e.moveToElementEditStart(c), b = b.createRange(), b.setStart(e.startContainer.$, e.startOffset),
                            b.collapse(!0), d.removeAllRanges(), d.addRange(b))
                    } function b() { var a = c.getDocument().$, d = a.selection, e = c.getDocument().getActive(); "None" == d.type && e.equals(c) && (d = new CKEDITOR.dom.range(c), a = a.body.createTextRange(), d.moveToElementEditStart(c), d = d.startContainer, d.type != CKEDITOR.NODE_ELEMENT && (d = d.getParent()), a.moveToElementText(d.$), a.collapse(!0), a.select()) } var c = this; if (CKEDITOR.env.ie && (9 > CKEDITOR.env.version || CKEDITOR.env.quirks)) this.hasFocus && (this.focus(), b()); else if (this.hasFocus) this.focus(),
                        a(); else this.once("focus", function () { a() }, null, null, -999)
                }, getHtmlFromRange: function (a) { if (a.collapsed) return new CKEDITOR.dom.documentFragment(a.document); a = { doc: this.getDocument(), range: a.clone() }; p.eol.detect(a, this); p.bogus.exclude(a); p.cell.shrink(a); a.fragment = a.range.cloneContents(); p.tree.rebuild(a, this); p.eol.fix(a, this); return new CKEDITOR.dom.documentFragment(a.fragment.$) }, extractHtmlFromRange: function (a, b) {
                    var c = u, d = { range: a, doc: a.document }, e = this.getHtmlFromRange(a); if (a.collapsed) return a.optimize(),
                        e; a.enlarge(CKEDITOR.ENLARGE_INLINE, 1); c.table.detectPurge(d); d.bookmark = a.createBookmark(); delete d.range; var f = this.editor.createRange(); f.moveToPosition(d.bookmark.startNode, CKEDITOR.POSITION_BEFORE_START); d.targetBookmark = f.createBookmark(); c.list.detectMerge(d, this); c.table.detectRanges(d, this); c.block.detectMerge(d, this); d.tableContentsRanges ? (c.table.deleteRanges(d), a.moveToBookmark(d.bookmark), d.range = a) : (a.moveToBookmark(d.bookmark), d.range = a, a.extractContents(c.detectExtractMerge(d))); a.moveToBookmark(d.targetBookmark);
                    a.optimize(); c.fixUneditableRangePosition(a); c.list.merge(d, this); c.table.purge(d, this); c.block.merge(d, this); if (b) { c = a.startPath(); if (d = a.checkStartOfBlock() && a.checkEndOfBlock() && c.block && !a.root.equals(c.block)) { a: { var d = c.block.getElementsByTag("span"), f = 0, g; if (d) for (; g = d.getItem(f++);)if (!F(g)) { d = !0; break a } d = !1 } d = !d } d && (a.moveToPosition(c.block, CKEDITOR.POSITION_BEFORE_START), c.block.remove()) } else c.autoParagraph(this.editor, a), r(a.startContainer) && a.startContainer.appendBogus(); a.startContainer.mergeSiblings();
                    return e
                }, setup: function () {
                    var a = this.editor; this.attachListener(a, "beforeGetData", function () { var b = this.getData(); this.is("textarea") || !1 !== a.config.ignoreEmptyParagraph && (b = b.replace(L, function (a, b) { return b })); a.setData(b, null, 1) }, this); this.attachListener(a, "getSnapshot", function (a) { a.data = this.getData(1) }, this); this.attachListener(a, "afterSetData", function () { this.setData(a.getData(1)) }, this); this.attachListener(a, "loadSnapshot", function (a) { this.setData(a.data, 1) }, this); this.attachListener(a,
                        "beforeFocus", function () { var b = a.getSelection(); (b = b && b.getNative()) && "Control" == b.type || this.focus() }, this); this.attachListener(a, "insertHtml", function (a) { this.insertHtml(a.data.dataValue, a.data.mode, a.data.range) }, this); this.attachListener(a, "insertElement", function (a) { this.insertElement(a.data) }, this); this.attachListener(a, "insertText", function (a) { this.insertText(a.data) }, this); this.setReadOnly(a.readOnly); this.attachClass("cke_editable"); a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? this.attachClass("cke_editable_inline") :
                            a.elementMode != CKEDITOR.ELEMENT_MODE_REPLACE && a.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO || this.attachClass("cke_editable_themed"); this.attachClass("cke_contents_" + a.config.contentsLangDirection); a.keystrokeHandler.blockedKeystrokes[8] = +a.readOnly; a.keystrokeHandler.attach(this); this.on("blur", function () { this.hasFocus = !1 }, null, null, -1); this.on("focus", function () { this.hasFocus = !0 }, null, null, -1); if (CKEDITOR.env.webkit) this.on("scroll", function () { a._.previousScrollTop = a.editable().$.scrollTop }, null,
                                null, -1); if (CKEDITOR.env.edge && 14 < CKEDITOR.env.version) { var d = function () { var b = a.editable(); null != a._.previousScrollTop && b.getDocument().equals(CKEDITOR.document) && (b.$.scrollTop = a._.previousScrollTop, a._.previousScrollTop = null, this.removeListener("scroll", d)) }; this.on("scroll", d) } a.focusManager.add(this); this.equals(CKEDITOR.document.getActive()) && (this.hasFocus = !0, a.once("contentDom", function () { a.focusManager.focus(this) }, this)); this.isInline() && this.changeAttr("tabindex", a.tabIndex); if (!this.is("textarea")) {
                                    a.document =
                                    this.getDocument(); a.window = this.getWindow(); var f = a.document; this.changeAttr("spellcheck", !a.config.disableNativeSpellChecker); var g = a.config.contentsLangDirection; this.getDirection(1) != g && this.changeAttr("dir", g); var C = CKEDITOR.getCss(); if (C) {
                                        var g = f.getHead(), I = g.getCustomData("stylesheet"); I ? C != I.getText() && (CKEDITOR.env.ie && 9 > CKEDITOR.env.version ? I.$.styleSheet.cssText = C : I.setText(C)) : (C = f.appendStyleText(C), C = new CKEDITOR.dom.element(C.ownerNode || C.owningElement), g.setCustomData("stylesheet",
                                            C), C.data("cke-temp", 1))
                                    } g = f.getCustomData("stylesheet_ref") || 0; f.setCustomData("stylesheet_ref", g + 1); this.setCustomData("cke_includeReadonly", !a.config.disableReadonlyStyling); this.attachListener(this, "click", function (a) { a = a.data; var b = (new CKEDITOR.dom.elementPath(a.getTarget(), this)).contains("a"); b && 2 != a.$.button && b.isReadOnly() && a.preventDefault() }); var l = { 8: 1, 46: 1 }; this.attachListener(a, "key", function (b) {
                                        if (a.readOnly) return !0; var c = b.data.domEvent.getKey(), d, f = a.getSelection(); if (0 !== f.getRanges().length) {
                                            if (c in
                                                l) {
                                                    var g; b = f.getRanges()[0]; var t = b.startPath(), C, D, I, c = 8 == c, q = !1; if (CKEDITOR.env.ie && 11 > CKEDITOR.env.version && f.getSelectedElement()) g = f.getSelectedElement(); else if (e(f)) {
                                                        var m = new CKEDITOR.dom.walker(b), z = b.collapsed ? b.startContainer : m.next(), q = !1, w; if (b.checkStartOfBlock()) { w = b.startPath().block || b.startPath().blockLimit; var p = w.getName(); w = -1 !== CKEDITOR.tools.array.indexOf(["dd", "dt", "li"], p) && null === w.getPrevious() } else w = !1; if (w) {
                                                            for (; z && !q;)q = z.$.nodeName.toLowerCase(), q = !!K[q], z = m.next();
                                                            m = k(b.startPath()); z = k(b.endPath()); q = q || m !== z
                                                        } else q = void 0; q || (g = h(f))
                                                    } g || q ? (a.fire("saveSnapshot"), q ? ((d = b.startContainer.getAscendant(K, !0)) ? (b.setStart(d, 0), b.enlarge(CKEDITOR.ENLARGE_ELEMENT), g = b) : g = null, g.deleteContents()) : (b.moveToPosition(g, CKEDITOR.POSITION_BEFORE_START), g.remove()), b.select(), a.fire("saveSnapshot"), d = 1) : b.collapsed && ((C = t.block) && (I = C[c ? "getPrevious" : "getNext"](y)) && I.type == CKEDITOR.NODE_ELEMENT && I.is("table") && b[c ? "checkStartOfBlock" : "checkEndOfBlock"]() ? (a.fire("saveSnapshot"),
                                                        b[c ? "checkEndOfBlock" : "checkStartOfBlock"]() && C.remove(), b["moveToElementEdit" + (c ? "End" : "Start")](I), b.select(), a.fire("saveSnapshot"), d = 1) : t.blockLimit && t.blockLimit.is("td") && (D = t.blockLimit.getAscendant("table")) && b.checkBoundaryOfElement(D, c ? CKEDITOR.START : CKEDITOR.END) && (I = D[c ? "getPrevious" : "getNext"](y)) ? (a.fire("saveSnapshot"), b["moveToElementEdit" + (c ? "End" : "Start")](I), b.checkStartOfBlock() && b.checkEndOfBlock() ? I.remove() : b.select(), a.fire("saveSnapshot"), d = 1) : (D = t.contains(["td", "th", "caption"])) &&
                                                            b.checkBoundaryOfElement(D, c ? CKEDITOR.START : CKEDITOR.END) && (d = 1))
                                            } return !d
                                        }
                                    }); a.blockless && CKEDITOR.env.ie && CKEDITOR.env.needsBrFiller && this.attachListener(this, "keyup", function (b) { b.data.getKeystroke() in l && !this.getFirst(c) && (this.appendBogus(), b = a.createRange(), b.moveToPosition(this, CKEDITOR.POSITION_AFTER_START), b.select()) }); this.attachListener(this, "dblclick", function (b) { if (a.readOnly) return !1; b = { element: b.data.getTarget() }; a.fire("doubleclick", b) }); CKEDITOR.env.ie && this.attachListener(this,
                                        "click", b); CKEDITOR.env.ie && !CKEDITOR.env.edge || this.attachListener(this, "mousedown", function (b) { var c = b.data.getTarget(); c.is("img", "hr", "input", "textarea", "select") && !c.isReadOnly() && (a.getSelection().selectElement(c), c.is("input", "textarea", "select") && b.data.preventDefault()) }); CKEDITOR.env.edge && this.attachListener(this, "mouseup", function (b) { (b = b.data.getTarget()) && b.is("img") && !b.isReadOnly() && a.getSelection().selectElement(b) }); CKEDITOR.env.gecko && this.attachListener(this, "mouseup", function (b) {
                                            if (2 ==
                                                b.data.$.button && (b = b.data.getTarget(), !b.getAscendant("table") && !b.getOuterHtml().replace(L, ""))) { var c = a.createRange(); c.moveToElementEditStart(b); c.select(!0) }
                                        }); CKEDITOR.env.webkit && (this.attachListener(this, "click", function (a) { a.data.getTarget().is("input", "select") && a.data.preventDefault() }), this.attachListener(this, "mouseup", function (a) { a.data.getTarget().is("input", "textarea") && a.data.preventDefault() })); CKEDITOR.env.webkit && this.attachListener(a, "key", function (b) {
                                            if (a.readOnly) return !0; var c =
                                                b.data.domEvent.getKey(); if (c in l && (b = a.getSelection(), 0 !== b.getRanges().length)) {
                                                    var c = 8 == c, d = b.getRanges()[0]; b = d.startPath(); if (d.collapsed) a: {
                                                        var e = b.block; if (e && d[c ? "checkStartOfBlock" : "checkEndOfBlock"](!0) && d.moveToClosestEditablePosition(e, !c) && d.collapsed) {
                                                            if (d.startContainer.type == CKEDITOR.NODE_ELEMENT) { var f = d.startContainer.getChild(d.startOffset - (c ? 1 : 0)); if (f && f.type == CKEDITOR.NODE_ELEMENT && f.is("hr")) { a.fire("saveSnapshot"); f.remove(); b = !0; break a } } d = d.startPath().block; if (!d || d && d.contains(e)) b =
                                                                void 0; else { a.fire("saveSnapshot"); var g; (g = (c ? d : e).getBogus()) && g.remove(); g = a.getSelection(); f = g.createBookmarks(); (c ? e : d).moveChildren(c ? d : e, !1); b.lastElement.mergeSiblings(); B(e, d, !c); g.selectBookmarks(f); b = !0 }
                                                        } else b = !1
                                                    } else c = d, g = b.block, d = c.endPath().block, g && d && !g.equals(d) ? (a.fire("saveSnapshot"), (e = g.getBogus()) && e.remove(), c.enlarge(CKEDITOR.ENLARGE_INLINE), c.deleteContents(), d.getParent() && (d.moveChildren(g, !1), b.lastElement.mergeSiblings(), B(g, d, !0)), c = a.getSelection().getRanges()[0],
                                                        c.collapse(1), c.optimize(), "" === c.startContainer.getHtml() && c.startContainer.appendBogus(), c.select(), b = !0) : b = !1; if (!b) return; a.getSelection().scrollIntoView(); a.fire("saveSnapshot"); return !1
                                                }
                                        }, this, null, 100)
                                }
                }, getUniqueId: function () { var a; try { this._.expandoNumber = a = CKEDITOR.dom.domObject.prototype.getUniqueId.call(this) } catch (b) { a = this._ && this._.expandoNumber } return a }
            }, _: {
                cleanCustomData: function () {
                    this.removeClass("cke_editable"); this.restoreAttrs(); for (var a = this.removeCustomData("classes"); a &&
                        a.length;)this.removeClass(a.pop()); if (!this.is("textarea")) { var a = this.getDocument(), b = a.getHead(); if (b.getCustomData("stylesheet")) { var c = a.getCustomData("stylesheet_ref"); --c ? a.setCustomData("stylesheet_ref", c) : (a.removeCustomData("stylesheet_ref"), b.removeCustomData("stylesheet").remove()) } }
                }
            }
        }); CKEDITOR.editor.prototype.editable = function (a) {
            var b = this._.editable; if (b && a) return 0; if (!arguments.length) return b; a ? b = a instanceof CKEDITOR.editable ? a : new CKEDITOR.editable(this, a) : (b && b.detach(), b =
                null); return this._.editable = b
        }; CKEDITOR.on("instanceLoaded", function (b) {
            var c = b.editor; c.on("insertElement", function (a) { a = a.data; a.type == CKEDITOR.NODE_ELEMENT && (a.is("input") || a.is("textarea")) && ("false" != a.getAttribute("contentEditable") && a.data("cke-editable", a.hasAttribute("contenteditable") ? "true" : "1"), a.setAttribute("contentEditable", !1)) }); c.on("selectionChange", function (b) {
                if (!c.readOnly) {
                    var d = c.getSelection(); d && !d.isLocked && (d = c.checkDirty(), c.fire("lockSnapshot"), a(b), c.fire("unlockSnapshot"),
                        !d && c.resetDirty())
                }
            })

        }); CKEDITOR.on("instanceCreated", function (a) {
            var b = a.editor; b.on("mode", function () {
                var a = b.editable(); if (a && a.isInline()) {
                    var c = b.title; a.changeAttr("role", "textbox"); a.changeAttr("aria-multiline", "true"); c && a.changeAttr("aria-label", c); c && a.changeAttr("title", c); var d = b.fire("ariaEditorHelpLabel", {}).label; if (d && (c = this.ui.space(this.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? "top" : "contents"))) {
                        var e = CKEDITOR.tools.getNextId(), d = CKEDITOR.dom.element.createFromHtml('\x3cspan id\x3d"' +
                            e + '" class\x3d"cke_voice_label"\x3e' + d + "\x3c/span\x3e"); c.append(d); a.changeAttr("aria-describedby", e)
                    }
                }
            })
        }); CKEDITOR.addCss(".cke_editable{cursor:text}.cke_editable img,.cke_editable input,.cke_editable textarea{cursor:default}"); y = CKEDITOR.dom.walker.whitespaces(!0); F = CKEDITOR.dom.walker.bookmark(!1, !0); r = CKEDITOR.dom.walker.empty(); m = CKEDITOR.dom.walker.bogus(); L = /(^|<body\b[^>]*>)\s*<(p|div|address|h\d|center|pre)[^>]*>\s*(?:<br[^>]*>|&nbsp;|\u00A0|&#160;)?\s*(:?<\/\2>)?\s*(?=$|<\/body>)/gi; v =
            function () {
                function a(b) { return b.type == CKEDITOR.NODE_ELEMENT } function b(c, d) {
                    var e, f, g, h, k = [], x = d.range.startContainer; e = d.range.startPath(); for (var x = m[x.getName()], t = 0, C = c.getChildren(), D = C.count(), I = -1, H = -1, M = 0, l = e.contains(m.$list); t < D; ++t)e = C.getItem(t), a(e) ? (g = e.getName(), l && g in CKEDITOR.dtd.$list ? k = k.concat(b(e, d)) : (h = !!x[g], "br" != g || !e.data("cke-eol") || t && t != D - 1 || (M = (f = t ? k[t - 1].node : C.getItem(t + 1)) && (!a(f) || !f.is("br")), f = f && a(f) && m.$block[f.getName()]), -1 != I || h || (I = t), h || (H = t), k.push({
                        isElement: 1,
                        isLineBreak: M, isBlock: e.isBlockBoundary(), hasBlockSibling: f, node: e, name: g, allowed: h
                    }), f = M = 0)) : k.push({ isElement: 0, node: e, allowed: 1 }); -1 < I && (k[I].firstNotAllowed = 1); -1 < H && (k[H].lastNotAllowed = 1); return k
                } function d(b, c) { var e = [], f = b.getChildren(), g = f.count(), h, k = 0, x = m[c], C = !b.is(m.$inline) || b.is("br"); for (C && e.push(" "); k < g; k++)h = f.getItem(k), a(h) && !h.is(x) ? e = e.concat(d(h, c)) : e.push(h); C && e.push(" "); return e } function e(b) { return a(b.startContainer) && b.startContainer.getChild(b.startOffset - 1) } function g(b) {
                    return b &&
                        a(b) && (b.is(m.$removeEmpty) || b.is("a") && !b.isBlockBoundary())
                } function h(b, c, d, e) { var f = b.clone(), g, k; f.setEndAt(c, CKEDITOR.POSITION_BEFORE_END); (g = (new CKEDITOR.dom.walker(f)).next()) && a(g) && x[g.getName()] && (k = g.getPrevious()) && a(k) && !k.getParent().equals(b.startContainer) && d.contains(k) && e.contains(g) && g.isIdentical(k) && (g.moveChildren(k), g.remove(), h(b, c, d, e)) } function k(b, c) {
                    function d(b, c) { if (c.isBlock && c.isElement && !c.node.is("br") && a(b) && b.is("br")) return b.remove(), 1 } var e = c.endContainer.getChild(c.endOffset),
                        f = c.endContainer.getChild(c.endOffset - 1); e && d(e, b[b.length - 1]); f && d(f, b[0]) && (c.setEnd(c.endContainer, c.endOffset - 1), c.collapse())
                } var m = CKEDITOR.dtd, x = { p: 1, div: 1, h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1, ul: 1, ol: 1, li: 1, pre: 1, dl: 1, blockquote: 1 }, H = { p: 1, div: 1, h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1 }, M = CKEDITOR.tools.extend({}, m.$inline); delete M.br; return function (x, A, Q, w) {
                    var p = x.editor, r = !1, y; "unfiltered_html" == A && (A = "html", r = !0); if (!w.checkReadOnly()) {
                        var B = (new CKEDITOR.dom.elementPath(w.startContainer, w.root)).blockLimit ||
                            w.root; A = { type: A, dontFilter: r, editable: x, editor: p, range: w, blockLimit: B, mergeCandidates: [], zombies: [] }; var r = A.range, B = A.mergeCandidates, u = "html" === A.type, v, S, F, W, K; "text" == A.type && r.shrink(CKEDITOR.SHRINK_ELEMENT, !0, !1) && (S = CKEDITOR.dom.element.createFromHtml("\x3cspan\x3e\x26nbsp;\x3c/span\x3e", r.document), r.insertNode(S), r.setStartAfter(S)); F = new CKEDITOR.dom.elementPath(r.startContainer); A.endPath = W = new CKEDITOR.dom.elementPath(r.endContainer); if (!r.collapsed) {
                                v = W.block || W.blockLimit; var Z = r.getCommonAncestor();
                                v && !v.equals(Z) && !v.contains(Z) && r.checkEndOfBlock() && A.zombies.push(v); r.deleteContents()
                            } for (; (K = e(r)) && a(K) && K.isBlockBoundary() && F.contains(K);)r.moveToPosition(K, CKEDITOR.POSITION_BEFORE_END); h(r, A.blockLimit, F, W); S && (r.setEndBefore(S), r.collapse(), S.remove()); S = r.startPath(); if (v = S.contains(g, !1, 1)) y = r.splitElement(v), A.inlineStylesRoot = v, A.inlineStylesPeak = S.lastElement; S = r.createBookmark(); u && (f(v), f(y)); (v = S.startNode.getPrevious(c)) && a(v) && g(v) && B.push(v); (v = S.startNode.getNext(c)) && a(v) &&
                                g(v) && B.push(v); for (v = S.startNode; (v = v.getParent()) && g(v);)B.push(v); r.moveToBookmark(S); y = x.getHtml(); y = "" === y || y.match(L); p.enterMode === CKEDITOR.ENTER_DIV && y && ((p = x.getFirst()) && p.remove(), w.setStartAt(x, CKEDITOR.POSITION_AFTER_START), w.collapse(!0)); if (x = Q) {
                                    x = A.range; if ("text" == A.type && A.inlineStylesRoot) { w = A.inlineStylesPeak; p = w.getDocument().createText("{cke-peak}"); for (y = A.inlineStylesRoot.getParent(); !w.equals(y);)p = p.appendTo(w.clone()), w = w.getParent(); Q = p.getOuterHtml().split("{cke-peak}").join(Q) } w =
                                        A.blockLimit.getName(); if (/^\s+|\s+$/.test(Q) && "span" in CKEDITOR.dtd[w]) { var J = '\x3cspan data-cke-marker\x3d"1"\x3e\x26nbsp;\x3c/span\x3e'; Q = J + Q + J } Q = A.editor.dataProcessor.toHtml(Q, { context: null, fixForBody: !1, protectedWhitespaces: !!J, dontFilter: A.dontFilter, filter: A.editor.activeFilter, enterMode: A.editor.activeEnterMode }); w = x.document.createElement("body"); w.setHtml(Q); J && (w.getFirst().remove(), w.getLast().remove()); if ((J = x.startPath().block) && (1 != J.getChildCount() || !J.getBogus())) a: {
                                            var P; if (1 ==
                                                w.getChildCount() && a(P = w.getFirst()) && P.is(H) && !P.hasAttribute("contenteditable")) { J = P.getElementsByTag("*"); x = 0; for (y = J.count(); x < y; x++)if (p = J.getItem(x), !p.is(M)) break a; P.moveChildren(P.getParent(1)); P.remove() }
                                        } A.dataWrapper = w; x = Q
                                } if (x) {
                                    P = A.range; x = P.document; w = A.blockLimit; y = 0; var G, J = [], ca, O; Q = S = 0; var U, p = P.startContainer; K = A.endPath.elements[0]; var R, r = K.getPosition(p), B = !!K.getCommonAncestor(p) && r != CKEDITOR.POSITION_IDENTICAL && !(r & CKEDITOR.POSITION_CONTAINS + CKEDITOR.POSITION_IS_CONTAINED),
                                        p = b(A.dataWrapper, A); for (A.editor.enterMode !== CKEDITOR.ENTER_BR && k(p, P); y < p.length; y++) {
                                            r = p[y]; if (u = r.isLineBreak) u = P, v = w, W = F = void 0, r.hasBlockSibling ? u = 1 : (F = u.startContainer.getAscendant(m.$block, 1)) && F.is({ div: 1, p: 1 }) ? (W = F.getPosition(v), W == CKEDITOR.POSITION_IDENTICAL || W == CKEDITOR.POSITION_CONTAINS ? u = 0 : (v = u.splitElement(F), u.moveToPosition(v, CKEDITOR.POSITION_AFTER_START), u = 1)) : u = 0; if (u) Q = 0 < y; else {
                                                u = P.startPath(); !r.isBlock && l(A.editor, u.block, u.blockLimit) && (O = q(A.editor)) && (O = x.createElement(O),
                                                    O.appendBogus(), P.insertNode(O), CKEDITOR.env.needsBrFiller && (G = O.getBogus()) && G.remove(), P.moveToPosition(O, CKEDITOR.POSITION_BEFORE_END)); if ((u = P.startPath().block) && !u.equals(ca)) { if (G = u.getBogus()) G.remove(), J.push(u); ca = u } r.firstNotAllowed && (S = 1); if (S && r.isElement) {
                                                        u = P.startContainer; for (v = null; u && !m[u.getName()][r.name];) { if (u.equals(w)) { u = null; break } v = u; u = u.getParent() } if (u) v && (U = P.splitElement(v), A.zombies.push(U), A.zombies.push(v)); else {
                                                            v = w.getName(); R = !y; u = y == p.length - 1; v = d(r.node, v); F = [];
                                                            W = v.length; for (var Z = 0, Y = void 0, da = 0, fa = -1; Z < W; Z++)Y = v[Z], " " == Y ? (da || R && !Z || (F.push(new CKEDITOR.dom.text(" ")), fa = F.length), da = 1) : (F.push(Y), da = 0); u && fa == F.length && F.pop(); R = F
                                                        }
                                                    } if (R) { for (; u = R.pop();)P.insertNode(u); R = 0 } else P.insertNode(r.node); r.lastNotAllowed && y < p.length - 1 && ((U = B ? K : U) && P.setEndAt(U, CKEDITOR.POSITION_AFTER_START), S = 0); P.collapse()
                                            }
                                        } 1 != p.length ? G = !1 : (G = p[0], G = G.isElement && "false" == G.node.getAttribute("contenteditable")); G && (Q = !0, u = p[0].node, P.setStartAt(u, CKEDITOR.POSITION_BEFORE_START),
                                            P.setEndAt(u, CKEDITOR.POSITION_AFTER_END)); A.dontMoveCaret = Q; A.bogusNeededBlocks = J
                                } G = A.range; var ba; R = A.bogusNeededBlocks; for (ca = G.createBookmark(); O = A.zombies.pop();)O.getParent() && (U = G.clone(), U.moveToElementEditStart(O), U.removeEmptyBlocksAtEnd()); if (R) for (; O = R.pop();)CKEDITOR.env.needsBrFiller ? O.appendBogus() : O.append(G.document.createText(" ")); for (; O = A.mergeCandidates.pop();)O.mergeSiblings(); CKEDITOR.env.webkit && G.startPath() && (O = G.startPath(), O.block ? O.block.$.normalize() : O.blockLimit && O.blockLimit.$.normalize());
                        G.moveToBookmark(ca); if (!A.dontMoveCaret) { for (O = e(G); O && a(O) && !O.is(m.$empty);) { if (O.isBlockBoundary()) G.moveToPosition(O, CKEDITOR.POSITION_BEFORE_END); else { if (g(O) && O.getHtml().match(/(\s|&nbsp;)$/g)) { ba = null; break } ba = G.clone(); ba.moveToPosition(O, CKEDITOR.POSITION_BEFORE_END) } O = O.getLast(c) } ba && G.moveToRange(ba) }
                    }
                }
            }(); J = function () {
                function a(b) {
                    b = new CKEDITOR.dom.walker(b); b.guard = function (a, b) { if (b) return !1; if (a.type == CKEDITOR.NODE_ELEMENT) return a.is(CKEDITOR.dtd.$tableContent) }; b.evaluator = function (a) {
                        return a.type ==
                            CKEDITOR.NODE_ELEMENT
                    }; return b
                } function b(a, c, d) { c = a.getDocument().createElement(c); a.append(c, d); return c } function c(a) { var b = a.count(), d; for (b; 0 < b--;)d = a.getItem(b), CKEDITOR.tools.trim(d.getHtml()) || (d.appendBogus(), CKEDITOR.env.ie && 9 > CKEDITOR.env.version && d.getChildCount() && d.getFirst().remove()) } return function (d) {
                    var e = d.startContainer, f = e.getAscendant("table", 1), g = !1; c(f.getElementsByTag("td")); c(f.getElementsByTag("th")); f = d.clone(); f.setStart(e, 0); f = a(f).lastBackward(); f || (f = d.clone(), f.setEndAt(e,
                        CKEDITOR.POSITION_BEFORE_END), f = a(f).lastForward(), g = !0); f || (f = e); f.is("table") ? (d.setStartAt(f, CKEDITOR.POSITION_BEFORE_START), d.collapse(!0), f.remove()) : (f.is({ tbody: 1, thead: 1, tfoot: 1 }) && (f = b(f, "tr", g)), f.is("tr") && (f = b(f, f.getParent().is("thead") ? "th" : "td", g)), (e = f.getBogus()) && e.remove(), d.moveToPosition(f, g ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_BEFORE_END))
                }
            }(); G = function () {
                function a(b) {
                    b = new CKEDITOR.dom.walker(b); b.guard = function (a, b) {
                        if (b) return !1; if (a.type == CKEDITOR.NODE_ELEMENT) return a.is(CKEDITOR.dtd.$list) ||
                            a.is(CKEDITOR.dtd.$listItem)
                    }; b.evaluator = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.is(CKEDITOR.dtd.$listItem) }; return b
                } return function (b) {
                    var c = b.startContainer, d = !1, e; e = b.clone(); e.setStart(c, 0); e = a(e).lastBackward(); e || (e = b.clone(), e.setEndAt(c, CKEDITOR.POSITION_BEFORE_END), e = a(e).lastForward(), d = !0); e || (e = c); e.is(CKEDITOR.dtd.$list) ? (b.setStartAt(e, CKEDITOR.POSITION_BEFORE_START), b.collapse(!0), e.remove()) : ((c = e.getBogus()) && c.remove(), b.moveToPosition(e, d ? CKEDITOR.POSITION_AFTER_START :
                        CKEDITOR.POSITION_BEFORE_END), b.select())
                }
            }(); p = {
                eol: {
                    detect: function (a, b) { var c = a.range, d = c.clone(), e = c.clone(), f = new CKEDITOR.dom.elementPath(c.startContainer, b), g = new CKEDITOR.dom.elementPath(c.endContainer, b); d.collapse(1); e.collapse(); f.block && d.checkBoundaryOfElement(f.block, CKEDITOR.END) && (c.setStartAfter(f.block), a.prependEolBr = 1); g.block && e.checkBoundaryOfElement(g.block, CKEDITOR.START) && (c.setEndBefore(g.block), a.appendEolBr = 1) }, fix: function (a, b) {
                        var c = b.getDocument(), d; a.appendEolBr && (d =
                            this.createEolBr(c), a.fragment.append(d)); !a.prependEolBr || d && !d.getPrevious() || a.fragment.append(this.createEolBr(c), 1)
                    }, createEolBr: function (a) { return a.createElement("br", { attributes: { "data-cke-eol": 1 } }) }
                }, bogus: { exclude: function (a) { var b = a.range.getBoundaryNodes(), c = b.startNode, b = b.endNode; !b || !m(b) || c && c.equals(b) || a.range.setEndBefore(b) } }, tree: {
                    rebuild: function (a, b) {
                        var c = a.range, d = c.getCommonAncestor(), e = new CKEDITOR.dom.elementPath(d, b), f = new CKEDITOR.dom.elementPath(c.startContainer, b),
                        c = new CKEDITOR.dom.elementPath(c.endContainer, b), g; d.type == CKEDITOR.NODE_TEXT && (d = d.getParent()); if (e.blockLimit.is({ tr: 1, table: 1 })) { var h = e.contains("table").getParent(); g = function (a) { return !a.equals(h) } } else if (e.block && e.block.is(CKEDITOR.dtd.$listItem) && (f = f.contains(CKEDITOR.dtd.$list), c = c.contains(CKEDITOR.dtd.$list), !f.equals(c))) { var k = e.contains(CKEDITOR.dtd.$list).getParent(); g = function (a) { return !a.equals(k) } } g || (g = function (a) { return !a.equals(e.block) && !a.equals(e.blockLimit) }); this.rebuildFragment(a,
                            b, d, g)
                    }, rebuildFragment: function (a, b, c, d) { for (var e; c && !c.equals(b) && d(c);)e = c.clone(0, 1), a.fragment.appendTo(e), a.fragment = e, c = c.getParent() }
                }, cell: { shrink: function (a) { a = a.range; var b = a.startContainer, c = a.endContainer, d = a.startOffset, e = a.endOffset; b.type == CKEDITOR.NODE_ELEMENT && b.equals(c) && b.is("tr") && ++d == e && a.shrink(CKEDITOR.SHRINK_TEXT) } }
            }; u = function () {
                function a(b, c) { var d = b.getParent(); if (d.is(CKEDITOR.dtd.$inline)) b[c ? "insertBefore" : "insertAfter"](d) } function b(c, d, e) {
                    a(d); a(e, 1); for (var f; f =
                        e.getNext();)f.insertAfter(d), d = f; r(c) && c.remove()
                } function c(a, b) { var d = new CKEDITOR.dom.range(a); d.setStartAfter(b.startNode); d.setEndBefore(b.endNode); return d } return {
                    list: {
                        detectMerge: function (a, b) {
                            var d = c(b, a.bookmark), e = d.startPath(), f = d.endPath(), g = e.contains(CKEDITOR.dtd.$list), h = f.contains(CKEDITOR.dtd.$list); a.mergeList = g && h && g.getParent().equals(h.getParent()) && !g.equals(h); a.mergeListItems = e.block && f.block && e.block.is(CKEDITOR.dtd.$listItem) && f.block.is(CKEDITOR.dtd.$listItem); if (a.mergeList ||
                                a.mergeListItems) d = d.clone(), d.setStartBefore(a.bookmark.startNode), d.setEndAfter(a.bookmark.endNode), a.mergeListBookmark = d.createBookmark()
                        }, merge: function (a, c) {
                            if (a.mergeListBookmark) {
                                var d = a.mergeListBookmark.startNode, e = a.mergeListBookmark.endNode, f = new CKEDITOR.dom.elementPath(d, c), g = new CKEDITOR.dom.elementPath(e, c); if (a.mergeList) { var h = f.contains(CKEDITOR.dtd.$list), k = g.contains(CKEDITOR.dtd.$list); h.equals(k) || (k.moveChildren(h), k.remove()) } a.mergeListItems && (f = f.contains(CKEDITOR.dtd.$listItem),
                                    g = g.contains(CKEDITOR.dtd.$listItem), f.equals(g) || b(g, d, e)); d.remove(); e.remove()
                            }
                        }
                    }, block: {
                        detectMerge: function (a, b) { if (!a.tableContentsRanges && !a.mergeListBookmark) { var c = new CKEDITOR.dom.range(b); c.setStartBefore(a.bookmark.startNode); c.setEndAfter(a.bookmark.endNode); a.mergeBlockBookmark = c.createBookmark() } }, merge: function (a, c) {
                            if (a.mergeBlockBookmark && !a.purgeTableBookmark) {
                                var d = a.mergeBlockBookmark.startNode, e = a.mergeBlockBookmark.endNode, f = new CKEDITOR.dom.elementPath(d, c), g = new CKEDITOR.dom.elementPath(e,
                                    c), f = f.block, g = g.block; f && g && !f.equals(g) && b(g, d, e); d.remove(); e.remove()
                            }
                        }
                    }, table: function () {
                        function a(c) {
                            var e = [], f, g = new CKEDITOR.dom.walker(c), h = c.startPath().contains(d), k = c.endPath().contains(d), t = {}; g.guard = function (a, g) {
                                if (a.type == CKEDITOR.NODE_ELEMENT) { var H = "visited_" + (g ? "out" : "in"); if (a.getCustomData(H)) return; CKEDITOR.dom.element.setMarker(t, a, H, 1) } if (g && h && a.equals(h)) f = c.clone(), f.setEndAt(h, CKEDITOR.POSITION_BEFORE_END), e.push(f); else if (!g && k && a.equals(k)) f = c.clone(), f.setStartAt(k,
                                    CKEDITOR.POSITION_AFTER_START), e.push(f); else { if (H = !g) H = a.type == CKEDITOR.NODE_ELEMENT && a.is(d) && (!h || b(a, h)) && (!k || b(a, k)); if (!H && (H = g)) if (a.is(d)) var H = h && h.getAscendant("table", !0), D = k && k.getAscendant("table", !0), l = a.getAscendant("table", !0), H = H && H.contains(l) || D && D.contains(l); else H = void 0; H && (f = c.clone(), f.selectNodeContents(a), e.push(f)) }
                            }; g.lastForward(); CKEDITOR.dom.element.clearAllMarkers(t); return e
                        } function b(a, c) {
                            var d = CKEDITOR.POSITION_CONTAINS + CKEDITOR.POSITION_IS_CONTAINED, e = a.getPosition(c);
                            return e === CKEDITOR.POSITION_IDENTICAL ? !1 : 0 === (e & d)
                        } var d = { td: 1, th: 1, caption: 1 }; return {
                            detectPurge: function (a) {
                                var b = a.range, c = b.clone(); c.enlarge(CKEDITOR.ENLARGE_ELEMENT); var c = new CKEDITOR.dom.walker(c), e = 0; c.evaluator = function (a) { a.type == CKEDITOR.NODE_ELEMENT && a.is(d) && ++e }; c.checkForward(); if (1 < e) {
                                    var c = b.startPath().contains("table"), f = b.endPath().contains("table"); c && f && b.checkBoundaryOfElement(c, CKEDITOR.START) && b.checkBoundaryOfElement(f, CKEDITOR.END) && (b = a.range.clone(), b.setStartBefore(c),
                                        b.setEndAfter(f), a.purgeTableBookmark = b.createBookmark())
                                }
                            }, detectRanges: function (e, f) {
                                var g = c(f, e.bookmark), h = g.clone(), k, n, l = g.getCommonAncestor(); l.is(CKEDITOR.dtd.$tableContent) && !l.is(d) && (l = l.getAscendant("table", !0)); n = l; l = new CKEDITOR.dom.elementPath(g.startContainer, n); n = new CKEDITOR.dom.elementPath(g.endContainer, n); l = l.contains("table"); n = n.contains("table"); if (l || n) l && n && b(l, n) ? (e.tableSurroundingRange = h, h.setStartAt(l, CKEDITOR.POSITION_AFTER_END), h.setEndAt(n, CKEDITOR.POSITION_BEFORE_START),
                                    h = g.clone(), h.setEndAt(l, CKEDITOR.POSITION_AFTER_END), k = g.clone(), k.setStartAt(n, CKEDITOR.POSITION_BEFORE_START), k = a(h).concat(a(k))) : l ? n || (e.tableSurroundingRange = h, h.setStartAt(l, CKEDITOR.POSITION_AFTER_END), g.setEndAt(l, CKEDITOR.POSITION_AFTER_END)) : (e.tableSurroundingRange = h, h.setEndAt(n, CKEDITOR.POSITION_BEFORE_START), g.setStartAt(n, CKEDITOR.POSITION_AFTER_START)), e.tableContentsRanges = k ? k : a(g)
                            }, deleteRanges: function (a) {
                                for (var b; b = a.tableContentsRanges.pop();)b.extractContents(), r(b.startContainer) &&
                                    b.startContainer.appendBogus(); a.tableSurroundingRange && a.tableSurroundingRange.extractContents()
                            }, purge: function (a) { if (a.purgeTableBookmark) { var b = a.doc, c = a.range.clone(), b = b.createElement("p"); b.insertBefore(a.purgeTableBookmark.startNode); c.moveToBookmark(a.purgeTableBookmark); c.deleteContents(); a.range.moveToPosition(b, CKEDITOR.POSITION_AFTER_START) } }
                        }
                    }(), detectExtractMerge: function (a) { return !(a.range.startPath().contains(CKEDITOR.dtd.$listItem) && a.range.endPath().contains(CKEDITOR.dtd.$listItem)) },
                    fixUneditableRangePosition: function (a) { a.startContainer.getDtd()["#"] || a.moveToClosestEditablePosition(null, !0) }, autoParagraph: function (a, b) { var c = b.startPath(), d; l(a, c.block, c.blockLimit) && (d = q(a)) && (d = b.document.createElement(d), d.appendBogus(), b.insertNode(d), b.moveToPosition(d, CKEDITOR.POSITION_AFTER_START)) }
                }
            }()
    })();
    (function () {
        function a(a) { return CKEDITOR.plugins.widget && CKEDITOR.plugins.widget.isDomWidget(a) } function d(b, c) {
            if (0 === b.length || a(b[0].getEnclosedNode())) return !1; var d, e; if ((d = !c && 1 === b.length) && !(d = b[0].collapsed)) { var f = b[0]; d = f.startContainer.getAscendant({ td: 1, th: 1 }, !0); var g = f.endContainer.getAscendant({ td: 1, th: 1 }, !0); e = CKEDITOR.tools.trim; d && d.equals(g) && !d.findOne("td, th, tr, tbody, table") ? (f = f.cloneContents(), d = f.getFirst() ? e(f.getFirst().getText()) !== e(d.getText()) : !0) : d = !1 } if (d) return !1;
            for (e = 0; e < b.length; e++)if (d = b[e]._getTableElement(), !d) return !1; return !0
        } function b(a) { function b(a) { a = a.find("td, th"); var c = [], d; for (d = 0; d < a.count(); d++)c.push(a.getItem(d)); return c } var c = [], d, e; for (e = 0; e < a.length; e++)d = a[e]._getTableElement(), d.is && d.is({ td: 1, th: 1 }) ? c.push(d) : c = c.concat(b(d)); return c } function c(a) {
            a = b(a); var c = "", d = [], e, f; for (f = 0; f < a.length; f++)e && !e.equals(a[f].getAscendant("tr")) ? (c += d.join("\t") + "\n", e = a[f].getAscendant("tr"), d = []) : 0 === f && (e = a[f].getAscendant("tr")), d.push(a[f].getText());
            return c += d.join("\t")
        } function g(a) { var b = this.root.editor, d = b.getSelection(1); this.reset(); G = !0; d.root.once("selectionchange", function (a) { a.cancel() }, null, null, 0); d.selectRanges([a[0]]); d = this._.cache; d.ranges = new CKEDITOR.dom.rangeList(a); d.type = CKEDITOR.SELECTION_TEXT; d.selectedElement = a[0]._getTableElement(); d.selectedText = c(a); d.nativeSel = null; this.isFake = 1; this.rev = L++; b._.fakeSelection = this; G = !1; this.root.fire("selectionchange") } function e() {
            var b = this._.fakeSelection, c; if (b) {
                c = this.getSelection(1);
                var e; if (!(e = !c) && (e = !c.isHidden())) {
                    e = b; var f = c.getRanges(), g = e.getRanges(), h = f.length && f[0]._getTableElement() && f[0]._getTableElement().getAscendant("table", !0), k = g.length && g[0]._getTableElement() && g[0]._getTableElement().getAscendant("table", !0), l = 1 === f.length && f[0]._getTableElement() && f[0]._getTableElement().is("table"), M = 1 === g.length && g[0]._getTableElement() && g[0]._getTableElement().is("table"); if (a(e.getSelectedElement())) e = !1; else {
                        var n = 1 === f.length && f[0].collapsed, g = d(f, !!CKEDITOR.env.webkit) &&
                            d(g); h = h && k ? h.equals(k) || k.contains(h) : !1; h && (n || g) ? (l && !M && e.selectRanges(f), e = !0) : e = !1
                    } e = !e
                } e && (b.reset(), b = 0)
            } if (!b && (b = c || this.getSelection(1), !b || b.getType() == CKEDITOR.SELECTION_NONE)) return; this.fire("selectionCheck", b); c = this.elementPath(); c.compare(this._.selectionPreviousPath) || (e = this._.selectionPreviousPath && this._.selectionPreviousPath.blockLimit.equals(c.blockLimit), !CKEDITOR.env.webkit && !CKEDITOR.env.gecko || e || (this._.previousActive = this.document.getActive()), this._.selectionPreviousPath =
                c, this.fire("selectionChange", { selection: b, path: c }))
        } function h() { u = !0; p || (k.call(this), p = CKEDITOR.tools.setTimeout(k, 200, this)) } function k() { p = null; u && (CKEDITOR.tools.setTimeout(e, 0, this), u = !1) } function l(a) { return K(a) || a.type == CKEDITOR.NODE_ELEMENT && !a.is(CKEDITOR.dtd.$empty) ? !0 : !1 } function q(a) {
            function b(c, d) { return c && c.type != CKEDITOR.NODE_TEXT ? a.clone()["moveToElementEdit" + (d ? "End" : "Start")](c) : !1 } if (!(a.root instanceof CKEDITOR.editable)) return !1; var c = a.startContainer, d = a.getPreviousNode(l,
                null, c), e = a.getNextNode(l, null, c); return b(d) || b(e, 1) || !(d || e || c.type == CKEDITOR.NODE_ELEMENT && c.isBlockBoundary() && c.getBogus()) ? !0 : !1
        } function f(a) { w(a, !1); var b = a.getDocument().createText(v); a.setCustomData("cke-fillingChar", b); return b } function w(a, b) {
            var c = a && a.removeCustomData("cke-fillingChar"); if (c) {
                if (!1 !== b) {
                    var d = a.getDocument().getSelection().getNative(), e = d && "None" != d.type && d.getRangeAt(0), f = v.length; if (c.getLength() > f && e && e.intersectsNode(c.$)) {
                        var g = [{ node: d.anchorNode, offset: d.anchorOffset },
                        { node: d.focusNode, offset: d.focusOffset }]; d.anchorNode == c.$ && d.anchorOffset > f && (g[0].offset -= f); d.focusNode == c.$ && d.focusOffset > f && (g[1].offset -= f)
                    }
                } c.setText(B(c.getText(), 1)); g && (c = a.getDocument().$, d = c.getSelection(), c = c.createRange(), c.setStart(g[0].node, g[0].offset), c.collapse(!0), d.removeAllRanges(), d.addRange(c), d.extend(g[1].node, g[1].offset))
            }
        } function B(a, b) { return b ? a.replace(J, function (a, b) { return b ? " " : "" }) : a.replace(v, "") } function y(a, b) {
            var c = b && CKEDITOR.tools.htmlEncode(b) || "\x26nbsp;",
            c = CKEDITOR.dom.element.createFromHtml('\x3cdiv data-cke-hidden-sel\x3d"1" data-cke-temp\x3d"1" style\x3d"' + (CKEDITOR.env.ie && 14 > CKEDITOR.env.version ? "display:none" : "position:fixed;top:0;left:-1000px;width:0;height:0;overflow:hidden;") + '"\x3e' + c + "\x3c/div\x3e", a.document); a.fire("lockSnapshot"); a.editable().append(c); var d = a.getSelection(1), e = a.createRange(), f = d.root.on("selectionchange", function (a) { a.cancel() }, null, null, 0); e.setStartAt(c, CKEDITOR.POSITION_AFTER_START); e.setEndAt(c, CKEDITOR.POSITION_BEFORE_END);
            d.selectRanges([e]); f.removeListener(); a.fire("unlockSnapshot"); a._.hiddenSelectionContainer = c
        } function F(b) {
            var c = { 37: 1, 39: 1, 8: 1, 46: 1 }; return function (d) {
                var e = d.data.getKeystroke(); if (c[e]) {
                    var f = b.getSelection(), g = f.getRanges()[0]; f.isCollapsed() && (g = g[38 > e ? "getPreviousEditableNode" : "getNextEditableNode"]()) && g.type == CKEDITOR.NODE_ELEMENT && "false" == g.getAttribute("contenteditable") && (f = f.getStartElement(), !f.isBlockBoundary() || "" !== (void 0 === f.$.textContent ? f.$.innerText : f.$.textContent) || a(f.getFirst()) ||
                        8 !== e && 46 !== e || (f.remove(), b.fire("saveSnapshot")), b.getSelection().fake(g), d.data.preventDefault(), d.cancel())
                }
            }
        } function r(a) {
            for (var b = 0; b < a.length; b++) {
                var c = a[b]; c.getCommonAncestor().isReadOnly() && a.splice(b, 1); if (!c.collapsed) {
                    if (c.startContainer.isReadOnly()) for (var d = c.startContainer, e; d && !((e = d.type == CKEDITOR.NODE_ELEMENT) && d.is("body") || !d.isReadOnly());)e && "false" == d.getAttribute("contentEditable") && c.setStartAfter(d), d = d.getParent(); d = c.startContainer; e = c.endContainer; var f = c.startOffset,
                        g = c.endOffset, h = c.clone(); d && d.type == CKEDITOR.NODE_TEXT && (f >= d.getLength() ? h.setStartAfter(d) : h.setStartBefore(d)); e && e.type == CKEDITOR.NODE_TEXT && (g ? h.setEndAfter(e) : h.setEndBefore(e)); d = new CKEDITOR.dom.walker(h); d.evaluator = function (d) { if (d.type == CKEDITOR.NODE_ELEMENT && d.isReadOnly()) { var e = c.clone(); c.setEndBefore(d); c.collapsed && a.splice(b--, 1); d.getPosition(h.endContainer) & CKEDITOR.POSITION_CONTAINS || (e.setStartAfter(d), e.collapsed || a.splice(b + 1, 0, e)); return !0 } return !1 }; d.next()
                }
            } return a
        } var m =
            "function" != typeof window.getSelection, L = 1, v = CKEDITOR.tools.repeat("​", 7), J = new RegExp(v + "( )?", "g"), G, p, u, K = CKEDITOR.dom.walker.invisible(1), E = function () {
                function a(b) { return function (a) { var c = a.editor.createRange(); c.moveToClosestEditablePosition(a.selected, b) && a.editor.getSelection().selectRanges([c]); return !1 } } function b(a) {
                    return function (b) {
                        var c = b.editor, d = c.createRange(), e; if (!c.readOnly) return (e = d.moveToClosestEditablePosition(b.selected, a)) || (e = d.moveToClosestEditablePosition(b.selected,
                            !a)), e && c.getSelection().selectRanges([d]), c.fire("saveSnapshot"), b.selected.remove(), e || (d.moveToElementEditablePosition(c.editable()), c.getSelection().selectRanges([d])), c.fire("saveSnapshot"), !1
                    }
                } var c = a(), d = a(1); return { 37: c, 38: c, 39: d, 40: d, 8: b(), 46: b(1) }
            }(); CKEDITOR.on("instanceCreated", function (a) {
                function b() { var a = c.getSelection(); a && a.removeAllRanges() } var c = a.editor; c.on("contentDom", function () {
                    function a() { p = new CKEDITOR.dom.selection(c.getSelection()); p.lock() } function b() {
                        k.removeListener("mouseup",
                            b); l.removeListener("mouseup", b); var a = CKEDITOR.document.$.selection, c = a.createRange(); "None" != a.type && c.parentElement() && c.parentElement().ownerDocument == g.$ && c.select()
                    } function d(a) { var b, c; b = (b = this.document.getActive()) ? "input" === b.getName() || "textarea" === b.getName() : !1; b || (b = this.getSelection(1), (c = f(b)) && !c.equals(n) && (b.selectElement(c), a.data.preventDefault())) } function f(a) {
                        a = a.getRanges()[0]; return a ? (a = a.startContainer.getAscendant(function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.hasAttribute("contenteditable") },
                            !0)) && "false" === a.getAttribute("contenteditable") ? a : null : null
                    } var g = c.document, k = CKEDITOR.document, n = c.editable(), t = g.getBody(), l = g.getDocumentElement(), q = n.isInline(), D, p; CKEDITOR.env.gecko && n.attachListener(n, "focus", function (a) { a.removeListener(); 0 !== D && (a = c.getSelection().getNative()) && a.isCollapsed && a.anchorNode == n.$ && (a = c.createRange(), a.moveToElementEditStart(n), a.select()) }, null, null, -2); n.attachListener(n, CKEDITOR.env.webkit || CKEDITOR.env.gecko ? "focusin" : "focus", function () {
                        if (D && (CKEDITOR.env.webkit ||
                            CKEDITOR.env.gecko)) { D = c._.previousActive && c._.previousActive.equals(g.getActive()); var a = null != c._.previousScrollTop && c._.previousScrollTop != n.$.scrollTop; CKEDITOR.env.webkit && D && a && (n.$.scrollTop = c._.previousScrollTop) } c.unlockSelection(D); D = 0
                    }, null, null, -1); n.attachListener(n, "mousedown", function () { D = 0 }); if (CKEDITOR.env.ie || CKEDITOR.env.gecko || q) m ? n.attachListener(n, "beforedeactivate", a, null, null, -1) : n.attachListener(c, "selectionCheck", a, null, null, -1), n.attachListener(n, CKEDITOR.env.webkit || CKEDITOR.env.gecko ?
                        "focusout" : "blur", function () { var a = p && (p.isFake || 2 > p.getRanges().length); CKEDITOR.env.gecko && !q && a || (c.lockSelection(p), D = 1) }, null, null, -1), n.attachListener(n, "mousedown", function () { D = 0 }); if (CKEDITOR.env.ie && !q) {
                            var r; n.attachListener(n, "mousedown", function (a) { 2 == a.data.$.button && ((a = c.document.getSelection()) && a.getType() != CKEDITOR.SELECTION_NONE || (r = c.window.getScrollPosition())) }); n.attachListener(n, "mouseup", function (a) {
                                2 == a.data.$.button && r && (c.document.$.documentElement.scrollLeft = r.x, c.document.$.documentElement.scrollTop =
                                    r.y); r = null
                            }); if ("BackCompat" != g.$.compatMode) {
                                if (CKEDITOR.env.ie7Compat || CKEDITOR.env.ie6Compat) {
                                    var u, v; l.on("mousedown", function (a) {
                                        function b(a) { a = a.data.$; if (u) { var c = t.$.createTextRange(); try { c.moveToPoint(a.clientX, a.clientY) } catch (d) { } u.setEndPoint(0 > v.compareEndPoints("StartToStart", c) ? "EndToEnd" : "StartToStart", c); u.select() } } function c() { l.removeListener("mousemove", b); k.removeListener("mouseup", c); l.removeListener("mouseup", c); u.select() } a = a.data; if (a.getTarget().is("html") && a.$.y < l.$.clientHeight &&
                                            a.$.x < l.$.clientWidth) { u = t.$.createTextRange(); try { u.moveToPoint(a.$.clientX, a.$.clientY) } catch (d) { } v = u.duplicate(); l.on("mousemove", b); k.on("mouseup", c); l.on("mouseup", c) }
                                    })
                                } if (7 < CKEDITOR.env.version && 11 > CKEDITOR.env.version) l.on("mousedown", function (a) { a.data.getTarget().is("html") && (k.on("mouseup", b), l.on("mouseup", b)) })
                            }
                        } n.attachListener(n, "selectionchange", e, c); n.attachListener(n, "keyup", h, c); n.attachListener(n, "touchstart", h, c); n.attachListener(n, "touchend", h, c); CKEDITOR.env.ie && n.attachListener(n,
                            "keydown", d, c); n.attachListener(n, CKEDITOR.env.webkit || CKEDITOR.env.gecko ? "focusin" : "focus", function () { c.forceNextSelectionCheck(); c.selectionChange(1) }); if (q && (CKEDITOR.env.webkit || CKEDITOR.env.gecko)) { var y; n.attachListener(n, "mousedown", function () { y = 1 }); n.attachListener(g.getDocumentElement(), "mouseup", function () { y && h.call(c); y = 0 }) } else n.attachListener(CKEDITOR.env.ie ? n : g.getDocumentElement(), "mouseup", h, c); CKEDITOR.env.webkit && n.attachListener(g, "keydown", function (a) {
                                switch (a.data.getKey()) {
                                    case 13: case 33: case 34: case 35: case 36: case 37: case 39: case 8: case 45: case 46: n.hasFocus &&
                                        w(n)
                                }
                            }, null, null, -1); n.attachListener(n, "keydown", F(c), null, null, -1)
                }); c.on("setData", function () { c.unlockSelection(); CKEDITOR.env.webkit && b() }); c.on("contentDomUnload", function () { c.unlockSelection() }); if (CKEDITOR.env.ie9Compat) c.on("beforeDestroy", b, null, null, 9); c.on("dataReady", function () { delete c._.fakeSelection; delete c._.hiddenSelectionContainer; c.selectionChange(1) }); c.on("loadSnapshot", function () {
                    var a = CKEDITOR.dom.walker.nodeType(CKEDITOR.NODE_ELEMENT), b = c.editable().getLast(a); b && b.hasAttribute("data-cke-hidden-sel") &&
                        (b.remove(), CKEDITOR.env.gecko && (a = c.editable().getFirst(a)) && a.is("br") && a.getAttribute("_moz_editor_bogus_node") && a.remove())
                }, null, null, 100); c.on("key", function (a) { if ("wysiwyg" == c.mode) { var b = c.getSelection(); if (b.isFake) { var d = E[a.data.keyCode]; if (d) return d({ editor: c, selected: b.getSelectedElement(), selection: b, keyEvent: a }) } } })
            }); if (CKEDITOR.env.webkit) CKEDITOR.on("instanceReady", function (a) {
                var b = a.editor; b.on("selectionChange", function () {
                    var a = b.editable(), c = a.getCustomData("cke-fillingChar");
                    c && (c.getCustomData("ready") ? (w(a), a.editor.fire("selectionCheck")) : c.setCustomData("ready", 1))
                }, null, null, -1); b.on("beforeSetMode", function () { w(b.editable()) }, null, null, -1); b.on("getSnapshot", function (a) { a.data && (a.data = B(a.data)) }, b, null, 20); b.on("toDataFormat", function (a) { a.data.dataValue = B(a.data.dataValue) }, null, null, 0)
            }); CKEDITOR.editor.prototype.selectionChange = function (a) { (a ? e : h).call(this) }; CKEDITOR.editor.prototype.getSelection = function (a) {
                return !this._.savedSelection && !this._.fakeSelection ||
                    a ? (a = this.editable()) && "wysiwyg" == this.mode && "recreating" !== this.status ? new CKEDITOR.dom.selection(a) : null : this._.savedSelection || this._.fakeSelection
            }; CKEDITOR.editor.prototype.getSelectedRanges = function (a) { var b = this.getSelection(); return b && b.getRanges(a) || [] }; CKEDITOR.editor.prototype.lockSelection = function (a) { a = a || this.getSelection(1); return a.getType() != CKEDITOR.SELECTION_NONE ? (!a.isLocked && a.lock(), this._.savedSelection = a, !0) : !1 }; CKEDITOR.editor.prototype.unlockSelection = function (a) {
                var b =
                    this._.savedSelection; return b ? (b.unlock(a), delete this._.savedSelection, !0) : !1
            }; CKEDITOR.editor.prototype.forceNextSelectionCheck = function () { delete this._.selectionPreviousPath }; CKEDITOR.dom.document.prototype.getSelection = function () { return new CKEDITOR.dom.selection(this) }; CKEDITOR.dom.range.prototype.select = function () { var a = this.root instanceof CKEDITOR.editable ? this.root.editor.getSelection() : new CKEDITOR.dom.selection(this.root); a.selectRanges([this]); return a }; CKEDITOR.SELECTION_NONE = 1; CKEDITOR.SELECTION_TEXT =
                2; CKEDITOR.SELECTION_ELEMENT = 3; CKEDITOR.dom.selection = function (a) {
                    if (a instanceof CKEDITOR.dom.selection) { var b = a; a = a.root } var c = a instanceof CKEDITOR.dom.element; this.rev = b ? b.rev : L++; this.document = a instanceof CKEDITOR.dom.document ? a : a.getDocument(); this.root = c ? a : this.document.getBody(); this.isLocked = 0; this._ = { cache: {} }; if (b) return CKEDITOR.tools.extend(this._.cache, b._.cache), this.isFake = b.isFake, this.isLocked = b.isLocked, this; a = this.getNative(); var d, e; if (a) if (a.getRangeAt) d = (e = a.rangeCount && a.getRangeAt(0)) &&
                        new CKEDITOR.dom.node(e.commonAncestorContainer); else { try { e = a.createRange() } catch (f) { } d = e && CKEDITOR.dom.element.get(e.item && e.item(0) || e.parentElement()) } if (!d || d.type != CKEDITOR.NODE_ELEMENT && d.type != CKEDITOR.NODE_TEXT || !this.root.equals(d) && !this.root.contains(d)) this._.cache.type = CKEDITOR.SELECTION_NONE, this._.cache.startElement = null, this._.cache.selectedElement = null, this._.cache.selectedText = "", this._.cache.ranges = new CKEDITOR.dom.rangeList; return this
                }; var z = {
                    img: 1, hr: 1, li: 1, table: 1, tr: 1, td: 1,
                    th: 1, embed: 1, object: 1, ol: 1, ul: 1, a: 1, input: 1, form: 1, select: 1, textarea: 1, button: 1, fieldset: 1, thead: 1, tfoot: 1
                }; CKEDITOR.tools.extend(CKEDITOR.dom.selection, { _removeFillingCharSequenceString: B, _createFillingCharSequenceNode: f, FILLING_CHAR_SEQUENCE: v }); CKEDITOR.dom.selection.prototype = {
                    getNative: function () { return void 0 !== this._.cache.nativeSel ? this._.cache.nativeSel : this._.cache.nativeSel = m ? this.document.$.selection : this.document.getWindow().$.getSelection() }, getType: m ? function () {
                        var a = this._.cache; if (a.type) return a.type;
                        var b = CKEDITOR.SELECTION_NONE; try { var c = this.getNative(), d = c.type; "Text" == d && (b = CKEDITOR.SELECTION_TEXT); "Control" == d && (b = CKEDITOR.SELECTION_ELEMENT); c.createRange().parentElement() && (b = CKEDITOR.SELECTION_TEXT) } catch (e) { } return a.type = b
                    } : function () {
                        var a = this._.cache; if (a.type) return a.type; var b = CKEDITOR.SELECTION_TEXT, c = this.getNative(); if (!c || !c.rangeCount) b = CKEDITOR.SELECTION_NONE; else if (1 == c.rangeCount) {
                            var c = c.getRangeAt(0), d = c.startContainer; d == c.endContainer && 1 == d.nodeType && 1 == c.endOffset -
                                c.startOffset && z[d.childNodes[c.startOffset].nodeName.toLowerCase()] && (b = CKEDITOR.SELECTION_ELEMENT)
                        } return a.type = b
                    }, getRanges: function () {
                        var a = m ? function () {
                            function a(b) { return (new CKEDITOR.dom.node(b)).getIndex() } var b = function (b, c) {
                                b = b.duplicate(); b.collapse(c); var d = b.parentElement(); if (!d.hasChildNodes()) return { container: d, offset: 0 }; for (var e = d.children, f, g, h = b.duplicate(), k = 0, l = e.length - 1, t = -1, q, m; k <= l;)if (t = Math.floor((k + l) / 2), f = e[t], h.moveToElementText(f), q = h.compareEndPoints("StartToStart",
                                    b), 0 < q) l = t - 1; else if (0 > q) k = t + 1; else return { container: d, offset: a(f) }; if (-1 == t || t == e.length - 1 && 0 > q) { h.moveToElementText(d); h.setEndPoint("StartToStart", b); h = h.text.replace(/(\r\n|\r)/g, "\n").length; e = d.childNodes; if (!h) return f = e[e.length - 1], f.nodeType != CKEDITOR.NODE_TEXT ? { container: d, offset: e.length } : { container: f, offset: f.nodeValue.length }; for (d = e.length; 0 < h && 0 < d;)g = e[--d], g.nodeType == CKEDITOR.NODE_TEXT && (m = g, h -= g.nodeValue.length); return { container: m, offset: -h } } h.collapse(0 < q ? !0 : !1); h.setEndPoint(0 <
                                        q ? "StartToStart" : "EndToStart", b); h = h.text.replace(/(\r\n|\r)/g, "\n").length; if (!h) return { container: d, offset: a(f) + (0 < q ? 0 : 1) }; for (; 0 < h;)try { g = f[0 < q ? "previousSibling" : "nextSibling"], g.nodeType == CKEDITOR.NODE_TEXT && (h -= g.nodeValue.length, m = g), f = g } catch (w) { return { container: d, offset: a(f) } } return { container: m, offset: 0 < q ? -h : m.nodeValue.length + h }
                            }; return function () {
                                var a = this.getNative(), c = a && a.createRange(), d = this.getType(); if (!a) return []; if (d == CKEDITOR.SELECTION_TEXT) return a = new CKEDITOR.dom.range(this.root),
                                    d = b(c, !0), a.setStart(new CKEDITOR.dom.node(d.container), d.offset), d = b(c), a.setEnd(new CKEDITOR.dom.node(d.container), d.offset), a.endContainer.getPosition(a.startContainer) & CKEDITOR.POSITION_PRECEDING && a.endOffset <= a.startContainer.getIndex() && a.collapse(), [a]; if (d == CKEDITOR.SELECTION_ELEMENT) {
                                        for (var d = [], e = 0; e < c.length; e++) {
                                            for (var f = c.item(e), g = f.parentNode, h = 0, a = new CKEDITOR.dom.range(this.root); h < g.childNodes.length && g.childNodes[h] != f; h++); a.setStart(new CKEDITOR.dom.node(g), h); a.setEnd(new CKEDITOR.dom.node(g),
                                                h + 1); d.push(a)
                                        } return d
                                    } return []
                            }
                        }() : function () { var a = [], b, c = this.getNative(); if (!c) return a; for (var d = 0; d < c.rangeCount; d++) { var e = c.getRangeAt(d); b = new CKEDITOR.dom.range(this.root); b.setStart(new CKEDITOR.dom.node(e.startContainer), e.startOffset); b.setEnd(new CKEDITOR.dom.node(e.endContainer), e.endOffset); a.push(b) } return a }; return function (b) { var c = this._.cache, d = c.ranges; d || (c.ranges = d = new CKEDITOR.dom.rangeList(a.call(this))); return b ? r(new CKEDITOR.dom.rangeList(d.slice())) : d }
                    }(), getStartElement: function () {
                        var a =
                            this._.cache; if (void 0 !== a.startElement) return a.startElement; var b; switch (this.getType()) {
                                case CKEDITOR.SELECTION_ELEMENT: return this.getSelectedElement(); case CKEDITOR.SELECTION_TEXT: var c = this.getRanges()[0]; if (c) {
                                    if (c.collapsed) b = c.startContainer, b.type != CKEDITOR.NODE_ELEMENT && (b = b.getParent()); else {
                                        for (c.optimize(); b = c.startContainer, c.startOffset == (b.getChildCount ? b.getChildCount() : b.getLength()) && !b.isBlockBoundary();)c.setStartAfter(b); b = c.startContainer; if (b.type != CKEDITOR.NODE_ELEMENT) return b.getParent();
                                        if ((b = b.getChild(c.startOffset)) && b.type == CKEDITOR.NODE_ELEMENT) for (c = b.getFirst(); c && c.type == CKEDITOR.NODE_ELEMENT;)b = c, c = c.getFirst(); else b = c.startContainer
                                    } b = b.$
                                }
                            }return a.startElement = b ? new CKEDITOR.dom.element(b) : null
                    }, getSelectedElement: function () {
                        var a = this._.cache; if (void 0 !== a.selectedElement) return a.selectedElement; var b = this, c = CKEDITOR.tools.tryThese(function () { return b.getNative().createRange().item(0) }, function () {
                            for (var a = b.getRanges()[0].clone(), c, d, e = 2; e && !((c = a.getEnclosedNode()) &&
                                c.type == CKEDITOR.NODE_ELEMENT && z[c.getName()] && (d = c)); e--)a.shrink(CKEDITOR.SHRINK_ELEMENT); return d && d.$
                        }); return a.selectedElement = c ? new CKEDITOR.dom.element(c) : null
                    }, getSelectedText: function () { var a = this._.cache; if (void 0 !== a.selectedText) return a.selectedText; var b = this.getNative(), b = m ? "Control" == b.type ? "" : b.createRange().text : b.toString(); return a.selectedText = b }, lock: function () {
                        this.getRanges(); this.getStartElement(); this.getSelectedElement(); this.getSelectedText(); this._.cache.nativeSel = null;
                        this.isLocked = 1
                    }, unlock: function (a) { if (this.isLocked) { if (a) var b = this.getSelectedElement(), c = this.getRanges(), e = this.isFake; this.isLocked = 0; this.reset(); a && (a = b || c[0] && c[0].getCommonAncestor()) && a.getAscendant("body", 1) && ((a = this.root.editor) && a.plugins.tableselection && a.plugins.tableselection.isSupportedEnvironment(a) && d(c) ? g.call(this, c) : e ? this.fake(b) : b && 2 > c.length ? this.selectElement(b) : this.selectRanges(c)) } }, reset: function () {
                        this._.cache = {}; this.isFake = 0; var a = this.root.editor; if (a && a._.fakeSelection) if (this.rev ==
                            a._.fakeSelection.rev) { delete a._.fakeSelection; var b = a._.hiddenSelectionContainer; if (b) { var c = a.checkDirty(); a.fire("lockSnapshot"); b.remove(); a.fire("unlockSnapshot"); !c && a.resetDirty() } delete a._.hiddenSelectionContainer } else CKEDITOR.warn("selection-fake-reset"); this.rev = L++
                    }, selectElement: function (a) { var b = new CKEDITOR.dom.range(this.root); b.setStartBefore(a); b.setEndAfter(a); this.selectRanges([b]) }, selectRanges: function (a) {
                        var b = this.root.editor, c = b && b._.hiddenSelectionContainer; this.reset();
                        if (c) for (var c = this.root, e, h = 0; h < a.length; ++h)e = a[h], e.endContainer.equals(c) && (e.endOffset = Math.min(e.endOffset, c.getChildCount())); if (a.length) if (this.isLocked) { var k = CKEDITOR.document.getActive(); this.unlock(); this.selectRanges(a); this.lock(); k && !k.equals(this.root) && k.focus() } else {
                            var x; a: {
                                var l, M; if (1 == a.length && !(M = a[0]).collapsed && (x = M.getEnclosedNode()) && x.type == CKEDITOR.NODE_ELEMENT && (M = M.clone(), M.shrink(CKEDITOR.SHRINK_ELEMENT, !0), (l = M.getEnclosedNode()) && l.type == CKEDITOR.NODE_ELEMENT &&
                                    (x = l), "false" == x.getAttribute("contenteditable"))) break a; x = void 0
                            } if (x) this.fake(x); else if (b && b.plugins.tableselection && b.plugins.tableselection.isSupportedEnvironment(b) && d(a) && !G && !a[0]._getTableElement({ table: 1 }).hasAttribute("data-cke-tableselection-ignored")) g.call(this, a); else {
                                if (m) {
                                    l = CKEDITOR.dom.walker.whitespaces(!0); x = /\ufeff|\u00a0/; M = { table: 1, tbody: 1, tr: 1 }; 1 < a.length && (b = a[a.length - 1], a[0].setEnd(b.endContainer, b.endOffset)); b = a[0]; a = b.collapsed; var n, A, p; if ((c = b.getEnclosedNode()) &&
                                        c.type == CKEDITOR.NODE_ELEMENT && c.getName() in z && (!c.is("a") || !c.getText())) try { p = c.$.createControlRange(); p.addElement(c.$); p.select(); return } catch (r) { } if (b.startContainer.type == CKEDITOR.NODE_ELEMENT && b.startContainer.getName() in M || b.endContainer.type == CKEDITOR.NODE_ELEMENT && b.endContainer.getName() in M) b.shrink(CKEDITOR.NODE_ELEMENT, !0), a = b.collapsed; p = b.createBookmark(); M = p.startNode; a || (k = p.endNode); p = b.document.$.body.createTextRange(); p.moveToElementText(M.$); p.moveStart("character", 1); k ? (x =
                                            b.document.$.body.createTextRange(), x.moveToElementText(k.$), p.setEndPoint("EndToEnd", x), p.moveEnd("character", -1)) : (n = M.getNext(l), A = M.hasAscendant("pre"), n = !(n && n.getText && n.getText().match(x)) && (A || !M.hasPrevious() || M.getPrevious().is && M.getPrevious().is("br")), A = b.document.createElement("span"), A.setHtml("\x26#65279;"), A.insertBefore(M), n && b.document.createText("﻿").insertBefore(M)); b.setStartBefore(M); M.remove(); a ? (n ? (p.moveStart("character", -1), p.select(), b.document.$.selection.clear()) : p.select(),
                                                b.moveToPosition(A, CKEDITOR.POSITION_BEFORE_START), A.remove()) : (b.setEndBefore(k), k.remove(), p.select())
                                } else {
                                    k = this.getNative(); if (!k) return; this.removeAllRanges(); for (p = 0; p < a.length; p++) {
                                        if (p < a.length - 1 && (n = a[p], A = a[p + 1], x = n.clone(), x.setStart(n.endContainer, n.endOffset), x.setEnd(A.startContainer, A.startOffset), !x.collapsed && (x.shrink(CKEDITOR.NODE_ELEMENT, !0), b = x.getCommonAncestor(), x = x.getEnclosedNode(), b.isReadOnly() || x && x.isReadOnly()))) {
                                            A.setStart(n.startContainer, n.startOffset); a.splice(p--,
                                                1); continue
                                        } b = a[p]; A = this.document.$.createRange(); b.collapsed && CKEDITOR.env.webkit && q(b) && (x = f(this.root), b.insertNode(x), (n = x.getNext()) && !x.getPrevious() && n.type == CKEDITOR.NODE_ELEMENT && "br" == n.getName() ? (w(this.root), b.moveToPosition(n, CKEDITOR.POSITION_BEFORE_START)) : b.moveToPosition(x, CKEDITOR.POSITION_AFTER_END)); A.setStart(b.startContainer.$, b.startOffset); try { A.setEnd(b.endContainer.$, b.endOffset) } catch (u) {
                                            if (0 <= u.toString().indexOf("NS_ERROR_ILLEGAL_VALUE")) b.collapse(1), A.setEnd(b.endContainer.$,
                                                b.endOffset); else throw u;
                                        } k.addRange(A)
                                    }
                                } this.reset(); this.root.fire("selectionchange")
                            }
                        }
                    }, fake: function (a, b) {
                        var c = this.root.editor; void 0 === b && a.hasAttribute("aria-label") && (b = a.getAttribute("aria-label")); this.reset(); y(c, b); var d = this._.cache, e = new CKEDITOR.dom.range(this.root); e.setStartBefore(a); e.setEndAfter(a); d.ranges = new CKEDITOR.dom.rangeList(e); d.selectedElement = d.startElement = a; d.type = CKEDITOR.SELECTION_ELEMENT; d.selectedText = d.nativeSel = null; this.isFake = 1; this.rev = L++; c._.fakeSelection =
                            this; this.root.fire("selectionchange")
                    }, isHidden: function () { var a = this.getCommonAncestor(); a && a.type == CKEDITOR.NODE_TEXT && (a = a.getParent()); return !(!a || !a.data("cke-hidden-sel")) }, isInTable: function (a) { return d(this.getRanges(), a) }, isCollapsed: function () { var a = this.getRanges(); return 1 === a.length && a[0].collapsed }, createBookmarks: function (a) { a = this.getRanges().createBookmarks(a); this.isFake && (a.isFake = 1); return a }, createBookmarks2: function (a) {
                        a = this.getRanges().createBookmarks2(a); this.isFake && (a.isFake =
                            1); return a
                    }, selectBookmarks: function (a) { for (var b = [], c, e = 0; e < a.length; e++) { var f = new CKEDITOR.dom.range(this.root); f.moveToBookmark(a[e]); b.push(f) } a.isFake && (c = d(b) ? b[0]._getTableElement() : b[0].getEnclosedNode(), c && c.type == CKEDITOR.NODE_ELEMENT || (CKEDITOR.warn("selection-not-fake"), a.isFake = 0)); a.isFake && !d(b) ? this.fake(c) : this.selectRanges(b); return this }, getCommonAncestor: function () { var a = this.getRanges(); return a.length ? a[0].startContainer.getCommonAncestor(a[a.length - 1].endContainer) : null },
                    scrollIntoView: function () { this.getType() != CKEDITOR.SELECTION_NONE && this.getRanges()[0].scrollIntoView() }, removeAllRanges: function () { if (this.getType() != CKEDITOR.SELECTION_NONE) { var a = this.getNative(); try { a && a[m ? "empty" : "removeAllRanges"]() } catch (b) { } this.reset() } }
                }
    })(); "use strict"; CKEDITOR.STYLE_BLOCK = 1; CKEDITOR.STYLE_INLINE = 2; CKEDITOR.STYLE_OBJECT = 3;
    (function () {
        function a(a, b) { for (var c, d; (a = a.getParent()) && !a.equals(b);)if (a.getAttribute("data-nostyle")) c = a; else if (!d) { var e = a.getAttribute("contentEditable"); "false" == e ? c = a : "true" == e && (d = 1) } return c } function d(a, b, c, d) { return (a.getPosition(b) | d) == d && (!c.childRule || c.childRule(a)) } function b(c) {
            var e = c.document; if (c.collapsed) e = L(this, e), c.insertNode(e), c.moveToPosition(e, CKEDITOR.POSITION_BEFORE_END); else {
                var f = this.element, h = this._.definition, k, l = h.ignoreReadonly, q = l || h.includeReadonly; null ==
                    q && (q = c.root.getCustomData("cke_includeReadonly")); var m = CKEDITOR.dtd[f]; m || (k = !0, m = CKEDITOR.dtd.span); c.enlarge(CKEDITOR.ENLARGE_INLINE, 1); c.trim(); var p = c.createBookmark(), w = p.startNode, t = p.endNode, r = w, u; if (!l) { var v = c.getCommonAncestor(), l = a(w, v), v = a(t, v); l && (r = l.getNextSourceNode(!0)); v && (t = v) } for (r.getPosition(t) == CKEDITOR.POSITION_FOLLOWING && (r = 0); r;) {
                        l = !1; if (r.equals(t)) r = null, l = !0; else {
                            var y = r.type == CKEDITOR.NODE_ELEMENT ? r.getName() : null, v = y && "false" == r.getAttribute("contentEditable"), B = y &&
                                -1 !== CKEDITOR.tools.array.indexOf(CKEDITOR.style.unstylableElements, y), B = y && (r.getAttribute("data-nostyle") || B); if (y && r.data("cke-bookmark") || r.type === CKEDITOR.NODE_COMMENT) { r = r.getNextSourceNode(!0); continue } if (v && q && CKEDITOR.dtd.$block[y]) for (var z = r, D = g(z), E = void 0, G = D.length, I = 0, z = G && new CKEDITOR.dom.range(z.getDocument()); I < G; ++I) { var E = D[I], J = CKEDITOR.filter.instances[E.data("cke-filter")]; if (J ? J.check(this) : 1) z.selectNodeContents(E), b.call(this, z) } D = y ? !m[y] || B ? 0 : v && !q ? 0 : d(r, t, h, T) : 1; if (D) if (E =
                                    r.getParent(), D = h, G = f, I = k, !E || !(E.getDtd() || CKEDITOR.dtd.span)[G] && !I || D.parentRule && !D.parentRule(E)) l = !0; else { if (u || y && CKEDITOR.dtd.$removeEmpty[y] && (r.getPosition(t) | T) != T || (u = c.clone(), u.setStartBefore(r)), y = r.type, y == CKEDITOR.NODE_TEXT || v || y == CKEDITOR.NODE_ELEMENT && !r.getChildCount()) { for (var y = r, K; (l = !y.getNext(C)) && (K = y.getParent(), m[K.getName()]) && d(K, w, h, N);)y = K; u.setEndAfter(y) } } else l = !0; r = r.getNextSourceNode(B || v)
                        } if (l && u && !u.collapsed) {
                            for (var l = L(this, e), v = l.hasAttributes(), B = u.getCommonAncestor(),
                                y = {}, D = {}, E = {}, G = {}, U, R, Y; l && B;) { if (B.getName() == f) { for (U in h.attributes) !G[U] && (Y = B.getAttribute(R)) && (l.getAttribute(U) == Y ? D[U] = 1 : G[U] = 1); for (R in h.styles) !E[R] && (Y = B.getStyle(R)) && (l.getStyle(R) == Y ? y[R] = 1 : E[R] = 1) } B = B.getParent() } for (U in D) l.removeAttribute(U); for (R in y) l.removeStyle(R); v && !l.hasAttributes() && (l = null); l ? (u.extractContents().appendTo(l), u.insertNode(l), F.call(this, l), l.mergeSiblings(), CKEDITOR.env.ie || l.$.normalize()) : (l = new CKEDITOR.dom.element("span"), u.extractContents().appendTo(l),
                                    u.insertNode(l), F.call(this, l), l.remove(!0)); u = null
                        }
                    } c.moveToBookmark(p); c.shrink(CKEDITOR.SHRINK_TEXT); c.shrink(CKEDITOR.NODE_ELEMENT, !0)
            }
        } function c(a) {
            function b() {
                for (var a = new CKEDITOR.dom.elementPath(d.getParent()), c = new CKEDITOR.dom.elementPath(q.getParent()), e = null, f = null, g = 0; g < a.elements.length; g++) { var h = a.elements[g]; if (h == a.block || h == a.blockLimit) break; m.checkElementRemovable(h, !0) && (e = h) } for (g = 0; g < c.elements.length; g++) {
                    h = c.elements[g]; if (h == c.block || h == c.blockLimit) break; m.checkElementRemovable(h,
                        !0) && (f = h)
                } f && q.breakParent(f); e && d.breakParent(e)
            } a.enlarge(CKEDITOR.ENLARGE_INLINE, 1); var c = a.createBookmark(), d = c.startNode, e = this._.definition.alwaysRemoveElement; if (a.collapsed) {
                for (var f = new CKEDITOR.dom.elementPath(d.getParent(), a.root), g, h = 0, k; h < f.elements.length && (k = f.elements[h]) && k != f.block && k != f.blockLimit; h++)if (this.checkElementRemovable(k)) {
                    var l; !e && a.collapsed && (a.checkBoundaryOfElement(k, CKEDITOR.END) || (l = a.checkBoundaryOfElement(k, CKEDITOR.START))) ? (g = k, g.match = l ? "start" : "end") :
                        (k.mergeSiblings(), k.is(this.element) ? y.call(this, k) : r(k, G(this)[k.getName()]))
                } if (g) { e = d; for (h = 0; ; h++) { k = f.elements[h]; if (k.equals(g)) break; else if (k.match) continue; else k = k.clone(); k.append(e); e = k } e["start" == g.match ? "insertBefore" : "insertAfter"](g) }
            } else {
                var q = c.endNode, m = this; b(); for (f = d; !f.equals(q);)g = f.getNextSourceNode(), f.type == CKEDITOR.NODE_ELEMENT && this.checkElementRemovable(f) && (f.getName() == this.element ? y.call(this, f) : r(f, G(this)[f.getName()]), g.type == CKEDITOR.NODE_ELEMENT && g.contains(d) &&
                    (b(), g = d.getNext())), f = g
            } a.moveToBookmark(c); a.shrink(CKEDITOR.NODE_ELEMENT, !0)
        } function g(a) { var b = []; a.forEach(function (a) { if ("true" == a.getAttribute("contenteditable")) return b.push(a), !1 }, CKEDITOR.NODE_ELEMENT, !0); return b } function e(a) { var b = a.getEnclosedNode() || a.getCommonAncestor(!1, !0); (a = (new CKEDITOR.dom.elementPath(b, a.root)).contains(this.element, 1)) && !a.isReadOnly() && v(a, this) } function h(a) {
            var b = a.getCommonAncestor(!0, !0); if (a = (new CKEDITOR.dom.elementPath(b, a.root)).contains(this.element,
                1)) { var b = this._.definition, c = b.attributes; if (c) for (var d in c) a.removeAttribute(d, c[d]); if (b.styles) for (var e in b.styles) b.styles.hasOwnProperty(e) && a.removeStyle(e) }
        } function k(a) { var b = a.createBookmark(!0), c = a.createIterator(); c.enforceRealBlocks = !0; this._.enterMode && (c.enlargeBr = this._.enterMode != CKEDITOR.ENTER_BR); for (var d, e = a.document, f; d = c.getNextParagraph();)!d.isReadOnly() && (c.activeFilter ? c.activeFilter.check(this) : 1) && (f = L(this, e, d), q(d, f)); a.moveToBookmark(b) } function l(a) {
            var b = a.createBookmark(1),
            c = a.createIterator(); c.enforceRealBlocks = !0; c.enlargeBr = this._.enterMode != CKEDITOR.ENTER_BR; for (var d, e; d = c.getNextParagraph();)this.checkElementRemovable(d) && (d.is("pre") ? ((e = this._.enterMode == CKEDITOR.ENTER_BR ? null : a.document.createElement(this._.enterMode == CKEDITOR.ENTER_P ? "p" : "div")) && d.copyAttributes(e), q(d, e)) : y.call(this, d)); a.moveToBookmark(b)
        } function q(a, b) {
            var c = !b; c && (b = a.getDocument().createElement("div"), a.copyAttributes(b)); var d = b && b.is("pre"), e = a.is("pre"), g = !d && e; if (d && !e) {
                e = b; (g =
                    a.getBogus()) && g.remove(); g = a.getHtml(); g = w(g, /(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g, ""); g = g.replace(/[ \t\r\n]*(<br[^>]*>)[ \t\r\n]*/gi, "$1"); g = g.replace(/([ \t\n\r]+|&nbsp;)/g, " "); g = g.replace(/<br\b[^>]*>/gi, "\n"); if (CKEDITOR.env.ie) { var h = a.getDocument().createElement("div"); h.append(e); e.$.outerHTML = "\x3cpre\x3e" + g + "\x3c/pre\x3e"; e.copyAttributes(h.getFirst()); e = h.getFirst().remove() } else e.setHtml(g); b = e
            } else g ? b = B(c ? [a.getHtml()] : f(a), b) : a.moveChildren(b); b.replace(a); if (d) {
                var c = b, k; (k = c.getPrevious(I)) &&
                    k.type == CKEDITOR.NODE_ELEMENT && k.is("pre") && (d = w(k.getHtml(), /\n$/, "") + "\n\n" + w(c.getHtml(), /^\n/, ""), CKEDITOR.env.ie ? c.$.outerHTML = "\x3cpre\x3e" + d + "\x3c/pre\x3e" : c.setHtml(d), k.remove())
            } else c && m(b)
        } function f(a) { var b = []; w(a.getOuterHtml(), /(\S\s*)\n(?:\s|(<span[^>]+data-cke-bookmark.*?\/span>))*\n(?!$)/gi, function (a, b, c) { return b + "\x3c/pre\x3e" + c + "\x3cpre\x3e" }).replace(/<pre\b.*?>([\s\S]*?)<\/pre>/gi, function (a, c) { b.push(c) }); return b } function w(a, b, c) {
            var d = "", e = ""; a = a.replace(/(^<span[^>]+data-cke-bookmark.*?\/span>)|(<span[^>]+data-cke-bookmark.*?\/span>$)/gi,
                function (a, b, c) { b && (d = b); c && (e = c); return "" }); return d + a.replace(b, c) + e
        } function B(a, b) {
            var c; 1 < a.length && (c = new CKEDITOR.dom.documentFragment(b.getDocument())); for (var d = 0; d < a.length; d++) {
                var e = a[d], e = e.replace(/(\r\n|\r)/g, "\n"), e = w(e, /^[ \t]*\n/, ""), e = w(e, /\n$/, ""), e = w(e, /^[ \t]+|[ \t]+$/g, function (a, b) { return 1 == a.length ? "\x26nbsp;" : b ? " " + CKEDITOR.tools.repeat("\x26nbsp;", a.length - 1) : CKEDITOR.tools.repeat("\x26nbsp;", a.length - 1) + " " }), e = e.replace(/\n/g, "\x3cbr\x3e"), e = e.replace(/[ \t]{2,}/g, function (a) {
                    return CKEDITOR.tools.repeat("\x26nbsp;",
                        a.length - 1) + " "
                }); if (c) { var f = b.clone(); f.setHtml(e); c.append(f) } else b.setHtml(e)
            } return c || b
        } function y(a, b) {
            var c = this._.definition, d = c.attributes, c = c.styles, e = G(this)[a.getName()], f = CKEDITOR.tools.isEmpty(d) && CKEDITOR.tools.isEmpty(c), g; for (g in d) if ("class" != g && !this._.definition.fullMatch || a.getAttribute(g) == p(g, d[g])) b && "data-" == g.slice(0, 5) || (f = a.hasAttribute(g), a.removeAttribute(g)); for (var h in c) this._.definition.fullMatch && a.getStyle(h) != p(h, c[h], !0) || (f = f || !!a.getStyle(h), a.removeStyle(h));
            r(a, e, E[a.getName()]); f && (this._.definition.alwaysRemoveElement ? m(a, 1) : !CKEDITOR.dtd.$block[a.getName()] || this._.enterMode == CKEDITOR.ENTER_BR && !a.hasAttributes() ? m(a) : a.renameNode(this._.enterMode == CKEDITOR.ENTER_P ? "p" : "div"))
        } function F(a) { for (var b = G(this), c = a.getElementsByTag(this.element), d, e = c.count(); 0 <= --e;)d = c.getItem(e), d.isReadOnly() || y.call(this, d, !0); for (var f in b) if (f != this.element) for (c = a.getElementsByTag(f), e = c.count() - 1; 0 <= e; e--)d = c.getItem(e), d.isReadOnly() || r(d, b[f]) } function r(a,
            b, c) { if (b = b && b.attributes) for (var d = 0; d < b.length; d++) { var e = b[d][0], f; if (f = a.getAttribute(e)) { var g = b[d][1]; (null === g || g.test && g.test(f) || "string" == typeof g && f == g) && a.removeAttribute(e) } } c || m(a) } function m(a, b) {
                if (!a.hasAttributes() || b) if (CKEDITOR.dtd.$block[a.getName()]) { var c = a.getPrevious(I), d = a.getNext(I); !c || c.type != CKEDITOR.NODE_TEXT && c.isBlockBoundary({ br: 1 }) || a.append("br", 1); !d || d.type != CKEDITOR.NODE_TEXT && d.isBlockBoundary({ br: 1 }) || a.append("br"); a.remove(!0) } else c = a.getFirst(), d = a.getLast(),
                    a.remove(!0), c && (c.type == CKEDITOR.NODE_ELEMENT && c.mergeSiblings(), d && !c.equals(d) && d.type == CKEDITOR.NODE_ELEMENT && d.mergeSiblings())
            } function L(a, b, c) { var d; d = a.element; "*" == d && (d = "span"); d = new CKEDITOR.dom.element(d, b); c && c.copyAttributes(d); d = v(d, a); b.getCustomData("doc_processing_style") && d.hasAttribute("id") ? d.removeAttribute("id") : b.setCustomData("doc_processing_style", 1); return d } function v(a, b) {
                var c = b._.definition, d = c.attributes, c = CKEDITOR.style.getStyleText(c); if (d) for (var e in d) a.setAttribute(e,
                    d[e]); c && a.setAttribute("style", c); a.getDocument().removeCustomData("doc_processing_style"); return a
            } function J(a, b) { for (var c in a) a[c] = a[c].replace(D, function (a, c) { return b[c] }) } function G(a) {
                if (a._.overrides) return a._.overrides; var b = a._.overrides = {}, c = a._.definition.overrides; if (c) {
                    CKEDITOR.tools.isArray(c) || (c = [c]); for (var d = 0; d < c.length; d++) {
                        var e = c[d], f, g; "string" == typeof e ? f = e.toLowerCase() : (f = e.element ? e.element.toLowerCase() : a.element, g = e.attributes); e = b[f] || (b[f] = {}); if (g) {
                            var e = e.attributes =
                                e.attributes || [], h; for (h in g) e.push([h.toLowerCase(), g[h]])
                        }
                    }
                } return b
            } function p(a, b, c) { var d = new CKEDITOR.dom.element("span"); d[c ? "setStyle" : "setAttribute"](a, b); return d[c ? "getStyle" : "getAttribute"](a) } function u(a, b) {
                function c(a, b) { return "font-family" == b.toLowerCase() ? a.replace(/["']/g, "") : a } "string" == typeof a && (a = CKEDITOR.tools.parseCssText(a)); "string" == typeof b && (b = CKEDITOR.tools.parseCssText(b, !0)); for (var d in a) if (!(d in b) || c(b[d], d) != c(a[d], d) && "inherit" != a[d] && "inherit" != b[d]) return !1;
                return !0
            } function K(a, b, c) { var d = a.getRanges(); b = b ? this.removeFromRange : this.applyToRange; for (var e, f = d.createIterator(); e = f.getNextRange();)b.call(this, e, c); a.selectRanges(d) } var E = { address: 1, div: 1, h1: 1, h2: 1, h3: 1, h4: 1, h5: 1, h6: 1, p: 1, pre: 1, section: 1, header: 1, footer: 1, nav: 1, article: 1, aside: 1, figure: 1, dialog: 1, hgroup: 1, time: 1, meter: 1, menu: 1, command: 1, keygen: 1, output: 1, progress: 1, details: 1, datagrid: 1, datalist: 1 }, z = {
                a: 1, blockquote: 1, embed: 1, hr: 1, img: 1, li: 1, object: 1, ol: 1, table: 1, td: 1, tr: 1, th: 1, ul: 1, dl: 1,
                dt: 1, dd: 1, form: 1, audio: 1, video: 1
            }, t = /\s*(?:;\s*|$)/, D = /#\((.+?)\)/g, C = CKEDITOR.dom.walker.bookmark(0, 1), I = CKEDITOR.dom.walker.whitespaces(1); CKEDITOR.style = function (a, b) {
                if ("string" == typeof a.type) return new CKEDITOR.style.customHandlers[a.type](a); var c = a.attributes; c && c.style && (a.styles = CKEDITOR.tools.extend({}, a.styles, CKEDITOR.tools.parseCssText(c.style)), delete c.style); b && (a = CKEDITOR.tools.clone(a), J(a.attributes, b), J(a.styles, b)); c = this.element = a.element ? "string" == typeof a.element ? a.element.toLowerCase() :
                    a.element : "*"; this.type = a.type || (E[c] ? CKEDITOR.STYLE_BLOCK : z[c] ? CKEDITOR.STYLE_OBJECT : CKEDITOR.STYLE_INLINE); "object" == typeof this.element && (this.type = CKEDITOR.STYLE_OBJECT); this._ = { definition: a }
            }; CKEDITOR.style.prototype = {
                apply: function (a) { if (a instanceof CKEDITOR.dom.document) return K.call(this, a.getSelection()); if (this.checkApplicable(a.elementPath(), a)) { var b = this._.enterMode; b || (this._.enterMode = a.activeEnterMode); K.call(this, a.getSelection(), 0, a); this._.enterMode = b } }, remove: function (a) {
                    if (a instanceof
                        CKEDITOR.dom.document) return K.call(this, a.getSelection(), 1); if (this.checkApplicable(a.elementPath(), a)) { var b = this._.enterMode; b || (this._.enterMode = a.activeEnterMode); K.call(this, a.getSelection(), 1, a); this._.enterMode = b }
                }, applyToRange: function (a) { this.applyToRange = this.type == CKEDITOR.STYLE_INLINE ? b : this.type == CKEDITOR.STYLE_BLOCK ? k : this.type == CKEDITOR.STYLE_OBJECT ? e : null; return this.applyToRange(a) }, removeFromRange: function (a) {
                    this.removeFromRange = this.type == CKEDITOR.STYLE_INLINE ? c : this.type == CKEDITOR.STYLE_BLOCK ?
                        l : this.type == CKEDITOR.STYLE_OBJECT ? h : null; return this.removeFromRange(a)
                }, applyToObject: function (a) { v(a, this) }, checkActive: function (a, b) {
                    switch (this.type) {
                        case CKEDITOR.STYLE_BLOCK: return this.checkElementRemovable(a.block || a.blockLimit, !0, b); case CKEDITOR.STYLE_OBJECT: case CKEDITOR.STYLE_INLINE: for (var c = a.elements, d = 0, e; d < c.length; d++)if (e = c[d], this.type != CKEDITOR.STYLE_INLINE || e != a.block && e != a.blockLimit) {
                            if (this.type == CKEDITOR.STYLE_OBJECT) {
                                var f = e.getName(); if (!("string" == typeof this.element ?
                                    f == this.element : f in this.element)) continue
                            } if (this.checkElementRemovable(e, !0, b)) return !0
                        }
                    }return !1
                }, checkApplicable: function (a, b, c) { b && b instanceof CKEDITOR.filter && (c = b); if (c && !c.check(this)) return !1; switch (this.type) { case CKEDITOR.STYLE_OBJECT: return !!a.contains(this.element); case CKEDITOR.STYLE_BLOCK: return !!a.blockLimit.getDtd()[this.element] }return !0 }, checkElementMatch: function (a, b) {
                    var c = this._.definition; if (!a || !c.ignoreReadonly && a.isReadOnly()) return !1; var d = a.getName(); if ("string" == typeof this.element ?
                        d == this.element : d in this.element) { if (!b && !a.hasAttributes()) return !0; if (d = c._AC) c = d; else { var d = {}, e = 0, f = c.attributes; if (f) for (var g in f) e++, d[g] = f[g]; if (g = CKEDITOR.style.getStyleText(c)) d.style || e++, d.style = g; d._length = e; c = c._AC = d } if (c._length) { for (var h in c) if ("_length" != h) if (d = a.getAttribute(h) || "", "style" == h ? u(c[h], d) : c[h] == d) { if (!b) return !0 } else if (b) return !1; if (b) return !0 } else return !0 } return !1
                }, checkElementRemovable: function (a, b, c) {
                    if (this.checkElementMatch(a, b, c)) return !0; if (b = G(this)[a.getName()]) {
                        var d;
                        if (!(b = b.attributes)) return !0; for (c = 0; c < b.length; c++)if (d = b[c][0], d = a.getAttribute(d)) { var e = b[c][1]; if (null === e) return !0; if ("string" == typeof e) { if (d == e) return !0 } else if (e.test(d)) return !0 }
                    } return !1
                }, buildPreview: function (a) { var b = this._.definition, c = [], d = b.element; "bdo" == d && (d = "span"); var c = ["\x3c", d], e = b.attributes; if (e) for (var f in e) c.push(" ", f, '\x3d"', e[f], '"'); (e = CKEDITOR.style.getStyleText(b)) && c.push(' style\x3d"', e, '"'); c.push("\x3e", a || b.name, "\x3c/", d, "\x3e"); return c.join("") }, getDefinition: function () { return this._.definition }
            };
        CKEDITOR.style.getStyleText = function (a) { var b = a._ST; if (b) return b; var b = a.styles, c = a.attributes && a.attributes.style || "", d = ""; c.length && (c = c.replace(t, ";")); for (var e in b) { var f = b[e], g = (e + ":" + f).replace(t, ";"); "inherit" == f ? d += g : c += g } c.length && (c = CKEDITOR.tools.normalizeCssText(c, !0)); return a._ST = c + d }; CKEDITOR.style.customHandlers = {}; CKEDITOR.style.unstylableElements = []; CKEDITOR.style.addCustomHandler = function (a) {
            var b = function (a) { this._ = { definition: a }; this.setup && this.setup(a) }; b.prototype = CKEDITOR.tools.extend(CKEDITOR.tools.prototypedCopy(CKEDITOR.style.prototype),
                { assignedTo: CKEDITOR.STYLE_OBJECT }, a, !0); return this.customHandlers[a.type] = b
        }; var T = CKEDITOR.POSITION_PRECEDING | CKEDITOR.POSITION_IDENTICAL | CKEDITOR.POSITION_IS_CONTAINED, N = CKEDITOR.POSITION_FOLLOWING | CKEDITOR.POSITION_IDENTICAL | CKEDITOR.POSITION_IS_CONTAINED
    })(); CKEDITOR.styleCommand = function (a, d) { this.requiredContent = this.allowedContent = this.style = a; CKEDITOR.tools.extend(this, d, !0) };
    CKEDITOR.styleCommand.prototype.exec = function (a) { a.focus(); this.state == CKEDITOR.TRISTATE_OFF ? a.applyStyle(this.style) : this.state == CKEDITOR.TRISTATE_ON && a.removeStyle(this.style) }; CKEDITOR.stylesSet = new CKEDITOR.resourceManager("", "stylesSet"); CKEDITOR.addStylesSet = CKEDITOR.tools.bind(CKEDITOR.stylesSet.add, CKEDITOR.stylesSet); CKEDITOR.loadStylesSet = function (a, d, b) { CKEDITOR.stylesSet.addExternal(a, d, ""); CKEDITOR.stylesSet.load(a, b) };
    CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
        attachStyleStateChange: function (a, d) { var b = this._.styleStateChangeCallbacks; b || (b = this._.styleStateChangeCallbacks = [], this.on("selectionChange", function (a) { for (var d = 0; d < b.length; d++) { var e = b[d], h = e.style.checkActive(a.data.path, this) ? CKEDITOR.TRISTATE_ON : CKEDITOR.TRISTATE_OFF; e.fn.call(this, h) } })); b.push({ style: a, fn: d }) }, applyStyle: function (a) { a.apply(this) }, removeStyle: function (a) { a.remove(this) }, getStylesSet: function (a) {
            if (this._.stylesDefinitions) a(this._.stylesDefinitions);
            else { var d = this, b = d.config.stylesCombo_stylesSet || d.config.stylesSet; if (!1 === b) a(null); else if (b instanceof Array) d._.stylesDefinitions = b, a(b); else { b || (b = "default"); var b = b.split(":"), c = b[0]; CKEDITOR.stylesSet.addExternal(c, b[1] ? b.slice(1).join(":") : CKEDITOR.getUrl("styles.js"), ""); CKEDITOR.stylesSet.load(c, function (b) { d._.stylesDefinitions = b[c]; a(d._.stylesDefinitions) }) } }
        }
    });
    (function () { if (window.Promise) CKEDITOR.tools.promise = Promise; else { var a = CKEDITOR.getUrl("vendor/promise.js"); if ("function" === typeof window.define && window.define.amd && "function" === typeof window.require) return window.require([a], function (a) { CKEDITOR.tools.promise = a }); CKEDITOR.scriptLoader.load(a, function (d) { if (!d) return CKEDITOR.error("no-vendor-lib", { path: a }); if ("undefined" !== typeof window.ES6Promise) return CKEDITOR.tools.promise = ES6Promise }) } })();
    (function () {
        function a(a, g, e) { a.once("selectionCheck", function (a) { if (!d) { var c = a.data.getRanges()[0]; e.equals(c) ? a.cancel() : g.equals(c) && (b = !0) } }, null, null, -1) } var d = !0, b = !1; CKEDITOR.dom.selection.setupEditorOptimization = function (a) {
            a.on("selectionCheck", function (a) { a.data && !b && a.data.optimizeInElementEnds(); b = !1 }); a.on("contentDom", function () {
                var b = a.editable(); b && (b.attachListener(b, "keydown", function (a) { this._.shiftPressed = a.data.$.shiftKey }, this), b.attachListener(b, "keyup", function (a) {
                    this._.shiftPressed =
                    a.data.$.shiftKey
                }, this))
            })
        }; CKEDITOR.dom.selection.prototype.optimizeInElementEnds = function () {
            var b = this.getRanges()[0], g = this.root.editor, e; if (this.root.editor._.shiftPressed || this.isFake || b.isCollapsed || b.startContainer.equals(b.endContainer) || (b.endContainer.is ? b.endContainer.is("li") : b.endContainer.getParent().is && b.endContainer.getParent().is("li"))) e = !1; else if (0 === b.endOffset) e = !0; else {
                e = b.startContainer.type === CKEDITOR.NODE_TEXT; var h = b.endContainer.type === CKEDITOR.NODE_TEXT, k = e ? b.startContainer.getLength() :
                    b.startContainer.getChildCount(); e = b.startOffset === k || e ^ h
            } e && (e = b.clone(), b.shrink(CKEDITOR.SHRINK_TEXT, !1, { skipBogus: !CKEDITOR.env.webkit }), d = !1, a(g, b, e), b.select(), d = !0)
        }
    })();
    (function () {
        function a(a, c) { if (b(a)) a = Math.round(c * (parseFloat(a) / 100)); else if ("string" === typeof a && a.match(/^\d+$/gm) || "string" === typeof a && a.match(/^\d+(?:deg)?$/gm)) a = parseInt(a, 10); return a } function d(a, c) { b(a) ? a = c * (parseFloat(a) / 100) : "string" === typeof a && a.match(/^\d?\.\d+/gm) && (a = parseFloat(a)); return a } function b(a) { return "string" === typeof a && a.match(/^((\d*\.\d+)|(\d+))%{1}$/gm) } function c(a, b, c) { return !isNaN(a) && a >= b && a <= c } function g(a) { a = a.toString(16); return 1 == a.length ? "0" + a : a } CKEDITOR.tools.color =
            CKEDITOR.tools.createClass({
                $: function (a, b) { this._.initialColorCode = a; this._.defaultValue = b; this._.parseInput(a) }, proto: {
                    getHex: function () { if (!this._.isValidColor) return this._.defaultValue; var a = this._.blendAlphaColor(this._.red, this._.green, this._.blue, this._.alpha); return this._.formatHexString(a[0], a[1], a[2]) }, getHexWithAlpha: function () {
                        if (!this._.isValidColor) return this._.defaultValue; var a = Math.round(this._.alpha * CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE); return this._.formatHexString(this._.red,
                            this._.green, this._.blue, a)
                    }, getRgb: function () { if (!this._.isValidColor) return this._.defaultValue; var a = this._.blendAlphaColor(this._.red, this._.green, this._.blue, this._.alpha); return this._.formatRgbString("rgb", a[0], a[1], a[2]) }, getRgba: function () { return this._.isValidColor ? this._.formatRgbString("rgba", this._.red, this._.green, this._.blue, this._.alpha) : this._.defaultValue }, getHsl: function () {
                        var a = 0 === this._.alpha || 1 === this._.alpha; if (!this._.isValidColor) return this._.defaultValue; this._.type ===
                            CKEDITOR.tools.color.TYPE_HSL && a ? a = [this._.hue, this._.saturation, this._.lightness] : (a = this._.blendAlphaColor(this._.red, this._.green, this._.blue, this._.alpha), a = this._.rgbToHsl(a[0], a[1], a[2])); return this._.formatHslString("hsl", a[0], a[1], a[2])
                    }, getHsla: function () {
                        var a; if (!this._.isValidColor) return this._.defaultValue; a = this._.type === CKEDITOR.tools.color.TYPE_HSL ? [this._.hue, this._.saturation, this._.lightness] : this._.rgbToHsl(this._.red, this._.green, this._.blue); return this._.formatHslString("hsla",
                            a[0], a[1], a[2], this._.alpha)
                    }, getInitialValue: function () { return this._.initialColorCode }
                }, _: {
                    initialColorCode: "", isValidColor: !0, type: 0, hue: 0, saturation: 0, lightness: 0, red: 0, green: 0, blue: 0, alpha: 1, blendAlphaColor: function (a, b, c, d) { return CKEDITOR.tools.array.map([a, b, c], function (a) { return Math.round(CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE - d * (CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE - a)) }) }, formatHexString: function (a, b, c, d) { a = "#" + g(a) + g(b) + g(c); void 0 !== d && (a += g(d)); return a.toUpperCase() }, formatRgbString: function (a,
                        b, c, d, g) { b = [b, c, d]; void 0 !== g && b.push(g); return a + "(" + b.join(",") + ")" }, formatHslString: function (a, b, c, d, g) { return a + "(" + b + "," + c + "%," + d + "%" + (void 0 !== g ? "," + g : "") + ")" }, parseInput: function (a) {
                            if ("string" !== typeof a) this._.isValidColor = !1; else {
                                a = CKEDITOR.tools.trim(a); var b = this._.matchStringToNamedColor(a); b && (a = b); var b = this._.extractColorChannelsFromHex(a), c = this._.extractColorChannelsFromRgba(a); a = this._.extractColorChannelsFromHsla(a); (a = b || c || a) ? (this._.type = a.type, this._.red = a.red, this._.green =
                                    a.green, this._.blue = a.blue, this._.alpha = a.alpha, a.type === CKEDITOR.tools.color.TYPE_HSL && (this._.hue = a.hue, this._.saturation = a.saturation, this._.lightness = a.lightness)) : this._.isValidColor = !1
                            }
                        }, matchStringToNamedColor: function (a) { return CKEDITOR.tools.color.namedColors[a.toLowerCase()] || null }, extractColorChannelsFromHex: function (a) {
                            -1 === a.indexOf("#") && (a = "#" + a); a.match(CKEDITOR.tools.color.hex3CharsRegExp) && (a = this._.hex3ToHex6(a)); a.match(CKEDITOR.tools.color.hex4CharsRegExp) && (a = this._.hex4ToHex8(a));
                            if (!a.match(CKEDITOR.tools.color.hex6CharsRegExp) && !a.match(CKEDITOR.tools.color.hex8CharsRegExp)) return null; a = a.split(""); var b = 1; a[7] && a[8] && (b = parseInt(a[7] + a[8], 16), b /= CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE, b = Number(b.toFixed(1))); return { type: CKEDITOR.tools.color.TYPE_RGB, red: parseInt(a[1] + a[2], 16), green: parseInt(a[3] + a[4], 16), blue: parseInt(a[5] + a[6], 16), alpha: b }
                        }, extractColorChannelsFromRgba: function (b) {
                            var c = this._.extractColorChannelsByPattern(b, CKEDITOR.tools.color.rgbRegExp); if (!c ||
                                3 > c.length || 4 < c.length) return null; var g = 4 === c.length; b = a(c[0], CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE); var l = a(c[1], CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE), q = a(c[2], CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE), f = 1; g && (f = d(c[3], CKEDITOR.tools.color.MAX_ALPHA_CHANNEL_VALUE)); c = { type: CKEDITOR.tools.color.TYPE_RGB, red: b, green: l, blue: q, alpha: f }; return this._.areColorChannelsValid(b, l, q, f) ? c : null
                        }, extractColorChannelsFromHsla: function (b) {
                            var c = this._.extractColorChannelsByPattern(b, CKEDITOR.tools.color.hslRegExp);
                            if (!c || 3 > c.length || 4 < c.length) return null; var g = 4 === c.length, l = a(c[0], CKEDITOR.tools.color.MAX_HUE_CHANNEL_VALUE), q = d(c[1], CKEDITOR.tools.color.MAX_SATURATION_LIGHTNESS_CHANNEL_VALUE), f = d(c[2], CKEDITOR.tools.color.MAX_SATURATION_LIGHTNESS_CHANNEL_VALUE), w = 1; b = this._.hslToRgb(l, q, f); g && (w = d(c[3], CKEDITOR.tools.color.MAX_ALPHA_CHANNEL_VALUE)); b.push(w); c = { type: CKEDITOR.tools.color.TYPE_HSL, red: b[0], green: b[1], blue: b[2], alpha: b[3], hue: l, saturation: Math.round(100 * q), lightness: Math.round(100 * f) }; return this._.areColorChannelsValid(b[0],
                                b[1], b[2], b[3]) ? c : null
                        }, hex3ToHex6: function (a) { a = a.split(""); return "#" + a[1] + a[1] + a[2] + a[2] + a[3] + a[3] }, hex4ToHex8: function (a) { return this._.hex3ToHex6(a.substr(0, 4)) + CKEDITOR.tools.repeat(a[4], 2) }, extractColorChannelsByPattern: function (a, b) {
                            var c = a.match(b); if (!c) return null; var d = -1 === c[1].indexOf(",") ? /\s/ : ",", d = c[1].split(d), d = CKEDITOR.tools.array.reduce(d, function (a, b) { var c = CKEDITOR.tools.trim(b); return 0 === c.length ? a : a.concat([c]) }, []); c[2] && (c = CKEDITOR.tools.trim(c[2].replace(/[\/,]/, "")), d.push(c));
                            return d
                        }, areColorChannelsValid: function (a, b, d, g) { return c(a, 0, CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE) && c(b, 0, CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE) && c(d, 0, CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE) && c(g, 0, CKEDITOR.tools.color.MAX_ALPHA_CHANNEL_VALUE) }, hslToRgb: function (a, b, c) { var d = function (d) { var f = (d + a / 30) % 12; d = b * Math.min(c, 1 - c); f = Math.min(f - 3, 9 - f, 1); f = Math.max(-1, f); return Math.round((c - d * f) * CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE) }; return [d(0), d(8), d(4)] }, rgbToHsl: function (a, b, c) {
                            a /=
                            CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE; b /= CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE; var d = c / CKEDITOR.tools.color.MAX_RGB_CHANNEL_VALUE, g = Math.max(a, b, d), f = Math.min(a, b, d); c = g - f; var w = 0; switch (g) { case a: w = (b - d) / c % 6; break; case b: w = (d - a) / c + 2; break; case d: w = (a - b) / c + 4 }a = 0 === c ? 0 : 60 * w; b = (g + f) / 2; g = 0; 1 !== b && 0 !== b && (g = c / (1 - Math.abs(2 * b - 1))); a = Math.round(a); g = Math.round(100 * g); b = Math.round(100 * b); return [a, g, b]
                        }
                }, statics: {
                    TYPE_RGB: 1, TYPE_HSL: 2, MAX_RGB_CHANNEL_VALUE: 255, MAX_ALPHA_CHANNEL_VALUE: 1, MAX_HUE_CHANNEL_VALUE: 360,
                    MAX_SATURATION_LIGHTNESS_CHANNEL_VALUE: 1, hex3CharsRegExp: /#([0-9a-f]{3}$)/gim, hex4CharsRegExp: /#([0-9a-f]{4}$)/gim, hex6CharsRegExp: /#([0-9a-f]{6}$)/gim, hex8CharsRegExp: /#([0-9a-f]{8}$)/gim, rgbRegExp: /rgba?\(([.,\d\s%]*)(\s*\/\s*[\d.%]+)?\s*\)/i, hslRegExp: /hsla?\((\s*(?:[.\d]+(?:deg)?)(?:\s*,?\s*[.\d]+%){2})((?:(?:\s*\/\s*)|(?:\s*,\s*))[\d.]+%?)?\s*\)/i, namedColors: {
                        aliceblue: "#F0F8FF", antiquewhite: "#FAEBD7", aqua: "#00FFFF", aquamarine: "#7FFFD4", azure: "#F0FFFF", beige: "#F5F5DC", bisque: "#FFE4C4", black: "#000000",
                        blanchedalmond: "#FFEBCD", blue: "#0000FF", blueviolet: "#8A2BE2", brown: "#A52A2A", burlywood: "#DEB887", cadetblue: "#5F9EA0", chartreuse: "#7FFF00", chocolate: "#D2691E", coral: "#FF7F50", cornflowerblue: "#6495ED", cornsilk: "#FFF8DC", crimson: "#DC143C", cyan: "#00FFFF", darkblue: "#00008B", darkcyan: "#008B8B", darkgoldenrod: "#B8860B", darkgray: "#A9A9A9", darkgreen: "#006400", darkgrey: "#A9A9A9", darkkhaki: "#BDB76B", darkmagenta: "#8B008B", darkolivegreen: "#556B2F", darkorange: "#FF8C00", darkorchid: "#9932CC", darkred: "#8B0000", darksalmon: "#E9967A",
                        darkseagreen: "#8FBC8F", darkslateblue: "#483D8B", darkslategray: "#2F4F4F", darkslategrey: "#2F4F4F", darkturquoise: "#00CED1", darkviolet: "#9400D3", deeppink: "#FF1493", deepskyblue: "#00BFFF", dimgray: "#696969", dimgrey: "#696969", dodgerblue: "#1E90FF", firebrick: "#B22222", floralwhite: "#FFFAF0", forestgreen: "#228B22", fuchsia: "#FF00FF", gainsboro: "#DCDCDC", ghostwhite: "#F8F8FF", gold: "#FFD700", goldenrod: "#DAA520", gray: "#808080", green: "#008000", greenyellow: "#ADFF2F", grey: "#808080", honeydew: "#F0FFF0", hotpink: "#FF69B4",
                        indianred: "#CD5C5C", indigo: "#4B0082", ivory: "#FFFFF0", khaki: "#F0E68C", lavender: "#E6E6FA", lavenderblush: "#FFF0F5", lawngreen: "#7CFC00", lemonchiffon: "#FFFACD", lightblue: "#ADD8E6", lightcoral: "#F08080", lightcyan: "#E0FFFF", lightgoldenrodyellow: "#FAFAD2", lightgray: "#D3D3D3", lightgreen: "#90EE90", lightgrey: "#D3D3D3", lightpink: "#FFB6C1", lightsalmon: "#FFA07A", lightseagreen: "#20B2AA", lightskyblue: "#87CEFA", lightslategray: "#778899", lightslategrey: "#778899", lightsteelblue: "#B0C4DE", lightyellow: "#FFFFE0", lime: "#00FF00",
                        limegreen: "#32CD32", linen: "#FAF0E6", magenta: "#FF00FF", maroon: "#800000", mediumaquamarine: "#66CDAA", mediumblue: "#0000CD", mediumorchid: "#BA55D3", mediumpurple: "#9370DB", mediumseagreen: "#3CB371", mediumslateblue: "#7B68EE", mediumspringgreen: "#00FA9A", mediumturquoise: "#48D1CC", mediumvioletred: "#C71585", midnightblue: "#191970", mintcream: "#F5FFFA", mistyrose: "#FFE4E1", moccasin: "#FFE4B5", navajowhite: "#FFDEAD", navy: "#000080", oldlace: "#FDF5E6", olive: "#808000", olivedrab: "#6B8E23", orange: "#FFA500", orangered: "#FF4500",
                        orchid: "#DA70D6", palegoldenrod: "#EEE8AA", palegreen: "#98FB98", paleturquoise: "#AFEEEE", palevioletred: "#DB7093", papayawhip: "#FFEFD5", peachpuff: "#FFDAB9", peru: "#CD853F", pink: "#FFC0CB", plum: "#DDA0DD", powderblue: "#B0E0E6", purple: "#800080", rebeccapurple: "#663399", red: "#FF0000", rosybrown: "#BC8F8F", royalblue: "#4169E1", saddlebrown: "#8B4513", salmon: "#FA8072", sandybrown: "#F4A460", seagreen: "#2E8B57", seashell: "#FFF5EE", sienna: "#A0522D", silver: "#C0C0C0", skyblue: "#87CEEB", slateblue: "#6A5ACD", slategray: "#708090",
                        slategrey: "#708090", snow: "#FFFAFA", springgreen: "#00FF7F", steelblue: "#4682B4", tan: "#D2B48C", teal: "#008080", thistle: "#D8BFD8", tomato: "#FF6347", turquoise: "#40E0D0", violet: "#EE82EE", windowtext: "windowtext", wheat: "#F5DEB3", white: "#FFFFFF", whitesmoke: "#F5F5F5", yellow: "#FFFF00", yellowgreen: "#9ACD32"
                    }
                }
            }); CKEDITOR.tools.style.parse._colors = CKEDITOR.tools.color.namedColors
    })(); CKEDITOR.dom.comment = function (a, d) { "string" == typeof a && (a = (d ? d.$ : document).createComment(a)); CKEDITOR.dom.domObject.call(this, a) };
    CKEDITOR.dom.comment.prototype = new CKEDITOR.dom.node; CKEDITOR.tools.extend(CKEDITOR.dom.comment.prototype, { type: CKEDITOR.NODE_COMMENT, getOuterHtml: function () { return "\x3c!--" + this.$.nodeValue + "--\x3e" } }); "use strict";
    (function () {
        var a = {}, d = {}, b; for (b in CKEDITOR.dtd.$blockLimit) b in CKEDITOR.dtd.$list || (a[b] = 1); for (b in CKEDITOR.dtd.$block) b in CKEDITOR.dtd.$blockLimit || b in CKEDITOR.dtd.$empty || (d[b] = 1); CKEDITOR.dom.elementPath = function (b, g) {
            var e = null, h = null, k = [], l = b, q; g = g || b.getDocument().getBody(); l || (l = g); do if (l.type == CKEDITOR.NODE_ELEMENT) {
                k.push(l); if (!this.lastElement && (this.lastElement = l, l.is(CKEDITOR.dtd.$object) || "false" == l.getAttribute("contenteditable"))) continue; if (l.equals(g)) break; if (!h && (q = l.getName(),
                    "true" == l.getAttribute("contenteditable") ? h = l : !e && d[q] && (e = l), a[q])) { if (q = !e && "div" == q) { a: { q = l.getChildren(); for (var f = 0, w = q.count(); f < w; f++) { var B = q.getItem(f); if (B.type == CKEDITOR.NODE_ELEMENT && CKEDITOR.dtd.$block[B.getName()]) { q = !0; break a } } q = !1 } q = !q } q ? e = l : h = l }
            } while (l = l.getParent()); h || (h = g); this.block = e; this.blockLimit = h; this.root = g; this.elements = k
        }
    })();
    CKEDITOR.dom.elementPath.prototype = {
        compare: function (a) { var d = this.elements; a = a && a.elements; if (!a || d.length != a.length) return !1; for (var b = 0; b < d.length; b++)if (!d[b].equals(a[b])) return !1; return !0 }, contains: function (a, d, b) {
            var c = 0, g; "string" == typeof a && (g = function (b) { return b.getName() == a }); a instanceof CKEDITOR.dom.element ? g = function (b) { return b.equals(a) } : CKEDITOR.tools.isArray(a) ? g = function (b) { return -1 < CKEDITOR.tools.indexOf(a, b.getName()) } : "function" == typeof a ? g = a : "object" == typeof a && (g = function (b) {
                return b.getName() in
                    a
            }); var e = this.elements, h = e.length; d && (b ? c += 1 : --h); b && (e = Array.prototype.slice.call(e, 0), e.reverse()); for (; c < h; c++)if (g(e[c])) return e[c]; return null
        }, isContextFor: function (a) { var d; return a in CKEDITOR.dtd.$block ? (d = this.contains(CKEDITOR.dtd.$intermediate) || this.root.equals(this.block) && this.block || this.blockLimit, !!d.getDtd()[a]) : !0 }, direction: function () { return (this.block || this.blockLimit || this.root).getDirection(1) }
    };
    CKEDITOR.dom.text = function (a, d) { "string" == typeof a && (a = (d ? d.$ : document).createTextNode(a)); this.$ = a }; CKEDITOR.dom.text.prototype = new CKEDITOR.dom.node;
    CKEDITOR.tools.extend(CKEDITOR.dom.text.prototype, {
        type: CKEDITOR.NODE_TEXT, getLength: function () { return this.$.nodeValue.length }, getText: function () { return this.$.nodeValue }, setText: function (a) { this.$.nodeValue = a }, isEmpty: function (a) { var d = this.getText(); a && (d = CKEDITOR.tools.trim(d)); return !d || d === CKEDITOR.dom.selection.FILLING_CHAR_SEQUENCE }, split: function (a) {
            var d = this.$.parentNode, b = d.childNodes.length, c = this.getLength(), g = this.getDocument(), e = new CKEDITOR.dom.text(this.$.splitText(a), g); d.childNodes.length ==
                b && (a >= c ? (e = g.createText(""), e.insertAfter(this)) : (a = g.createText(""), a.insertAfter(e), a.remove())); return e
        }, substring: function (a, d) { return "number" != typeof d ? this.$.nodeValue.substr(a) : this.$.nodeValue.substring(a, d) }
    });
    (function () {
        function a(a, c, d) { var e = a.serializable, h = c[d ? "endContainer" : "startContainer"], k = d ? "endOffset" : "startOffset", l = e ? c.document.getById(a.startNode) : a.startNode; a = e ? c.document.getById(a.endNode) : a.endNode; h.equals(l.getPrevious()) ? (c.startOffset = c.startOffset - h.getLength() - a.getPrevious().getLength(), h = a.getNext()) : h.equals(a.getPrevious()) && (c.startOffset -= h.getLength(), h = a.getNext()); h.equals(l.getParent()) && c[k]++; h.equals(a.getParent()) && c[k]++; c[d ? "endContainer" : "startContainer"] = h; return c }
        CKEDITOR.dom.rangeList = function (a) { if (a instanceof CKEDITOR.dom.rangeList) return a; a ? a instanceof CKEDITOR.dom.range && (a = [a]) : a = []; return CKEDITOR.tools.extend(a, d) }; var d = {
            createIterator: function () {
                var a = this, c = CKEDITOR.dom.walker.bookmark(), d = [], e; return {
                    getNextRange: function (h) {
                        e = void 0 === e ? 0 : e + 1; var k = a[e]; if (k && 1 < a.length) {
                            if (!e) for (var l = a.length - 1; 0 <= l; l--)d.unshift(a[l].createBookmark(!0)); if (h) for (var q = 0; a[e + q + 1];) {
                                var f = k.document; h = 0; l = f.getById(d[q].endNode); for (f = f.getById(d[q + 1].startNode); ;) {
                                    l =
                                    l.getNextSourceNode(!1); if (f.equals(l)) h = 1; else if (c(l) || l.type == CKEDITOR.NODE_ELEMENT && l.isBlockBoundary()) continue; break
                                } if (!h) break; q++
                            } for (k.moveToBookmark(d.shift()); q--;)l = a[++e], l.moveToBookmark(d.shift()), k.setEnd(l.endContainer, l.endOffset)
                        } return k
                    }
                }
            }, createBookmarks: function (b) { for (var c = [], d, e = 0; e < this.length; e++) { c.push(d = this[e].createBookmark(b, !0)); for (var h = e + 1; h < this.length; h++)this[h] = a(d, this[h]), this[h] = a(d, this[h], !0) } return c }, createBookmarks2: function (a) {
                for (var c = [], d = 0; d <
                    this.length; d++)c.push(this[d].createBookmark2(a)); return c
            }, moveToBookmarks: function (a) { for (var c = 0; c < this.length; c++)this[c].moveToBookmark(a[c]) }
        }
    })();
    (function () {
        function a() { return CKEDITOR.getUrl(CKEDITOR.skinName.split(",")[1] || "skins/" + CKEDITOR.skinName.split(",")[0] + "/") } function d(b) { var c = CKEDITOR.skin["ua_" + b], d = CKEDITOR.env; if (c) for (var c = c.split(",").sort(function (a, b) { return a > b ? -1 : 1 }), e = 0, g; e < c.length; e++)if (g = c[e], d.ie && (g.replace(/^ie/, "") == d.version || d.quirks && "iequirks" == g) && (g = "ie"), d[g]) { b += "_" + c[e]; break } return CKEDITOR.getUrl(a() + b + ".css") } function b(a, b) { e[a] || (CKEDITOR.document.appendStyleSheet(d(a)), e[a] = 1); b && b() } function c(a) {
            var b =
                a.getById(h); b || (b = a.getHead().append("style"), b.setAttribute("id", h), b.setAttribute("type", "text/css")); return b
        } function g(a, b, c) {
            var d, e, g; if (CKEDITOR.env.webkit) for (b = b.split("}").slice(0, -1), e = 0; e < b.length; e++)b[e] = b[e].split("{"); for (var h = 0; h < a.length; h++)if (CKEDITOR.env.webkit) for (e = 0; e < b.length; e++) { g = b[e][1]; for (d = 0; d < c.length; d++)g = g.replace(c[d][0], c[d][1]); a[h].$.sheet.addRule(b[e][0], g) } else {
                g = b; for (d = 0; d < c.length; d++)g = g.replace(c[d][0], c[d][1]); CKEDITOR.env.ie && 11 > CKEDITOR.env.version ?
                    a[h].$.styleSheet.cssText += g : a[h].$.innerHTML += g
            }
        } var e = {}; CKEDITOR.skin = {
            path: a, loadPart: function (c, d) { CKEDITOR.skin.name != CKEDITOR.skinName.split(",")[0] ? CKEDITOR.scriptLoader.load(CKEDITOR.getUrl(a() + "skin.js"), function () { b(c, d) }) : b(c, d) }, getPath: function (a) { return CKEDITOR.getUrl(d(a)) }, icons: {}, addIcon: function (a, b, c, d) { a = a.toLowerCase(); this.icons[a] || (this.icons[a] = { path: b, offset: c || 0, bgsize: d || "16px" }) }, getIconStyle: function (a, b, c, d, e) {
                var g; a && (a = a.toLowerCase(), b && (g = this.icons[a + "-rtl"]),
                    g || (g = this.icons[a])); a = c || g && g.path || ""; d = d || g && g.offset; e = e || g && g.bgsize || "16px"; a && (a = a.replace(/'/g, "\\'")); return a && "background-image:url('" + CKEDITOR.getUrl(a) + "');background-position:0 " + d + "px;background-size:" + e + ";"
            }
        }; CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
            getUiColor: function () { return this.uiColor }, setUiColor: function (a) {
                var b = c(CKEDITOR.document); return (this.setUiColor = function (a) {
                    this.uiColor = a; var c = CKEDITOR.skin.chameleon, d = "", e = ""; "function" == typeof c && (d = c(this, "editor"), e =
                        c(this, "panel")); a = [[l, a]]; g([b], d, a); g(k, e, a)
                }).call(this, a)
            }
        }); var h = "cke_ui_color", k = [], l = /\$color/g; CKEDITOR.on("instanceLoaded", function (a) {
            if (!CKEDITOR.env.ie || !CKEDITOR.env.quirks) {
                var b = a.editor; a = function (a) {
                    a = (a.data[0] || a.data).element.getElementsByTag("iframe").getItem(0).getFrameDocument(); if (!a.getById("cke_ui_color")) {
                        var d = c(a); k.push(d); b.on("destroy", function () { k = CKEDITOR.tools.array.filter(k, function (a) { return d !== a }) }); (a = b.getUiColor()) && g([d], CKEDITOR.skin.chameleon(b, "panel"),
                            [[l, a]])
                    }
                }; b.on("panelShow", a); b.on("menuShow", a); b.config.uiColor && b.setUiColor(b.config.uiColor)
            }
        })
    })();
    (function () {
        var a = CKEDITOR.dom.element.createFromHtml('\x3cdiv style\x3d"width:0;height:0;position:absolute;left:-10000px;border:1px solid;border-color:red blue"\x3e\x3c/div\x3e', CKEDITOR.document); a.appendTo(CKEDITOR.document.getHead()); try { var d = a.getComputedStyle("border-top-color"), b = a.getComputedStyle("border-right-color"); CKEDITOR.env.hc = !(!d || d != b) } catch (c) { CKEDITOR.env.hc = !1 } a.remove(); CKEDITOR.env.hc && (CKEDITOR.env.cssClass += " cke_hc"); CKEDITOR.document.appendStyleText(".cke{visibility:hidden;}");
        CKEDITOR.status = "loaded"; CKEDITOR.fireOnce("loaded"); if (a = CKEDITOR._.pending) for (delete CKEDITOR._.pending, d = 0; d < a.length; d++)CKEDITOR.editor.prototype.constructor.apply(a[d][0], a[d][1]), CKEDITOR.add(a[d][0])
    })();/*
 Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 CKEditor 4 LTS ("Long Term Support") is available under the terms of the Extended Support Model.
*/
    CKEDITOR.skin.name = "moono-lisa"; CKEDITOR.skin.ua_editor = "ie,iequirks,ie8,gecko"; CKEDITOR.skin.ua_dialog = "ie,iequirks,ie8";
    CKEDITOR.skin.chameleon = function () {
        var b = function () { return function (b, d) { for (var a = b.match(/[^#]./g), e = 0; 3 > e; e++) { var f = e, c; c = parseInt(a[e], 16); c = ("0" + (0 > d ? 0 | c * (1 + d) : 0 | c + (255 - c) * d).toString(16)).slice(-2); a[f] = c } return "#" + a.join("") } }(), f = { editor: new CKEDITOR.template("{id}.cke_chrome [border-color:{defaultBorder};] {id} .cke_top [ background-color:{defaultBackground};border-bottom-color:{defaultBorder};] {id} .cke_bottom [background-color:{defaultBackground};border-top-color:{defaultBorder};] {id} .cke_resizer [border-right-color:{ckeResizer}] {id} .cke_dialog_title [background-color:{defaultBackground};border-bottom-color:{defaultBorder};] {id} .cke_dialog_footer [background-color:{defaultBackground};outline-color:{defaultBorder};] {id} .cke_dialog_tab [background-color:{dialogTab};border-color:{defaultBorder};] {id} .cke_dialog_tab:hover [background-color:{lightBackground};] {id} .cke_dialog_contents [border-top-color:{defaultBorder};] {id} .cke_dialog_tab_selected, {id} .cke_dialog_tab_selected:hover [background:{dialogTabSelected};border-bottom-color:{dialogTabSelectedBorder};] {id} .cke_dialog_body [background:{dialogBody};border-color:{defaultBorder};] {id} a.cke_button_off:hover,{id} a.cke_button_off:focus,{id} a.cke_button_off:active [background-color:{darkBackground};border-color:{toolbarElementsBorder};] {id} .cke_button_on [background-color:{ckeButtonOn};border-color:{toolbarElementsBorder};] {id} .cke_toolbar_separator,{id} .cke_toolgroup a.cke_button:last-child:after,{id} .cke_toolgroup a.cke_button.cke_button_disabled:hover:last-child:after [background-color: {toolbarElementsBorder};border-color: {toolbarElementsBorder};] {id} a.cke_combo_button:hover,{id} a.cke_combo_button:focus,{id} .cke_combo_on a.cke_combo_button [border-color:{toolbarElementsBorder};background-color:{darkBackground};] {id} .cke_combo:after [border-color:{toolbarElementsBorder};] {id} .cke_path_item [color:{elementsPathColor};] {id} a.cke_path_item:hover,{id} a.cke_path_item:focus,{id} a.cke_path_item:active [background-color:{darkBackground};] {id}.cke_panel [border-color:{defaultBorder};] "), panel: new CKEDITOR.template(".cke_panel_grouptitle [background-color:{lightBackground};border-color:{defaultBorder};] .cke_menubutton_icon [background-color:{menubuttonIcon};] .cke_menubutton:hover,.cke_menubutton:focus,.cke_menubutton:active [background-color:{menubuttonHover};] .cke_menubutton:hover .cke_menubutton_icon, .cke_menubutton:focus .cke_menubutton_icon, .cke_menubutton:active .cke_menubutton_icon [background-color:{menubuttonIconHover};] .cke_menubutton_disabled:hover .cke_menubutton_icon,.cke_menubutton_disabled:focus .cke_menubutton_icon,.cke_menubutton_disabled:active .cke_menubutton_icon [background-color:{menubuttonIcon};] .cke_menuseparator [background-color:{menubuttonIcon};] a:hover.cke_colorbox, a:active.cke_colorbox [border-color:{defaultBorder};] a:hover.cke_colorauto, a:hover.cke_colormore, a:active.cke_colorauto, a:active.cke_colormore [background-color:{ckeColorauto};border-color:{defaultBorder};] ") };
        return function (g, d) { var a = b(g.uiColor, .4), a = { id: "." + g.id, defaultBorder: b(a, -.2), toolbarElementsBorder: b(a, -.25), defaultBackground: a, lightBackground: b(a, .8), darkBackground: b(a, -.15), ckeButtonOn: b(a, .4), ckeResizer: b(a, -.4), ckeColorauto: b(a, .8), dialogBody: b(a, .7), dialogTab: b(a, .65), dialogTabSelected: "#FFF", dialogTabSelectedBorder: "#FFF", elementsPathColor: b(a, -.6), menubuttonHover: b(a, .1), menubuttonIcon: b(a, .5), menubuttonIconHover: b(a, .3) }; return f[d].output(a).replace(/\[/g, "{").replace(/\]/g, "}") }
    }(); CKEDITOR.plugins.add("dialogui", {
        onLoad: function () {
            var k = function (b) { this._ || (this._ = {}); this._["default"] = this._.initValue = b["default"] || ""; this._.required = b.required || !1; for (var a = [this._], d = 1; d < arguments.length; d++)a.push(arguments[d]); a.push(!0); CKEDITOR.tools.extend.apply(CKEDITOR.tools, a); return this._ }, r = { build: function (b, a, d) { return new CKEDITOR.ui.dialog.textInput(b, a, d) } }, m = { build: function (b, a, d) { return new CKEDITOR.ui.dialog[a.type](b, a, d) } }, q = {
                isChanged: function () {
                    return this.getValue() !=
                        this.getInitValue()
                }, reset: function (b) { this.setValue(this.getInitValue(), b) }, setInitValue: function () { this._.initValue = this.getValue() }, resetInitValue: function () { this._.initValue = this._["default"] }, getInitValue: function () { return this._.initValue }
            }, v = CKEDITOR.tools.extend({}, CKEDITOR.ui.dialog.uiElement.prototype.eventProcessors, {
                onChange: function (b, a) {
                    this._.domOnChangeRegistered || (b.on("load", function () {
                        this.getInputElement().on("change", function () { b.parts.dialog.isVisible() && this.fire("change", { value: this.getValue() }) },
                            this)
                    }, this), this._.domOnChangeRegistered = !0); this.on("change", a)
                }
            }, !0), x = /^on([A-Z]\w+)/, t = function (b) { for (var a in b) (x.test(a) || "title" == a || "type" == a) && delete b[a]; return b }, w = function (b) { b = b.data.getKeystroke(); b == CKEDITOR.SHIFT + CKEDITOR.ALT + 36 ? this.setDirectionMarker("ltr") : b == CKEDITOR.SHIFT + CKEDITOR.ALT + 35 && this.setDirectionMarker("rtl") }; CKEDITOR.tools.extend(CKEDITOR.ui.dialog, {
                labeledElement: function (b, a, d, e) {
                    if (!(4 > arguments.length)) {
                        var c = k.call(this, a); c.labelId = CKEDITOR.tools.getNextId() +
                            "_label"; this._.children = []; var f = { role: a.role || "presentation" }; a.includeLabel && (f["aria-labelledby"] = c.labelId); CKEDITOR.ui.dialog.uiElement.call(this, b, a, d, "div", null, f, function () {
                                var d = [], g = a.required ? " cke_required" : ""; "horizontal" != a.labelLayout ? d.push('\x3clabel class\x3d"cke_dialog_ui_labeled_label' + g + '" ', ' id\x3d"' + c.labelId + '"', c.inputId ? ' for\x3d"' + c.inputId + '"' : "", (a.labelStyle ? ' style\x3d"' + a.labelStyle + '"' : "") + "\x3e", a.required ? a.label + '\x3cspan class\x3d"cke_dialog_ui_labeled_required" aria-hidden\x3d"true"\x3e*\x3c/span\x3e' :
                                    a.label, "\x3c/label\x3e", '\x3cdiv class\x3d"cke_dialog_ui_labeled_content"', a.controlStyle ? ' style\x3d"' + a.controlStyle + '"' : "", ' role\x3d"presentation"\x3e', e.call(this, b, a), "\x3c/div\x3e") : (g = {
                                        type: "hbox", widths: a.widths, padding: 0, children: [{ type: "html", html: '\x3clabel class\x3d"cke_dialog_ui_labeled_label' + g + '" id\x3d"' + c.labelId + '" for\x3d"' + c.inputId + '"' + (a.labelStyle ? ' style\x3d"' + a.labelStyle + '"' : "") + "\x3e" + CKEDITOR.tools.htmlEncode(a.label) + "\x3c/label\x3e" }, {
                                            type: "html", html: '\x3cspan class\x3d"cke_dialog_ui_labeled_content"' +
                                                (a.controlStyle ? ' style\x3d"' + a.controlStyle + '"' : "") + "\x3e" + e.call(this, b, a) + "\x3c/span\x3e"
                                        }]
                                    }, CKEDITOR.dialog._.uiElementBuilders.hbox.build(b, g, d)); return d.join("")
                            })
                    }
                }, textInput: function (b, a, d) {
                    if (!(3 > arguments.length)) {
                        k.call(this, a); var e = this._.inputId = CKEDITOR.tools.getNextId() + "_textInput", c = { "class": "cke_dialog_ui_input_" + a.type, id: e, type: a.type }; a.validate && (this.validate = a.validate); a.maxLength && (c.maxlength = a.maxLength); a.size && (c.size = a.size); a.inputStyle && (c.style = a.inputStyle); var f =
                            this, h = !1; b.on("load", function () { f.getInputElement().on("keydown", function (a) { 13 == a.data.getKeystroke() && (h = !0) }); f.getInputElement().on("keyup", function (a) { 13 == a.data.getKeystroke() && h && (b.getButton("ok") && setTimeout(function () { b.getButton("ok").click() }, 0), h = !1); f.bidi && w.call(f, a) }, null, null, 1E3) }); CKEDITOR.ui.dialog.labeledElement.call(this, b, a, d, function () {
                                var b = ['\x3cdiv class\x3d"cke_dialog_ui_input_', a.type, '" role\x3d"presentation"']; a.width && b.push('style\x3d"width:' + a.width + '" '); b.push("\x3e\x3cinput ");
                                c["aria-labelledby"] = this._.labelId; this._.required && (c["aria-required"] = this._.required); for (var e in c) b.push(e + '\x3d"' + c[e] + '" '); b.push(" /\x3e\x3c/div\x3e"); return b.join("")
                            })
                    }
                }, textarea: function (b, a, d) {
                    if (!(3 > arguments.length)) {
                        k.call(this, a); var e = this, c = this._.inputId = CKEDITOR.tools.getNextId() + "_textarea", f = {}; a.validate && (this.validate = a.validate); f.rows = a.rows || 5; f.cols = a.cols || 20; f["class"] = "cke_dialog_ui_input_textarea " + (a["class"] || ""); "undefined" != typeof a.inputStyle && (f.style = a.inputStyle);
                        a.dir && (f.dir = a.dir); if (e.bidi) b.on("load", function () { e.getInputElement().on("keyup", w) }, e); CKEDITOR.ui.dialog.labeledElement.call(this, b, a, d, function () {
                            f["aria-labelledby"] = this._.labelId; this._.required && (f["aria-required"] = this._.required); var a = ['\x3cdiv class\x3d"cke_dialog_ui_input_textarea" role\x3d"presentation"\x3e\x3ctextarea id\x3d"', c, '" '], b; for (b in f) a.push(b + '\x3d"' + CKEDITOR.tools.htmlEncode(f[b]) + '" '); a.push("\x3e", CKEDITOR.tools.htmlEncode(e._["default"]), "\x3c/textarea\x3e\x3c/div\x3e");
                            return a.join("")
                        })
                    }
                }, checkbox: function (b, a, d) {
                    if (!(3 > arguments.length)) {
                        var e = k.call(this, a, { "default": !!a["default"] }); a.validate && (this.validate = a.validate); CKEDITOR.ui.dialog.uiElement.call(this, b, a, d, "span", null, null, function () {
                            var c = CKEDITOR.tools.extend({}, a, { id: a.id ? a.id + "_checkbox" : CKEDITOR.tools.getNextId() + "_checkbox" }, !0), d = [], h = CKEDITOR.tools.getNextId() + "_label", g = { "class": "cke_dialog_ui_checkbox_input", type: "checkbox", "aria-labelledby": h }; t(c); a["default"] && (g.checked = "checked"); "undefined" !=
                                typeof c.inputStyle && (c.style = c.inputStyle); e.checkbox = new CKEDITOR.ui.dialog.uiElement(b, c, d, "input", null, g); d.push(' \x3clabel id\x3d"', h, '" for\x3d"', g.id, '"' + (a.labelStyle ? ' style\x3d"' + a.labelStyle + '"' : "") + "\x3e", CKEDITOR.tools.htmlEncode(a.label), "\x3c/label\x3e"); return d.join("")
                        })
                    }
                }, radio: function (b, a, d) {
                    if (!(3 > arguments.length)) {
                        k.call(this, a); this._["default"] || (this._["default"] = this._.initValue = a.items[0][1]); a.validate && (this.validate = a.validate); var e = [], c = this; a.role = "radiogroup";
                        a.includeLabel = !0; CKEDITOR.ui.dialog.labeledElement.call(this, b, a, d, function () {
                            for (var d = [], h = [], g = (a.id ? a.id : CKEDITOR.tools.getNextId()) + "_radio", n = 0; n < a.items.length; n++) {
                                var l = a.items[n], k = void 0 !== l[2] ? l[2] : l[0], m = void 0 !== l[1] ? l[1] : l[0], p = CKEDITOR.tools.getNextId() + "_radio_input", q = p + "_label", p = CKEDITOR.tools.extend({}, a, { id: p, title: null, type: null }, !0), k = CKEDITOR.tools.extend({}, p, { title: k }, !0), r = { type: "radio", "class": "cke_dialog_ui_radio_input", name: g, value: m, "aria-labelledby": q }, u = []; c._["default"] ==
                                    m && (r.checked = "checked"); t(p); t(k); "undefined" != typeof p.inputStyle && (p.style = p.inputStyle); m = new CKEDITOR.ui.dialog.uiElement(b, p, u, "input", null, r); m.on("focus", function () { c.click() }); e.push(m); u.push(" "); new CKEDITOR.ui.dialog.uiElement(b, k, u, "label", null, { id: q, "for": r.id }, l[0]); d.push(u.join(""))
                            } new CKEDITOR.ui.dialog.hbox(b, e, d, h); return h.join("")
                        }); this._.children = e
                    }
                }, button: function (b, a, d) {
                    if (arguments.length) {
                        "function" == typeof a && (a = a(b.getParentEditor())); k.call(this, a, {
                            disabled: a.disabled ||
                                !1
                        }); CKEDITOR.event.implementOn(this); var e = this; b.on("load", function () { var a = this.getElement(); (function () { a.on("click", function (a) { e.click(); a.data.preventDefault() }); a.on("keydown", function (a) { a.data.getKeystroke() in { 32: 1 } && (e.click(), a.data.preventDefault()) }) })(); a.unselectable() }, this); var c = CKEDITOR.tools.extend({}, a); delete c.style; var f = CKEDITOR.tools.getNextId() + "_label"; CKEDITOR.ui.dialog.uiElement.call(this, b, c, d, "a", null, {
                            style: a.style, href: "javascript:void(0)", title: a.label, hidefocus: "true",
                            "class": a["class"], role: "button", "aria-labelledby": f
                        }, '\x3cspan id\x3d"' + f + '" class\x3d"cke_dialog_ui_button"\x3e' + CKEDITOR.tools.htmlEncode(a.label) + "\x3c/span\x3e")
                    }
                }, select: function (b, a, d) {
                    if (!(3 > arguments.length)) {
                        var e = k.call(this, a); a.validate && (this.validate = a.validate); e.inputId = CKEDITOR.tools.getNextId() + "_select"; CKEDITOR.ui.dialog.labeledElement.call(this, b, a, d, function () {
                            var c = CKEDITOR.tools.extend({}, a, { id: a.id ? a.id + "_select" : CKEDITOR.tools.getNextId() + "_select" }, !0), d = [], h = [], g = {
                                id: e.inputId,
                                "class": "cke_dialog_ui_input_select", "aria-labelledby": this._.labelId
                            }; d.push('\x3cdiv class\x3d"cke_dialog_ui_input_', a.type, '" role\x3d"presentation"'); a.width && d.push('style\x3d"width:' + a.width + '" '); d.push("\x3e"); void 0 !== a.size && (g.size = a.size); void 0 !== a.multiple && (g.multiple = a.multiple); t(c); for (var n = 0, l; n < a.items.length && (l = a.items[n]); n++)h.push('\x3coption value\x3d"', CKEDITOR.tools.htmlEncode(void 0 !== l[1] ? l[1] : l[0]).replace(/"/g, "\x26quot;"), '" /\x3e ', CKEDITOR.tools.htmlEncode(l[0]));
                            "undefined" != typeof c.inputStyle && (c.style = c.inputStyle); e.select = new CKEDITOR.ui.dialog.uiElement(b, c, d, "select", null, g, h.join("")); d.push("\x3c/div\x3e"); return d.join("")
                        })
                    }
                }, file: function (b, a, d) {
                    if (!(3 > arguments.length)) {
                        void 0 === a["default"] && (a["default"] = ""); var e = CKEDITOR.tools.extend(k.call(this, a), { definition: a, buttons: [] }); a.validate && (this.validate = a.validate); b.on("load", function () { CKEDITOR.document.getById(e.frameId).getParent().addClass("cke_dialog_ui_input_file") }); CKEDITOR.ui.dialog.labeledElement.call(this,
                            b, a, d, function () { e.frameId = CKEDITOR.tools.getNextId() + "_fileInput"; var b = ['\x3ciframe frameborder\x3d"0" allowtransparency\x3d"0" class\x3d"cke_dialog_ui_input_file" role\x3d"presentation" id\x3d"', e.frameId, '" title\x3d"', a.label, '" src\x3d"javascript:void(']; b.push(CKEDITOR.env.ie ? "(function(){" + encodeURIComponent("document.open();(" + CKEDITOR.tools.fixDomain + ")();document.close();") + "})()" : "0"); b.push(')"\x3e\x3c/iframe\x3e'); return b.join("") })
                    }
                }, fileButton: function (b, a, d) {
                    var e = this; if (!(3 > arguments.length)) {
                        k.call(this,
                            a); a.validate && (this.validate = a.validate); var c = CKEDITOR.tools.extend({}, a), f = c.onClick; c.className = (c.className ? c.className + " " : "") + "cke_dialog_ui_button"; c.onClick = function (c) { var d = a["for"]; c = f ? f.call(this, c) : !1; !1 !== c && ("xhr" !== c && b.getContentElement(d[0], d[1]).submit(), this.disable()) }; b.on("load", function () { b.getContentElement(a["for"][0], a["for"][1])._.buttons.push(e) }); CKEDITOR.ui.dialog.button.call(this, b, c, d)
                    }
                }, html: function () {
                    var b = /^\s*<[\w:]+\s+([^>]*)?>/, a = /^(\s*<[\w:]+(?:\s+[^>]*)?)((?:.|\r|\n)+)$/,
                    d = /\/$/; return function (e, c, f) {
                        if (!(3 > arguments.length)) {
                            var h = [], g = c.html; "\x3c" != g.charAt(0) && (g = "\x3cspan\x3e" + g + "\x3c/span\x3e"); var n = c.focus; if (n) { var l = this.focus; this.focus = function () { ("function" == typeof n ? n : l).call(this); this.fire("focus") }; c.isFocusable && (this.isFocusable = this.isFocusable); this.keyboardFocusable = !0 } CKEDITOR.ui.dialog.uiElement.call(this, e, c, h, "span", null, null, ""); h = h.join("").match(b); g = g.match(a) || ["", "", ""]; d.test(g[1]) && (g[1] = g[1].slice(0, -1), g[2] = "/" + g[2]); f.push([g[1],
                                " ", h[1] || "", g[2]].join(""))
                        }
                    }
                }(), fieldset: function (b, a, d, e, c) { var f = c.label; this._ = { children: a }; CKEDITOR.ui.dialog.uiElement.call(this, b, c, e, "fieldset", null, null, function () { var a = []; f && a.push("\x3clegend" + (c.labelStyle ? ' style\x3d"' + c.labelStyle + '"' : "") + "\x3e" + f + "\x3c/legend\x3e"); for (var b = 0; b < d.length; b++)a.push(d[b]); return a.join("") }) }
            }, !0); CKEDITOR.ui.dialog.html.prototype = new CKEDITOR.ui.dialog.uiElement; CKEDITOR.ui.dialog.labeledElement.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.uiElement,
                { setLabel: function (b) { var a = CKEDITOR.document.getById(this._.labelId); 1 > a.getChildCount() ? (new CKEDITOR.dom.text(b, CKEDITOR.document)).appendTo(a) : a.getChild(0).$.nodeValue = b; return this }, getLabel: function () { var b = CKEDITOR.document.getById(this._.labelId); return !b || 1 > b.getChildCount() ? "" : b.getChild(0).getText() }, eventProcessors: v }, !0); CKEDITOR.ui.dialog.button.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.uiElement, {
                    click: function () { return this._.disabled ? !1 : this.fire("click", { dialog: this._.dialog }) },
                    enable: function () { this._.disabled = !1; var b = this.getElement(); b && b.removeClass("cke_disabled") }, disable: function () { this._.disabled = !0; this.getElement().addClass("cke_disabled") }, isVisible: function () { return this.getElement().getFirst().isVisible() }, isEnabled: function () { return !this._.disabled }, eventProcessors: CKEDITOR.tools.extend({}, CKEDITOR.ui.dialog.uiElement.prototype.eventProcessors, { onClick: function (b, a) { this.on("click", function () { a.apply(this, arguments) }) } }, !0), accessKeyUp: function () { this.click() },
                    accessKeyDown: function () { this.focus() }, keyboardFocusable: !0
                }, !0); CKEDITOR.ui.dialog.textInput.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.labeledElement, {
                    getInputElement: function () { return CKEDITOR.document.getById(this._.inputId) }, focus: function () { var b = this.selectParentTab(); setTimeout(function () { var a = b.getInputElement(); a && a.$.focus() }, 0) }, select: function () { var b = this.selectParentTab(); setTimeout(function () { var a = b.getInputElement(); a && (a.$.focus(), a.$.select()) }, 0) }, accessKeyUp: function () { this.select() },
                    setValue: function (b) { if (this.bidi) { var a = b && b.charAt(0); (a = "‪" == a ? "ltr" : "‫" == a ? "rtl" : null) && (b = b.slice(1)); this.setDirectionMarker(a) } b || (b = ""); return CKEDITOR.ui.dialog.uiElement.prototype.setValue.apply(this, arguments) }, getValue: function () { var b = CKEDITOR.ui.dialog.uiElement.prototype.getValue.call(this); if (this.bidi && b) { var a = this.getDirectionMarker(); a && (b = ("ltr" == a ? "‪" : "‫") + b) } return b }, setDirectionMarker: function (b) {
                        var a = this.getInputElement(); b ? a.setAttributes({ dir: b, "data-cke-dir-marker": b }) :
                            this.getDirectionMarker() && a.removeAttributes(["dir", "data-cke-dir-marker"])
                    }, getDirectionMarker: function () { return this.getInputElement().data("cke-dir-marker") }, keyboardFocusable: !0
                }, q, !0); CKEDITOR.ui.dialog.textarea.prototype = new CKEDITOR.ui.dialog.textInput; CKEDITOR.ui.dialog.select.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.labeledElement, {
                    getInputElement: function () { return this._.select.getElement() }, add: function (b, a, d) {
                        var e = new CKEDITOR.dom.element("option", this.getDialog().getParentEditor().document),
                        c = this.getInputElement().$; e.$.text = b; e.$.value = void 0 === a || null === a ? b : a; void 0 === d || null === d ? CKEDITOR.env.ie ? c.add(e.$) : c.add(e.$, null) : c.add(e.$, d); return this
                    }, remove: function (b) { this.getInputElement().$.remove(b); return this }, clear: function () { for (var b = this.getInputElement().$; 0 < b.length;)b.remove(0); return this }, keyboardFocusable: !0
                }, q, !0); CKEDITOR.ui.dialog.checkbox.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.uiElement, {
                    getInputElement: function () { return this._.checkbox.getElement() },
                    setValue: function (b, a) { this.getInputElement().$.checked = b; !a && this.fire("change", { value: b }); return this }, getValue: function () { return this.getInputElement().$.checked }, accessKeyUp: function () { this.setValue(!this.getValue()) }, eventProcessors: {
                        onChange: function (b, a) {
                            if (!CKEDITOR.env.ie || 8 < CKEDITOR.env.version) return v.onChange.apply(this, arguments); b.on("load", function () {
                                var a = this._.checkbox.getElement(); a.on("propertychange", function (b) { b = b.data.$; "checked" == b.propertyName && this.fire("change", { value: a.$.checked }) },
                                    this)
                            }, this); this.on("change", a); return null
                        }
                    }, keyboardFocusable: !0
                }, q, !0); CKEDITOR.ui.dialog.radio.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.uiElement, {
                    focus: function () { var b = this._.children, a = b[0], d = this._.dialog._, e = d.currentFocusIndex, c = e === d.focusList.length - 1 && 0 === this.focusIndex; e > this.focusIndex && !c && (a = b[b.length - 1]); d.currentFocusIndex = this.focusIndex; for (d = 0; d < b.length; d++)if (e = b[d], e.getInputElement().$.checked) { a = e; break } a.focus() }, setValue: function (b, a) {
                        for (var d = this._.children,
                            e, c = 0; c < d.length && (e = d[c]); c++)e.getElement().$.checked = e.getValue() == b; !a && this.fire("change", { value: b }); return this
                    }, getValue: function () { for (var b = this._.children, a = 0; a < b.length; a++)if (b[a].getElement().$.checked) return b[a].getValue(); return null }, accessKeyUp: function () { var b = this._.children, a; for (a = 0; a < b.length; a++)if (b[a].getElement().$.checked) { b[a].getElement().focus(); return } b[0].getElement().focus() }, click: function () { this._.dialog._.currentFocusIndex = this.focusIndex }, eventProcessors: {
                        onChange: function (b,
                            a) { if (!CKEDITOR.env.ie || 8 < CKEDITOR.env.version) return v.onChange.apply(this, arguments); b.on("load", function () { for (var a = this._.children, b = this, c = 0; c < a.length; c++)a[c].getElement().on("propertychange", function (a) { a = a.data.$; "checked" == a.propertyName && this.$.checked && b.fire("change", { value: this.getAttribute("value") }) }) }, this); this.on("change", a); return null }
                    }, keyboardFocusable: !0
                }, q, !0); CKEDITOR.ui.dialog.file.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.labeledElement, q, {
                    getInputElement: function () {
                        var b =
                            CKEDITOR.document.getById(this._.frameId).getFrameDocument(); return 0 < b.$.forms.length ? new CKEDITOR.dom.element(b.$.forms[0].elements[0]) : this.getElement()
                    }, submit: function () { this.getInputElement().getParent().$.submit(); return this }, getAction: function () { return this.getInputElement().getParent().$.action }, registerEvents: function (b) {
                        var a = /^on([A-Z]\w+)/, d, e = function (a, b, c, d) { a.on("formLoaded", function () { a.getInputElement().on(c, d, a) }) }, c; for (c in b) if (d = c.match(a)) this.eventProcessors[c] ? this.eventProcessors[c].call(this,
                            this._.dialog, b[c]) : e(this, this._.dialog, d[1].toLowerCase(), b[c]); return this
                    }, reset: function () {
                        function b() {
                            d.$.open(); var b = ""; e.size && (b = e.size - (CKEDITOR.env.ie ? 7 : 0)); var k = a.frameId + "_input"; d.$.write(['\x3chtml dir\x3d"' + g + '" lang\x3d"' + n + '"\x3e\x3chead\x3e\x3ctitle\x3e\x3c/title\x3e\x3c/head\x3e\x3cbody style\x3d"margin: 0; overflow: hidden; background: transparent;"\x3e', '\x3cform enctype\x3d"multipart/form-data" method\x3d"POST" dir\x3d"' + g + '" lang\x3d"' + n + '" action\x3d"', CKEDITOR.tools.htmlEncode(e.action),
                                '"\x3e\x3clabel id\x3d"', a.labelId, '" for\x3d"', k, '" style\x3d"display:none"\x3e', CKEDITOR.tools.htmlEncode(e.label), '\x3c/label\x3e\x3cinput style\x3d"width:100%" id\x3d"', k, '" aria-labelledby\x3d"', a.labelId, '" type\x3d"file" name\x3d"', CKEDITOR.tools.htmlEncode(e.id || "cke_upload"), '" size\x3d"', CKEDITOR.tools.htmlEncode(0 < b ? b : ""), '" /\x3e\x3c/form\x3e\x3c/body\x3e\x3c/html\x3e\x3cscript\x3e', CKEDITOR.env.ie ? "(" + CKEDITOR.tools.fixDomain + ")();" : "", "window.parent.CKEDITOR.tools.callFunction(" + f + ");",
                            "window.onbeforeunload \x3d function() {window.parent.CKEDITOR.tools.callFunction(" + h + ")}", "\x3c/script\x3e"].join("")); d.$.close(); for (b = 0; b < c.length; b++)c[b].enable()
                        } var a = this._, d = CKEDITOR.document.getById(a.frameId).getFrameDocument(), e = a.definition, c = a.buttons, f = this.formLoadedNumber, h = this.formUnloadNumber, g = a.dialog._.editor.lang.dir, n = a.dialog._.editor.langCode; f || (f = this.formLoadedNumber = CKEDITOR.tools.addFunction(function () { this.fire("formLoaded") }, this), h = this.formUnloadNumber = CKEDITOR.tools.addFunction(function () { this.getInputElement().clearCustomData() },
                            this), this.getDialog()._.editor.on("destroy", function () { CKEDITOR.tools.removeFunction(f); CKEDITOR.tools.removeFunction(h) })); CKEDITOR.env.gecko ? setTimeout(b, 500) : b()
                    }, getValue: function () { return this.getInputElement().$.value || "" }, setInitValue: function () { this._.initValue = "" }, eventProcessors: {
                        onChange: function (b, a) {
                            this._.domOnChangeRegistered || (this.on("formLoaded", function () { this.getInputElement().on("change", function () { this.fire("change", { value: this.getValue() }) }, this) }, this), this._.domOnChangeRegistered =
                                !0); this.on("change", a)
                        }
                    }, keyboardFocusable: !0
                }, !0); CKEDITOR.ui.dialog.fileButton.prototype = new CKEDITOR.ui.dialog.button; CKEDITOR.ui.dialog.fieldset.prototype = CKEDITOR.tools.clone(CKEDITOR.ui.dialog.hbox.prototype); CKEDITOR.dialog.addUIElement("text", r); CKEDITOR.dialog.addUIElement("password", r); CKEDITOR.dialog.addUIElement("tel", r); CKEDITOR.dialog.addUIElement("textarea", m); CKEDITOR.dialog.addUIElement("checkbox", m); CKEDITOR.dialog.addUIElement("radio", m); CKEDITOR.dialog.addUIElement("button", m);
            CKEDITOR.dialog.addUIElement("select", m); CKEDITOR.dialog.addUIElement("file", m); CKEDITOR.dialog.addUIElement("fileButton", m); CKEDITOR.dialog.addUIElement("html", m); CKEDITOR.dialog.addUIElement("fieldset", { build: function (b, a, d) { for (var e = a.children, c, f = [], h = [], g = 0; g < e.length && (c = e[g]); g++) { var k = []; f.push(k); h.push(CKEDITOR.dialog._.uiElementBuilders[c.type].build(b, c, k)) } return new CKEDITOR.ui.dialog[a.type](b, h, f, d, a) } })
        }
    }); CKEDITOR.DIALOG_RESIZE_NONE = 0; CKEDITOR.DIALOG_RESIZE_WIDTH = 1; CKEDITOR.DIALOG_RESIZE_HEIGHT = 2; CKEDITOR.DIALOG_RESIZE_BOTH = 3; CKEDITOR.DIALOG_STATE_IDLE = 1; CKEDITOR.DIALOG_STATE_BUSY = 2;
    (function () {
        function I(a) { a._.tabBarMode = !0; a._.tabs[a._.currentTabId][0].focus(); a._.currentFocusIndex = -1 } function J() { for (var a = this._.tabIdList.length, b = CKEDITOR.tools.indexOf(this._.tabIdList, this._.currentTabId) + a, c = b - 1; c > b - a; c--)if (this._.tabs[this._.tabIdList[c % a]][0].$.offsetHeight) return this._.tabIdList[c % a]; return null } function W() {
            for (var a = this._.tabIdList.length, b = CKEDITOR.tools.indexOf(this._.tabIdList, this._.currentTabId), c = b + 1; c < b + a; c++)if (this._.tabs[this._.tabIdList[c % a]][0].$.offsetHeight) return this._.tabIdList[c %
                a]; return null
        } function K(a, b) { for (var c = a.$.getElementsByTagName("input"), e = 0, d = c.length; e < d; e++) { var f = new CKEDITOR.dom.element(c[e]); "text" == f.getAttribute("type").toLowerCase() && (b ? (f.setAttribute("value", f.getCustomData("fake_value") || ""), f.removeCustomData("fake_value")) : (f.setCustomData("fake_value", f.getAttribute("value")), f.setAttribute("value", ""))) } } function X(a, b) {
            var c = this.getInputElement(); c && (a ? c.removeAttribute("aria-invalid") : c.setAttribute("aria-invalid", !0)); a || (this.select ? this.select() :
                this.focus()); b && alert(b); this.fire("validated", { valid: a, msg: b })
        } function Y() { var a = this.getInputElement(); a && a.removeAttribute("aria-invalid") } function Z(a) {
            var b = CKEDITOR.dom.element.createFromHtml(CKEDITOR.addTemplate("dialog", aa).output({ id: CKEDITOR.tools.getNextNumber(), editorId: a.id, langDir: a.lang.dir, langCode: a.langCode, editorDialogClass: "cke_editor_" + a.name.replace(/\./g, "\\.") + "_dialog", closeTitle: a.lang.common.close, hidpi: CKEDITOR.env.hidpi ? "cke_hidpi" : "" })), c = b.getChild([0, 0, 0, 0, 0]), e =
                c.getChild(0), d = c.getChild(1); a.plugins.clipboard && CKEDITOR.plugins.clipboard.preventDefaultDropOnElement(c); !CKEDITOR.env.ie || CKEDITOR.env.quirks || CKEDITOR.env.edge || (a = "javascript:void(function(){" + encodeURIComponent("document.open();(" + CKEDITOR.tools.fixDomain + ")();document.close();") + "}())", CKEDITOR.dom.element.createFromHtml('\x3ciframe frameBorder\x3d"0" class\x3d"cke_iframe_shim" src\x3d"' + a + '" tabIndex\x3d"-1"\x3e\x3c/iframe\x3e').appendTo(c.getParent())); e.unselectable(); d.unselectable();
            return { element: b, parts: { dialog: b.getChild(0), title: e, close: d, tabs: c.getChild(2), contents: c.getChild([3, 0, 0, 0]), footer: c.getChild([3, 0, 1, 0]) } }
        } function L(a, b, c) {
            this.element = b; this.focusIndex = c; this.tabIndex = 0; this.isFocusable = function () { return !b.getAttribute("disabled") && b.isVisible() }; this.focus = function () { a._.currentFocusIndex = this.focusIndex; this.element.focus() }; b.on("keydown", function (a) { a.data.getKeystroke() in { 32: 1, 13: 1 } && this.fire("click") }); b.on("focus", function () { this.fire("mouseover") });
            b.on("blur", function () { this.fire("mouseout") })
        } function ba(a) { function b() { a.layout() } var c = CKEDITOR.document.getWindow(); c.on("resize", b); a.on("hide", function () { c.removeListener("resize", b) }) } function M(a, b) { this.dialog = a; for (var c = b.contents, e = 0, d; d = c[e]; e++)c[e] = d && new N(a, d); CKEDITOR.tools.extend(this, b) } function N(a, b) { this._ = { dialog: a }; CKEDITOR.tools.extend(this, b) } function ca(a) {
            function b(b) {
                var c = a.getSize(), h = a.parts.dialog.getParent().getClientSize(), q = b.data.$.screenX, m = b.data.$.screenY,
                r = q - e.x, n = m - e.y; e = { x: q, y: m }; d.x += r; d.y += n; q = d.x + k[3] < g ? -k[3] : d.x - k[1] > h.width - c.width - g ? h.width - c.width + ("rtl" == f.lang.dir ? 0 : k[1]) : d.x; c = d.y + k[0] < g ? -k[0] : d.y - k[2] > h.height - c.height - g ? h.height - c.height + k[2] : d.y; q = Math.floor(q); c = Math.floor(c); a.move(q, c, 1); b.data.preventDefault()
            } function c() {
                CKEDITOR.document.removeListener("mousemove", b); CKEDITOR.document.removeListener("mouseup", c); if (CKEDITOR.env.ie6Compat) {
                    var a = u.getChild(0).getFrameDocument(); a.removeListener("mousemove", b); a.removeListener("mouseup",
                        c)
                }
            } var e = null, d = null, f = a.getParentEditor(), g = f.config.dialog_magnetDistance, k = CKEDITOR.skin.margins || [0, 0, 0, 0]; "undefined" == typeof g && (g = 20); a.parts.title.on("mousedown", function (f) {
                if (!a._.moved) { var g = a._.element; g.getFirst().setStyle("position", "absolute"); g.removeStyle("display"); a._.moved = !0; a.layout() } e = { x: f.data.$.screenX, y: f.data.$.screenY }; CKEDITOR.document.on("mousemove", b); CKEDITOR.document.on("mouseup", c); d = a.getPosition(); CKEDITOR.env.ie6Compat && (g = u.getChild(0).getFrameDocument(), g.on("mousemove",
                    b), g.on("mouseup", c)); f.data.preventDefault()
            }, a)
        } function da(a) {
            function b(b) {
                var c = "rtl" == f.lang.dir, m = h.width, q = h.height, w = m + (b.data.$.screenX - l.x) * (c ? -1 : 1) * (a._.moved ? 1 : 2), A = q + (b.data.$.screenY - l.y) * (a._.moved ? 1 : 2), C = a._.element.getFirst(), C = c && parseInt(C.getComputedStyle("right"), 10), v = a.getPosition(); v.x = v.x || 0; v.y = v.y || 0; v.y + A > p.height && (A = p.height - v.y); (c ? C : v.x) + w > p.width && (w = p.width - (c ? C : v.x)); A = Math.floor(A); w = Math.floor(w); if (d == CKEDITOR.DIALOG_RESIZE_WIDTH || d == CKEDITOR.DIALOG_RESIZE_BOTH) m =
                    Math.max(e.minWidth || 0, w - g); if (d == CKEDITOR.DIALOG_RESIZE_HEIGHT || d == CKEDITOR.DIALOG_RESIZE_BOTH) q = Math.max(e.minHeight || 0, A - k); a.resize(m, q); a._.moved && O(a, a._.position.x, a._.position.y); a._.moved || a.layout(); b.data.preventDefault()
            } function c() { CKEDITOR.document.removeListener("mouseup", c); CKEDITOR.document.removeListener("mousemove", b); q && (q.remove(), q = null); if (CKEDITOR.env.ie6Compat) { var a = u.getChild(0).getFrameDocument(); a.removeListener("mouseup", c); a.removeListener("mousemove", b) } } var e = a.definition,
                d = e.resizable; if (d != CKEDITOR.DIALOG_RESIZE_NONE) {
                    var f = a.getParentEditor(), g, k, p, l, h, q, m = CKEDITOR.tools.addFunction(function (d) {
                        function e(a) { return a.isVisible() } h = a.getSize(); var f = a.parts.contents, m = f.$.getElementsByTagName("iframe").length, w = !(CKEDITOR.env.gecko || CKEDITOR.env.ie && CKEDITOR.env.quirks); m && (q = CKEDITOR.dom.element.createFromHtml('\x3cdiv class\x3d"cke_dialog_resize_cover" style\x3d"height: 100%; position: absolute; width: 100%; left:0; top:0;"\x3e\x3c/div\x3e'), f.append(q)); k = h.height -
                            a.parts.contents.getFirst(e).getSize("height", w); g = h.width - a.parts.contents.getFirst(e).getSize("width", 1); l = { x: d.screenX, y: d.screenY }; p = CKEDITOR.document.getWindow().getViewPaneSize(); CKEDITOR.document.on("mousemove", b); CKEDITOR.document.on("mouseup", c); CKEDITOR.env.ie6Compat && (f = u.getChild(0).getFrameDocument(), f.on("mousemove", b), f.on("mouseup", c)); d.preventDefault && d.preventDefault()
                    }); a.on("load", function () {
                        var b = ""; d == CKEDITOR.DIALOG_RESIZE_WIDTH ? b = " cke_resizer_horizontal" : d == CKEDITOR.DIALOG_RESIZE_HEIGHT &&
                            (b = " cke_resizer_vertical"); b = CKEDITOR.dom.element.createFromHtml('\x3cdiv class\x3d"cke_resizer' + b + " cke_resizer_" + f.lang.dir + '" title\x3d"' + CKEDITOR.tools.htmlEncode(f.lang.common.resize) + '" onmousedown\x3d"CKEDITOR.tools.callFunction(' + m + ', event )"\x3e' + ("ltr" == f.lang.dir ? "◢" : "◣") + "\x3c/div\x3e"); a.parts.footer.append(b, 1)
                    }); f.on("destroy", function () { CKEDITOR.tools.removeFunction(m) })
                }
        } function O(a, b, c) {
            var e = a.parts.dialog.getParent().getClientSize(), d = a.getSize(), f = a._.viewportRatio, g = Math.max(e.width -
                d.width, 0), e = Math.max(e.height - d.height, 0); f.width = g ? b / g : f.width; f.height = e ? c / e : f.height; a._.viewportRatio = f
        } function H(a) { a.data.preventDefault(1) } function P(a) {
            var b = a.config, c = CKEDITOR.skinName || a.config.skin, e = b.dialog_backgroundCoverColor || ("moono-lisa" == c ? "black" : "white"), c = b.dialog_backgroundCoverOpacity, d = b.baseFloatZIndex, b = CKEDITOR.tools.genKey(e, c, d), f = B[b]; CKEDITOR.document.getBody().addClass("cke_dialog_open"); f ? f.show() : (d = ['\x3cdiv tabIndex\x3d"-1" style\x3d"position: ', CKEDITOR.env.ie6Compat ?
                "absolute" : "fixed", "; z-index: ", d, "; top: 0px; left: 0px; ", "; width: 100%; height: 100%;", CKEDITOR.env.ie6Compat ? "" : "background-color: " + e, '" class\x3d"cke_dialog_background_cover"\x3e'], CKEDITOR.env.ie6Compat && (e = "\x3chtml\x3e\x3cbody style\x3d\\'background-color:" + e + ";\\'\x3e\x3c/body\x3e\x3c/html\x3e", d.push('\x3ciframe hidefocus\x3d"true" frameborder\x3d"0" id\x3d"cke_dialog_background_iframe" src\x3d"javascript:'), d.push("void((function(){" + encodeURIComponent("document.open();(" + CKEDITOR.tools.fixDomain +
                    ")();document.write( '" + e + "' );document.close();") + "})())"), d.push('" style\x3d"position:absolute;left:0;top:0;width:100%;height: 100%;filter: progid:DXImageTransform.Microsoft.Alpha(opacity\x3d0)"\x3e\x3c/iframe\x3e')), d.push("\x3c/div\x3e"), f = CKEDITOR.dom.element.createFromHtml(d.join("")), f.setOpacity(void 0 !== c ? c : .5), f.on("keydown", H), f.on("keypress", H), f.on("keyup", H), f.appendTo(CKEDITOR.document.getBody()), B[b] = f); a.focusManager.add(f); u = f; CKEDITOR.env.mac && CKEDITOR.env.webkit || f.focus()
        } function Q(a) {
            CKEDITOR.document.getBody().removeClass("cke_dialog_open");
            u && (a.focusManager.remove(u), u.hide())
        } function R(a) { var b = a.data.$.ctrlKey || a.data.$.metaKey, c = a.data.$.altKey, e = a.data.$.shiftKey, d = String.fromCharCode(a.data.$.keyCode); (b = x[(b ? "CTRL+" : "") + (c ? "ALT+" : "") + (e ? "SHIFT+" : "") + d]) && b.length && (b = b[b.length - 1], b.keydown && b.keydown.call(b.uiElement, b.dialog, b.key), a.data.preventDefault()) } function S(a) {
            var b = a.data.$.ctrlKey || a.data.$.metaKey, c = a.data.$.altKey, e = a.data.$.shiftKey, d = String.fromCharCode(a.data.$.keyCode); (b = x[(b ? "CTRL+" : "") + (c ? "ALT+" : "") + (e ?
                "SHIFT+" : "") + d]) && b.length && (b = b[b.length - 1], b.keyup && (b.keyup.call(b.uiElement, b.dialog, b.key), a.data.preventDefault()))
        } function T(a, b, c, e, d) { (x[c] || (x[c] = [])).push({ uiElement: a, dialog: b, key: c, keyup: d || a.accessKeyUp, keydown: e || a.accessKeyDown }) } function ea(a) { for (var b in x) { for (var c = x[b], e = c.length - 1; 0 <= e; e--)c[e].dialog != a && c[e].uiElement != a || c.splice(e, 1); 0 === c.length && delete x[b] } } function fa(a, b) { a._.accessKeyMap[b] && a.selectPage(a._.accessKeyMap[b]) } function ga() { } var y = CKEDITOR.tools.cssLength,
            U, u, V = !1, D = !CKEDITOR.env.ie || CKEDITOR.env.edge, aa = '\x3cdiv class\x3d"cke_reset_all cke_dialog_container {editorId} {editorDialogClass} {hidpi}" dir\x3d"{langDir}" style\x3d"' + (D ? "display:flex" : "") + '" lang\x3d"{langCode}" role\x3d"dialog" aria-labelledby\x3d"cke_dialog_title_{id}"\x3e\x3ctable class\x3d"cke_dialog ' + CKEDITOR.env.cssClass + ' cke_{langDir}" style\x3d"' + (D ? "margin:auto" : "position:absolute") + '" role\x3d"presentation"\x3e\x3ctr\x3e\x3ctd role\x3d"presentation"\x3e\x3cdiv class\x3d"cke_dialog_body" role\x3d"presentation"\x3e\x3cdiv id\x3d"cke_dialog_title_{id}" class\x3d"cke_dialog_title" role\x3d"presentation"\x3e\x3c/div\x3e\x3ca id\x3d"cke_dialog_close_button_{id}" class\x3d"cke_dialog_close_button" href\x3d"javascript:void(0)" title\x3d"{closeTitle}" role\x3d"button"\x3e\x3cspan class\x3d"cke_label"\x3eX\x3c/span\x3e\x3c/a\x3e\x3cdiv id\x3d"cke_dialog_tabs_{id}" class\x3d"cke_dialog_tabs" role\x3d"tablist"\x3e\x3c/div\x3e\x3ctable class\x3d"cke_dialog_contents" role\x3d"presentation"\x3e\x3ctr\x3e\x3ctd id\x3d"cke_dialog_contents_{id}" class\x3d"cke_dialog_contents_body" role\x3d"presentation"\x3e\x3c/td\x3e\x3c/tr\x3e\x3ctr\x3e\x3ctd id\x3d"cke_dialog_footer_{id}" class\x3d"cke_dialog_footer" role\x3d"presentation"\x3e\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\x3c/div\x3e\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\x3c/div\x3e';
        CKEDITOR.dialog = function (a, b) {
            function c() { var a = n._.focusList; a.sort(function (a, b) { return a.tabIndex != b.tabIndex ? b.tabIndex - a.tabIndex : a.focusIndex - b.focusIndex }); for (var b = a.length, c = 0; c < b; c++)a[c].focusIndex = c } function e(a) {
                var b = n._.focusList; a = a || 0; if (!(1 > b.length)) {
                    var c = n._.currentFocusIndex; n._.tabBarMode && 0 > a && (c = 0); try { b[c].getInputElement().$.blur() } catch (d) { } var e = c, f = 1 < n._.pageCount; do {
                        e += a; if (f && !n._.tabBarMode && (e == b.length || -1 == e)) {
                            n._.tabBarMode = !0; n._.tabs[n._.currentTabId][0].focus();
                            n._.currentFocusIndex = -1; return
                        } e = (e + b.length) % b.length; if (e == c) break
                    } while (a && !b[e].isFocusable()); b[e].focus(); "text" == b[e].type && b[e].select()
                }
            } function d(b) {
                if (n == CKEDITOR.dialog._.currentTop) {
                    var c = b.data.getKeystroke(), d = "rtl" == a.lang.dir, g = [37, 38, 39, 40]; q = m = 0; if (9 == c || c == CKEDITOR.SHIFT + 9) e(c == CKEDITOR.SHIFT + 9 ? -1 : 1), q = 1; else if (c == CKEDITOR.ALT + 121 && !n._.tabBarMode && 1 < n.getPageCount()) I(n), q = 1; else if (-1 != CKEDITOR.tools.indexOf(g, c) && n._.tabBarMode) c = -1 != CKEDITOR.tools.indexOf([d ? 39 : 37, 38], c) ?
                        J.call(n) : W.call(n), n.selectPage(c), n._.tabs[c][0].focus(), q = 1; else if (13 != c && 32 != c || !n._.tabBarMode) if (13 == c) c = b.data.getTarget(), c.is("a", "button", "select", "textarea") || c.is("input") && "button" == c.$.type || ((c = this.getButton("ok")) && CKEDITOR.tools.setTimeout(c.click, 0, c), q = 1), m = 1; else if (27 == c) (c = this.getButton("cancel")) ? CKEDITOR.tools.setTimeout(c.click, 0, c) : !1 !== this.fire("cancel", { hide: !0 }).hide && this.hide(), m = 1; else return; else this.selectPage(this._.currentTabId), this._.tabBarMode = !1, this._.currentFocusIndex =
                            -1, e(1), q = 1; f(b)
                }
            } function f(a) { q ? a.data.preventDefault(1) : m && a.data.stopPropagation() } var g = CKEDITOR.dialog._.dialogDefinitions[b], k = CKEDITOR.tools.clone(U), p = a.config.dialog_buttonsOrder || "OS", l = a.lang.dir, h = {}, q, m; ("OS" == p && CKEDITOR.env.mac || "rtl" == p && "ltr" == l || "ltr" == p && "rtl" == l) && k.buttons.reverse(); g = CKEDITOR.tools.extend(g(a), k); g = CKEDITOR.tools.clone(g); g = new M(this, g); k = Z(a); this._ = {
                editor: a, element: k.element, name: b, model: null, contentSize: { width: 0, height: 0 }, size: { width: 0, height: 0 }, contents: {},
                buttons: {}, accessKeyMap: {}, viewportRatio: { width: .5, height: .5 }, tabs: {}, tabIdList: [], currentTabId: null, currentTabIndex: null, pageCount: 0, lastTab: null, tabBarMode: !1, focusList: [], currentFocusIndex: 0, hasFocus: !1
            }; this.parts = k.parts; CKEDITOR.tools.setTimeout(function () { a.fire("ariaWidget", this.parts.contents) }, 0, this); k = { top: 0, visibility: "hidden" }; CKEDITOR.env.ie6Compat && (k.position = "absolute"); k["rtl" == l ? "right" : "left"] = 0; this.parts.dialog.setStyles(k); CKEDITOR.event.call(this); this.definition = g = CKEDITOR.fire("dialogDefinition",
                { name: b, definition: g, dialog: this }, a).definition; if (!("removeDialogTabs" in a._) && a.config.removeDialogTabs) { k = a.config.removeDialogTabs.split(";"); for (l = 0; l < k.length; l++)if (p = k[l].split(":"), 2 == p.length) { var r = p[0]; h[r] || (h[r] = []); h[r].push(p[1]) } a._.removeDialogTabs = h } if (a._.removeDialogTabs && (h = a._.removeDialogTabs[b])) for (l = 0; l < h.length; l++)g.removeContents(h[l]); if (g.onLoad) this.on("load", g.onLoad); if (g.onShow) this.on("show", g.onShow); if (g.onHide) this.on("hide", g.onHide); if (g.onOk) this.on("ok",
                    function (b) { a.fire("saveSnapshot"); setTimeout(function () { a.fire("saveSnapshot") }, 0); !1 === g.onOk.call(this, b) && (b.data.hide = !1) }); this.state = CKEDITOR.DIALOG_STATE_IDLE; if (g.onCancel) this.on("cancel", function (a) { !1 === g.onCancel.call(this, a) && (a.data.hide = !1) }); var n = this, t = function (a) { var b = n._.contents, c = !1, d; for (d in b) for (var e in b[d]) if (c = a.call(this, b[d][e])) return }; this.on("ok", function (a) {
                        t(function (b) {
                            if (b.validate) {
                                var c = b.validate(this), d = "string" == typeof c || !1 === c; d && (a.data.hide = !1, a.stop());
                                X.call(b, !d, "string" == typeof c ? c : void 0); return d
                            }
                        })
                    }, this, null, 0); this.on("cancel", function (b) { t(function (c) { if (c.isChanged()) return a.config.dialog_noConfirmCancel || confirm(a.lang.common.confirmCancel) || (b.data.hide = !1), !0 }) }, this, null, 0); this.parts.close.on("click", function (a) { !1 !== this.fire("cancel", { hide: !0 }).hide && this.hide(); a.data.preventDefault() }, this); this.changeFocus = e; var z = this._.element; a.focusManager.add(z, 1); this.on("show", function () {
                        z.on("keydown", d, this); if (CKEDITOR.env.gecko) z.on("keypress",
                            f, this)
                    }); this.on("hide", function () { z.removeListener("keydown", d); CKEDITOR.env.gecko && z.removeListener("keypress", f); t(function (a) { Y.apply(a) }) }); this.on("iframeAdded", function (a) { (new CKEDITOR.dom.document(a.data.iframe.$.contentWindow.document)).on("keydown", d, this, null, 0) }); this.on("show", function () {
                        c(); var b = 1 < n._.pageCount; a.config.dialog_startupFocusTab && b ? (n._.tabBarMode = !0, n._.tabs[n._.currentTabId][0].focus(), n._.currentFocusIndex = -1) : this._.hasFocus || (this._.currentFocusIndex = b ? -1 : this._.focusList.length -
                            1, g.onFocus ? (b = g.onFocus.call(this)) && b.focus() : e(1))
                    }, this, null, 4294967295); if (CKEDITOR.env.ie6Compat) this.on("load", function () { var a = this.getElement(), b = a.getFirst(); b.remove(); b.appendTo(a) }, this); ca(this); da(this); (new CKEDITOR.dom.text(g.title, CKEDITOR.document)).appendTo(this.parts.title); for (l = 0; l < g.contents.length; l++)(h = g.contents[l]) && this.addPage(h); this.parts.tabs.on("click", function (a) {
                        var b = a.data.getTarget(); b.hasClass("cke_dialog_tab") && (b = b.$.id, this.selectPage(b.substring(4, b.lastIndexOf("_"))),
                            I(this), a.data.preventDefault())
                    }, this); l = []; h = CKEDITOR.dialog._.uiElementBuilders.hbox.build(this, { type: "hbox", className: "cke_dialog_footer_buttons", widths: [], children: g.buttons }, l).getChild(); this.parts.footer.setHtml(l.join("")); for (l = 0; l < h.length; l++)this._.buttons[h[l].id] = h[l]
        }; CKEDITOR.dialog.prototype = {
            destroy: function () { this.hide(); this._.element.remove() }, resize: function (a, b) {
                if (!this._.contentSize || this._.contentSize.width != a || this._.contentSize.height != b) {
                    CKEDITOR.dialog.fire("resize",
                        { dialog: this, width: a, height: b }, this._.editor); this.fire("resize", { width: a, height: b }, this._.editor); this.parts.contents.setStyles({ width: a + "px", height: b + "px" }); if ("rtl" == this._.editor.lang.dir && this._.position) { var c = this.parts.dialog.getParent().getClientSize().width; this._.position.x = c - this._.contentSize.width - parseInt(this._.element.getFirst().getStyle("right"), 10) } this._.contentSize = { width: a, height: b }
                }
            }, getSize: function () {
                var a = this._.element.getFirst(); return {
                    width: a.$.offsetWidth || 0, height: a.$.offsetHeight ||
                        0
                }
            }, move: function (a, b, c) {
                var e = this._.element.getFirst(), d = "rtl" == this._.editor.lang.dir; CKEDITOR.env.ie && e.setStyle("zoom", "100%"); var f = this.parts.dialog.getParent().getClientSize(), g = this.getSize(), k = this._.viewportRatio, p = Math.max(f.width - g.width, 0), f = Math.max(f.height - g.height, 0); this._.position && this._.position.x == a && this._.position.y == b ? (a = Math.floor(p * k.width), b = Math.floor(f * k.height)) : O(this, a, b); this._.position = { x: a, y: b }; d && (a = p - a); b = { top: (0 < b ? b : 0) + "px" }; b[d ? "right" : "left"] = (0 < a ? a : 0) + "px";
                e.setStyles(b); c && (this._.moved = 1)
            }, getPosition: function () { return CKEDITOR.tools.extend({}, this._.position) }, show: function () {
                var a = this._.element, b = this.definition, c = CKEDITOR.document.getBody(), e = this._.editor.config.baseFloatZIndex; a.getParent() && a.getParent().equals(c) ? a.setStyle("display", D ? "flex" : "block") : a.appendTo(c); this.resize(this._.contentSize && this._.contentSize.width || b.width || b.minWidth, this._.contentSize && this._.contentSize.height || b.height || b.minHeight); this.reset(); null === this._.currentTabId &&
                    this.selectPage(this.definition.contents[0].id); null === CKEDITOR.dialog._.currentZIndex && (CKEDITOR.dialog._.currentZIndex = e); this._.element.getFirst().setStyle("z-index", CKEDITOR.dialog._.currentZIndex += 10); this.getElement().setStyle("z-index", CKEDITOR.dialog._.currentZIndex); null === CKEDITOR.dialog._.currentTop ? (CKEDITOR.dialog._.currentTop = this, this._.parentDialog = null, P(this._.editor)) : CKEDITOR.dialog._.currentTop !== this && (this._.parentDialog = CKEDITOR.dialog._.currentTop, c = this._.parentDialog.getElement().getFirst(),
                        c.$.style.zIndex -= Math.floor(e / 2), this._.parentDialog.getElement().setStyle("z-index", c.$.style.zIndex), CKEDITOR.dialog._.currentTop = this); a.on("keydown", R); a.on("keyup", S); this._.hasFocus = !1; for (var d in b.contents) if (b.contents[d]) {
                            var a = b.contents[d], e = this._.tabs[a.id], c = a.requiredContent, f = 0; if (e) {
                                for (var g in this._.contents[a.id]) {
                                    var k = this._.contents[a.id][g]; "hbox" != k.type && "vbox" != k.type && k.getInputElement() && (k.requiredContent && !this._.editor.activeFilter.check(k.requiredContent) ? k.disable() :
                                        (k.enable(), f++))
                                } !f || c && !this._.editor.activeFilter.check(c) ? e[0].addClass("cke_dialog_tab_disabled") : e[0].removeClass("cke_dialog_tab_disabled")
                            }
                        } CKEDITOR.tools.setTimeout(function () { this.layout(); ba(this); this.parts.dialog.setStyle("visibility", ""); this.fireOnce("load", {}); CKEDITOR.ui.fire("ready", this); this.fire("show", {}); this._.editor.fire("dialogShow", this); this._.parentDialog || this._.editor.focusManager.lock(); this.foreach(function (a) { a.setInitValue && a.setInitValue() }) }, 100, this)
            }, layout: function () {
                var a =
                    this.parts.dialog; if (this._.moved || !D) { var b = this.getSize(), c = CKEDITOR.document.getWindow().getViewPaneSize(), e; this._.moved && this._.position ? (e = this._.position.x, b = this._.position.y) : (e = (c.width - b.width) / 2, b = (c.height - b.height) / 2); CKEDITOR.env.ie6Compat || (a.setStyle("position", "absolute"), a.removeStyle("margin")); e = Math.floor(e); b = Math.floor(b); this.move(e, b) }
            }, foreach: function (a) { for (var b in this._.contents) for (var c in this._.contents[b]) a.call(this, this._.contents[b][c]); return this }, reset: function () {
                var a =
                    function (a) { a.reset && a.reset(1) }; return function () { this.foreach(a); return this }
            }(), setupContent: function () { var a = arguments; this.foreach(function (b) { b.setup && b.setup.apply(b, a) }) }, commitContent: function () { var a = arguments; this.foreach(function (b) { CKEDITOR.env.ie && this._.currentFocusIndex == b.focusIndex && b.getInputElement().$.blur(); b.commit && b.commit.apply(b, a) }) }, hide: function () {
                if (this.parts.dialog.isVisible()) {
                    this.fire("hide", {}); this._.editor.fire("dialogHide", this); this.selectPage(this._.tabIdList[0]);
                    var a = this._.element; a.setStyle("display", "none"); this.parts.dialog.setStyle("visibility", "hidden"); for (ea(this); CKEDITOR.dialog._.currentTop != this;)CKEDITOR.dialog._.currentTop.hide(); if (this._.parentDialog) { var b = this._.parentDialog.getElement().getFirst(), c = parseInt(b.$.style.zIndex, 10) + Math.floor(this._.editor.config.baseFloatZIndex / 2); this._.parentDialog.getElement().setStyle("z-index", c); b.setStyle("z-index", c) } else Q(this._.editor); if (CKEDITOR.dialog._.currentTop = this._.parentDialog) CKEDITOR.dialog._.currentZIndex -=
                        10; else { CKEDITOR.dialog._.currentZIndex = null; a.removeListener("keydown", R); a.removeListener("keyup", S); var e = this._.editor; e.focus(); setTimeout(function () { e.focusManager.unlock(); CKEDITOR.env.iOS && e.window.focus() }, 0) } delete this._.parentDialog; this.foreach(function (a) { a.resetInitValue && a.resetInitValue() }); this.setState(CKEDITOR.DIALOG_STATE_IDLE)
                }
            }, addPage: function (a) {
                if (!a.requiredContent || this._.editor.filter.check(a.requiredContent)) {
                    for (var b = [], c = a.label ? ' title\x3d"' + CKEDITOR.tools.htmlEncode(a.label) +
                        '"' : "", e = CKEDITOR.dialog._.uiElementBuilders.vbox.build(this, { type: "vbox", className: "cke_dialog_page_contents", children: a.elements, expand: !!a.expand, padding: a.padding, style: a.style || "width: 100%;" }, b), d = this._.contents[a.id] = {}, f = e.getChild(), g = 0; e = f.shift();)e.notAllowed || "hbox" == e.type || "vbox" == e.type || g++, d[e.id] = e, "function" == typeof e.getChild && f.push.apply(f, e.getChild()); g || (a.hidden = !0); b = CKEDITOR.dom.element.createFromHtml(b.join("")); b.setAttribute("role", "tabpanel"); b.setStyle("min-height",
                            "100%"); e = CKEDITOR.env; d = "cke_" + a.id + "_" + CKEDITOR.tools.getNextNumber(); c = CKEDITOR.dom.element.createFromHtml(['\x3ca class\x3d"cke_dialog_tab"', 0 < this._.pageCount ? " cke_last" : "cke_first", c, a.hidden ? ' style\x3d"display:none"' : "", ' id\x3d"', d, '"', e.gecko && !e.hc ? "" : ' href\x3d"javascript:void(0)"', ' tabIndex\x3d"-1" hidefocus\x3d"true" role\x3d"tab"\x3e', a.label, "\x3c/a\x3e"].join("")); b.setAttribute("aria-labelledby", d); this._.tabs[a.id] = [c, b]; this._.tabIdList.push(a.id); !a.hidden && this._.pageCount++;
                    this._.lastTab = c; this.updateStyle(); b.setAttribute("name", a.id); b.appendTo(this.parts.contents); c.unselectable(); this.parts.tabs.append(c); a.accessKey && (T(this, this, "CTRL+" + a.accessKey, ga, fa), this._.accessKeyMap["CTRL+" + a.accessKey] = a.id)
                }
            }, selectPage: function (a) {
                if (this._.currentTabId != a && !this._.tabs[a][0].hasClass("cke_dialog_tab_disabled") && !1 !== this.fire("selectPage", { page: a, currentPage: this._.currentTabId })) {
                    for (var b in this._.tabs) {
                        var c = this._.tabs[b][0], e = this._.tabs[b][1]; b != a && (c.removeClass("cke_dialog_tab_selected"),
                            c.removeAttribute("aria-selected"), e.hide()); e.setAttribute("aria-hidden", b != a)
                    } var d = this._.tabs[a]; d[0].addClass("cke_dialog_tab_selected"); d[0].setAttribute("aria-selected", !0); CKEDITOR.env.ie6Compat || CKEDITOR.env.ie7Compat ? (K(d[1]), d[1].show(), setTimeout(function () { K(d[1], 1) }, 0)) : d[1].show(); this._.currentTabId = a; this._.currentTabIndex = CKEDITOR.tools.indexOf(this._.tabIdList, a)
                }
            }, updateStyle: function () { this.parts.dialog[(1 === this._.pageCount ? "add" : "remove") + "Class"]("cke_single_page") }, hidePage: function (a) {
                var b =
                    this._.tabs[a] && this._.tabs[a][0]; b && 1 != this._.pageCount && b.isVisible() && (a == this._.currentTabId && this.selectPage(J.call(this)), b.hide(), this._.pageCount--, this.updateStyle())
            }, showPage: function (a) { if (a = this._.tabs[a] && this._.tabs[a][0]) a.show(), this._.pageCount++, this.updateStyle() }, getElement: function () { return this._.element }, getName: function () { return this._.name }, getContentElement: function (a, b) { var c = this._.contents[a]; return c && c[b] }, getValueOf: function (a, b) { return this.getContentElement(a, b).getValue() },
            setValueOf: function (a, b, c) { return this.getContentElement(a, b).setValue(c) }, getButton: function (a) { return this._.buttons[a] }, click: function (a) { return this._.buttons[a].click() }, disableButton: function (a) { return this._.buttons[a].disable() }, enableButton: function (a) { return this._.buttons[a].enable() }, getPageCount: function () { return this._.pageCount }, getParentEditor: function () { return this._.editor }, getSelectedElement: function () { return this.getParentEditor().getSelection().getSelectedElement() }, addFocusable: function (a,
                b) { if ("undefined" == typeof b) b = this._.focusList.length, this._.focusList.push(new L(this, a, b)); else { this._.focusList.splice(b, 0, new L(this, a, b)); for (var c = b + 1; c < this._.focusList.length; c++)this._.focusList[c].focusIndex++ } }, setState: function (a) {
                    if (this.state != a) {
                        this.state = a; if (a == CKEDITOR.DIALOG_STATE_BUSY) {
                            if (!this.parts.spinner) {
                                var b = this.getParentEditor().lang.dir, c = { attributes: { "class": "cke_dialog_spinner" }, styles: { "float": "rtl" == b ? "right" : "left" } }; c.styles["margin-" + ("rtl" == b ? "left" : "right")] =
                                    "8px"; this.parts.spinner = CKEDITOR.document.createElement("div", c); this.parts.spinner.setHtml("\x26#8987;"); this.parts.spinner.appendTo(this.parts.title, 1)
                            } this.parts.spinner.show(); this.getButton("ok") && this.getButton("ok").disable()
                        } else a == CKEDITOR.DIALOG_STATE_IDLE && (this.parts.spinner && this.parts.spinner.hide(), this.getButton("ok") && this.getButton("ok").enable()); this.fire("state", a)
                    }
                }, getModel: function (a) { return this._.model ? this._.model : this.definition.getModel ? this.definition.getModel(a) : null },
            setModel: function (a) { this._.model = a }, getMode: function (a) { if (this.definition.getMode) return this.definition.getMode(a); a = this.getModel(a); return !a || a instanceof CKEDITOR.dom.element && !a.getParent() ? CKEDITOR.dialog.CREATION_MODE : CKEDITOR.dialog.EDITING_MODE }
        }; CKEDITOR.tools.extend(CKEDITOR.dialog, {
            CREATION_MODE: 0, EDITING_MODE: 1, add: function (a, b) { this._.dialogDefinitions[a] && "function" != typeof b || (this._.dialogDefinitions[a] = b) }, exists: function (a) { return !!this._.dialogDefinitions[a] }, getCurrent: function () { return CKEDITOR.dialog._.currentTop },
            isTabEnabled: function (a, b, c) { a = a.config.removeDialogTabs; return !(a && a.match(new RegExp("(?:^|;)" + b + ":" + c + "(?:$|;)", "i"))) }, okButton: function () { var a = function (a, c) { c = c || {}; return CKEDITOR.tools.extend({ id: "ok", type: "button", label: a.lang.common.ok, "class": "cke_dialog_ui_button_ok", onClick: function (a) { a = a.data.dialog; !1 !== a.fire("ok", { hide: !0 }).hide && a.hide() } }, c, !0) }; a.type = "button"; a.override = function (b) { return CKEDITOR.tools.extend(function (c) { return a(c, b) }, { type: "button" }, !0) }; return a }(), cancelButton: function () {
                var a =
                    function (a, c) { c = c || {}; return CKEDITOR.tools.extend({ id: "cancel", type: "button", label: a.lang.common.cancel, "class": "cke_dialog_ui_button_cancel", onClick: function (a) { a = a.data.dialog; !1 !== a.fire("cancel", { hide: !0 }).hide && a.hide() } }, c, !0) }; a.type = "button"; a.override = function (b) { return CKEDITOR.tools.extend(function (c) { return a(c, b) }, { type: "button" }, !0) }; return a
            }(), addUIElement: function (a, b) { this._.uiElementBuilders[a] = b }
        }); CKEDITOR.dialog._ = { uiElementBuilders: {}, dialogDefinitions: {}, currentTop: null, currentZIndex: null };
        CKEDITOR.event.implementOn(CKEDITOR.dialog); CKEDITOR.event.implementOn(CKEDITOR.dialog.prototype); U = { resizable: CKEDITOR.DIALOG_RESIZE_BOTH, minWidth: 600, minHeight: 400, buttons: [CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton] }; var E = function (a, b, c) { for (var e = 0, d; d = a[e]; e++)if (d.id == b || c && d[c] && (d = E(d[c], b, c))) return d; return null }, F = function (a, b, c, e, d) { if (c) { for (var f = 0, g; g = a[f]; f++) { if (g.id == c) return a.splice(f, 0, b), b; if (e && g[e] && (g = F(g[e], b, c, e, !0))) return g } if (d) return null } a.push(b); return b },
            G = function (a, b, c) { for (var e = 0, d; d = a[e]; e++) { if (d.id == b) return a.splice(e, 1); if (c && d[c] && (d = G(d[c], b, c))) return d } return null }; M.prototype = { getContents: function (a) { return E(this.contents, a) }, getButton: function (a) { return E(this.buttons, a) }, addContents: function (a, b) { return F(this.contents, a, b) }, addButton: function (a, b) { return F(this.buttons, a, b) }, removeContents: function (a) { G(this.contents, a) }, removeButton: function (a) { G(this.buttons, a) } }; N.prototype = {
                get: function (a) { return E(this.elements, a, "children") },
                add: function (a, b) { return F(this.elements, a, b, "children") }, remove: function (a) { G(this.elements, a, "children") }
            }; var B = {}, x = {}; (function () {
                CKEDITOR.ui.dialog = {
                    uiElement: function (a, b, c, e, d, f, g) {
                        if (!(4 > arguments.length)) {
                            var k = (e.call ? e(b) : e) || "div", p = ["\x3c", k, " "], l = (d && d.call ? d(b) : d) || {}, h = (f && f.call ? f(b) : f) || {}, q = (g && g.call ? g.call(this, a, b) : g) || "", m = this.domId = h.id || CKEDITOR.tools.getNextId() + "_uiElement"; b.requiredContent && !a.getParentEditor().filter.check(b.requiredContent) && (l.display = "none", this.notAllowed =
                                !0); h.id = m; var r = {}; b.type && (r["cke_dialog_ui_" + b.type] = 1); b.className && (r[b.className] = 1); b.disabled && (r.cke_disabled = 1); for (var n = h["class"] && h["class"].split ? h["class"].split(" ") : [], m = 0; m < n.length; m++)n[m] && (r[n[m]] = 1); n = []; for (m in r) n.push(m); h["class"] = n.join(" "); b.title && (h.title = b.title); r = (b.style || "").split(";"); b.align && (n = b.align, l["margin-left"] = "left" == n ? 0 : "auto", l["margin-right"] = "right" == n ? 0 : "auto"); for (m in l) r.push(m + ":" + l[m]); b.hidden && r.push("display:none"); for (m = r.length - 1; 0 <=
                                    m; m--)"" === r[m] && r.splice(m, 1); 0 < r.length && (h.style = (h.style ? h.style + "; " : "") + r.join("; ")); for (m in h) p.push(m + '\x3d"' + CKEDITOR.tools.htmlEncode(h[m]) + '" '); p.push("\x3e", q, "\x3c/", k, "\x3e"); c.push(p.join("")); (this._ || (this._ = {})).dialog = a; "boolean" == typeof b.isChanged && (this.isChanged = function () { return b.isChanged }); "function" == typeof b.isChanged && (this.isChanged = b.isChanged); "function" == typeof b.setValue && (this.setValue = CKEDITOR.tools.override(this.setValue, function (a) {
                                        return function (c) {
                                            a.call(this,
                                                b.setValue.call(this, c))
                                        }
                                    })); "function" == typeof b.getValue && (this.getValue = CKEDITOR.tools.override(this.getValue, function (a) { return function () { return b.getValue.call(this, a.call(this)) } })); CKEDITOR.event.implementOn(this); this.registerEvents(b); this.accessKeyUp && this.accessKeyDown && b.accessKey && T(this, a, "CTRL+" + b.accessKey); var t = this; a.on("load", function () {
                                        var b = t.getInputElement(); if (b) {
                                            var c = t.type in { checkbox: 1, ratio: 1 } && CKEDITOR.env.ie && 8 > CKEDITOR.env.version ? "cke_dialog_ui_focused" : ""; b.on("focus",
                                                function () { a._.tabBarMode = !1; a._.hasFocus = !0; t.fire("focus"); c && this.addClass(c) }); b.on("blur", function () { t.fire("blur"); c && this.removeClass(c) })
                                        }
                                    }); CKEDITOR.tools.extend(this, b); this.keyboardFocusable && (this.tabIndex = b.tabIndex || 0, this.focusIndex = a._.focusList.push(this) - 1, this.on("focus", function () { a._.currentFocusIndex = t.focusIndex }))
                        }
                    }, hbox: function (a, b, c, e, d) {
                        if (!(4 > arguments.length)) {
                            this._ || (this._ = {}); var f = this._.children = b, g = d && d.widths || null, k = d && d.height || null, p, l = { role: "presentation" };
                            d && d.align && (l.align = d.align); CKEDITOR.ui.dialog.uiElement.call(this, a, d || { type: "hbox" }, e, "table", {}, l, function () {
                                var a = ['\x3ctbody\x3e\x3ctr class\x3d"cke_dialog_ui_hbox"\x3e']; for (p = 0; p < c.length; p++) {
                                    var b = "cke_dialog_ui_hbox_child", e = []; 0 === p && (b = "cke_dialog_ui_hbox_first"); p == c.length - 1 && (b = "cke_dialog_ui_hbox_last"); a.push('\x3ctd class\x3d"', b, '" role\x3d"presentation" '); g ? g[p] && e.push("width:" + y(g[p])) : e.push("width:" + Math.floor(100 / c.length) + "%"); k && e.push("height:" + y(k)); d && void 0 !== d.padding &&
                                        e.push("padding:" + y(d.padding)); CKEDITOR.env.ie && CKEDITOR.env.quirks && f[p].align && e.push("text-align:" + f[p].align); 0 < e.length && a.push('style\x3d"' + e.join("; ") + '" '); a.push("\x3e", c[p], "\x3c/td\x3e")
                                } a.push("\x3c/tr\x3e\x3c/tbody\x3e"); return a.join("")
                            })
                        }
                    }, vbox: function (a, b, c, e, d) {
                        if (!(3 > arguments.length)) {
                            this._ || (this._ = {}); var f = this._.children = b, g = d && d.width || null, k = d && d.heights || null; CKEDITOR.ui.dialog.uiElement.call(this, a, d || { type: "vbox" }, e, "div", null, { role: "presentation" }, function () {
                                var b =
                                    ['\x3ctable role\x3d"presentation" cellspacing\x3d"0" border\x3d"0" ']; b.push('style\x3d"'); d && d.expand && b.push("height:100%;"); b.push("width:" + y(g || "100%"), ";"); CKEDITOR.env.webkit && b.push("float:none;"); b.push('"'); b.push('align\x3d"', CKEDITOR.tools.htmlEncode(d && d.align || ("ltr" == a.getParentEditor().lang.dir ? "left" : "right")), '" '); b.push("\x3e\x3ctbody\x3e"); for (var e = 0; e < c.length; e++) {
                                        var h = []; b.push('\x3ctr\x3e\x3ctd role\x3d"presentation" '); g && h.push("width:" + y(g || "100%")); k ? h.push("height:" +
                                            y(k[e])) : d && d.expand && h.push("height:" + Math.floor(100 / c.length) + "%"); d && void 0 !== d.padding && h.push("padding:" + y(d.padding)); CKEDITOR.env.ie && CKEDITOR.env.quirks && f[e].align && h.push("text-align:" + f[e].align); 0 < h.length && b.push('style\x3d"', h.join("; "), '" '); b.push(' class\x3d"cke_dialog_ui_vbox_child"\x3e', c[e], "\x3c/td\x3e\x3c/tr\x3e")
                                    } b.push("\x3c/tbody\x3e\x3c/table\x3e"); return b.join("")
                            })
                        }
                    }
                }
            })(); CKEDITOR.ui.dialog.uiElement.prototype = {
                getElement: function () { return CKEDITOR.document.getById(this.domId) },
                getInputElement: function () { return this.getElement() }, getDialog: function () { return this._.dialog }, setValue: function (a, b) { this.getInputElement().setValue(a); !b && this.fire("change", { value: a }); return this }, getValue: function () { return this.getInputElement().getValue() }, isChanged: function () { return !1 }, selectParentTab: function () {
                    for (var a = this.getInputElement(); (a = a.getParent()) && -1 == a.$.className.search("cke_dialog_page_contents");); if (!a) return this; a = a.getAttribute("name"); this._.dialog._.currentTabId !=
                        a && this._.dialog.selectPage(a); return this
                }, focus: function () { this.selectParentTab().getInputElement().focus(); return this }, registerEvents: function (a) { var b = /^on([A-Z]\w+)/, c, e = function (a, b, c, d) { b.on("load", function () { a.getInputElement().on(c, d, a) }) }, d; for (d in a) if (c = d.match(b)) this.eventProcessors[d] ? this.eventProcessors[d].call(this, this._.dialog, a[d]) : e(this, this._.dialog, c[1].toLowerCase(), a[d]); return this }, eventProcessors: {
                    onLoad: function (a, b) { a.on("load", b, this) }, onShow: function (a, b) {
                        a.on("show",
                            b, this)
                    }, onHide: function (a, b) { a.on("hide", b, this) }
                }, accessKeyDown: function () { this.focus() }, accessKeyUp: function () { }, disable: function () { var a = this.getElement(); this.getInputElement().setAttribute("disabled", "true"); a.addClass("cke_disabled") }, enable: function () { var a = this.getElement(); this.getInputElement().removeAttribute("disabled"); a.removeClass("cke_disabled") }, isEnabled: function () { return !this.getElement().hasClass("cke_disabled") }, isVisible: function () { return this.getInputElement().isVisible() },
                isFocusable: function () { return this.isEnabled() && this.isVisible() ? !0 : !1 }
            }; CKEDITOR.ui.dialog.hbox.prototype = CKEDITOR.tools.extend(new CKEDITOR.ui.dialog.uiElement, { getChild: function (a) { if (1 > arguments.length) return this._.children.concat(); a.splice || (a = [a]); return 2 > a.length ? this._.children[a[0]] : this._.children[a[0]] && this._.children[a[0]].getChild ? this._.children[a[0]].getChild(a.slice(1, a.length)) : null } }, !0); CKEDITOR.ui.dialog.vbox.prototype = new CKEDITOR.ui.dialog.hbox; (function () {
                var a = {
                    build: function (a,
                        c, e) { for (var d = c.children, f, g = [], k = [], p = 0; p < d.length && (f = d[p]); p++) { var l = []; g.push(l); k.push(CKEDITOR.dialog._.uiElementBuilders[f.type].build(a, f, l)) } return new CKEDITOR.ui.dialog[c.type](a, k, g, e, c) }
                }; CKEDITOR.dialog.addUIElement("hbox", a); CKEDITOR.dialog.addUIElement("vbox", a)
            })(); CKEDITOR.dialogCommand = function (a, b) { this.dialogName = a; CKEDITOR.tools.extend(this, b, !0) }; CKEDITOR.dialogCommand.prototype = {
                exec: function (a) { var b = this.tabId; a.openDialog(this.dialogName, function (a) { b && a.selectPage(b) }) },
                canUndo: !1, editorFocus: 1
            }; (function () {
                var a = /^\d*$/, b = /^\d*(?:\.\d+)?$/, c = /^(((\d*(\.\d+))|(\d*))(px|\%)?)?$/, e = /^(((\d*(\.\d+))|(\d*))(px|em|ex|in|cm|mm|pt|pc|\%)?)?$/i, d = /^(--|-?([a-zA-Z_]|\\))(\\|[a-zA-Z0-9-_])*\s*?:\s*?[^:;]+$/; CKEDITOR.VALIDATE_OR = 1; CKEDITOR.VALIDATE_AND = 2; CKEDITOR.dialog.validate = {
                    functions: function () {
                        var a = arguments; return function (b) {
                            this && this.getValue && (b = this.getValue()); var c, d = CKEDITOR.VALIDATE_AND, e = [], h; for (h = 0; h < a.length; h++)if ("function" == typeof a[h]) e.push(a[h]);
                            else break; h < a.length && "string" == typeof a[h] && (c = a[h], h++); h < a.length && "number" == typeof a[h] && (d = a[h]); h = d == CKEDITOR.VALIDATE_AND; for (var q = 0; q < e.length; q++) { var m = !0 === e[q](b); h = d == CKEDITOR.VALIDATE_AND ? h && m : h || m } return h ? !0 : c
                        }
                    }, regex: function (a, b) { return this.functions(function (b) { return a.test(b) }, b) }, notEmpty: function (a) {
                        return this.functions(function (a) {
                            return 0 < a.replace(RegExp("^[\\u0020\\u00a0\\u1680\\u202f\\u205f\\u3000\\u2000-\\u200a\\s]+|[\\u0020\\u00a0\\u1680\\u202f\\u205f\\u3000\\u2000-\\u200a\\s]+$",
                                "g"), "").length
                        }, a)
                    }, integer: function (b) { return this.regex(a, b) }, number: function (a) { return this.regex(b, a) }, cssLength: function (a) { return this.functions(function (a) { return e.test(CKEDITOR.tools.trim(a)) }, a) }, htmlLength: function (a) { return this.functions(function (a) { return c.test(CKEDITOR.tools.trim(a)) }, a) }, inlineStyle: function (a) {
                        return this.functions(function (a) { a = CKEDITOR.tools.trim(a).split(";"); "" === a[a.length - 1] && a.pop(); return CKEDITOR.tools.array.every(a, function (a) { return d.test(CKEDITOR.tools.trim(a)) }) },
                            a)
                    }, equals: function (a, b) { return this.functions(function (b) { return b == a }, b) }, notEqual: function (a, b) { return this.functions(function (b) { return b != a }, b) }
                }; CKEDITOR.on("instanceDestroyed", function (a) { if (CKEDITOR.tools.isEmpty(CKEDITOR.instances)) { for (var b; b = CKEDITOR.dialog._.currentTop;)b.hide(); for (var c in B) B[c].remove(); B = {} } a = a.editor._.storedDialogs; for (var d in a) a[d].destroy() })
            })(); CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
                openDialog: function (a, b, c) {
                    var e = null, d = CKEDITOR.dialog._.dialogDefinitions[a];
                    null === CKEDITOR.dialog._.currentTop && P(this); if ("function" == typeof d) d = this._.storedDialogs || (this._.storedDialogs = {}), e = d[a] || (d[a] = new CKEDITOR.dialog(this, a)), e.setModel(c), b && b.call(e, e), e.show(); else {
                        if ("failed" == d) throw Q(this), Error('[CKEDITOR.dialog.openDialog] Dialog "' + a + '" failed when loading definition.'); "string" == typeof d && CKEDITOR.scriptLoader.load(CKEDITOR.getUrl(d), function () {
                            "function" != typeof CKEDITOR.dialog._.dialogDefinitions[a] && (CKEDITOR.dialog._.dialogDefinitions[a] = "failed");
                            this.openDialog(a, b, c)
                        }, this, 0, 1)
                    } CKEDITOR.skin.loadPart("dialog"); if (e) e.once("hide", function () { e.setModel(null) }, null, null, 999); return e
                }
            }); CKEDITOR.plugins.add("dialog", { requires: "dialogui", init: function (a) { V || (CKEDITOR.document.appendStyleSheet(this.path + "styles/dialog.css"), V = !0); a.on("doubleclick", function (b) { b.data.dialog && a.openDialog(b.data.dialog) }, null, null, 999) } })
    })(); CKEDITOR.plugins.add("about", { requires: "dialog", init: function (a) { var b = a.addCommand("about", new CKEDITOR.dialogCommand("about")); b.modes = { wysiwyg: 1, source: 1 }; b.canUndo = !1; b.readOnly = 1; a.ui.addButton && a.ui.addButton("About", { label: a.lang.about.dlgTitle, command: "about", toolbar: "about" }); CKEDITOR.dialog.add("about", this.path + "dialogs/about.js") } }); (function () {
        CKEDITOR.plugins.add("a11yhelp", {
            requires: "dialog", availableLangs: { af: 1, ar: 1, az: 1, bg: 1, ca: 1, cs: 1, cy: 1, da: 1, de: 1, "de-ch": 1, el: 1, en: 1, "en-au": 1, "en-gb": 1, eo: 1, es: 1, "es-mx": 1, et: 1, eu: 1, fa: 1, fi: 1, fo: 1, fr: 1, "fr-ca": 1, gl: 1, gu: 1, he: 1, hi: 1, hr: 1, hu: 1, id: 1, it: 1, ja: 1, km: 1, ko: 1, ku: 1, lt: 1, lv: 1, mk: 1, mn: 1, nb: 1, nl: 1, no: 1, oc: 1, pl: 1, pt: 1, "pt-br": 1, ro: 1, ru: 1, si: 1, sk: 1, sl: 1, sq: 1, sr: 1, "sr-latn": 1, sv: 1, th: 1, tr: 1, tt: 1, ug: 1, uk: 1, vi: 1, zh: 1, "zh-cn": 1 }, init: function (b) {
                var c = this; b.addCommand("a11yHelp", {
                    exec: function () {
                        var a =
                            b.langCode, a = c.availableLangs[a] ? a : c.availableLangs[a.replace(/-.*/, "")] ? a.replace(/-.*/, "") : "en"; CKEDITOR.scriptLoader.load(CKEDITOR.getUrl(c.path + "dialogs/lang/" + a + ".js"), function () { b.lang.a11yhelp = c.langEntries[a]; b.openDialog("a11yHelp") })
                    }, modes: { wysiwyg: 1, source: 1 }, readOnly: 1, canUndo: !1
                }); b.setKeystroke(CKEDITOR.ALT + 48, "a11yHelp"); CKEDITOR.dialog.add("a11yHelp", this.path + "dialogs/a11yhelp.js"); b.on("ariaEditorHelpLabel", function (a) { a.data.label = b.lang.common.editorHelp })
            }
        })
    })(); CKEDITOR.plugins.add("basicstyles", {
        init: function (a) {
            var f = 0, d = function (h, d, c, b) { if (b) { b = new CKEDITOR.style(b); var g = e[c]; g.unshift(b); a.attachStyleStateChange(b, function (b) { !a.readOnly && a.getCommand(c).setState(b) }); a.addCommand(c, new CKEDITOR.styleCommand(b, { contentForms: g })); a.ui.addButton && a.ui.addButton(h, { isToggle: !0, label: d, command: c, toolbar: "basicstyles," + (f += 10) }) } }, e = {
                bold: ["strong", "b", ["span", function (a) { a = a.styles["font-weight"]; return "bold" == a || 700 <= +a }]], italic: ["em", "i", ["span", function (a) {
                    return "italic" ==
                        a.styles["font-style"]
                }]], underline: ["u", ["span", function (a) { return "underline" == a.styles["text-decoration"] }]], strike: ["s", "strike", ["span", function (a) { return "line-through" == a.styles["text-decoration"] }]], subscript: ["sub"], superscript: ["sup"]
            }, c = a.config, b = a.lang.basicstyles; d("Bold", b.bold, "bold", c.coreStyles_bold); d("Italic", b.italic, "italic", c.coreStyles_italic); d("Underline", b.underline, "underline", c.coreStyles_underline); d("Strike", b.strike, "strike", c.coreStyles_strike); d("Subscript", b.subscript,
                "subscript", c.coreStyles_subscript); d("Superscript", b.superscript, "superscript", c.coreStyles_superscript); a.setKeystroke([[CKEDITOR.CTRL + 66, "bold"], [CKEDITOR.CTRL + 73, "italic"], [CKEDITOR.CTRL + 85, "underline"]])
        }, afterInit: function (a) {
            if (a.config.coreStyles_toggleSubSup) {
                var f = a.getCommand("subscript"), d = a.getCommand("superscript"); if (f && d) a.on("afterCommandExec", function (e) {
                    e = e.data.name; if ("subscript" === e || "superscript" === e) {
                        var c = "subscript" === e ? d : f; ("subscript" === e ? f : d).state === CKEDITOR.TRISTATE_ON &&
                            c.state === CKEDITOR.TRISTATE_ON && (c.exec(a), a.fire("updateSnapshot"))
                    }
                })
            }
        }
    }); CKEDITOR.config.coreStyles_bold = { element: "strong", overrides: "b" }; CKEDITOR.config.coreStyles_italic = { element: "em", overrides: "i" }; CKEDITOR.config.coreStyles_underline = { element: "u" }; CKEDITOR.config.coreStyles_strike = { element: "s", overrides: "strike" }; CKEDITOR.config.coreStyles_subscript = { element: "sub" }; CKEDITOR.config.coreStyles_superscript = { element: "sup" }; CKEDITOR.config.coreStyles_toggleSubSup = !1; (function () {
        var m = {
            exec: function (g) {
                var a = g.getCommand("blockquote").state, k = g.getSelection(), c = k && k.getRanges()[0]; if (c) {
                    var h = k.createBookmarks(); if (CKEDITOR.env.ie) { var e = h[0].startNode, b = h[0].endNode, d; if (e && "blockquote" == e.getParent().getName()) for (d = e; d = d.getNext();)if (d.type == CKEDITOR.NODE_ELEMENT && d.isBlockBoundary()) { e.move(d, !0); break } if (b && "blockquote" == b.getParent().getName()) for (d = b; d = d.getPrevious();)if (d.type == CKEDITOR.NODE_ELEMENT && d.isBlockBoundary()) { b.move(d); break } } var f = c.createIterator();
                    f.enlargeBr = g.config.enterMode != CKEDITOR.ENTER_BR; if (a == CKEDITOR.TRISTATE_OFF) {
                        for (e = []; a = f.getNextParagraph();)e.push(a); 1 > e.length && (a = g.document.createElement(g.config.enterMode == CKEDITOR.ENTER_P ? "p" : "div"), b = h.shift(), c.insertNode(a), a.append(new CKEDITOR.dom.text("﻿", g.document)), c.moveToBookmark(b), c.selectNodeContents(a), c.collapse(!0), b = c.createBookmark(), e.push(a), h.unshift(b)); d = e[0].getParent(); c = []; for (b = 0; b < e.length; b++)a = e[b], d = d.getCommonAncestor(a.getParent()); for (a = {
                            table: 1, tbody: 1,
                            tr: 1, ol: 1, ul: 1
                        }; a[d.getName()];)d = d.getParent(); for (b = null; 0 < e.length;) { for (a = e.shift(); !a.getParent().equals(d);)a = a.getParent(); a.equals(b) || c.push(a); b = a } for (; 0 < c.length;)if (a = c.shift(), "blockquote" == a.getName()) { for (b = new CKEDITOR.dom.documentFragment(g.document); a.getFirst();)b.append(a.getFirst().remove()), e.push(b.getLast()); b.replace(a) } else e.push(a); c = g.document.createElement("blockquote"); for (c.insertBefore(e[0]); 0 < e.length;)a = e.shift(), c.append(a)
                    } else if (a == CKEDITOR.TRISTATE_ON) {
                        b = [];
                        for (d = {}; a = f.getNextParagraph();) { for (e = c = null; a.getParent();) { if ("blockquote" == a.getParent().getName()) { c = a.getParent(); e = a; break } a = a.getParent() } c && e && !e.getCustomData("blockquote_moveout") && (b.push(e), CKEDITOR.dom.element.setMarker(d, e, "blockquote_moveout", !0)) } CKEDITOR.dom.element.clearAllMarkers(d); a = []; e = []; for (d = {}; 0 < b.length;)f = b.shift(), c = f.getParent(), f.getPrevious() ? f.getNext() ? (f.breakParent(f.getParent()), e.push(f.getNext())) : f.remove().insertAfter(c) : f.remove().insertBefore(c), c.getCustomData("blockquote_processed") ||
                            (e.push(c), CKEDITOR.dom.element.setMarker(d, c, "blockquote_processed", !0)), a.push(f); CKEDITOR.dom.element.clearAllMarkers(d); for (b = e.length - 1; 0 <= b; b--) { c = e[b]; a: { d = c; for (var f = 0, m = d.getChildCount(), l = void 0; f < m && (l = d.getChild(f)); f++)if (l.type == CKEDITOR.NODE_ELEMENT && l.isBlockBoundary()) { d = !1; break a } d = !0 } d && c.remove() } if (g.config.enterMode == CKEDITOR.ENTER_BR) for (c = !0; a.length;)if (f = a.shift(), "div" == f.getName()) {
                                b = new CKEDITOR.dom.documentFragment(g.document); !c || !f.getPrevious() || f.getPrevious().type ==
                                    CKEDITOR.NODE_ELEMENT && f.getPrevious().isBlockBoundary() || b.append(g.document.createElement("br")); for (c = f.getNext() && !(f.getNext().type == CKEDITOR.NODE_ELEMENT && f.getNext().isBlockBoundary()); f.getFirst();)f.getFirst().remove().appendTo(b); c && b.append(g.document.createElement("br")); b.replace(f); c = !1
                            }
                    } k.selectBookmarks(h); g.focus()
                }
            }, refresh: function (g, a) { this.setState(g.elementPath(a.block || a.blockLimit).contains("blockquote", 1) ? CKEDITOR.TRISTATE_ON : CKEDITOR.TRISTATE_OFF) }, context: "blockquote", allowedContent: "blockquote",
            requiredContent: "blockquote"
        }; CKEDITOR.plugins.add("blockquote", { init: function (g) { g.blockless || (g.addCommand("blockquote", m), g.ui.addButton && g.ui.addButton("Blockquote", { isToggle: !0, label: g.lang.blockquote.toolbar, command: "blockquote", toolbar: "blocks,10" })) } })
    })(); (function () {
        function q(b, a) { CKEDITOR.tools.extend(this, a, { editor: b, id: "cke-" + CKEDITOR.tools.getUniqueId(), area: b._.notificationArea }); a.type || (this.type = "info"); this.element = this._createElement(); b.plugins.clipboard && CKEDITOR.plugins.clipboard.preventDefaultDropOnElement(this.element) } function r(b) {
            var a = this; this.editor = b; this.notifications = []; this.element = this._createElement(); this._uiBuffer = CKEDITOR.tools.eventsBuffer(10, this._layout, this); this._changeBuffer = CKEDITOR.tools.eventsBuffer(500, this._layout,
                this); b.on("destroy", function () { a._removeListeners(); a.element.remove() })
        } CKEDITOR.plugins.add("notification", {
            init: function (b) {
                function a(b) { var a = new CKEDITOR.dom.element("div"); a.setStyles({ position: "fixed", "margin-left": "-9999px" }); a.setAttributes({ "aria-live": "assertive", "aria-atomic": "true" }); a.setText(b); CKEDITOR.document.getBody().append(a); setTimeout(function () { a.remove() }, 100) } b._.notificationArea = new r(b); b.showNotification = function (a, d, e) {
                    var f, l; "progress" == d ? f = e : l = e; a = new CKEDITOR.plugins.notification(b,
                        { message: a, type: d, progress: f, duration: l }); a.show(); return a
                }; b.on("key", function (c) { if (27 == c.data.keyCode) { var d = b._.notificationArea.notifications; d.length && (a(b.lang.notification.closed), d[d.length - 1].hide(), c.cancel()) } })
            }
        }); q.prototype = {
            show: function () { !1 !== this.editor.fire("notificationShow", { notification: this }) && (this.area.add(this), this._hideAfterTimeout()) }, update: function (b) {
                var a = !0; !1 === this.editor.fire("notificationUpdate", { notification: this, options: b }) && (a = !1); var c = this.element, d = c.findOne(".cke_notification_message"),
                    e = c.findOne(".cke_notification_progress"), f = b.type; c.removeAttribute("role"); b.progress && "progress" != this.type && (f = "progress"); f && (c.removeClass(this._getClass()), c.removeAttribute("aria-label"), this.type = f, c.addClass(this._getClass()), c.setAttribute("aria-label", this.type), "progress" != this.type || e ? "progress" != this.type && e && e.remove() : (e = this._createProgressElement(), e.insertBefore(d))); void 0 !== b.message && (this.message = b.message, d.setHtml(this.message)); void 0 !== b.progress && (this.progress = b.progress,
                        e && e.setStyle("width", this._getPercentageProgress())); a && b.important && (c.setAttribute("role", "alert"), this.isVisible() || this.area.add(this)); this.duration = b.duration; this._hideAfterTimeout()
            }, hide: function () { !1 !== this.editor.fire("notificationHide", { notification: this }) && this.area.remove(this) }, isVisible: function () { return 0 <= CKEDITOR.tools.indexOf(this.area.notifications, this) }, _createElement: function () {
                var b = this, a, c, d = this.editor.lang.common.close; a = new CKEDITOR.dom.element("div"); a.addClass("cke_notification");
                a.addClass(this._getClass()); a.setAttributes({ id: this.id, role: "alert", "aria-label": this.type }); "progress" == this.type && a.append(this._createProgressElement()); c = new CKEDITOR.dom.element("p"); c.addClass("cke_notification_message"); c.setHtml(this.message); a.append(c); c = CKEDITOR.dom.element.createFromHtml('\x3ca class\x3d"cke_notification_close" href\x3d"javascript:void(0)" title\x3d"' + d + '" role\x3d"button" tabindex\x3d"-1"\x3e\x3cspan class\x3d"cke_label"\x3eX\x3c/span\x3e\x3c/a\x3e'); a.append(c); c.on("click",
                    function () { b.editor.focus(); b.hide() }); return a
            }, _getClass: function () { return "progress" == this.type ? "cke_notification_info" : "cke_notification_" + this.type }, _createProgressElement: function () { var b = new CKEDITOR.dom.element("span"); b.addClass("cke_notification_progress"); b.setStyle("width", this._getPercentageProgress()); return b }, _getPercentageProgress: function () { return Math.round(100 * (this.progress || 0)) + "%" }, _hideAfterTimeout: function () {
                var b = this, a; this._hideTimeoutId && clearTimeout(this._hideTimeoutId);
                if ("number" == typeof this.duration) a = this.duration; else if ("info" == this.type || "success" == this.type) a = "number" == typeof this.editor.config.notification_duration ? this.editor.config.notification_duration : 5E3; a && (b._hideTimeoutId = setTimeout(function () { b.hide() }, a))
            }
        }; r.prototype = {
            add: function (b) { this.notifications.push(b); this.element.append(b.element); 1 == this.element.getChildCount() && (CKEDITOR.document.getBody().append(this.element), this._attachListeners()); this._layout() }, remove: function (b) {
                var a = CKEDITOR.tools.indexOf(this.notifications,
                    b); 0 > a || (this.notifications.splice(a, 1), b.element.remove(), this.element.getChildCount() || (this._removeListeners(), this.element.remove()))
            }, _createElement: function () { var b = this.editor, a = b.config, c = new CKEDITOR.dom.element("div"); c.addClass("cke_notifications_area"); c.setAttribute("id", "cke_notifications_area_" + b.name); c.setStyle("z-index", a.baseFloatZIndex - 2); return c }, _attachListeners: function () {
                var b = CKEDITOR.document.getWindow(), a = this.editor; b.on("scroll", this._uiBuffer.input); b.on("resize", this._uiBuffer.input);
                a.on("change", this._changeBuffer.input); a.on("floatingSpaceLayout", this._layout, this, null, 20); a.on("blur", this._layout, this, null, 20)
            }, _removeListeners: function () { var b = CKEDITOR.document.getWindow(), a = this.editor; b.removeListener("scroll", this._uiBuffer.input); b.removeListener("resize", this._uiBuffer.input); a.removeListener("change", this._changeBuffer.input); a.removeListener("floatingSpaceLayout", this._layout); a.removeListener("blur", this._layout) }, _layout: function () {
                function b() {
                    a.setStyle("left",
                        k(n + d.width - g - h))
                } var a = this.element, c = this.editor, d = c.ui.contentsElement.getClientRect(), e = c.ui.contentsElement.getDocumentPosition(), f, l, u = a.getClientRect(), m, g = this._notificationWidth, h = this._notificationMargin; m = CKEDITOR.document.getWindow(); var p = m.getScrollPosition(), t = m.getViewPaneSize(), q = CKEDITOR.document.getBody(), r = q.getDocumentPosition(), k = CKEDITOR.tools.cssLength; g && h || (m = this.element.getChild(0), g = this._notificationWidth = m.getClientRect().width, h = this._notificationMargin = parseInt(m.getComputedStyle("margin-left"),
                    10) + parseInt(m.getComputedStyle("margin-right"), 10)); c.toolbar && (f = c.ui.space(c.config.toolbarLocation), l = f.getClientRect()); f && f.isVisible() && l.bottom > d.top && l.bottom < d.bottom - u.height ? a.setStyles({ position: "fixed", top: k(l.bottom) }) : 0 < d.top ? a.setStyles({ position: "absolute", top: k(e.y) }) : e.y + d.height - u.height > p.y ? a.setStyles({ position: "fixed", top: 0 }) : a.setStyles({ position: "absolute", top: k(e.y + d.height - u.height) }); var n = "fixed" == a.getStyle("position") ? d.left : "static" != q.getComputedStyle("position") ?
                        e.x - r.x : e.x; d.width < g + h ? e.x + g + h > p.x + t.width ? b() : a.setStyle("left", k(n)) : e.x + g + h > p.x + t.width ? a.setStyle("left", k(n)) : e.x + d.width / 2 + g / 2 + h > p.x + t.width ? a.setStyle("left", k(n - e.x + p.x + t.width - g - h)) : 0 > d.left + d.width - g - h ? b() : 0 > d.left + d.width / 2 - g / 2 ? a.setStyle("left", k(n - e.x + p.x)) : a.setStyle("left", k(n + d.width / 2 - g / 2 - h / 2))
            }
        }; CKEDITOR.plugins.notification = q
    })(); (function () {
        var c = '\x3ca id\x3d"{id}" class\x3d"cke_button cke_button__{name} cke_button_{state} {cls}"' + (CKEDITOR.env.gecko && !CKEDITOR.env.hc ? "" : " href\x3d\"javascript:void('{titleJs}')\"") + ' title\x3d"{title}" tabindex\x3d"-1" hidefocus\x3d"true" role\x3d"button" aria-labelledby\x3d"{id}_label" aria-describedby\x3d"{id}_description" aria-haspopup\x3d"{hasArrow}" aria-disabled\x3d"{ariaDisabled}"{hasArrowAriaHtml}{toggleAriaHtml}'; CKEDITOR.env.gecko && CKEDITOR.env.mac && (c += ' onkeypress\x3d"return false;"');
        CKEDITOR.env.gecko && (c += ' onblur\x3d"this.style.cssText \x3d this.style.cssText;"'); var l = ""; CKEDITOR.env.ie && (l = 'return false;" onmouseup\x3d"CKEDITOR.tools.getMouseButton(event)\x3d\x3dCKEDITOR.MOUSE_BUTTON_LEFT\x26\x26'); var c = c + (' onkeydown\x3d"return CKEDITOR.tools.callFunction({keydownFn},event);" onfocus\x3d"return CKEDITOR.tools.callFunction({focusFn},event);" onclick\x3d"' + l + 'CKEDITOR.tools.callFunction({clickFn},this);return false;"\x3e\x3cspan class\x3d"cke_button_icon cke_button__{iconName}_icon" style\x3d"{style}"') +
            '\x3e\x26nbsp;\x3c/span\x3e\x3cspan id\x3d"{id}_label" class\x3d"cke_button_label cke_button__{name}_label" aria-hidden\x3d"false"\x3e{label}\x3c/span\x3e\x3cspan id\x3d"{id}_description" class\x3d"cke_button_label" aria-hidden\x3d"false"\x3e{ariaShortcutSpace}{ariaShortcut}\x3c/span\x3e{arrowHtml}\x3c/a\x3e', v = CKEDITOR.addTemplate("buttonArrow", '\x3cspan class\x3d"cke_button_arrow"\x3e' + (CKEDITOR.env.hc ? "\x26#9660;" : "") + "\x3c/span\x3e"), w = CKEDITOR.addTemplate("button", c); CKEDITOR.plugins.add("button",
                { beforeInit: function (a) { a.ui.addHandler(CKEDITOR.UI_BUTTON, CKEDITOR.ui.button.handler) } }); CKEDITOR.UI_BUTTON = "button"; CKEDITOR.ui.button = function (a) { CKEDITOR.tools.extend(this, a, { isToggle: a.isToggle || !1, title: a.label, click: a.click || function (b) { b.execCommand(a.command) } }); this._ = {} }; CKEDITOR.ui.button.handler = { create: function (a) { return new CKEDITOR.ui.button(a) } }; CKEDITOR.ui.button.prototype = {
                    render: function (a, b) {
                        function c() {
                            var f = a.mode; f && (f = this.modes[f] ? void 0 !== p[f] ? p[f] : CKEDITOR.TRISTATE_OFF :
                                CKEDITOR.TRISTATE_DISABLED, f = a.readOnly && !this.readOnly ? CKEDITOR.TRISTATE_DISABLED : f, this.setState(f), this.refresh && this.refresh())
                        } var p = null, q = CKEDITOR.env, r = this._.id = CKEDITOR.tools.getNextId(), g = "", d = this.command, l, m, k; this._.editor = a; var e = { id: r, button: this, editor: a, focus: function () { CKEDITOR.document.getById(r).focus() }, execute: function () { this.button.click(a) }, attach: function (a) { this.button.attach(a) } }, x = CKEDITOR.tools.addFunction(function (a) {
                            if (e.onkey) return a = new CKEDITOR.dom.event(a), !1 !==
                                e.onkey(e, a.getKeystroke())
                        }), y = CKEDITOR.tools.addFunction(function (a) { var b; e.onfocus && (b = !1 !== e.onfocus(e, new CKEDITOR.dom.event(a))); return b }), u = 0; e.clickFn = l = CKEDITOR.tools.addFunction(function () { u && (a.unlockSelection(1), u = 0); e.execute(); q.iOS && a.focus() }); this.modes ? (p = {}, a.on("beforeModeUnload", function () { a.mode && this._.state != CKEDITOR.TRISTATE_DISABLED && (p[a.mode] = this._.state) }, this), a.on("activeFilterChange", c, this), a.on("mode", c, this), !this.readOnly && a.on("readOnly", c, this)) : d && (d = a.getCommand(d)) &&
                            (d.on("state", function () { this.setState(d.state) }, this), g += d.state == CKEDITOR.TRISTATE_ON ? "on" : d.state == CKEDITOR.TRISTATE_DISABLED ? "disabled" : "off"); var n; if (this.directional) a.on("contentDirChanged", function (b) { var c = CKEDITOR.document.getById(this._.id), d = c.getFirst(); b = b.data; b != a.lang.dir ? c.addClass("cke_" + b) : c.removeClass("cke_ltr").removeClass("cke_rtl"); d.setAttribute("style", CKEDITOR.skin.getIconStyle(n, "rtl" == b, this.icon, this.iconOffset)) }, this); d ? (m = a.getCommandKeystroke(d)) && (k = CKEDITOR.tools.keystrokeToString(a.lang.common.keyboard,
                                m)) : g += "off"; m = this.name || this.command; var h = null, t = this.icon; n = m; this.icon && !/\./.test(this.icon) ? (n = this.icon, t = null) : (this.icon && (h = this.icon), CKEDITOR.env.hidpi && this.iconHiDpi && (h = this.iconHiDpi)); h ? (CKEDITOR.skin.addIcon(h, h), t = null) : h = n; g = {
                                    id: r, name: m, iconName: n, label: this.label, cls: (this.hasArrow ? "cke_button_expandable " : "") + (this.className || ""), state: g, ariaDisabled: "disabled" == g ? "true" : "false", title: this.title + (k ? " (" + k.display + ")" : ""), ariaShortcutSpace: k ? "\x26nbsp;" : "", ariaShortcut: k ? a.lang.common.keyboardShortcut +
                                        " " + k.aria : "", titleJs: q.gecko && !q.hc ? "" : (this.title || "").replace("'", ""), hasArrow: "string" === typeof this.hasArrow && this.hasArrow || (this.hasArrow ? "true" : "false"), keydownFn: x, focusFn: y, clickFn: l, style: CKEDITOR.skin.getIconStyle(h, "rtl" == a.lang.dir, t, this.iconOffset), arrowHtml: this.hasArrow ? v.output() : "", hasArrowAriaHtml: this.hasArrow ? ' aria-expanded\x3d"false"' : "", toggleAriaHtml: this.isToggle ? 'aria-pressed\x3d"false"' : ""
                                }; w.output(g, b); if (this.onRender) this.onRender(); return e
                    }, setState: function (a) {
                        if (this._.state ==
                            a) return !1; this._.state = a; var b = CKEDITOR.document.getById(this._.id); return b ? (b.setState(a, "cke_button"), b.setAttribute("aria-disabled", a == CKEDITOR.TRISTATE_DISABLED), this.isToggle && !this.hasArrow && b.setAttribute("aria-pressed", a === CKEDITOR.TRISTATE_ON), !0) : !1
                    }, getState: function () { return this._.state }, toFeature: function (a) { if (this._.feature) return this._.feature; var b = this; this.allowedContent || this.requiredContent || !this.command || (b = a.getCommand(this.command) || b); return this._.feature = b }
                }; CKEDITOR.ui.prototype.addButton =
                    function (a, b) { this.add(a, CKEDITOR.UI_BUTTON, b) }
    })(); (function () {
        function D(b) {
            function d() { for (var a = f(), e = CKEDITOR.tools.clone(b.config.toolbarGroups) || v(b), n = 0; n < e.length; n++) { var g = e[n]; if ("/" != g) { "string" == typeof g && (g = e[n] = { name: g }); var l, d = g.groups; if (d) for (var h = 0; h < d.length; h++)l = d[h], (l = a[l]) && c(g, l); (l = a[g.name]) && c(g, l) } } return e } function f() {
                var a = {}, c, e, g; for (c in b.ui.items) e = b.ui.items[c], g = e.toolbar || "others", g = g.split(","), e = g[0], g = parseInt(g[1] || -1, 10), a[e] || (a[e] = []), a[e].push({ name: c, order: g }); for (e in a) a[e] = a[e].sort(function (a,
                    b) { return a.order == b.order ? 0 : 0 > b.order ? -1 : 0 > a.order ? 1 : a.order < b.order ? -1 : 1 }); return a
            } function c(c, e) { if (e.length) { c.items ? c.items.push(b.ui.create("-")) : c.items = []; for (var d; d = e.shift();)d = "string" == typeof d ? d : d.name, a && -1 != CKEDITOR.tools.indexOf(a, d) || (d = b.ui.create(d)) && b.addFeature(d) && c.items.push(d) } } function h(a) {
                var b = [], e, d, h; for (e = 0; e < a.length; ++e)d = a[e], h = {}, "/" == d ? b.push(d) : CKEDITOR.tools.isArray(d) ? (c(h, CKEDITOR.tools.clone(d)), b.push(h)) : d.items && (c(h, CKEDITOR.tools.clone(d.items)),
                    h.name = d.name, b.push(h)); return b
            } var a = function (a) { return a && "string" === typeof a ? a.split(",") : a }(b.config.removeButtons), e = b.config.toolbar; "string" == typeof e && (e = b.config["toolbar_" + e]); return b.toolbar = e ? h(e) : d()
        } function v(b) {
            return b._.toolbarGroups || (b._.toolbarGroups = [{ name: "document", groups: ["mode", "document", "doctools"] }, { name: "clipboard", groups: ["clipboard", "undo"] }, { name: "editing", groups: ["find", "selection", "spellchecker"] }, { name: "forms" }, "/", { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
            { name: "paragraph", groups: ["list", "indent", "blocks", "align", "bidi"] }, { name: "links" }, { name: "insert" }, "/", { name: "styles" }, { name: "colors" }, { name: "tools" }, { name: "others" }, { name: "about" }])
        } var z = function () { this.toolbars = [] }; z.prototype.focus = function () { for (var b = 0, d; d = this.toolbars[b++];)for (var f = 0, c; c = d.items[f++];)if (c.focus) { c.focus(); return } }; var E = { modes: { wysiwyg: 1, source: 1 }, readOnly: 1, exec: function (b) { b.toolbox && (CKEDITOR.env.ie || CKEDITOR.env.air ? setTimeout(function () { b.toolbox.focus() }, 100) : b.toolbox.focus()) } };
        CKEDITOR.plugins.add("toolbar", {
            requires: "button", init: function (b) {
                var d, f = function (c, h) {
                    var a, e = "rtl" == b.lang.dir, k = b.config.toolbarGroupCycling, q = e ? 37 : 39, e = e ? 39 : 37, k = void 0 === k || k; switch (h) {
                        case 9: case CKEDITOR.SHIFT + 9: for (; !a || !a.items.length;)if (a = 9 == h ? (a ? a.next : c.toolbar.next) || b.toolbox.toolbars[0] : (a ? a.previous : c.toolbar.previous) || b.toolbox.toolbars[b.toolbox.toolbars.length - 1], a.items.length) for (c = a.items[d ? a.items.length - 1 : 0]; c && !c.focus;)(c = d ? c.previous : c.next) || (a = 0); c && c.focus(); return !1;
                        case q: a = c; do a = a.next, !a && k && (a = c.toolbar.items[0]); while (a && !a.focus); a ? a.focus() : f(c, 9); return !1; case 40: return c.button && c.button.hasArrow ? c.execute() : f(c, 40 == h ? q : e), !1; case e: case 38: a = c; do a = a.previous, !a && k && (a = c.toolbar.items[c.toolbar.items.length - 1]); while (a && !a.focus); a ? a.focus() : (d = 1, f(c, CKEDITOR.SHIFT + 9), d = 0); return !1; case 27: return b.focus(), !1; case 13: case 32: return c.execute(), !1; case CKEDITOR.ALT + 122: return b.execCommand("elementsPathFocus"), !1
                    }return !0
                }; b.on("uiSpace", function (c) {
                    if (c.data.space ==
                        b.config.toolbarLocation) {
                            c.removeListener(); b.toolbox = new z; var d = CKEDITOR.tools.getNextId(), a = ['\x3cspan id\x3d"', d, '" class\x3d"cke_voice_label"\x3e', b.lang.toolbar.toolbars, "\x3c/span\x3e", '\x3cspan id\x3d"' + b.ui.spaceId("toolbox") + '" class\x3d"cke_toolbox" role\x3d"group" aria-labelledby\x3d"', d, '" onmousedown\x3d"return false;"\x3e'], d = !1 !== b.config.toolbarStartupExpanded, e, k; b.config.toolbarCanCollapse && b.elementMode != CKEDITOR.ELEMENT_MODE_INLINE && a.push('\x3cspan class\x3d"cke_toolbox_main"' +
                                (d ? "\x3e" : ' style\x3d"display:none"\x3e')); for (var q = b.toolbox.toolbars, n = D(b), g = n.length, l = 0; l < g; l++) {
                                    var r, m = 0, w, p = n[l], v = "/" !== p && ("/" === n[l + 1] || l == g - 1), x; if (p) if (e && (a.push("\x3c/span\x3e"), k = e = 0), "/" === p) a.push('\x3cspan class\x3d"cke_toolbar_break"\x3e\x3c/span\x3e'); else {
                                        x = p.items || p; for (var y = 0; y < x.length; y++) {
                                            var t = x[y], A; if (t) {
                                                var B = function (c) { c = c.render(b, a); u = m.items.push(c) - 1; 0 < u && (c.previous = m.items[u - 1], c.previous.next = c); c.toolbar = m; c.onkey = f }; if (t.type == CKEDITOR.UI_SEPARATOR) k = e &&
                                                    t; else {
                                                        A = !1 !== t.canGroup; if (!m) { r = CKEDITOR.tools.getNextId(); m = { id: r, items: [] }; w = p.name && (b.lang.toolbar.toolbarGroups[p.name] || p.name); a.push('\x3cspan id\x3d"', r, '" class\x3d"cke_toolbar' + (v ? ' cke_toolbar_last"' : '"'), w ? ' aria-labelledby\x3d"' + r + '_label"' : "", ' role\x3d"toolbar"\x3e'); w && a.push('\x3cspan id\x3d"', r, '_label" class\x3d"cke_voice_label"\x3e', w, "\x3c/span\x3e"); a.push('\x3cspan class\x3d"cke_toolbar_start"\x3e\x3c/span\x3e'); var u = q.push(m) - 1; 0 < u && (m.previous = q[u - 1], m.previous.next = m) } A ?
                                                            e || (a.push('\x3cspan class\x3d"cke_toolgroup" role\x3d"presentation"\x3e'), e = 1) : e && (a.push("\x3c/span\x3e"), e = 0); k && (B(k), k = 0); B(t)
                                                }
                                            }
                                        } e && (a.push("\x3c/span\x3e"), k = e = 0); m && a.push('\x3cspan class\x3d"cke_toolbar_end"\x3e\x3c/span\x3e\x3c/span\x3e')
                                    }
                                } b.config.toolbarCanCollapse && a.push("\x3c/span\x3e"); if (b.config.toolbarCanCollapse && b.elementMode != CKEDITOR.ELEMENT_MODE_INLINE) {
                                    var C = CKEDITOR.tools.addFunction(function () { b.execCommand("toolbarCollapse") }); b.on("destroy", function () { CKEDITOR.tools.removeFunction(C) });
                                    b.addCommand("toolbarCollapse", {
                                        readOnly: 1, exec: function (a) {
                                            var b = a.ui.space("toolbar_collapser"), c = b.getPrevious(), d = a.ui.space("contents"), e = c.getParent(), h = parseInt(d.$.style.height, 10), g = e.$.offsetHeight, f = b.hasClass("cke_toolbox_collapser_min"); f ? (c.show(), b.removeClass("cke_toolbox_collapser_min"), b.setAttribute("title", a.lang.toolbar.toolbarCollapse)) : (c.hide(), b.addClass("cke_toolbox_collapser_min"), b.setAttribute("title", a.lang.toolbar.toolbarExpand)); b.getFirst().setText(f ? "▲" : "◀"); d.setStyle("height",
                                                h - (e.$.offsetHeight - g) + "px"); a.fire("resize", { outerHeight: a.container.$.offsetHeight, contentsHeight: d.$.offsetHeight, outerWidth: a.container.$.offsetWidth })
                                        }, modes: { wysiwyg: 1, source: 1 }
                                    }); b.setKeystroke(CKEDITOR.ALT + (CKEDITOR.env.ie || CKEDITOR.env.webkit ? 189 : 109), "toolbarCollapse"); a.push('\x3ca title\x3d"' + (d ? b.lang.toolbar.toolbarCollapse : b.lang.toolbar.toolbarExpand) + '" id\x3d"' + b.ui.spaceId("toolbar_collapser") + '" tabIndex\x3d"-1" class\x3d"cke_toolbox_collapser'); d || a.push(" cke_toolbox_collapser_min");
                                    a.push('" onclick\x3d"CKEDITOR.tools.callFunction(' + C + ')"\x3e', '\x3cspan class\x3d"cke_arrow"\x3e\x26#9650;\x3c/span\x3e', "\x3c/a\x3e")
                                } a.push("\x3c/span\x3e"); c.data.html += a.join("")
                    }
                }); b.on("destroy", function () { if (this.toolbox) { var b, d = 0, a, e, f; for (b = this.toolbox.toolbars; d < b.length; d++)for (e = b[d].items, a = 0; a < e.length; a++)f = e[a], f.clickFn && CKEDITOR.tools.removeFunction(f.clickFn), f.keyDownFn && CKEDITOR.tools.removeFunction(f.keyDownFn) } }); b.on("uiReady", function () {
                    var c = b.ui.space("toolbox"); c && b.focusManager.add(c,
                        1)
                }); b.addCommand("toolbarFocus", E); b.setKeystroke(CKEDITOR.ALT + 121, "toolbarFocus"); b.ui.add("-", CKEDITOR.UI_SEPARATOR, {}); b.ui.addHandler(CKEDITOR.UI_SEPARATOR, { create: function () { return { render: function (b, d) { d.push('\x3cspan class\x3d"cke_toolbar_separator" role\x3d"separator"\x3e\x3c/span\x3e'); return {} } } } })
            }
        }); CKEDITOR.ui.prototype.addToolbarGroup = function (b, d, f) {
            var c = v(this.editor), h = 0 === d, a = { name: b }; if (f) {
                if (f = CKEDITOR.tools.search(c, function (a) { return a.name == f })) {
                    !f.groups && (f.groups = []); if (d &&
                        (d = CKEDITOR.tools.indexOf(f.groups, d), 0 <= d)) { f.groups.splice(d + 1, 0, b); return } h ? f.groups.splice(0, 0, b) : f.groups.push(b); return
                } d = null
            } d && (d = CKEDITOR.tools.indexOf(c, function (a) { return a.name == d })); h ? c.splice(0, 0, b) : "number" == typeof d ? c.splice(d + 1, 0, a) : c.push(b)
        }
    })(); CKEDITOR.UI_SEPARATOR = "separator"; CKEDITOR.config.toolbarLocation = "top"; (function () {
        function t(a, b, c) { b.type || (b.type = "auto"); if (c && !1 === a.fire("beforePaste", b) || !b.dataValue && b.dataTransfer.isEmpty()) return !1; b.dataValue || (b.dataValue = ""); if (CKEDITOR.env.gecko && "drop" == b.method && a.toolbox) a.once("afterPaste", function () { a.toolbox.focus(); a.focus() }); return a.fire("paste", b) } function y(a) {
            function b() {
                var b = a.editable(); if (CKEDITOR.plugins.clipboard.isCustomCopyCutSupported) {
                    var c = function (b) {
                        a.getSelection().isCollapsed() || (a.readOnly && "cut" == b.name || n.initPasteDataTransfer(b,
                            a), b.data.preventDefault())
                    }; b.on("copy", c); b.on("cut", c); b.on("cut", function () { a.readOnly || a.extractSelectedHtml() }, null, null, 999)
                } b.on(n.mainPasteEvent, function (a) { "beforepaste" == n.mainPasteEvent && u || m(a) }); "beforepaste" == n.mainPasteEvent && (b.on("paste", function (a) { w || (g(), a.data.preventDefault(), m(a), e("paste")) }), b.on("contextmenu", f, null, null, 0), b.on("beforepaste", function (a) { !a.data || a.data.$.ctrlKey || a.data.$.shiftKey || f() }, null, null, 0)); b.on("beforecut", function () { !u && l(a) }); var h; b.attachListener(CKEDITOR.env.ie ?
                    b : a.document.getDocumentElement(), "mouseup", function () { h = setTimeout(p, 0) }); a.on("destroy", function () { clearTimeout(h) }); b.on("keyup", p)
            } function c(b) { return { type: b, canUndo: "cut" == b, startDisabled: !0, fakeKeystroke: "cut" == b ? CKEDITOR.CTRL + 88 : CKEDITOR.CTRL + 67, exec: function () { "cut" == this.type && l(); var b; var c = this.type; if (CKEDITOR.env.ie) b = e(c); else try { b = a.document.$.execCommand(c, !1, null) } catch (h) { b = !1 } b || a.showNotification(a.lang.clipboard[this.type + "Error"]); return b } } } function d() {
                return {
                    canUndo: !1,
                    async: !0, fakeKeystroke: CKEDITOR.CTRL + 86, exec: function (a, b) {
                        function c(b, m) { m = "undefined" !== typeof m ? m : !0; b ? (b.method = "paste", b.dataTransfer || (b.dataTransfer = n.initPasteDataTransfer()), t(a, b, m)) : d && !a._.forcePasteDialog && a.showNotification(p, "info", a.config.clipboard_notificationDuration); a._.forcePasteDialog = !1; a.fire("afterCommandExec", { name: "paste", command: h, returnValue: !!b }) } b = "undefined" !== typeof b && null !== b ? b : {}; var h = this, d = "undefined" !== typeof b.notification ? b.notification : !0, m = b.type, e = CKEDITOR.tools.keystrokeToString(a.lang.common.keyboard,
                            a.getCommandKeystroke(this)), p = "string" === typeof d ? d : a.lang.clipboard.pasteNotification.replace(/%1/, '\x3ckbd aria-label\x3d"' + e.aria + '"\x3e' + e.display + "\x3c/kbd\x3e"), e = "string" === typeof b ? b : b.dataValue; m && !0 !== a.config.forcePasteAsPlainText && "allow-word" !== a.config.forcePasteAsPlainText ? a._.nextPasteType = m : delete a._.nextPasteType; "string" === typeof e ? c({ dataValue: e }) : a.getClipboardData(c)
                    }
                }
            } function g() { w = 1; setTimeout(function () { w = 0 }, 100) } function f() { u = 1; setTimeout(function () { u = 0 }, 10) } function e(b) {
                var c =
                    a.document, h = c.getBody(), d = !1, m = function () { d = !0 }; h.on(b, m); 7 < CKEDITOR.env.version ? c.$.execCommand(b) : c.$.selection.createRange().execCommand(b); h.removeListener(b, m); return d
            } function l() {
                if (CKEDITOR.env.ie && !CKEDITOR.env.quirks) {
                    var b = a.getSelection(), c, h, d; b.getType() == CKEDITOR.SELECTION_ELEMENT && (c = b.getSelectedElement()) && (h = b.getRanges()[0], d = a.document.createText(""), d.insertBefore(c), h.setStartBefore(d), h.setEndAfter(c), b.selectRanges([h]), setTimeout(function () { c.getParent() && (d.remove(), b.selectElement(c)) },
                        0))
                }
            } function q(b, c) {
                var h = a.document, d = a.editable(), m = function (a) { a.cancel() }, e; if (!h.getById("cke_pastebin")) {
                    var p = a.getSelection(), g = p.createBookmarks(); CKEDITOR.env.ie && p.root.fire("selectionchange"); var k = new CKEDITOR.dom.element(!CKEDITOR.env.webkit && !d.is("body") || CKEDITOR.env.ie ? "div" : "body", h); k.setAttributes({ id: "cke_pastebin", "data-cke-temp": "1" }); var f = 0, h = h.getWindow(); CKEDITOR.env.webkit ? (d.append(k), k.addClass("cke_editable"), d.is("body") || (f = "static" != d.getComputedStyle("position") ?
                        d : CKEDITOR.dom.element.get(d.$.offsetParent), f = f.getDocumentPosition().y)) : d.getAscendant(CKEDITOR.env.ie ? "body" : "html", 1).append(k); k.setStyles({ position: "absolute", top: h.getScrollPosition().y - f + 10 + "px", width: "1px", height: Math.max(1, h.getViewPaneSize().height - 20) + "px", overflow: "hidden", margin: 0, padding: 0 }); CKEDITOR.env.safari && k.setStyles(CKEDITOR.tools.cssVendorPrefix("user-select", "text")); (f = k.getParent().isReadOnly()) ? (k.setOpacity(0), k.setAttribute("contenteditable", !0)) : k.setStyle("ltr" == a.config.contentsLangDirection ?
                            "left" : "right", "-10000px"); a.on("selectionChange", m, null, null, 0); if (CKEDITOR.env.webkit || CKEDITOR.env.gecko) e = d.once("blur", m, null, null, -100); f && k.focus(); f = new CKEDITOR.dom.range(k); f.selectNodeContents(k); var l = f.select(); CKEDITOR.env.ie && (e = d.once("blur", function () { a.lockSelection(l) })); var n = CKEDITOR.document.getWindow().getScrollPosition().y; setTimeout(function () {
                                CKEDITOR.env.webkit && (CKEDITOR.document.getBody().$.scrollTop = n); e && e.removeListener(); CKEDITOR.env.ie && d.focus(); p.selectBookmarks(g);
                                k.remove(); var b; CKEDITOR.env.webkit && (b = k.getFirst()) && b.is && b.hasClass("Apple-style-span") && (k = b); a.removeListener("selectionChange", m); c(k.getHtml())
                            }, 0)
                }
            } function v() { if ("paste" == n.mainPasteEvent) return a.fire("beforePaste", { type: "auto", method: "paste" }), !1; a.focus(); g(); var b = a.focusManager; b.lock(); if (a.editable().fire(n.mainPasteEvent) && !e("paste")) return b.unlock(), !1; b.unlock(); return !0 } function h(b) {
                if ("wysiwyg" == a.mode) switch (b.data.keyCode) {
                    case CKEDITOR.CTRL + 86: case CKEDITOR.SHIFT + 45: b =
                        a.editable(); g(); "paste" == n.mainPasteEvent && b.fire("beforepaste"); break; case CKEDITOR.CTRL + 88: case CKEDITOR.SHIFT + 46: a.fire("saveSnapshot"), setTimeout(function () { a.fire("saveSnapshot") }, 50)
                }
            } function m(b) {
                var c = { type: "auto", method: "paste", dataTransfer: n.initPasteDataTransfer(b) }; c.dataTransfer.cacheData(); var h = !1 !== a.fire("beforePaste", c); h && n.canClipboardApiBeTrusted(c.dataTransfer, a) ? (b.data.preventDefault(), setTimeout(function () { t(a, c) }, 0)) : q(b, function (b) {
                    c.dataValue = b.replace(/<span[^>]+data-cke-bookmark[^<]*?<\/span>/ig,
                        ""); h && t(a, c)
                })
            } function p() { if ("wysiwyg" == a.mode) { var b = k("paste"); a.getCommand("cut").setState(k("cut")); a.getCommand("copy").setState(k("copy")); a.getCommand("paste").setState(b); a.fire("pasteState", b) } } function k(b) {
                var c = a.getSelection(), c = c && c.getRanges()[0]; if ((a.readOnly || c && c.checkReadOnly()) && b in { paste: 1, cut: 1 }) return CKEDITOR.TRISTATE_DISABLED; if ("paste" == b) return CKEDITOR.TRISTATE_OFF; b = a.getSelection(); c = b.getRanges(); return b.getType() == CKEDITOR.SELECTION_NONE || 1 == c.length && c[0].collapsed ?
                    CKEDITOR.TRISTATE_DISABLED : CKEDITOR.TRISTATE_OFF
            } var n = CKEDITOR.plugins.clipboard, u = 0, w = 0; (function () {
                a.on("key", h); a.on("contentDom", b); a.on("selectionChange", p); if (a.contextMenu) { a.contextMenu.addListener(function () { return { cut: k("cut"), copy: k("copy"), paste: k("paste") } }); var c = null; a.on("menuShow", function () { c && (c.removeListener(), c = null); var b = a.contextMenu.findItemByCommandName("paste"); b && b.element && (c = b.element.on("touchend", function () { a._.forcePasteDialog = !0 })) }) } if (a.ui.addButton) a.once("instanceReady",
                    function () { a._.pasteButtons && CKEDITOR.tools.array.forEach(a._.pasteButtons, function (b) { if (b = a.ui.get(b)) if (b = CKEDITOR.document.getById(b._.id)) b.on("touchend", function () { a._.forcePasteDialog = !0 }) }) })
            })(); (function () {
                function b(c, h, d, m, e) { var p = a.lang.clipboard[h]; a.addCommand(h, d); a.ui.addButton && a.ui.addButton(c, { label: p, command: h, toolbar: "clipboard," + m }); a.addMenuItems && a.addMenuItem(h, { label: p, command: h, group: "clipboard", order: e }) } b("Cut", "cut", c("cut"), 10, 1); b("Copy", "copy", c("copy"), 20, 4); b("Paste",
                    "paste", d(), 30, 8); a._.pasteButtons || (a._.pasteButtons = []); a._.pasteButtons.push("Paste")
            })(); a.getClipboardData = function (b, c) {
                function h(a) { a.removeListener(); a.cancel(); c(a.data) } function d(a) { a.removeListener(); a.cancel(); c({ type: e, dataValue: a.data.dataValue, dataTransfer: a.data.dataTransfer, method: "paste" }) } var m = !1, e = "auto"; c || (c = b, b = null); a.on("beforePaste", function (a) { a.removeListener(); m = !0; e = a.data.type }, null, null, 1E3); a.on("paste", h, null, null, 0); !1 === v() && (a.removeListener("paste", h), a._.forcePasteDialog &&
                    m && a.fire("pasteDialog") ? (a.on("pasteDialogCommit", d), a.on("dialogHide", function (a) { a.removeListener(); a.data.removeListener("pasteDialogCommit", d); a.data._.committed || c(null) })) : c(null))
            }
        } function z(a) {
            if (CKEDITOR.env.webkit) { if (!a.match(/^[^<]*$/g) && !a.match(/^(<div><br( ?\/)?><\/div>|<div>[^<]*<\/div>)*$/gi)) return "html" } else if (CKEDITOR.env.ie) { if (!a.match(/^([^<]|<br( ?\/)?>)*$/gi) && !a.match(/^(<p>([^<]|<br( ?\/)?>)*<\/p>|(\r\n))*$/gi)) return "html" } else if (CKEDITOR.env.gecko) { if (!a.match(/^([^<]|<br( ?\/)?>)*$/gi)) return "html" } else return "html";
            return "htmlifiedtext"
        } function A(a, b) {
            function c(a) { return CKEDITOR.tools.repeat("\x3c/p\x3e\x3cp\x3e", ~~(a / 2)) + (1 == a % 2 ? "\x3cbr\x3e" : "") } b = b.replace(/(?!\u3000)\s+/g, " ").replace(/> +</g, "\x3e\x3c").replace(/<br ?\/>/gi, "\x3cbr\x3e"); b = b.replace(/<\/?[A-Z]+>/g, function (a) { return a.toLowerCase() }); if (b.match(/^[^<]$/)) return b; CKEDITOR.env.webkit && -1 < b.indexOf("\x3cdiv\x3e") && (b = b.replace(/^(<div>(<br>|)<\/div>)(?!$|(<div>(<br>|)<\/div>))/g, "\x3cbr\x3e").replace(/^(<div>(<br>|)<\/div>){2}(?!$)/g, "\x3cdiv\x3e\x3c/div\x3e"),
                b.match(/<div>(<br>|)<\/div>/) && (b = "\x3cp\x3e" + b.replace(/(<div>(<br>|)<\/div>)+/g, function (a) { return c(a.split("\x3c/div\x3e\x3cdiv\x3e").length + 1) }) + "\x3c/p\x3e"), b = b.replace(/<\/div><div>/g, "\x3cbr\x3e"), b = b.replace(/<\/?div>/g, "")); CKEDITOR.env.gecko && a.enterMode != CKEDITOR.ENTER_BR && (CKEDITOR.env.gecko && (b = b.replace(/^<br><br>$/, "\x3cbr\x3e")), -1 < b.indexOf("\x3cbr\x3e\x3cbr\x3e") && (b = "\x3cp\x3e" + b.replace(/(<br>){2,}/g, function (a) { return c(a.length / 4) }) + "\x3c/p\x3e")); return B(a, b)
        } function C(a) {
            function b() {
                var a =
                    {}, b; for (b in CKEDITOR.dtd) "$" != b.charAt(0) && "div" != b && "span" != b && (a[b] = 1); return a
            } var c = {}; return { get: function (d) { return "plain-text" == d ? c.plainText || (c.plainText = new CKEDITOR.filter(a, "br")) : "semantic-content" == d ? ((d = c.semanticContent) || (d = new CKEDITOR.filter(a, {}), d.allow({ $1: { elements: b(), attributes: !0, styles: !1, classes: !1 } }), d = c.semanticContent = d), d) : d ? new CKEDITOR.filter(a, d) : null } }
        } function x(a, b, c) {
            b = CKEDITOR.htmlParser.fragment.fromHtml(b); var d = new CKEDITOR.htmlParser.basicWriter; c.applyTo(b,
                !0, !1, a.activeEnterMode); b.writeHtml(d); return d.getHtml()
        } function B(a, b) { a.enterMode == CKEDITOR.ENTER_BR ? b = b.replace(/(<\/p><p>)+/g, function (a) { return CKEDITOR.tools.repeat("\x3cbr\x3e", a.length / 7 * 2) }).replace(/<\/?p>/g, "") : a.enterMode == CKEDITOR.ENTER_DIV && (b = b.replace(/<(\/)?p>/g, "\x3c$1div\x3e")); return b } function D(a) { a.data.preventDefault(); a.data.$.dataTransfer.dropEffect = "none" } function E(a) {
            var b = CKEDITOR.plugins.clipboard; a.on("contentDom", function () {
                function c(b, c, d) {
                    c.select(); t(a, {
                        dataTransfer: d,
                        method: "drop"
                    }, 1); d.sourceEditor.fire("saveSnapshot"); d.sourceEditor.editable().extractHtmlFromRange(b); d.sourceEditor.getSelection().selectRanges([b]); d.sourceEditor.fire("saveSnapshot")
                } function d(c, d) { c.select(); t(a, { dataTransfer: d, method: "drop" }, 1); b.resetDragDataTransfer() } function g(b, c, d) { var e = { $: b.data.$, target: b.data.getTarget() }; c && (e.dragRange = c); d && (e.dropRange = d); !1 === a.fire(b.name, e) && b.data.preventDefault() } function f(a) { a.type != CKEDITOR.NODE_ELEMENT && (a = a.getParent()); return a.getChildCount() }
                var e = a.editable(), l = CKEDITOR.plugins.clipboard.getDropTarget(a), q = a.ui.space("top"), v = a.ui.space("bottom"); b.preventDefaultDropOnElement(q); b.preventDefaultDropOnElement(v); e.attachListener(l, "dragstart", g); e.attachListener(a, "dragstart", b.resetDragDataTransfer, b, null, 1); e.attachListener(a, "dragstart", function (c) { b.initDragDataTransfer(c, a) }, null, null, 2); e.attachListener(a, "dragstart", function () {
                    var c = b.dragRange = a.getSelection().getRanges()[0]; CKEDITOR.env.ie && 10 > CKEDITOR.env.version && (b.dragStartContainerChildCount =
                        c ? f(c.startContainer) : null, b.dragEndContainerChildCount = c ? f(c.endContainer) : null)
                }, null, null, 100); e.attachListener(l, "dragend", g); e.attachListener(a, "dragend", b.initDragDataTransfer, b, null, 1); e.attachListener(a, "dragend", b.resetDragDataTransfer, b, null, 100); e.attachListener(l, "dragover", function (a) {
                    if (CKEDITOR.env.edge) a.data.preventDefault(); else {
                        var b = a.data.getTarget(); b && b.is && b.is("html") ? a.data.preventDefault() : CKEDITOR.env.ie && CKEDITOR.plugins.clipboard.isFileApiSupported && a.data.$.dataTransfer.types.contains("Files") &&
                            a.data.preventDefault()
                    }
                }); e.attachListener(l, "drop", function (c) { if (!c.data.$.defaultPrevented && (c.data.preventDefault(), !a.readOnly)) { var d = c.data.getTarget(); if (!d.isReadOnly() || d.type == CKEDITOR.NODE_ELEMENT && d.is("html")) { var d = b.getRangeAtDropPosition(c, a), e = b.dragRange; d && g(c, e, d) } } }, null, null, 9999); e.attachListener(a, "drop", b.initDragDataTransfer, b, null, 1); e.attachListener(a, "drop", function (h) {
                    if (h = h.data) {
                        var e = h.dropRange, p = h.dragRange, k = h.dataTransfer; k.getTransferType(a) == CKEDITOR.DATA_TRANSFER_INTERNAL ?
                            setTimeout(function () { b.internalDrop(p, e, k, a) }, 0) : k.getTransferType(a) == CKEDITOR.DATA_TRANSFER_CROSS_EDITORS ? c(p, e, k) : d(e, k)
                    }
                }, null, null, 9999)
            })
        } var r; CKEDITOR.plugins.add("clipboard", {
            requires: "dialog,notification,toolbar", _supportedFileMatchers: [], init: function (a) {
                function b(b) { return a.config.clipboard_handleImages ? -1 !== CKEDITOR.tools.indexOf(["image/png", "image/jpeg", "image/gif"], b.type) : !1 } function c(b) { return CKEDITOR.tools.array.some(a.plugins.clipboard._supportedFileMatchers, function (a) { return a(b) }) }
                function d(b) { b.length && (b = CKEDITOR.tools.array.unique(b), b = CKEDITOR.tools.array.filter(b, function (a) { return !!CKEDITOR.tools.trim(a) }), b = g(b.join(", ")), a.showNotification(b, "info", a.config.clipboard_notificationDuration)) } function g(b) { return b ? a.lang.clipboard.fileFormatNotSupportedNotification.replace(/\${formats\}/g, "\x3cem\x3e" + b + "\x3c/em\x3e") : a.lang.clipboard.fileWithoutFormatNotSupportedNotification } function f(a, b) {
                    return CKEDITOR.env.ie && a.data.fileTransferCancel || !(CKEDITOR.env.ie || b && v !==
                        b.id) ? !1 : b.isFileTransfer() && 1 === b.getFilesCount()
                } var e, l = C(a); a.config.forcePasteAsPlainText ? e = "plain-text" : a.config.pasteFilter ? e = a.config.pasteFilter : !CKEDITOR.env.webkit || "pasteFilter" in a.config || (e = "semantic-content"); a.pasteFilter = l.get(e); y(a); E(a); CKEDITOR.dialog.add("paste", CKEDITOR.getUrl(this.path + "dialogs/paste.js")); var q = CKEDITOR.plugins.clipboard.isCustomDataTypesSupported || CKEDITOR.plugins.clipboard.isFileApiSupported, v; CKEDITOR.plugins.clipboard.addFileMatcher(a, b); a.on("paste",
                    function (a) { if (q) { var b = a.data; a = b.dataTransfer; if (!b.dataValue) { for (var b = [], e = 0; e < a.getFilesCount(); e++) { var k = a.getFile(e); c(k) || b.push(k.type) } d(b) } } }, null, null, 1); a.on("paste", function (c) {
                        if (q && a.config.clipboard_handleImages) {
                            var d = c.data, e = d.dataTransfer; if (!d.dataValue && f(c, e) && (e = e.getFile(0), b(e))) {
                                var k = new FileReader; k.addEventListener("load", function () { c.data.dataValue = '\x3cimg src\x3d"' + k.result + '" /\x3e'; a.fire("paste", c.data) }, !1); k.addEventListener("abort", function () {
                                    CKEDITOR.env.ie &&
                                    (c.data.fileTransferCancel = !0); a.fire("paste", c.data)
                                }, !1); k.addEventListener("error", function () { CKEDITOR.env.ie && (c.data.fileTransferCancel = !0); a.fire("paste", c.data) }, !1); k.readAsDataURL(e); v = d.dataTransfer.id; c.stop()
                            }
                        }
                    }, null, null, 1); a.on("paste", function (b) {
                        b.data.dataTransfer || (b.data.dataTransfer = new CKEDITOR.plugins.clipboard.dataTransfer); if (!b.data.dataValue) {
                            var c = b.data.dataTransfer, d = c.getData("text/html"); if (d) b.data.dataValue = d, b.data.type = "html"; else if (d = c.getData("text/plain")) b.data.dataValue =
                                a.editable().transformPlainTextToHtml(d), b.data.type = "text"
                        }
                    }, null, null, 1); a.on("paste", function (a) {
                        var b = a.data.dataValue, c = CKEDITOR.dtd.$block; -1 < b.indexOf("Apple-") && (b = b.replace(/<span class="Apple-converted-space">&nbsp;<\/span>/gi, " "), "html" != a.data.type && (b = b.replace(/<span class="Apple-tab-span"[^>]*>([^<]*)<\/span>/gi, function (a, b) { return b.replace(/\t/g, "\x26nbsp;\x26nbsp; \x26nbsp;") })), -1 < b.indexOf('\x3cbr class\x3d"Apple-interchange-newline"\x3e') && (a.data.startsWithEOL = 1, a.data.preSniffing =
                            "html", b = b.replace(/<br class="Apple-interchange-newline">/, "")), b = b.replace(/(<[^>]+) class="Apple-[^"]*"/gi, "$1")); if (b.match(/^<[^<]+cke_(editable|contents)/i)) { var d, e, f = new CKEDITOR.dom.element("div"); for (f.setHtml(b); 1 == f.getChildCount() && (d = f.getFirst()) && d.type == CKEDITOR.NODE_ELEMENT && (d.hasClass("cke_editable") || d.hasClass("cke_contents"));)f = e = d; e && (b = e.getHtml().replace(/<br>$/i, "")) } CKEDITOR.env.ie ? b = b.replace(/^&nbsp;(?: |\r\n)?<(\w+)/g, function (b, d) {
                                return d.toLowerCase() in c ? (a.data.preSniffing =
                                    "html", "\x3c" + d) : b
                            }) : CKEDITOR.env.webkit ? b = b.replace(/<\/(\w+)><div><br><\/div>$/, function (b, d) { return d in c ? (a.data.endsWithEOL = 1, "\x3c/" + d + "\x3e") : b }) : CKEDITOR.env.gecko && (b = b.replace(/(\s)<br>$/, "$1")); a.data.dataValue = b
                    }, null, null, 3); a.on("paste", function (b) {
                        b = b.data; var c = a._.nextPasteType || b.type, d = b.dataValue, e, f = a.config.clipboard_defaultContentType || "html", g = b.dataTransfer.getTransferType(a) == CKEDITOR.DATA_TRANSFER_EXTERNAL, q = !0 === a.config.forcePasteAsPlainText; e = "html" == c || "html" == b.preSniffing ?
                            "html" : z(d); delete a._.nextPasteType; "htmlifiedtext" == e && (d = A(a.config, d)); if ("text" == c && "html" == e) d = x(a, d, l.get("plain-text")); else if (g && a.pasteFilter && !b.dontFilter || q) d = x(a, d, a.pasteFilter); b.startsWithEOL && (d = '\x3cbr data-cke-eol\x3d"1"\x3e' + d); b.endsWithEOL && (d += '\x3cbr data-cke-eol\x3d"1"\x3e'); "auto" == c && (c = "html" == e || "html" == f ? "html" : "text"); b.type = c; b.dataValue = d; delete b.preSniffing; delete b.startsWithEOL; delete b.endsWithEOL
                    }, null, null, 6); a.on("paste", function (b) {
                        b = b.data; b.dataValue &&
                            (a.insertHtml(b.dataValue, b.type, b.range), setTimeout(function () { a.fire("afterPaste") }, 0))
                    }, null, null, 1E3); a.on("pasteDialog", function (b) { setTimeout(function () { a.openDialog("paste", b.data) }, 0) })
            }
        }); CKEDITOR.plugins.clipboard = {
            addFileMatcher: function (a, b) { a.plugins.clipboard._supportedFileMatchers.push(b) }, isCustomCopyCutSupported: CKEDITOR.env.ie && 16 > CKEDITOR.env.version || CKEDITOR.env.iOS && 605 > CKEDITOR.env.version ? !1 : !0, isCustomDataTypesSupported: !CKEDITOR.env.ie || 16 <= CKEDITOR.env.version, isFileApiSupported: !CKEDITOR.env.ie ||
                9 < CKEDITOR.env.version, mainPasteEvent: CKEDITOR.env.ie && !CKEDITOR.env.edge ? "beforepaste" : "paste", addPasteButton: function (a, b, c) { a.ui.addButton && (a.ui.addButton(b, c), a._.pasteButtons || (a._.pasteButtons = []), a._.pasteButtons.push(b)) }, canClipboardApiBeTrusted: function (a, b) {
                    return a.getTransferType(b) != CKEDITOR.DATA_TRANSFER_EXTERNAL || CKEDITOR.env.chrome && !a.isEmpty() || CKEDITOR.env.gecko && (a.getData("text/html") || a.getFilesCount()) || CKEDITOR.env.safari && 603 <= CKEDITOR.env.version && !CKEDITOR.env.iOS || CKEDITOR.env.iOS &&
                        605 <= CKEDITOR.env.version || CKEDITOR.env.edge && 16 <= CKEDITOR.env.version ? !0 : !1
                }, getDropTarget: function (a) { var b = a.editable(); return CKEDITOR.env.ie && 9 > CKEDITOR.env.version || b.isInline() ? b : a.document }, fixSplitNodesAfterDrop: function (a, b, c, d) {
                    function g(a, c, d) {
                        var f = a; f.type == CKEDITOR.NODE_TEXT && (f = a.getParent()); if (f.equals(c) && d != c.getChildCount()) return a = b.startContainer.getChild(b.startOffset - 1), c = b.startContainer.getChild(b.startOffset), a && a.type == CKEDITOR.NODE_TEXT && c && c.type == CKEDITOR.NODE_TEXT &&
                            (d = a.getLength(), a.setText(a.getText() + c.getText()), c.remove(), b.setStart(a, d), b.collapse(!0)), !0
                    } var f = b.startContainer; "number" == typeof d && "number" == typeof c && f.type == CKEDITOR.NODE_ELEMENT && (g(a.startContainer, f, c) || g(a.endContainer, f, d))
                }, isDropRangeAffectedByDragRange: function (a, b) {
                    var c = b.startContainer, d = b.endOffset; return a.endContainer.equals(c) && a.endOffset <= d || a.startContainer.getParent().equals(c) && a.startContainer.getIndex() < d || a.endContainer.getParent().equals(c) && a.endContainer.getIndex() <
                        d ? !0 : !1
                }, internalDrop: function (a, b, c, d) {
                    var g = CKEDITOR.plugins.clipboard, f = d.editable(), e, l; d.fire("saveSnapshot"); d.fire("lockSnapshot", { dontUpdate: 1 }); CKEDITOR.env.ie && 10 > CKEDITOR.env.version && this.fixSplitNodesAfterDrop(a, b, g.dragStartContainerChildCount, g.dragEndContainerChildCount); (l = this.isDropRangeAffectedByDragRange(a, b)) || (e = a.createBookmark(!1)); g = b.clone().createBookmark(!1); l && (e = a.createBookmark(!1)); a = e.startNode; b = e.endNode; l = g.startNode; b && a.getPosition(l) & CKEDITOR.POSITION_PRECEDING &&
                        b.getPosition(l) & CKEDITOR.POSITION_FOLLOWING && l.insertBefore(a); a = d.createRange(); a.moveToBookmark(e); f.extractHtmlFromRange(a, 1); b = d.createRange(); g.startNode.getCommonAncestor(f) || (g = d.getSelection().createBookmarks()[0]); b.moveToBookmark(g); t(d, { dataTransfer: c, method: "drop", range: b }, 1); d.fire("unlockSnapshot")
                }, getRangeAtDropPosition: function (a, b) {
                    var c = a.data.$, d = c.clientX, g = c.clientY, f = b.getSelection(!0).getRanges()[0], e = b.createRange(); if (a.data.testRange) return a.data.testRange; if (document.caretRangeFromPoint &&
                        b.document.$.caretRangeFromPoint(d, g)) c = b.document.$.caretRangeFromPoint(d, g), e.setStart(CKEDITOR.dom.node(c.startContainer), c.startOffset), e.collapse(!0); else if (c.rangeParent) e.setStart(CKEDITOR.dom.node(c.rangeParent), c.rangeOffset), e.collapse(!0); else {
                            if (CKEDITOR.env.ie && 8 < CKEDITOR.env.version && f && b.editable().hasFocus) return f; if (document.body.createTextRange) {
                                b.focus(); c = b.document.getBody().$.createTextRange(); try {
                                    for (var l = !1, q = 0; 20 > q && !l; q++) {
                                        if (!l) try { c.moveToPoint(d, g - q), l = !0 } catch (r) { } if (!l) try {
                                            c.moveToPoint(d,
                                                g + q), l = !0
                                        } catch (h) { }
                                    } if (l) { var m = "cke-temp-" + (new Date).getTime(); c.pasteHTML('\x3cspan id\x3d"' + m + '"\x3e​\x3c/span\x3e'); var p = b.document.getById(m); e.moveToPosition(p, CKEDITOR.POSITION_BEFORE_START); p.remove() } else {
                                        var k = b.document.$.elementFromPoint(d, g), n = new CKEDITOR.dom.element(k), u; if (n.equals(b.editable()) || "html" == n.getName()) return f && f.startContainer && !f.startContainer.equals(b.editable()) ? f : null; u = n.getClientRect(); d < u.left ? e.setStartAt(n, CKEDITOR.POSITION_AFTER_START) : e.setStartAt(n,
                                            CKEDITOR.POSITION_BEFORE_END); e.collapse(!0)
                                    }
                                } catch (t) { return null }
                            } else return null
                        } return e
                }, initDragDataTransfer: function (a, b) { var c = a.data.$ ? a.data.$.dataTransfer : null, d = new this.dataTransfer(c, b); "dragstart" === a.name && d.storeId(); c ? this.dragData && d.id == this.dragData.id ? d = this.dragData : this.dragData = d : this.dragData ? d = this.dragData : this.dragData = d; a.data.dataTransfer = d }, resetDragDataTransfer: function () { this.dragData = null }, initPasteDataTransfer: function (a, b) {
                    if (this.isCustomCopyCutSupported) {
                        if (a &&
                            a.data && a.data.$) { var c = a.data.$.clipboardData, d = new this.dataTransfer(c, b); "copy" !== a.name && "cut" !== a.name || d.storeId(); this.copyCutData && d.id == this.copyCutData.id ? (d = this.copyCutData, d.$ = c) : this.copyCutData = d; return d } return new this.dataTransfer(null, b)
                    } return new this.dataTransfer(CKEDITOR.env.edge && a && a.data.$ && a.data.$.clipboardData || null, b)
                }, preventDefaultDropOnElement: function (a) { a && a.on("dragover", D) }
        }; r = CKEDITOR.plugins.clipboard.isCustomDataTypesSupported ? "cke/id" : "Text"; CKEDITOR.plugins.clipboard.dataTransfer =
            function (a, b) {
                a && (this.$ = a); this._ = { metaRegExp: /^<meta.*?>/i, fragmentRegExp: /\s*\x3c!--StartFragment--\x3e|\x3c!--EndFragment--\x3e\s*/g, types: [], data: {}, files: [], nativeHtmlCache: "", normalizeType: function (a) { a = a.toLowerCase(); return "text" == a || "text/plain" == a ? "Text" : "url" == a ? "URL" : "files" === a ? "Files" : a } }; this._.fallbackDataTransfer = new CKEDITOR.plugins.clipboard.fallbackDataTransfer(this); this.id = this.getData(r); this.id || (this.id = "Text" == r ? "" : "cke-" + CKEDITOR.tools.getUniqueId()); b && (this.sourceEditor =
                    b, this.setData("text/html", b.getSelectedHtml(1)), "Text" == r || this.getData("text/plain") || this.setData("text/plain", b.getSelection().getSelectedText()))
            }; CKEDITOR.DATA_TRANSFER_INTERNAL = 1; CKEDITOR.DATA_TRANSFER_CROSS_EDITORS = 2; CKEDITOR.DATA_TRANSFER_EXTERNAL = 3; CKEDITOR.plugins.clipboard.dataTransfer.prototype = {
                getData: function (a, b) {
                    a = this._.normalizeType(a); var c = "text/html" == a && b ? this._.nativeHtmlCache : this._.data[a]; if (void 0 === c || null === c || "" === c) {
                        if (this._.fallbackDataTransfer.isRequired()) c = this._.fallbackDataTransfer.getData(a,
                            b); else try { c = this.$.getData(a) || "" } catch (d) { c = "" } "text/html" != a || b || (c = this._stripHtml(c))
                    } "Text" == a && CKEDITOR.env.gecko && this.getFilesCount() && "file://" == c.substring(0, 7) && (c = ""); if ("string" === typeof c) var g = c.indexOf("\x3c/html\x3e"), c = -1 !== g ? c.substring(0, g + 7) : c; return c
                }, setData: function (a, b) {
                    a = this._.normalizeType(a); "text/html" == a ? (this._.data[a] = this._stripHtml(b), this._.nativeHtmlCache = b) : this._.data[a] = b; if (CKEDITOR.plugins.clipboard.isCustomDataTypesSupported || "URL" == a || "Text" == a) if ("Text" ==
                        r && "Text" == a && (this.id = b), this._.fallbackDataTransfer.isRequired()) this._.fallbackDataTransfer.setData(a, b); else try { this.$.setData(a, b) } catch (c) { }
                }, storeId: function () { "Text" !== r && this.setData(r, this.id) }, getTransferType: function (a) { return this.sourceEditor ? this.sourceEditor == a ? CKEDITOR.DATA_TRANSFER_INTERNAL : CKEDITOR.DATA_TRANSFER_CROSS_EDITORS : CKEDITOR.DATA_TRANSFER_EXTERNAL }, cacheData: function () {
                    function a(a) {
                        a = b._.normalizeType(a); var c = b.getData(a); "text/html" == a && (b._.nativeHtmlCache = b.getData(a,
                            !0), c = b._stripHtml(c)); c && (b._.data[a] = c); b._.types.push(a)
                    } if (this.$) { var b = this, c, d, g; if (CKEDITOR.plugins.clipboard.isCustomDataTypesSupported) { if (this.$.types) for (c = 0; c < this.$.types.length; c++)a(this.$.types[c]) } else a("Text"), a("URL"); d = this._getImageFromClipboard(); if ((g = this.$ && this.$.files || null) || d) { this._.files = []; if (g && g.length) for (c = 0; c < g.length; c++)this._.files.push(g[c]); 0 === this._.files.length && d && this._.files.push(d) } }
                }, getFilesCount: function () {
                    if (this._.files.length) return this._.files.length;
                    var a = this.$ && this.$.files || null; return a && a.length ? a.length : this._getImageFromClipboard() ? 1 : 0
                }, getFile: function (a) { if (this._.files.length) return this._.files[a]; var b = this.$ && this.$.files || null; return b && b.length ? b[a] : 0 === a ? this._getImageFromClipboard() : void 0 }, isFileTransfer: function () { var a = this.getTypes(), a = CKEDITOR.tools.array.filter(a, function (a) { return "application/x-moz-file" !== a }); return 1 === a.length && "files" === a[0].toLowerCase() }, isEmpty: function () {
                    var a = {}, b; if (this.getFilesCount()) return !1;
                    CKEDITOR.tools.array.forEach(CKEDITOR.tools.object.keys(this._.data), function (b) { a[b] = 1 }); if (this.$) if (CKEDITOR.plugins.clipboard.isCustomDataTypesSupported) { if (this.$.types) for (var c = 0; c < this.$.types.length; c++)a[this.$.types[c]] = 1 } else a.Text = 1, a.URL = 1; "Text" != r && (a[r] = 0); for (b in a) if (a[b] && "" !== this.getData(b)) return !1; return !0
                }, getTypes: function () { return 0 < this._.types.length ? this._.types : this.$ && this.$.types ? [].slice.call(this.$.types) : [] }, _getImageFromClipboard: function () {
                    var a; try {
                        if (this.$ &&
                            this.$.items && this.$.items[0] && (a = this.$.items[0].getAsFile()) && a.type) return a
                    } catch (b) { }
                }, _stripHtml: function (a) {
                    function b(a) { var b = new CKEDITOR.htmlParser, g, f; b.onTagOpen = function (a) { "body" === a && (g = b._.htmlPartsRegex.lastIndex) }; b.onTagClose = function (a) { "body" === a && (f = b._.htmlPartsRegex.lastIndex) }; b.parse(a); return "number" !== typeof g || "number" !== typeof f ? a : a.substring(g, f).replace(/<\/body\s*>$/gi, "") } a && a.length && (a = b(a), a = a.replace(this._.metaRegExp, ""), a = a.replace(this._.fragmentRegExp, ""));
                    return a
                }
            }; CKEDITOR.plugins.clipboard.fallbackDataTransfer = function (a) { this._dataTransfer = a; this._customDataFallbackType = "text/html" }; CKEDITOR.plugins.clipboard.fallbackDataTransfer._isCustomMimeTypeSupported = null; CKEDITOR.plugins.clipboard.fallbackDataTransfer._customTypes = []; CKEDITOR.plugins.clipboard.fallbackDataTransfer.prototype = {
                isRequired: function () {
                    var a = CKEDITOR.plugins.clipboard.fallbackDataTransfer, b = this._dataTransfer.$; if (null === a._isCustomMimeTypeSupported) if (b) {
                        a._isCustomMimeTypeSupported =
                        !1; if (CKEDITOR.env.edge && 17 <= CKEDITOR.env.version) return !0; try { b.setData("cke/mimetypetest", "cke test value"), a._isCustomMimeTypeSupported = "cke test value" === b.getData("cke/mimetypetest"), b.clearData("cke/mimetypetest") } catch (c) { }
                    } else return !1; return !a._isCustomMimeTypeSupported
                }, getData: function (a, b) {
                    var c = this._getData(this._customDataFallbackType, !0); if (b) return c; var c = this._extractDataComment(c), d = null, d = a === this._customDataFallbackType ? c.content : c.data && c.data[a] ? c.data[a] : this._getData(a,
                        !0); return null !== d ? d : ""
                }, setData: function (a, b) {
                    var c = a === this._customDataFallbackType; c && (b = this._applyDataComment(b, this._getFallbackTypeData())); var d = b, g = this._dataTransfer.$; try { g.setData(a, d), c && (this._dataTransfer._.nativeHtmlCache = d) } catch (f) {
                        if (this._isUnsupportedMimeTypeError(f)) {
                            c = CKEDITOR.plugins.clipboard.fallbackDataTransfer; -1 === CKEDITOR.tools.indexOf(c._customTypes, a) && c._customTypes.push(a); var c = this._getFallbackTypeContent(), e = this._getFallbackTypeData(); e[a] = d; try {
                                d = this._applyDataComment(c,
                                    e), g.setData(this._customDataFallbackType, d), this._dataTransfer._.nativeHtmlCache = d
                            } catch (l) { d = "" }
                        }
                    } return d
                }, _getData: function (a, b) { var c = this._dataTransfer._.data; if (!b && c[a]) return c[a]; try { return this._dataTransfer.$.getData(a) } catch (d) { return null } }, _getFallbackTypeContent: function () { var a = this._dataTransfer._.data[this._customDataFallbackType]; a || (a = this._extractDataComment(this._getData(this._customDataFallbackType, !0)).content); return a }, _getFallbackTypeData: function () {
                    var a = CKEDITOR.plugins.clipboard.fallbackDataTransfer._customTypes,
                    b = this._extractDataComment(this._getData(this._customDataFallbackType, !0)).data || {}, c = this._dataTransfer._.data; CKEDITOR.tools.array.forEach(a, function (a) { void 0 !== c[a] ? b[a] = c[a] : void 0 !== b[a] && (b[a] = b[a]) }, this); return b
                }, _isUnsupportedMimeTypeError: function (a) { return a.message && -1 !== a.message.search(/element not found/gi) }, _extractDataComment: function (a) {
                    var b = { data: null, content: a || "" }; if (a && 16 < a.length) {
                        var c; (c = /\x3c!--cke-data:(.*?)--\x3e/g.exec(a)) && c[1] && (b.data = JSON.parse(decodeURIComponent(c[1])),
                            b.content = a.replace(c[0], ""))
                    } return b
                }, _applyDataComment: function (a, b) { var c = ""; b && CKEDITOR.tools.object.keys(b).length && (c = "\x3c!--cke-data:" + encodeURIComponent(JSON.stringify(b)) + "--\x3e"); return c + (a && a.length ? a : "") }
            }
    })(); CKEDITOR.config.clipboard_notificationDuration = 1E4; CKEDITOR.config.clipboard_handleImages = !0; (function () {
        CKEDITOR.plugins.add("panel", { beforeInit: function (a) { a.ui.addHandler(CKEDITOR.UI_PANEL, CKEDITOR.ui.panel.handler) } }); CKEDITOR.UI_PANEL = "panel"; CKEDITOR.ui.panel = function (a, b) { b && CKEDITOR.tools.extend(this, b); CKEDITOR.tools.extend(this, { className: "", css: [] }); this.id = CKEDITOR.tools.getNextId(); this.document = a; this.isFramed = this.forceIFrame || this.css.length; this._ = { blocks: {} } }; CKEDITOR.ui.panel.handler = { create: function (a) { return new CKEDITOR.ui.panel(a) } }; var g = CKEDITOR.addTemplate("panel",
            '\x3cdiv lang\x3d"{langCode}" id\x3d"{id}" dir\x3d{dir} class\x3d"cke cke_reset_all {editorId} cke_panel cke_panel {cls} cke_{dir}" style\x3d"z-index:{z-index}" role\x3d"presentation"\x3e{frame}\x3c/div\x3e'), h = CKEDITOR.addTemplate("panel-frame", '\x3ciframe id\x3d"{id}" class\x3d"cke_panel_frame" role\x3d"presentation" frameborder\x3d"0" src\x3d"{src}"\x3e\x3c/iframe\x3e'), k = CKEDITOR.addTemplate("panel-frame-inner", '\x3c!DOCTYPE html\x3e\x3chtml class\x3d"cke_panel_container {env}" dir\x3d"{dir}" lang\x3d"{langCode}"\x3e\x3chead\x3e{css}\x3c/head\x3e\x3cbody class\x3d"cke_{dir}" style\x3d"margin:0;padding:0" onload\x3d"{onload}"\x3e\x3c/body\x3e\x3c/html\x3e');
        CKEDITOR.ui.panel.prototype = {
            render: function (a, b) {
                var e = { editorId: a.id, id: this.id, langCode: a.langCode, dir: a.lang.dir, cls: this.className, frame: "", env: CKEDITOR.env.cssClass, "z-index": a.config.baseFloatZIndex + 1 }; this.getHolderElement = function () {
                    var a = this._.holder; if (!a) {
                        if (this.isFramed) {
                            var a = this.document.getById(this.id + "_frame"), b = a.getParent(), a = a.getFrameDocument(); CKEDITOR.env.iOS && b.setStyles({ overflow: "scroll", "-webkit-overflow-scrolling": "touch" }); b = CKEDITOR.tools.addFunction(CKEDITOR.tools.bind(function () {
                                this.isLoaded =
                                !0; if (this.onLoad) this.onLoad()
                            }, this)); a.write(k.output(CKEDITOR.tools.extend({ css: CKEDITOR.tools.buildStyleHtml(this.css), onload: "window.parent.CKEDITOR.tools.callFunction(" + b + ");" }, e))); a.getWindow().$.CKEDITOR = CKEDITOR; a.on("keydown", function (a) {
                                var b = a.data.getKeystroke(), c = this.document.getById(this.id).getAttribute("dir"); if ("input" !== a.data.getTarget().getName() || 37 !== b && 39 !== b) this._.onKeyDown && !1 === this._.onKeyDown(b) ? "input" === a.data.getTarget().getName() && 32 === b || a.data.preventDefault() :
                                    (27 == b || b == ("rtl" == c ? 39 : 37)) && this.onEscape && !1 === this.onEscape(b) && a.data.preventDefault()
                            }, this); a = a.getBody(); a.unselectable(); CKEDITOR.env.air && CKEDITOR.tools.callFunction(b)
                        } else a = this.document.getById(this.id); this._.holder = a
                    } return a
                }; if (this.isFramed) {
                    var d = CKEDITOR.env.air ? "javascript:void(0)" : CKEDITOR.env.ie && !CKEDITOR.env.edge ? "javascript:void(function(){" + encodeURIComponent("document.open();(" + CKEDITOR.tools.fixDomain + ")();document.close();") + "}())" : ""; e.frame = h.output({
                        id: this.id + "_frame",
                        src: d
                    })
                } d = g.output(e); b && b.push(d); return d
            }, addBlock: function (a, b) { b = this._.blocks[a] = b instanceof CKEDITOR.ui.panel.block ? b : new CKEDITOR.ui.panel.block(this.getHolderElement(), b); this._.currentBlock || this.showBlock(a); return b }, getBlock: function (a) { return this._.blocks[a] }, showBlock: function (a) {
                a = this._.blocks[a]; var b = this._.currentBlock, e = !this.forceIFrame || CKEDITOR.env.ie ? this._.holder : this.document.getById(this.id + "_frame"); b && b.hide(); this._.currentBlock = a; CKEDITOR.fire("ariaWidget", e); a._.focusIndex =
                    -1; this._.onKeyDown = a.onKeyDown && CKEDITOR.tools.bind(a.onKeyDown, a); a.show(); return a
            }, destroy: function () { this.element && this.element.remove() }
        }; CKEDITOR.ui.panel.block = CKEDITOR.tools.createClass({
            $: function (a, b) {
                this.element = a.append(a.getDocument().createElement("div", { attributes: { tabindex: -1, "class": "cke_panel_block" }, styles: { display: "none" } })); b && CKEDITOR.tools.extend(this, b); this.element.setAttributes({
                    role: this.attributes.role || "presentation", "aria-label": this.attributes["aria-label"], title: this.attributes.title ||
                        this.attributes["aria-label"]
                }); this.keys = {}; this._.focusIndex = -1; this.element.disableContextMenu()
            }, _: {
                markItem: function (a) { -1 != a && (a = this._.getItems().getItem(this._.focusIndex = a), CKEDITOR.env.webkit && a.getDocument().getWindow().focus(), a.focus(), this.onMark && this.onMark(a)) }, markFirstDisplayed: function (a) {
                    for (var b = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && "none" == a.getStyle("display") }, e = this._.getItems(), d, c, f = e.count() - 1; 0 <= f; f--)if (d = e.getItem(f), d.getAscendant(b) || (c = d, this._.focusIndex =
                        f), "true" == d.getAttribute("aria-selected")) { c = d; this._.focusIndex = f; break } c && (a && a(), CKEDITOR.env.webkit && c.getDocument().getWindow().focus(), c.focus(), this.onMark && this.onMark(c))
                }, getItems: function () { return this.element.find("a,input") }
            }, proto: {
                show: function () { this.element.setStyle("display", "") }, hide: function () { this.onHide && !0 === this.onHide.call(this) || this.element.setStyle("display", "none") }, onKeyDown: function (a, b) {
                    var e = this.keys[a]; switch (e) {
                        case "next": for (var d = this._.focusIndex, e = this._.getItems(),
                            c; c = e.getItem(++d);)if (c.getAttribute("_cke_focus") && c.$.offsetWidth) { this._.focusIndex = d; c.focus(!0); break } return c || b ? !1 : (this._.focusIndex = -1, this.onKeyDown(a, 1)); case "prev": d = this._.focusIndex; for (e = this._.getItems(); 0 < d && (c = e.getItem(--d));) { if (c.getAttribute("_cke_focus") && c.$.offsetWidth) { this._.focusIndex = d; c.focus(!0); break } c = null } return c || b ? !1 : (this._.focusIndex = e.count(), this.onKeyDown(a, 1)); case "click": case "mouseup": return d = this._.focusIndex, (c = 0 <= d && this._.getItems().getItem(d)) &&
                                c.fireEventHandler(e, { button: CKEDITOR.tools.normalizeMouseButton(CKEDITOR.MOUSE_BUTTON_LEFT, !0) }), !1
                    }return !0
                }
            }
        })
    })(); CKEDITOR.plugins.add("floatpanel", { requires: "panel" });
    (function () {
        function v(a, b, c, m, h) { h = CKEDITOR.tools.genKey(b.getUniqueId(), c.getUniqueId(), a.lang.dir, a.uiColor || "", m.css || "", h || ""); var g = f[h]; g || (g = f[h] = new CKEDITOR.ui.panel(b, m), g.element = c.append(CKEDITOR.dom.element.createFromHtml(g.render(a), b)), g.element.setStyles({ display: "none", position: "absolute" })); return g } var f = {}; CKEDITOR.ui.floatPanel = CKEDITOR.tools.createClass({
            $: function (a, b, c, m) {
                function h() { e.hide() } c.forceIFrame = 1; c.toolbarRelated && a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE &&
                    (b = CKEDITOR.document.getById("cke_" + a.name)); var g = b.getDocument(); m = v(a, g, b, c, m || 0); var n = m.element, l = n.getFirst(), e = this; n.disableContextMenu(); this.element = n; this._ = { editor: a, panel: m, parentElement: b, definition: c, document: g, iframe: l, children: [], dir: a.lang.dir, showBlockParams: null, markFirst: void 0 !== c.markFirst ? c.markFirst : !0 }; a.on("mode", h); a.on("resize", h); g.getWindow().on("resize", function () { this.reposition() }, this)
            }, proto: {
                addBlock: function (a, b) { return this._.panel.addBlock(a, b) }, addListBlock: function (a,
                    b) { return this._.panel.addListBlock(a, b) }, getBlock: function (a) { return this._.panel.getBlock(a) }, showBlock: function (a, b, c, m, h, g) {
                        var n = this._.panel, l = n.showBlock(a); this._.showBlockParams = [].slice.call(arguments); this.allowBlur(!1); var e = this._.editor.editable(); this._.returnFocus = e.hasFocus ? e : new CKEDITOR.dom.element(CKEDITOR.document.$.activeElement); this._.hideTimeout = 0; var k = this.element, e = this._.iframe, e = CKEDITOR.env.ie && !CKEDITOR.env.edge ? e : new CKEDITOR.dom.window(e.$.contentWindow), f = k.getDocument(),
                            r = this._.parentElement.getPositionedAncestor(), t = b.getDocumentPosition(f), f = r ? r.getDocumentPosition(f) : { x: 0, y: 0 }, q = "rtl" == this._.dir, d = t.x + (m || 0) - f.x, p = t.y + (h || 0) - f.y; !q || 1 != c && 4 != c ? q || 2 != c && 3 != c || (d += b.$.offsetWidth - 1) : d += b.$.offsetWidth; if (3 == c || 4 == c) p += b.$.offsetHeight - 1; this._.panel._.offsetParentId = b.getId(); k.setStyles({ top: p + "px", left: 0, display: "" }); k.setOpacity(0); k.getFirst().removeStyle("width"); this._.editor.focusManager.add(e); this._.blurSet || (CKEDITOR.event.useCapture = !0, e.on("blur",
                                function (a) { function u() { delete this._.returnFocus; this.hide() } this.allowBlur() && a.data.getPhase() == CKEDITOR.EVENT_PHASE_AT_TARGET && this.visible && !this._.activeChild && (CKEDITOR.env.iOS ? this._.hideTimeout || (this._.hideTimeout = CKEDITOR.tools.setTimeout(u, 0, this)) : u.call(this)) }, this), e.on("focus", function () { this._.focused = !0; this.hideChild(); this.allowBlur(!0) }, this), CKEDITOR.env.iOS && (e.on("touchstart", function () { clearTimeout(this._.hideTimeout) }, this), e.on("touchend", function () {
                                    this._.hideTimeout =
                                    0; this.focus()
                                }, this)), CKEDITOR.event.useCapture = !1, this._.blurSet = 1); n.onEscape = CKEDITOR.tools.bind(function (a) { if (this.onEscape && !1 === this.onEscape(a)) return !1 }, this); CKEDITOR.tools.setTimeout(function () {
                                    var a = CKEDITOR.tools.bind(function () {
                                        var a = k; a.removeStyle("width"); if (l.autoSize) {
                                            var b = l.element.getDocument(), b = (CKEDITOR.env.webkit || CKEDITOR.env.edge ? l.element : b.getBody()).$.scrollWidth; CKEDITOR.env.ie && CKEDITOR.env.quirks && 0 < b && (b += (a.$.offsetWidth || 0) - (a.$.clientWidth || 0) + 3); a.setStyle("width",
                                                b + 10 + "px"); b = l.element.$.scrollHeight; CKEDITOR.env.ie && CKEDITOR.env.quirks && 0 < b && (b += (a.$.offsetHeight || 0) - (a.$.clientHeight || 0) + 3); a.setStyle("height", b + "px"); n._.currentBlock.element.setStyle("display", "none").removeStyle("display")
                                        } else a.removeStyle("height"); q && (d -= k.$.offsetWidth); k.setStyle("left", d + "px"); var b = n.element.getWindow(), a = k.$.getBoundingClientRect(), b = b.getViewPaneSize(), c = a.width || a.right - a.left, e = a.height || a.bottom - a.top, m = q ? a.right : b.width - a.left, h = q ? b.width - a.right : a.left;
                                        q ? m < c && (d = h > c ? d + c : b.width > c ? d - a.left : d - a.right + b.width) : m < c && (d = h > c ? d - c : b.width > c ? d - a.right + b.width : d - a.left); c = a.top; b.height - a.top < e && (p = c > e ? p - e : b.height > e ? p - a.bottom + b.height : p - a.top); CKEDITOR.env.ie && !CKEDITOR.env.edge && ((b = a = k.$.offsetParent && new CKEDITOR.dom.element(k.$.offsetParent)) && "html" == b.getName() && (b = b.getDocument().getBody()), b && "rtl" == b.getComputedStyle("direction") && (d = CKEDITOR.env.ie8Compat ? d - 2 * k.getDocument().getDocumentElement().$.scrollLeft : d - (a.$.scrollWidth - a.$.clientWidth)));
                                        var a = k.getFirst(), f; (f = a.getCustomData("activePanel")) && f.onHide && f.onHide.call(this, 1); a.setCustomData("activePanel", this); k.setStyles({ top: p + "px", left: d + "px" }); k.setOpacity(1); g && g()
                                    }, this); n.isLoaded ? a() : n.onLoad = a; CKEDITOR.tools.setTimeout(function () {
                                        var a = CKEDITOR.env.webkit && CKEDITOR.document.getWindow().getScrollPosition().y; this.focus(); l.element.focus(); CKEDITOR.env.webkit && (CKEDITOR.document.getBody().$.scrollTop = a); this.allowBlur(!0); this._.markFirst && (CKEDITOR.env.ie ? CKEDITOR.tools.setTimeout(function () {
                                            l.markFirstDisplayed ?
                                            l.markFirstDisplayed() : l._.markFirstDisplayed()
                                        }, 0) : l.markFirstDisplayed ? l.markFirstDisplayed() : l._.markFirstDisplayed()); this._.editor.fire("panelShow", this)
                                    }, 0, this)
                                }, CKEDITOR.env.air ? 200 : 0, this); this.visible = 1; this.onShow && this.onShow.call(this)
                    }, reposition: function () { var a = this._.showBlockParams; this.visible && this._.showBlockParams && (this.hide(), this.showBlock.apply(this, a)) }, focus: function () {
                        if (CKEDITOR.env.webkit) { var a = CKEDITOR.document.getActive(); a && !a.equals(this._.iframe) && a.$.blur() } (this._.lastFocused ||
                            this._.iframe.getFrameDocument().getWindow()).focus()
                    }, blur: function () { var a = this._.iframe.getFrameDocument().getActive(); a && a.is("a") && (this._.lastFocused = a) }, hide: function (a) {
                        if (this.visible && (!this.onHide || !0 !== this.onHide.call(this))) {
                            this.hideChild(); CKEDITOR.env.gecko && this._.iframe.getFrameDocument().$.activeElement.blur(); this.element.setStyle("display", "none"); this.visible = 0; this.element.getFirst().removeCustomData("activePanel"); if (a = a && this._.returnFocus) CKEDITOR.env.webkit && a.type && a.getWindow().$.focus(),
                                a.focus(); delete this._.lastFocused; this._.showBlockParams = null; this._.editor.fire("panelHide", this)
                        }
                    }, allowBlur: function (a) { var b = this._.panel; void 0 !== a && (b.allowBlur = a); return b.allowBlur }, showAsChild: function (a, b, c, f, h, g) {
                        if (this._.activeChild != a || a._.panel._.offsetParentId != c.getId()) this.hideChild(), a.onHide = CKEDITOR.tools.bind(function () { CKEDITOR.tools.setTimeout(function () { this._.focused || this.hide() }, 0, this) }, this), this._.activeChild = a, this._.focused = !1, a.showBlock(b, c, f, h, g), this.blur(),
                            (CKEDITOR.env.ie7Compat || CKEDITOR.env.ie6Compat) && setTimeout(function () { a.element.getChild(0).$.style.cssText += "" }, 100)
                    }, hideChild: function (a) { var b = this._.activeChild; b && (delete b.onHide, delete this._.activeChild, b.hide(), a && this.focus()) }
            }
        }); CKEDITOR.on("instanceDestroyed", function () { var a = CKEDITOR.tools.isEmpty(CKEDITOR.instances), b; for (b in f) { var c = f[b]; a ? c.destroy() : c.element.hide() } a && (f = {}) })
    })(); CKEDITOR.plugins.add("menu", { requires: "floatpanel", beforeInit: function (m) { for (var k = m.config.menu_groups.split(","), n = m._.menuGroups = {}, r = m._.menuItems = {}, p = 0; p < k.length; p++)n[k[p]] = p + 1; m.addMenuGroup = function (c, a) { n[c] = a || 100 }; m.addMenuItem = function (c, a) { n[a.group] && (r[c] = new CKEDITOR.menuItem(this, c, a)) }; m.addMenuItems = function (c) { for (var a in c) this.addMenuItem(a, c[a]) }; m.getMenuItem = function (c) { return r[c] }; m.removeMenuItem = function (c) { delete r[c] } } });
    (function () {
        function m(a) { a.sort(function (a, f) { return a.group < f.group ? -1 : a.group > f.group ? 1 : a.order < f.order ? -1 : a.order > f.order ? 1 : 0 }) } var k = '\x3cspan class\x3d"cke_menuitem"\x3e\x3ca id\x3d"{id}" class\x3d"cke_menubutton cke_menubutton__{name} cke_menubutton_{state} {cls}" href\x3d"{href}" title\x3d"{title}" tabindex\x3d"-1" _cke_focus\x3d1 hidefocus\x3d"true" role\x3d"{role}" aria-label\x3d"{attrLabel}" aria-describedby\x3d"{id}_description" aria-haspopup\x3d"{hasPopup}" aria-disabled\x3d"{disabled}" {ariaChecked} draggable\x3d"false"',
            n = ""; CKEDITOR.env.gecko && CKEDITOR.env.mac && (k += ' onkeypress\x3d"return false;"'); CKEDITOR.env.gecko && (k += ' onblur\x3d"this.style.cssText \x3d this.style.cssText;" ondragstart\x3d"return false;"'); CKEDITOR.env.ie && (n = 'return false;" onmouseup\x3d"CKEDITOR.tools.getMouseButton(event)\x3d\x3d\x3dCKEDITOR.MOUSE_BUTTON_LEFT\x26\x26'); var k = k + (' onmouseover\x3d"CKEDITOR.tools.callFunction({hoverFn},{index});" onmouseout\x3d"CKEDITOR.tools.callFunction({moveOutFn},{index});" onclick\x3d"' + n + 'CKEDITOR.tools.callFunction({clickFn},{index}); return false;"\x3e') +
                '\x3cspan class\x3d"cke_menubutton_inner"\x3e\x3cspan class\x3d"cke_menubutton_icon"\x3e\x3cspan class\x3d"cke_button_icon cke_button__{iconName}_icon" style\x3d"{iconStyle}"\x3e\x3c/span\x3e\x3c/span\x3e\x3cspan class\x3d"cke_menubutton_label"\x3e{label}\x3c/span\x3e{shortcutHtml}{arrowHtml}\x3c/span\x3e\x3c/a\x3e\x3cspan id\x3d"{id}_description" class\x3d"cke_voice_label" aria-hidden\x3d"false"\x3e{ariaShortcut}\x3c/span\x3e\x3c/span\x3e', r = CKEDITOR.addTemplate("menuItem", k), p = CKEDITOR.addTemplate("menuArrow",
                    '\x3cspan class\x3d"cke_menuarrow"\x3e\x3cspan\x3e{label}\x3c/span\x3e\x3c/span\x3e'), c = CKEDITOR.addTemplate("menuShortcut", '\x3cspan class\x3d"cke_menubutton_label cke_menubutton_shortcut"\x3e{shortcut}\x3c/span\x3e'); CKEDITOR.menu = CKEDITOR.tools.createClass({
                        $: function (a, b) {
                            b = this._.definition = b || {}; this.id = CKEDITOR.tools.getNextId(); this.editor = a; this.items = []; this._.listeners = []; this._.level = b.level || 1; var f = CKEDITOR.tools.extend({}, b.panel, {
                                css: [CKEDITOR.skin.getPath("editor")], level: this._.level -
                                    1, block: {}
                            }), c = f.block.attributes = f.attributes || {}; !c.role && (c.role = "menu"); this._.panelDefinition = f
                        }, _: {
                            onShow: function () { var a = this.editor.getSelection(), b = a && a.getStartElement(), f = this.editor.elementPath(), c = this._.listeners; this.removeAll(); for (var h = 0; h < c.length; h++) { var l = c[h](b, a, f); if (l) for (var g in l) { var e = this.editor.getMenuItem(g); !e || e.command && !this.editor.getCommand(e.command).state || (e.state = l[g], this.add(e)) } } }, onClick: function (a) {
                                this.hide(); if (a.onClick) a.onClick(); else a.command &&
                                    this.editor.execCommand(a.command)
                            }, onEscape: function (a) { var b = this.parent; b ? b._.panel.hideChild(1) : 27 == a && this.hide(1); return !1 }, onHide: function () { this.onHide && this.onHide() }, showSubMenu: function (a) {
                                var b = this._.subMenu, f = this.items[a]; if (f = f.getItems && f.getItems()) {
                                    b ? b.removeAll() : (b = this._.subMenu = new CKEDITOR.menu(this.editor, CKEDITOR.tools.extend({}, this._.definition, { level: this._.level + 1 }, !0)), b.parent = this, b._.onClick = CKEDITOR.tools.bind(this._.onClick, this)); for (var c in f) {
                                        var h = this.editor.getMenuItem(c);
                                        h && (h.state = f[c], b.add(h))
                                    } var l = this._.panel.getBlock(this.id).element.getDocument().getById(this.id + String(a)); setTimeout(function () { b.show(l, 2) }, 0)
                                } else this._.panel.hideChild(1)
                            }
                        }, proto: {
                            add: function (a) { a.order || (a.order = this.items.length); this.items.push(a) }, removeAll: function () { this.items = [] }, show: function (a, b, f, c) {
                                if (!this.parent && (this._.onShow(), !this.items.length)) return; b = b || ("rtl" == this.editor.lang.dir ? 2 : 1); var h = this.items, l = this.editor, g = this._.panel, e = this._.element; if (!g) {
                                    g = this._.panel =
                                    new CKEDITOR.ui.floatPanel(this.editor, CKEDITOR.document.getBody(), this._.panelDefinition, this._.level); g.onEscape = CKEDITOR.tools.bind(function (a) { if (!1 === this._.onEscape(a)) return !1 }, this); g.onShow = function () { g._.panel.getHolderElement().getParent().addClass("cke").addClass("cke_reset_all") }; g.onHide = CKEDITOR.tools.bind(function () { this._.onHide && this._.onHide() }, this); e = g.addBlock(this.id, this._.panelDefinition.block); e.autoSize = !0; var d = e.keys; d[40] = "next"; d[9] = "next"; d[38] = "prev"; d[CKEDITOR.SHIFT +
                                        9] = "prev"; d["rtl" == l.lang.dir ? 37 : 39] = CKEDITOR.env.ie ? "mouseup" : "click"; d[32] = CKEDITOR.env.ie ? "mouseup" : "click"; CKEDITOR.env.ie && (d[13] = "mouseup"); e = this._.element = e.element; d = e.getDocument(); d.getBody().setStyle("overflow", "hidden"); d.getElementsByTag("html").getItem(0).setStyle("overflow", "hidden"); this._.itemOverFn = CKEDITOR.tools.addFunction(function (a) { clearTimeout(this._.showSubTimeout); this._.showSubTimeout = CKEDITOR.tools.setTimeout(this._.showSubMenu, l.config.menu_subMenuDelay || 400, this, [a]) },
                                            this); this._.itemOutFn = CKEDITOR.tools.addFunction(function () { clearTimeout(this._.showSubTimeout) }, this); this._.itemClickFn = CKEDITOR.tools.addFunction(function (a) { var b = this.items[a]; if (b.state == CKEDITOR.TRISTATE_DISABLED) this.hide(1); else if (b.getItems) this._.showSubMenu(a); else this._.onClick(b) }, this)
                                } m(h); for (var d = l.elementPath(), d = ['\x3cdiv class\x3d"cke_menu' + (d && d.direction() != l.lang.dir ? " cke_mixed_dir_content" : "") + '" role\x3d"presentation"\x3e'], k = h.length, n = k && h[0].group, p = 0; p < k; p++) {
                                    var q =
                                        h[p]; n != q.group && (d.push('\x3cdiv class\x3d"cke_menuseparator" role\x3d"separator"\x3e\x3c/div\x3e'), n = q.group); q.render(this, p, d)
                                } d.push("\x3c/div\x3e"); e.setHtml(d.join("")); CKEDITOR.ui.fire("ready", this); this.parent ? this.parent._.panel.showAsChild(g, this.id, a, b, f, c) : g.showBlock(this.id, a, b, f, c); l.fire("menuShow", [g])
                            }, addListener: function (a) { this._.listeners.push(a) }, hide: function (a) { this._.onHide && this._.onHide(); this._.panel && this._.panel.hide(a) }, findItemByCommandName: function (a) {
                                var b = CKEDITOR.tools.array.filter(this.items,
                                    function (b) { return a === b.command }); return b.length ? (b = b[0], { item: b, element: this._.element.findOne("." + b.className) }) : null
                            }
                        }
                    }); CKEDITOR.menuItem = CKEDITOR.tools.createClass({
                        $: function (a, b, c) { CKEDITOR.tools.extend(this, c, { order: 0, className: "cke_menubutton__" + b }); this.group = a._.menuGroups[this.group]; this.editor = a; this.name = b }, proto: {
                            render: function (a, b, f) {
                                var k = a.id + String(b), h = "undefined" == typeof this.state ? CKEDITOR.TRISTATE_OFF : this.state, l = "", g = this.editor, e, d, m = h == CKEDITOR.TRISTATE_ON ? "on" : h == CKEDITOR.TRISTATE_DISABLED ?
                                    "disabled" : "off"; this.role in { menuitemcheckbox: 1, menuitemradio: 1 } && (l = ' aria-checked\x3d"' + (h == CKEDITOR.TRISTATE_ON ? "true" : "false") + '"'); var n = this.getItems, t = "\x26#" + ("rtl" == this.editor.lang.dir ? "9668" : "9658") + ";", q = this.name; this.icon && !/\./.test(this.icon) && (q = this.icon); this.command && (e = g.getCommand(this.command), (e = g.getCommandKeystroke(e)) && (d = CKEDITOR.tools.keystrokeToString(g.lang.common.keyboard, e))); e = CKEDITOR.tools.htmlEncodeAttr(this.label); a = {
                                        id: k, name: this.name, iconName: q, label: this.label,
                                        attrLabel: e, cls: this.className || "", state: m, hasPopup: n ? "true" : "false", disabled: h == CKEDITOR.TRISTATE_DISABLED, title: e + (d ? " (" + d.display + ")" : ""), ariaShortcut: d ? g.lang.common.keyboardShortcut + " " + d.aria : "", href: "javascript:void('" + (e || "").replace("'") + "')", hoverFn: a._.itemOverFn, moveOutFn: a._.itemOutFn, clickFn: a._.itemClickFn, index: b, iconStyle: CKEDITOR.skin.getIconStyle(q, "rtl" == this.editor.lang.dir, q == this.icon ? null : this.icon, this.iconOffset), shortcutHtml: d ? c.output({ shortcut: d.display }) : "", arrowHtml: n ?
                                            p.output({ label: t }) : "", role: this.role ? this.role : "menuitem", ariaChecked: l
                                    }; r.output(a, f)
                            }
                        }
                    })
    })(); CKEDITOR.config.menu_groups = "clipboard,form,tablecell,tablecellproperties,tablerow,tablecolumn,table,anchor,link,image,checkbox,radio,textfield,hiddenfield,imagebutton,button,select,textarea,div"; CKEDITOR.plugins.add("contextmenu", {
        requires: "menu", onLoad: function () {
            CKEDITOR.plugins.contextMenu = CKEDITOR.tools.createClass({
                base: CKEDITOR.menu, $: function (a) { this.base.call(this, a, { panel: { css: a.config.contextmenu_contentsCss, className: "cke_menu_panel", attributes: { "aria-label": a.lang.contextmenu.options } } }) }, proto: {
                    addTarget: function (a, f) {
                        function c() { e = !1 } var d, e; a.on("contextmenu", function (a) {
                            a = a.data; var b = CKEDITOR.env.webkit ? d : CKEDITOR.env.mac ? a.$.metaKey : a.$.ctrlKey; if (!f || !b) if (a.preventDefault(),
                                !e) {
                                    if (CKEDITOR.env.mac && CKEDITOR.env.webkit) { var b = this.editor, c = (new CKEDITOR.dom.elementPath(a.getTarget(), b.editable())).contains(function (a) { return a.hasAttribute("contenteditable") }, !0); c && "false" == c.getAttribute("contenteditable") && b.getSelection().fake(c) } var c = a.getTarget().getDocument(), g = a.getTarget().getDocument().getDocumentElement(), b = !c.equals(CKEDITOR.document), c = c.getWindow().getScrollPosition(), h = b ? a.$.clientX : a.$.pageX || c.x + a.$.clientX, k = b ? a.$.clientY : a.$.pageY || c.y + a.$.clientY;
                                CKEDITOR.tools.setTimeout(function () { this.open(g, null, h, k) }, CKEDITOR.env.ie ? 200 : 0, this)
                            }
                        }, this); if (CKEDITOR.env.webkit) { var b = function () { d = 0 }; a.on("keydown", function (a) { d = CKEDITOR.env.mac ? a.data.$.metaKey : a.data.$.ctrlKey }); a.on("keyup", b); a.on("contextmenu", b) } CKEDITOR.env.gecko && !CKEDITOR.env.mac && (a.on("keydown", function (a) { a.data.$.shiftKey && 121 === a.data.$.keyCode && (e = !0) }, null, null, 0), a.on("keyup", c), a.on("contextmenu", c))
                    }, open: function (a, f, c, d) {
                        !1 !== this.editor.config.enableContextMenu && this.editor.getSelection().getType() !==
                            CKEDITOR.SELECTION_NONE && (this.editor.focus(), a = a || CKEDITOR.document.getDocumentElement(), this.editor.selectionChange(1), this.show(a, f, c, d))
                    }
                }
            })
        }, beforeInit: function (a) {
            var f = a.contextMenu = new CKEDITOR.plugins.contextMenu(a); a.on("contentDom", function () { f.addTarget(a.editable(), !1 !== a.config.browserContextMenuOnCtrl) }); a.addCommand("contextMenu", {
                exec: function (a) {
                    var d = 0, e = 0, b = a.getSelection().getRanges(), b = b[b.length - 1].getClientRects(a.editable().isInline()); if (b = b[b.length - 1]) d = b["rtl" === a.lang.dir ?
                        "left" : "right"], e = b.bottom; a.contextMenu.open(a.document.getBody().getParent(), null, d, e)
                }
            }); a.setKeystroke(CKEDITOR.SHIFT + 121, "contextMenu"); a.setKeystroke(CKEDITOR.CTRL + CKEDITOR.SHIFT + 121, "contextMenu")
        }
    }); CKEDITOR.plugins.add("resize", {
        init: function (b) {
            function f(d) { var e = c.width, m = c.height, f = e + (d.data.$.screenX - n.x) * ("rtl" == g ? -1 : 1); d = m + (d.data.$.screenY - n.y); h && (e = Math.max(a.resize_minWidth, Math.min(f, a.resize_maxWidth))); p && (m = Math.max(a.resize_minHeight, Math.min(d, a.resize_maxHeight))); b.resize(h ? e : null, m) } function k() {
                CKEDITOR.document.removeListener("mousemove", f); CKEDITOR.document.removeListener("mouseup", k); b.document && (b.document.removeListener("mousemove", f), b.document.removeListener("mouseup",
                    k))
            } var a = b.config, r = b.ui.spaceId("resizer"), g = b.element ? b.element.getDirection(1) : "ltr"; !a.resize_dir && (a.resize_dir = "vertical"); void 0 === a.resize_maxWidth && (a.resize_maxWidth = 3E3); void 0 === a.resize_maxHeight && (a.resize_maxHeight = 3E3); void 0 === a.resize_minWidth && (a.resize_minWidth = 750); void 0 === a.resize_minHeight && (a.resize_minHeight = 250); if (!1 !== a.resize_enabled) {
                var l = null, n, c, h = ("both" == a.resize_dir || "horizontal" == a.resize_dir) && a.resize_minWidth != a.resize_maxWidth, p = ("both" == a.resize_dir || "vertical" ==
                    a.resize_dir) && a.resize_minHeight != a.resize_maxHeight, q = CKEDITOR.tools.addFunction(function (d) { l || (l = b.getResizable()); c = { width: l.$.offsetWidth || 0, height: l.$.offsetHeight || 0 }; n = { x: d.screenX, y: d.screenY }; a.resize_minWidth > c.width && (a.resize_minWidth = c.width); a.resize_minHeight > c.height && (a.resize_minHeight = c.height); CKEDITOR.document.on("mousemove", f); CKEDITOR.document.on("mouseup", k); b.document && (b.document.on("mousemove", f), b.document.on("mouseup", k)); d.preventDefault && d.preventDefault() }); b.on("destroy",
                        function () { CKEDITOR.tools.removeFunction(q) }); b.on("uiSpace", function (a) { if ("bottom" == a.data.space) { var e = ""; h && !p && (e = " cke_resizer_horizontal"); !h && p && (e = " cke_resizer_vertical"); var c = '\x3cspan id\x3d"' + r + '" class\x3d"cke_resizer' + e + " cke_resizer_" + g + '" title\x3d"' + CKEDITOR.tools.htmlEncode(b.lang.common.resize) + '" onmousedown\x3d"CKEDITOR.tools.callFunction(' + q + ', event)"\x3e' + ("ltr" == g ? "◢" : "◣") + "\x3c/span\x3e"; "ltr" == g && "ltr" == e ? a.data.html += c : a.data.html = c + a.data.html } }, b, null, 100); b.on("maximize",
                            function (a) { b.ui.space("resizer")[a.data == CKEDITOR.TRISTATE_ON ? "hide" : "show"]() })
            }
        }
    }); (function () {
        function q(a, c) {
            function k(b) { b = h.list[b]; var e; b.equals(a.editable()) || "true" == b.getAttribute("contenteditable") ? (e = a.createRange(), e.selectNodeContents(b), e = e.select()) : (e = a.getSelection(), e.selectElement(b)); CKEDITOR.env.ie && a.fire("selectionChange", { selection: e, path: new CKEDITOR.dom.elementPath(b) }); a.focus() } function l() { m && m.setHtml('\x3cspan class\x3d"cke_path_empty"\x3e\x26nbsp;\x3c/span\x3e'); delete h.list } var n = a.ui.spaceId("path"), m, h = a._.elementsPath, q = h.idBase; c.html += '\x3cspan id\x3d"' +
                n + '_label" class\x3d"cke_voice_label"\x3e' + a.lang.elementspath.eleLabel + '\x3c/span\x3e\x3cspan id\x3d"' + n + '" class\x3d"cke_path" role\x3d"group" aria-labelledby\x3d"' + n + '_label"\x3e\x3cspan class\x3d"cke_path_empty"\x3e\x26nbsp;\x3c/span\x3e\x3c/span\x3e'; a.on("uiReady", function () { var b = a.ui.space("path"); b && a.focusManager.add(b, 1) }); h.onClick = k; var v = CKEDITOR.tools.addFunction(k), w = CKEDITOR.tools.addFunction(function (b, e) {
                    var g = h.idBase, d; e = new CKEDITOR.dom.event(e); d = "rtl" == a.lang.dir; switch (e.getKeystroke()) {
                        case d ?
                            39 : 37: case 9: return (d = CKEDITOR.document.getById(g + (b + 1))) || (d = CKEDITOR.document.getById(g + "0")), d.focus(), !1; case d ? 37 : 39: case CKEDITOR.SHIFT + 9: return (d = CKEDITOR.document.getById(g + (b - 1))) || (d = CKEDITOR.document.getById(g + (h.list.length - 1))), d.focus(), !1; case 27: return a.focus(), !1; case 13: case 32: return k(b), !1; case CKEDITOR.ALT + 121: return a.execCommand("toolbarFocus"), !1
                    }return !0
                }); a.on("selectionChange", function (b) {
                    for (var e = [], g = h.list = [], d = [], c = h.filters, p = !0, k = b.data.path.elements, u = k.length; u--;) {
                        var f =
                            k[u], r = 0; b = f.data("cke-display-name") ? f.data("cke-display-name") : f.data("cke-real-element-type") ? f.data("cke-real-element-type") : f.getName(); (p = f.hasAttribute("contenteditable") ? "true" == f.getAttribute("contenteditable") : p) || f.hasAttribute("contenteditable") || (r = 1); for (var t = 0; t < c.length; t++) { var l = c[t](f, b); if (!1 === l) { r = 1; break } b = l || b } r || (g.unshift(f), d.unshift(b))
                    } g = g.length; for (c = 0; c < g; c++)b = d[c], p = a.lang.elementspath.eleTitle.replace(/%1/, b), b = x.output({
                        id: q + c, label: p, text: b, jsTitle: "javascript:void('" +
                            b + "')", index: c, keyDownFn: w, clickFn: v
                    }), e.unshift(b); m || (m = CKEDITOR.document.getById(n)); d = m; d.setHtml(e.join("") + '\x3cspan class\x3d"cke_path_empty"\x3e\x26nbsp;\x3c/span\x3e'); a.fire("elementsPathUpdate", { space: d })
                }); a.on("readOnly", l); a.on("contentDomUnload", l); a.addCommand("elementsPathFocus", y.toolbarFocus); a.setKeystroke(CKEDITOR.ALT + 122, "elementsPathFocus")
        } var y = {
            toolbarFocus: {
                editorFocus: !1, readOnly: 1, exec: function (a) {
                    (a = CKEDITOR.document.getById(a._.elementsPath.idBase + "0")) && a.focus(CKEDITOR.env.ie ||
                        CKEDITOR.env.air)
                }
            }
        }, c = ""; CKEDITOR.env.gecko && CKEDITOR.env.mac && (c += ' onkeypress\x3d"return false;"'); CKEDITOR.env.gecko && (c += ' onblur\x3d"this.style.cssText \x3d this.style.cssText;"'); var x = CKEDITOR.addTemplate("pathItem", '\x3ca id\x3d"{id}" href\x3d"{jsTitle}" tabindex\x3d"-1" class\x3d"cke_path_item" title\x3d"{label}"' + c + ' hidefocus\x3d"true"  draggable\x3d"false"  ondragstart\x3d"return false;" onkeydown\x3d"return CKEDITOR.tools.callFunction({keyDownFn},{index}, event );" onclick\x3d"CKEDITOR.tools.callFunction({clickFn},{index}); return false;" role\x3d"button" aria-label\x3d"{label}"\x3e{text}\x3c/a\x3e');
        CKEDITOR.plugins.add("elementspath", { init: function (a) { a._.elementsPath = { idBase: "cke_elementspath_" + CKEDITOR.tools.getNextNumber() + "_", filters: [] }; a.on("uiSpace", function (c) { "bottom" == c.data.space && q(a, c.data) }) } })
    })(); (function () {
        function x(a, e, b) { b = a.config.forceEnterMode || b; if ("wysiwyg" == a.mode) { e || (e = a.activeEnterMode); var l = a.elementPath(); l && !l.isContextFor("p") && (e = CKEDITOR.ENTER_BR, b = 1); a.fire("saveSnapshot"); e == CKEDITOR.ENTER_BR ? u(a, e, null, b) : r(a, e, null, b); a.fire("saveSnapshot") } } function y(a) { a = a.getSelection().getRanges(!0); for (var e = a.length - 1; 0 < e; e--)a[e].deleteContents(); return a[0] } function z(a) {
            var e = a.startContainer.getAscendant(function (a) { return a.type == CKEDITOR.NODE_ELEMENT && "true" == a.getAttribute("contenteditable") },
                !0); if (a.root.equals(e)) return a; e = new CKEDITOR.dom.range(e); e.moveToRange(a); return e
        } CKEDITOR.plugins.add("enterkey", { init: function (a) { a.addCommand("enter", { modes: { wysiwyg: 1 }, editorFocus: !1, exec: function (a) { x(a) } }); a.addCommand("shiftEnter", { modes: { wysiwyg: 1 }, editorFocus: !1, exec: function (a) { x(a, a.activeShiftEnterMode, 1) } }); a.setKeystroke([[13, "enter"], [CKEDITOR.SHIFT + 13, "shiftEnter"]]) } }); var A = CKEDITOR.dom.walker.whitespaces(), B = CKEDITOR.dom.walker.bookmark(), v, u, r, w; CKEDITOR.plugins.enterkey =
        {
            enterBlock: function (a, e, b, l) {
                function n(a) { var b; if (a === CKEDITOR.ENTER_BR || -1 === CKEDITOR.tools.indexOf(["td", "th"], p.lastElement.getName()) || 1 !== p.lastElement.getChildCount()) return !1; a = p.lastElement.getChild(0).clone(!0); (b = a.getBogus()) && b.remove(); return a.getText().length ? !1 : !0 } if (b = b || y(a)) {
                    b = z(b); var g = b.document, f = b.checkStartOfBlock(), k = b.checkEndOfBlock(), p = a.elementPath(b.startContainer), c = p.block, m = e == CKEDITOR.ENTER_DIV ? "div" : "p", d; if (c && f && k) {
                        f = c.getParent(); if (f.is("li") && 1 < f.getChildCount()) {
                            g =
                            new CKEDITOR.dom.element("li"); d = a.createRange(); g.insertAfter(f); c.remove(); d.setStart(g, 0); a.getSelection().selectRanges([d]); return
                        } if (c.is("li") || c.getParent().is("li")) {
                            c.is("li") || (c = c.getParent(), f = c.getParent()); d = f.getParent(); b = !c.hasPrevious(); var h = !c.hasNext(); l = a.getSelection(); var m = l.createBookmarks(), t = c.getDirection(1), k = c.getAttribute("class"), q = c.getAttribute("style"), r = d.getDirection(1) != t; a = a.enterMode != CKEDITOR.ENTER_BR || r || q || k; if (d.is("li")) b || h ? (b && h && f.remove(), c[h ? "insertAfter" :
                                "insertBefore"](d)) : c.breakParent(d); else { if (a) if (p.block.is("li") ? (d = g.createElement(e == CKEDITOR.ENTER_P ? "p" : "div"), r && d.setAttribute("dir", t), q && d.setAttribute("style", q), k && d.setAttribute("class", k), c.moveChildren(d)) : d = p.block, b || h) d[b ? "insertBefore" : "insertAfter"](f); else c.breakParent(f), d.insertAfter(f); else if (c.appendBogus(!0), b || h) for (; g = c[b ? "getFirst" : "getLast"]();)g[b ? "insertBefore" : "insertAfter"](f); else for (c.breakParent(f); g = c.getLast();)g.insertAfter(f); c.remove() } l.selectBookmarks(m);
                            return
                        } if (c && c.getParent().is("blockquote")) { c.breakParent(c.getParent()); c.getPrevious().getFirst(CKEDITOR.dom.walker.invisible(1)) || c.getPrevious().remove(); c.getNext().getFirst(CKEDITOR.dom.walker.invisible(1)) || c.getNext().remove(); b.moveToElementEditStart(c); b.select(); return }
                    } else if (c && c.is("pre") && !k) { u(a, e, b, l); return } if (q = b.splitBlock(m)) {
                        a = q.previousBlock; c = q.nextBlock; f = q.wasStartOfBlock; k = q.wasEndOfBlock; c ? (h = c.getParent(), h.is("li") && (c.breakParent(h), c.move(c.getNext(), 1))) : a && (h = a.getParent()) &&
                            h.is("li") && (a.breakParent(h), h = a.getNext(), b.moveToElementEditStart(h), a.move(a.getPrevious())); if (f || k) if (n(e)) b.moveToElementEditStart(b.getTouchedStartNode()); else {
                                if (a) { if (a.is("li") || !w.test(a.getName()) && !a.is("pre")) d = a.clone() } else c && (d = c.clone()); d ? l && !d.is("li") && d.renameNode(m) : h && h.is("li") ? d = h : (d = g.createElement(m), a && (t = a.getDirection()) && d.setAttribute("dir", t)); if (g = q.elementPath) for (e = 0, l = g.elements.length; e < l; e++) {
                                    m = g.elements[e]; if (m.equals(g.block) || m.equals(g.blockLimit)) break;
                                    CKEDITOR.dtd.$removeEmpty[m.getName()] && (m = m.clone(), d.moveChildren(m), d.append(m))
                                } d.appendBogus(); d.getParent() || b.insertNode(d); d.is("li") && d.removeAttribute("value"); !CKEDITOR.env.ie || !f || k && a.getChildCount() || (b.moveToElementEditStart(k ? a : d), b.select()); b.moveToElementEditStart(f && !k ? c : d)
                            } else c.is("li") && (d = b.clone(), d.selectNodeContents(c), d = new CKEDITOR.dom.walker(d), d.evaluator = function (a) {
                                return !(B(a) || A(a) || a.type == CKEDITOR.NODE_ELEMENT && a.getName() in CKEDITOR.dtd.$inline && !(a.getName() in
                                    CKEDITOR.dtd.$empty))
                            }, (h = d.next()) && h.type == CKEDITOR.NODE_ELEMENT && h.is("ul", "ol") && (CKEDITOR.env.needsBrFiller ? g.createElement("br") : g.createText(" ")).insertBefore(h)), c && b.moveToElementEditStart(c); b.select(); b.scrollIntoView()
                    }
                }
            }, enterBr: function (a, e, b, l) {
                if (b = b || y(a)) {
                    var n = b.document, g = b.checkEndOfBlock(), f = new CKEDITOR.dom.elementPath(a.getSelection().getStartElement()), k = f.block, p = k && f.block.getName(); l || "li" != p ? (!l && g && w.test(p) ? (g = k.getDirection()) ? (n = n.createElement("div"), n.setAttribute("dir",
                        g), n.insertAfter(k), b.setStart(n, 0)) : (n.createElement("br").insertAfter(k), CKEDITOR.env.gecko && n.createText("").insertAfter(k), b.setStartAt(k.getNext(), CKEDITOR.env.ie ? CKEDITOR.POSITION_BEFORE_START : CKEDITOR.POSITION_AFTER_START)) : (a = "pre" == p && CKEDITOR.env.ie && 8 > CKEDITOR.env.version ? n.createText("\r") : n.createElement("br"), b.deleteContents(), b.insertNode(a), CKEDITOR.env.needsBrFiller ? (n.createText("﻿").insertAfter(a), g && (k || f.blockLimit).appendBogus(), a.getNext().$.nodeValue = "", b.setStartAt(a.getNext(),
                            CKEDITOR.POSITION_AFTER_START)) : b.setStartAt(a, CKEDITOR.POSITION_AFTER_END)), b.collapse(!0), b.select(), b.scrollIntoView()) : r(a, e, b, l)
                }
            }
        }; v = CKEDITOR.plugins.enterkey; u = v.enterBr; r = v.enterBlock; w = /^h[1-6]$/
    })(); (function () {
        function k(a, f) { var g = {}, c = [], e = { nbsp: " ", shy: "­", gt: "\x3e", lt: "\x3c", amp: "\x26", apos: "'", quot: '"' }; a = a.replace(/\b(nbsp|shy|gt|lt|amp|apos|quot)(?:,|$)/g, function (a, b) { var d = f ? "\x26" + b + ";" : e[b]; g[d] = f ? e[b] : "\x26" + b + ";"; c.push(d); return "" }); a = a.replace(/,$/, ""); if (!f && a) { a = a.split(","); var b = document.createElement("div"), d; b.innerHTML = "\x26" + a.join(";\x26") + ";"; d = b.innerHTML; b = null; for (b = 0; b < d.length; b++) { var h = d.charAt(b); g[h] = "\x26" + a[b] + ";"; c.push(h) } } g.regex = c.join(f ? "|" : ""); return g }
        CKEDITOR.plugins.add("entities", {
            afterInit: function (a) {
                function f(b) { return h[b] } function g(a) { return "force" != c.entities_processNumerical && b[a] ? b[a] : "\x26#" + (CKEDITOR.env.ie ? a.charCodeAt(0) : a.codePointAt(0)) + ";" } var c = a.config; if (a = (a = a.dataProcessor) && a.htmlFilter) {
                    var e = []; !1 !== c.basicEntities && e.push("nbsp,gt,lt,amp"); c.entities && (e.length && e.push("quot,iexcl,cent,pound,curren,yen,brvbar,sect,uml,copy,ordf,laquo,not,shy,reg,macr,deg,plusmn,sup2,sup3,acute,micro,para,middot,cedil,sup1,ordm,raquo,frac14,frac12,frac34,iquest,times,divide,fnof,bull,hellip,prime,Prime,oline,frasl,weierp,image,real,trade,alefsym,larr,uarr,rarr,darr,harr,crarr,lArr,uArr,rArr,dArr,hArr,forall,part,exist,empty,nabla,isin,notin,ni,prod,sum,minus,lowast,radic,prop,infin,ang,and,or,cap,cup,int,there4,sim,cong,asymp,ne,equiv,le,ge,sub,sup,nsub,sube,supe,oplus,otimes,perp,sdot,lceil,rceil,lfloor,rfloor,lang,rang,loz,spades,clubs,hearts,diams,circ,tilde,ensp,emsp,thinsp,zwnj,zwj,lrm,rlm,ndash,mdash,lsquo,rsquo,sbquo,ldquo,rdquo,bdquo,dagger,Dagger,permil,lsaquo,rsaquo,euro"),
                        c.entities_latin && e.push("Agrave,Aacute,Acirc,Atilde,Auml,Aring,AElig,Ccedil,Egrave,Eacute,Ecirc,Euml,Igrave,Iacute,Icirc,Iuml,ETH,Ntilde,Ograve,Oacute,Ocirc,Otilde,Ouml,Oslash,Ugrave,Uacute,Ucirc,Uuml,Yacute,THORN,szlig,agrave,aacute,acirc,atilde,auml,aring,aelig,ccedil,egrave,eacute,ecirc,euml,igrave,iacute,icirc,iuml,eth,ntilde,ograve,oacute,ocirc,otilde,ouml,oslash,ugrave,uacute,ucirc,uuml,yacute,thorn,yuml,OElig,oelig,Scaron,scaron,Yuml"), c.entities_greek && e.push("Alpha,Beta,Gamma,Delta,Epsilon,Zeta,Eta,Theta,Iota,Kappa,Lambda,Mu,Nu,Xi,Omicron,Pi,Rho,Sigma,Tau,Upsilon,Phi,Chi,Psi,Omega,alpha,beta,gamma,delta,epsilon,zeta,eta,theta,iota,kappa,lambda,mu,nu,xi,omicron,pi,rho,sigmaf,sigma,tau,upsilon,phi,chi,psi,omega,thetasym,upsih,piv"),
                        c.entities_additional && e.push(c.entities_additional)); var b = k(e.join(",")), d = b.regex ? "[" + b.regex + "]" : "a^"; delete b.regex; c.entities && c.entities_processNumerical && (d = "[^ -~]|" + d); var d = new RegExp(d, CKEDITOR.env.ie ? "g" : "gu"), h = k("nbsp,gt,lt,amp,shy", !0), l = new RegExp(h.regex, "g"); a.addRules({ text: function (a) { return a.replace(l, f).replace(d, g) } }, { applyToAll: !0, excludeNestedEditable: !0 })
                }
            }
        })
    })(); CKEDITOR.config.basicEntities = !0; CKEDITOR.config.entities = !0; CKEDITOR.config.entities_latin = !0;
    CKEDITOR.config.entities_greek = !0; CKEDITOR.config.entities_additional = "#39"; CKEDITOR.plugins.add("popup");
    CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
        popup: function (e, a, b, d) {
            a = a || "80%"; b = b || "70%"; "string" == typeof a && 1 < a.length && "%" == a.substr(a.length - 1, 1) && (a = parseInt(window.screen.width * parseInt(a, 10) / 100, 10)); "string" == typeof b && 1 < b.length && "%" == b.substr(b.length - 1, 1) && (b = parseInt(window.screen.height * parseInt(b, 10) / 100, 10)); 640 > a && (a = 640); 420 > b && (b = 420); var f = parseInt((window.screen.height - b) / 2, 10), g = parseInt((window.screen.width - a) / 2, 10); d = (d || "location\x3dno,menubar\x3dno,toolbar\x3dno,dependent\x3dyes,minimizable\x3dno,modal\x3dyes,alwaysRaised\x3dyes,resizable\x3dyes,scrollbars\x3dyes") + ",width\x3d" +
                a + ",height\x3d" + b + ",top\x3d" + f + ",left\x3d" + g; var c = window.open("", null, d, !0); if (!c) return !1; try { -1 == navigator.userAgent.toLowerCase().indexOf(" chrome/") && (c.moveTo(g, f), c.resizeTo(a, b)), c.focus(), c.location.href = e } catch (h) { window.open(e, null, d, !0) } return !0
        }
    }); (function () {
        function k(a) { this.editor = a; this.loaders = [] } function l(a, c, b) {
            var d = a.config.fileTools_defaultFileName; this.editor = a; this.lang = a.lang; "string" === typeof c ? (this.data = c, this.file = n(this.data), this.loaded = this.total = this.file.size) : (this.data = null, this.file = c, this.total = this.file.size, this.loaded = 0); b ? this.fileName = b : this.file.name ? this.fileName = this.file.name : (a = this.file.type.split("/"), d && (a[0] = d), this.fileName = a.join(".")); this.uploaded = 0; this.responseData = this.uploadTotal = null; this.status =
                "created"; this.abort = function () { this.changeStatus("abort") }
        } function n(a) { var c = a.match(m)[1]; a = a.replace(m, ""); a = atob(a); var b = [], d, f, g, e; for (d = 0; d < a.length; d += 512) { f = a.slice(d, d + 512); g = Array(f.length); for (e = 0; e < f.length; e++)g[e] = f.charCodeAt(e); f = new Uint8Array(g); b.push(f) } return new Blob(b, { type: c }) } CKEDITOR.plugins.add("filetools", {
            beforeInit: function (a) {
                a.uploadRepository = new k(a); a.on("fileUploadRequest", function (a) {
                    var b = a.data.fileLoader; b.xhr.open("POST", b.uploadUrl, !0); a.data.requestData.upload =
                        { file: b.file, name: b.fileName }
                }, null, null, 5); a.on("fileUploadRequest", function (c) { var b = c.data.fileLoader, d = new FormData; c = c.data.requestData; var f = a.config.fileTools_requestHeaders, g, e; for (e in c) { var h = c[e]; "object" === typeof h && h.file ? d.append(e, h.file, h.name) : d.append(e, h) } d.append("ckCsrfToken", CKEDITOR.tools.getCsrfToken()); if (f) for (g in f) b.xhr.setRequestHeader(g, f[g]); b.xhr.send(d) }, null, null, 999); a.on("fileUploadResponse", function (a) {
                    var b = a.data.fileLoader, d = b.xhr, f = a.data; try {
                        var g = JSON.parse(d.responseText);
                        g.error && g.error.message && (f.message = g.error.message); if (g.uploaded) for (var e in g) f[e] = g[e]; else a.cancel()
                    } catch (h) { f.message = b.lang.filetools.responseError, CKEDITOR.warn("filetools-response-error", { responseText: d.responseText }), a.cancel() }
                }, null, null, 999)
            }
        }); k.prototype = {
            create: function (a, c, b) { b = b || l; var d = this.loaders.length; a = new b(this.editor, a, c); a.id = d; this.loaders[d] = a; this.fire("instanceCreated", a); return a }, isFinished: function () {
                for (var a = 0; a < this.loaders.length; ++a)if (!this.loaders[a].isFinished()) return !1;
                return !0
            }
        }; l.prototype = {
            loadAndUpload: function (a, c) { var b = this; this.once("loaded", function (d) { d.cancel(); b.once("update", function (a) { a.cancel() }, null, null, 0); b.upload(a, c) }, null, null, 0); this.load() }, load: function () {
                var a = this, c = this.reader = new FileReader; a.changeStatus("loading"); this.abort = function () { a.reader.abort() }; c.onabort = function () { a.changeStatus("abort") }; c.onerror = function () { a.message = a.lang.filetools.loadError; a.changeStatus("error") }; c.onprogress = function (b) { a.loaded = b.loaded; a.update() };
                c.onload = function () { a.loaded = a.total; a.data = c.result; a.changeStatus("loaded") }; c.readAsDataURL(this.file)
            }, upload: function (a, c) { var b = c || {}; a ? (this.uploadUrl = a, this.xhr = new XMLHttpRequest, this.attachRequestListeners(), this.editor.fire("fileUploadRequest", { fileLoader: this, requestData: b }) && this.changeStatus("uploading")) : (this.message = this.lang.filetools.noUrlError, this.changeStatus("error")) }, attachRequestListeners: function () {
                function a() {
                    "error" != b.status && (b.message = b.lang.filetools.networkError,
                        b.changeStatus("error"))
                } function c() { "abort" != b.status && b.changeStatus("abort") } var b = this, d = this.xhr; b.abort = function () { d.abort(); c() }; d.onerror = a; d.onabort = c; d.upload ? (d.upload.onprogress = function (a) { a.lengthComputable && (b.uploadTotal || (b.uploadTotal = a.total), b.uploaded = a.loaded, b.update()) }, d.upload.onerror = a, d.upload.onabort = c) : (b.uploadTotal = b.total, b.update()); d.onload = function () {
                    b.update(); if ("abort" != b.status) if (b.uploaded = b.uploadTotal, 200 > d.status || 299 < d.status) b.message = b.lang.filetools["httpError" +
                        d.status], b.message || (b.message = b.lang.filetools.httpError.replace("%1", d.status)), b.changeStatus("error"); else { for (var a = { fileLoader: b }, c = ["message", "fileName", "url"], e = b.editor.fire("fileUploadResponse", a), h = 0; h < c.length; h++) { var k = c[h]; "string" === typeof a[k] && (b[k] = a[k]) } b.responseData = a; delete b.responseData.fileLoader; !1 === e ? b.changeStatus("error") : b.changeStatus("uploaded") }
                }
            }, changeStatus: function (a) {
                this.status = a; if ("error" == a || "abort" == a || "loaded" == a || "uploaded" == a) this.abort = function () { };
                this.fire(a); this.update()
            }, update: function () { this.fire("update") }, isFinished: function () { return !!this.status.match(/^(?:loaded|uploaded|error|abort)$/) }
        }; CKEDITOR.event.implementOn(k.prototype); CKEDITOR.event.implementOn(l.prototype); var m = /^data:(\S*?);base64,/; CKEDITOR.fileTools || (CKEDITOR.fileTools = {}); CKEDITOR.tools.extend(CKEDITOR.fileTools, {
            uploadRepository: k, fileLoader: l, getUploadUrl: function (a, c) {
                var b = CKEDITOR.tools.capitalize; return c && a[c + "UploadUrl"] ? a[c + "UploadUrl"] : a.uploadUrl ? a.uploadUrl :
                    c && a["filebrowser" + b(c, 1) + "UploadUrl"] ? a["filebrowser" + b(c, 1) + "UploadUrl"] + "\x26responseType\x3djson" : a.filebrowserUploadUrl ? a.filebrowserUploadUrl + "\x26responseType\x3djson" : null
            }, isTypeSupported: function (a, c) { return !!a.type.match(c) }, isFileUploadSupported: "function" === typeof FileReader && "function" === typeof (new FileReader).readAsDataURL && "function" === typeof FormData && "function" === typeof (new FormData).append && "function" === typeof XMLHttpRequest && "function" === typeof Blob
        })
    })(); (function () {
        function g(a, b) { var d = []; if (b) for (var c in b) d.push(c + "\x3d" + encodeURIComponent(b[c])); else return a; return a + (-1 != a.indexOf("?") ? "\x26" : "?") + d.join("\x26") } function p(a) { return !a.match(/command=QuickUpload/) || a.match(/(\?|&)responseType=json/) ? a : g(a, { responseType: "json" }) } function k(a) { a += ""; return a.charAt(0).toUpperCase() + a.substr(1) } function q() {
            var a = this.getDialog(), b = a.getParentEditor(); b._.filebrowserSe = this; var d = b.config["filebrowser" + k(a.getName()) + "WindowWidth"] || b.config.filebrowserWindowWidth ||
                "80%", a = b.config["filebrowser" + k(a.getName()) + "WindowHeight"] || b.config.filebrowserWindowHeight || "70%", c = this.filebrowser.params || {}; c.CKEditor = b.name; c.CKEditorFuncNum = b._.filebrowserFn; c.langCode || (c.langCode = b.langCode); c = g(this.filebrowser.url, c); b.popup(c, d, a, b.config.filebrowserWindowFeatures || b.config.fileBrowserWindowFeatures)
        } function r(a) {
            var b = new CKEDITOR.dom.element(a.$.form); b && ((a = b.$.elements.ckCsrfToken) ? a = new CKEDITOR.dom.element(a) : (a = new CKEDITOR.dom.element("input"), a.setAttributes({
                name: "ckCsrfToken",
                type: "hidden"
            }), b.append(a)), a.setAttribute("value", CKEDITOR.tools.getCsrfToken()))
        } function t() { var a = this.getDialog(); a.getParentEditor()._.filebrowserSe = this; return a.getContentElement(this["for"][0], this["for"][1]).getInputElement().$.value && a.getContentElement(this["for"][0], this["for"][1]).getAction() ? !0 : !1 } function u(a, b, d) { var c = d.params || {}; c.CKEditor = a.name; c.CKEditorFuncNum = a._.filebrowserFn; c.langCode || (c.langCode = a.langCode); b.action = g(d.url, c); b.filebrowser = d } function l(a, b, d, c) {
            if (c &&
                c.length) for (var e, g = c.length; g--;)if (e = c[g], "hbox" != e.type && "vbox" != e.type && "fieldset" != e.type || l(a, b, d, e.children), e.filebrowser) if ("string" == typeof e.filebrowser && (e.filebrowser = { action: "fileButton" == e.type ? "QuickUpload" : "Browse", target: e.filebrowser }), "Browse" == e.filebrowser.action) { var f = e.filebrowser.url; void 0 === f && (f = a.config["filebrowser" + k(b) + "BrowseUrl"], void 0 === f && (f = a.config.filebrowserBrowseUrl)); f && (e.onClick = q, e.filebrowser.url = f, e.hidden = !1) } else if ("QuickUpload" == e.filebrowser.action &&
                    e["for"] && (f = e.filebrowser.url, void 0 === f && (f = a.config["filebrowser" + k(b) + "UploadUrl"], void 0 === f && (f = a.config.filebrowserUploadUrl)), f)) {
                        var h = e.onClick; e.onClick = function (b) {
                            var c = b.sender, d = c.getDialog().getContentElement(this["for"][0], this["for"][1]).getInputElement(), e = CKEDITOR.fileTools && CKEDITOR.fileTools.isFileUploadSupported; if (h && !1 === h.call(c, b)) return !1; if (t.call(c, b)) {
                                if ("form" !== a.config.filebrowserUploadMethod && e) return b = a.uploadRepository.create(d.$.files[0]), b.on("uploaded", function (a) {
                                    var b =
                                        a.sender.responseData; m.call(a.sender.editor, b.url, b.message)
                                }), b.on("error", n.bind(this)), b.on("abort", n.bind(this)), b.loadAndUpload(p(f)), "xhr"; r(d); return !0
                            } return !1
                        }; e.filebrowser.url = f; e.hidden = !1; u(a, d.getContents(e["for"][0]).get(e["for"][1]), e.filebrowser)
                }
        } function n(a) { var b = {}; try { b = JSON.parse(a.sender.xhr.response) || {} } catch (d) { } this.enable(); alert(b.error ? b.error.message : a.sender.message) } function h(a, b, d) {
            if (-1 !== d.indexOf(";")) {
                d = d.split(";"); for (var c = 0; c < d.length; c++)if (h(a, b, d[c])) return !0;
                return !1
            } return (a = a.getContents(b).get(d).filebrowser) && a.url
        } function m(a, b) {
            var d = this._.filebrowserSe.getDialog(), c = this._.filebrowserSe["for"], e = this._.filebrowserSe.filebrowser.onSelect; c && d.getContentElement(c[0], c[1]).reset(); if ("function" != typeof b || !1 !== b.call(this._.filebrowserSe)) if (!e || !1 !== e.call(this._.filebrowserSe, a, b)) if ("string" == typeof b && b && alert(b), a && (c = this._.filebrowserSe, d = c.getDialog(), c = c.filebrowser.target || null)) if (c = c.split(":"), e = d.getContentElement(c[0], c[1])) e.setValue(a),
                d.selectPage(c[0])
        } CKEDITOR.plugins.add("filebrowser", { requires: "popup,filetools", init: function (a) { a._.filebrowserFn = CKEDITOR.tools.addFunction(m, a); a.on("destroy", function () { CKEDITOR.tools.removeFunction(this._.filebrowserFn) }) } }); CKEDITOR.on("dialogDefinition", function (a) { if (a.editor.plugins.filebrowser) for (var b = a.data.definition, d, c = 0; c < b.contents.length; ++c)if (d = b.contents[c]) l(a.editor, a.data.name, b, d.elements), d.hidden && d.filebrowser && (d.hidden = !h(b, d.id, d.filebrowser)) })
    })(); (function () {
        function k(a) {
            var l = a.config, p = a.fire("uiSpace", { space: "top", html: "" }).html, t = function () {
                function f(a, c, e) { b.setStyle(c, w(e)); b.setStyle("position", a) } function e(a) { var b = k.getDocumentPosition(); switch (a) { case "top": f("absolute", "top", b.y - q - r); break; case "pin": f("fixed", "top", x); break; case "bottom": f("absolute", "top", b.y + (c.height || c.bottom - c.top) + r) }m = a } var m, k, n, c, h, q, v, p = l.floatSpaceDockedOffsetX || 0, r = l.floatSpaceDockedOffsetY || 0, u = l.floatSpacePinnedOffsetX || 0, x = l.floatSpacePinnedOffsetY ||
                    0; return function (d) {
                        if (k = a.editable()) {
                            var f = d && "focus" == d.name; f && b.show(); a.fire("floatingSpaceLayout", { show: f }); b.removeStyle("left"); b.removeStyle("right"); n = b.getClientRect(); c = k.getClientRect(); h = g.getViewPaneSize(); q = n.height; v = "pageXOffset" in g.$ ? g.$.pageXOffset : CKEDITOR.document.$.documentElement.scrollLeft; m ? (q + r <= c.top ? e("top") : q + r > h.height - c.bottom ? e("pin") : e("bottom"), d = h.width / 2, d = l.floatSpacePreferRight ? "right" : 0 < c.left && c.right < h.width && c.width > n.width ? "rtl" == l.contentsLangDirection ?
                                "right" : "left" : d - c.left > c.right - d ? "left" : "right", n.width > h.width ? (d = "left", f = 0) : (f = "left" == d ? 0 < c.left ? c.left : 0 : c.right < h.width ? h.width - c.right : 0, f + n.width > h.width && (d = "left" == d ? "right" : "left", f = 0)), b.setStyle(d, w(("pin" == m ? u : p) + f + ("pin" == m ? 0 : "left" == d ? v : -v)))) : (m = "pin", e("pin"), t(d))
                        }
                    }
            }(); if (p) {
                var k = new CKEDITOR.template('\x3cdiv id\x3d"cke_{name}" class\x3d"cke {id} cke_reset_all cke_chrome cke_editor_{name} cke_float cke_{langDir} ' + CKEDITOR.env.cssClass + '" dir\x3d"{langDir}" title\x3d"' + (CKEDITOR.env.gecko ?
                    " " : "") + '" lang\x3d"{langCode}" role\x3d"application" style\x3d"{style}"' + (a.applicationTitle ? ' aria-labelledby\x3d"cke_{name}_arialbl"' : " ") + "\x3e" + (a.applicationTitle ? '\x3cspan id\x3d"cke_{name}_arialbl" class\x3d"cke_voice_label"\x3e{voiceLabel}\x3c/span\x3e' : " ") + '\x3cdiv class\x3d"cke_inner"\x3e\x3cdiv id\x3d"{topId}" class\x3d"cke_top" role\x3d"presentation"\x3e{content}\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e'), b = CKEDITOR.document.getBody().append(CKEDITOR.dom.element.createFromHtml(k.output({
                        content: p,
                        id: a.id, langDir: a.lang.dir, langCode: a.langCode, name: a.name, style: "display:none;z-index:" + (l.baseFloatZIndex - 1), topId: a.ui.spaceId("top"), voiceLabel: a.applicationTitle
                    }))), u = CKEDITOR.tools.eventsBuffer(500, t), e = CKEDITOR.tools.eventsBuffer(100, t); b.unselectable(); b.on("mousedown", function (a) { a = a.data; a.getTarget().hasAscendant("a", 1) || a.preventDefault() }); a.on("focus", function (b) { t(b); a.on("change", u.input); g.on("scroll", e.input); g.on("resize", e.input) }); a.on("blur", function () {
                        b.hide(); a.removeListener("change",
                            u.input); g.removeListener("scroll", e.input); g.removeListener("resize", e.input)
                    }); a.on("destroy", function () { g.removeListener("scroll", e.input); g.removeListener("resize", e.input); b.clearCustomData(); b.remove() }); a.focusManager.hasFocus && b.show(); a.focusManager.add(b, 1)
            }
        } var g = CKEDITOR.document.getWindow(), w = CKEDITOR.tools.cssLength; CKEDITOR.plugins.add("floatingspace", { init: function (a) { a.on("loaded", function () { k(this) }, null, null, 20) } })
    })(); CKEDITOR.plugins.add("listblock", {
        requires: "panel", onLoad: function () {
            var g = CKEDITOR.addTemplate("panel-list", '\x3cul role\x3d"presentation" class\x3d"cke_panel_list"\x3e{items}\x3c/ul\x3e'), h = CKEDITOR.addTemplate("panel-list-item", '\x3cli id\x3d"{id}" class\x3d"cke_panel_listItem" role\x3dpresentation\x3e\x3ca id\x3d"{id}_option" _cke_focus\x3d1 hidefocus\x3dtrue title\x3d"{title}" draggable\x3d"false" ondragstart\x3d"return false;" href\x3d"javascript:void(\'{val}\')"  {language} onclick\x3d"{onclick}CKEDITOR.tools.callFunction({clickFn},\'{val}\'); return false;" role\x3d"option"\x3e{text}\x3c/a\x3e\x3c/li\x3e'),
            k = CKEDITOR.addTemplate("panel-list-group", '\x3ch1 id\x3d"{id}" draggable\x3d"false" ondragstart\x3d"return false;" class\x3d"cke_panel_grouptitle" role\x3d"presentation" \x3e{label}\x3c/h1\x3e'), l = /\'/g; CKEDITOR.ui.panel.prototype.addListBlock = function (a, b) { return this.addBlock(a, new CKEDITOR.ui.listBlock(this.getHolderElement(), b)) }; CKEDITOR.ui.listBlock = CKEDITOR.tools.createClass({
                base: CKEDITOR.ui.panel.block, $: function (a, b) {
                    b = b || {}; var c = b.attributes || (b.attributes = {}); (this.multiSelect = !!b.multiSelect) &&
                        (c["aria-multiselectable"] = !0); !c.role && (c.role = "listbox"); this.base.apply(this, arguments); this.element.setAttribute("role", c.role); c = this.keys; c[40] = "next"; c[9] = "next"; c[38] = "prev"; c[CKEDITOR.SHIFT + 9] = "prev"; c[32] = CKEDITOR.env.ie ? "mouseup" : "click"; CKEDITOR.env.ie && (c[13] = "mouseup"); this._.pendingHtml = []; this._.pendingList = []; this._.items = {}; this._.groups = {}
                }, _: {
                    close: function () {
                        if (this._.started) {
                            var a = g.output({ items: this._.pendingList.join("") }); this._.pendingList = []; this._.pendingHtml.push(a);
                            delete this._.started
                        }
                    }, getClick: function () { this._.click || (this._.click = CKEDITOR.tools.addFunction(function (a) { var b = this.toggle(a); if (this.onClick) this.onClick(a, b) }, this)); return this._.click }
                }, proto: {
                    add: function (a, b, c, d) {
                        var e = CKEDITOR.tools.getNextId(); this._.started || (this._.started = 1, this._.size = this._.size || 0); this._.items[a] = e; var f; f = CKEDITOR.tools.htmlEncodeAttr(a).replace(l, "\\'"); a = {
                            id: e, val: f, onclick: CKEDITOR.env.ie ? 'return false;" onmouseup\x3d"CKEDITOR.tools.getMouseButton(event)\x3d\x3d\x3dCKEDITOR.MOUSE_BUTTON_LEFT\x26\x26' :
                                "", clickFn: this._.getClick(), title: CKEDITOR.tools.htmlEncodeAttr(c || a), text: b || a, language: d ? 'lang\x3d"' + d + '"' : ""
                        }; this._.pendingList.push(h.output(a))
                    }, startGroup: function (a) { this._.close(); var b = CKEDITOR.tools.getNextId(); this._.groups[a] = b; this._.pendingHtml.push(k.output({ id: b, label: a })) }, commit: function () { this._.close(); this.element.appendHtml(this._.pendingHtml.join("")); delete this._.size; this._.pendingHtml = [] }, toggle: function (a) { var b = this.isMarked(a); b ? this.unmark(a) : this.mark(a); return !b },
                    hideGroup: function (a) { var b = (a = this.element.getDocument().getById(this._.groups[a])) && a.getNext(); a && (a.setStyle("display", "none"), b && "ul" == b.getName() && b.setStyle("display", "none")) }, hideItem: function (a) { this.element.getDocument().getById(this._.items[a]).setStyle("display", "none") }, showAll: function () {
                        var a = this._.items, b = this._.groups, c = this.element.getDocument(), d; for (d in a) c.getById(a[d]).setStyle("display", ""); for (var e in b) a = c.getById(b[e]), d = a.getNext(), a.setStyle("display", ""), d && "ul" ==
                            d.getName() && d.setStyle("display", "")
                    }, mark: function (a) { this.multiSelect || this.unmarkAll(); a = this._.items[a]; var b = this.element.getDocument().getById(a); b.addClass("cke_selected"); this.element.getDocument().getById(a + "_option").setAttribute("aria-selected", !0); this.onMark && this.onMark(b) }, unmark: function (a) { var b = this.element.getDocument(); a = this._.items[a]; var c = b.getById(a); c.removeClass("cke_selected"); b.getById(a + "_option").removeAttribute("aria-selected"); this.onUnmark && this.onUnmark(c) }, unmarkAll: function () {
                        var a =
                            this._.items, b = this.element.getDocument(), c; for (c in a) { var d = a[c]; b.getById(d).removeClass("cke_selected"); b.getById(d + "_option").removeAttribute("aria-selected") } this.onUnmark && this.onUnmark()
                    }, isMarked: function (a) { return this.element.getDocument().getById(this._.items[a]).hasClass("cke_selected") }, focus: function (a) {
                        this._.focusIndex = -1; var b = this.element.getElementsByTag("a"), c, d = -1; if (a) for (c = this.element.getDocument().getById(this._.items[a]).getFirst(); a = b.getItem(++d);) {
                            if (a.equals(c)) {
                                this._.focusIndex =
                                d; break
                            }
                        } else this.element.focus(); c && setTimeout(function () { c.focus() }, 0)
                    }
                }
            })
        }
    }); CKEDITOR.plugins.add("richcombo", { requires: "floatpanel,listblock,button", beforeInit: function (e) { e.ui.addHandler(CKEDITOR.UI_RICHCOMBO, CKEDITOR.ui.richCombo.handler) } });
    (function () {
        var e = '\x3cspan id\x3d"{id}" class\x3d"cke_combo cke_combo__{name} {cls}" role\x3d"presentation"\x3e\x3cspan id\x3d"{id}_label" class\x3d"cke_combo_label"\x3e{label}\x3c/span\x3e\x3ca class\x3d"cke_combo_button" title\x3d"{title}" tabindex\x3d"-1"' + (CKEDITOR.env.gecko && !CKEDITOR.env.hc ? "" : " href\x3d\"javascript:void('{titleJs}')\"") + ' hidefocus\x3d"true" role\x3d"button" aria-labelledby\x3d"{id}_label" aria-haspopup\x3d"listbox"', h = ""; CKEDITOR.env.gecko && CKEDITOR.env.mac && (e += ' onkeypress\x3d"return false;"');
        CKEDITOR.env.gecko && (e += ' onblur\x3d"this.style.cssText \x3d this.style.cssText;"'); CKEDITOR.env.ie && (h = 'return false;" onmouseup\x3d"CKEDITOR.tools.getMouseButton(event)\x3d\x3dCKEDITOR.MOUSE_BUTTON_LEFT\x26\x26'); var e = e + (' onkeydown\x3d"return CKEDITOR.tools.callFunction({keydownFn},event,this);" onfocus\x3d"return CKEDITOR.tools.callFunction({focusFn},event);" onclick\x3d"' + h + 'CKEDITOR.tools.callFunction({clickFn},this);return false;"\x3e\x3cspan id\x3d"{id}_text" class\x3d"cke_combo_text cke_combo_inlinelabel"\x3e{label}\x3c/span\x3e\x3cspan class\x3d"cke_combo_open"\x3e\x3cspan class\x3d"cke_combo_arrow"\x3e' +
            (CKEDITOR.env.hc ? "\x26#9660;" : CKEDITOR.env.air ? "\x26nbsp;" : "") + "\x3c/span\x3e\x3c/span\x3e\x3c/a\x3e\x3c/span\x3e"), m = CKEDITOR.addTemplate("combo", e); CKEDITOR.UI_RICHCOMBO = "richcombo"; CKEDITOR.ui.richCombo = CKEDITOR.tools.createClass({
                $: function (a) {
                    CKEDITOR.tools.extend(this, a, { canGroup: !1, title: a.label, modes: { wysiwyg: 1 }, editorFocus: 1 }); a = this.panel || {}; delete this.panel; this.id = CKEDITOR.tools.getNextNumber(); this.document = a.parent && a.parent.getDocument() || CKEDITOR.document; a.className = "cke_combopanel";
                    a.block = { multiSelect: a.multiSelect, attributes: a.attributes }; a.toolbarRelated = !0; this._ = { panelDefinition: a, items: {}, listeners: [] }
                }, proto: {
                    renderHtml: function (a) { var b = []; this.render(a, b); return b.join("") }, render: function (a, b) {
                        function c() { if (this.getState() != CKEDITOR.TRISTATE_ON) { var b = this.modes[a.mode] ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED; a.readOnly && !this.readOnly && (b = CKEDITOR.TRISTATE_DISABLED); this.setState(b); this.setValue(""); b != CKEDITOR.TRISTATE_DISABLED && this.refresh && this.refresh() } }
                        var l = CKEDITOR.env, g, f, d = "cke_" + this.id, e = CKEDITOR.tools.addFunction(function (b) { f && (a.unlockSelection(1), f = 0); g.execute(b) }, this), k = this; g = { id: d, combo: this, focus: function () { CKEDITOR.document.getById(d).getChild(1).focus() }, execute: function (b) { var c = k._; if (c.state != CKEDITOR.TRISTATE_DISABLED) if (k.createPanel(a), c.on) c.panel.hide(); else { k.commit(); var d = k.getValue(); d ? c.list.mark(d) : c.list.unmarkAll(); c.panel.showBlock(k.id, new CKEDITOR.dom.element(b), 4) } }, clickFn: e }; this._.listeners.push(a.on("activeFilterChange",
                            c, this)); this._.listeners.push(a.on("mode", c, this)); this._.listeners.push(a.on("selectionChange", c, this)); !this.readOnly && this._.listeners.push(a.on("readOnly", c, this)); var h = CKEDITOR.tools.addFunction(function (a, b) { a = new CKEDITOR.dom.event(a); var c = a.getKeystroke(); switch (c) { case 13: case 32: case 40: CKEDITOR.tools.callFunction(e, b); break; default: g.onkey(g, c) }a.preventDefault() }), n = CKEDITOR.tools.addFunction(function () { g.onfocus && g.onfocus() }); f = 0; g.keyDownFn = h; l = {
                                id: d, name: this.name || this.command,
                                label: this.label, title: this.title, cls: this.className || "", titleJs: l.gecko && !l.hc ? "" : (this.title || "").replace("'", ""), keydownFn: h, focusFn: n, clickFn: e
                            }; m.output(l, b); if (this.onRender) this.onRender(); return g
                    }, createPanel: function (a) {
                        if (!this._.panel) {
                            var b = this._.panelDefinition, c = this._.panelDefinition.block, e = b.parent || CKEDITOR.document.getBody(), g = "cke_combopanel__" + this.name, f = new CKEDITOR.ui.floatPanel(a, e, b), b = f.addListBlock(this.id, c), d = this; f.onShow = function () {
                                this.element.addClass(g); d.setState(CKEDITOR.TRISTATE_ON);
                                d._.on = 1; d.editorFocus && !a.focusManager.hasFocus && a.focus(); if (d.onOpen) d.onOpen()
                            }; f.onHide = function (b) { this.element.removeClass(g); d.setState(d.modes && d.modes[a.mode] ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED); d._.on = 0; if (!b && d.onClose) d.onClose() }; f.onEscape = function () { f.hide(1) }; b.onClick = function (a, b) { d.onClick && d.onClick.call(d, a, b); f.hide() }; this._.panel = f; this._.list = b; f.getBlock(this.id).onHide = function () { d._.on = 0; d.setState(CKEDITOR.TRISTATE_OFF) }; this.init && this.init()
                        }
                    }, setValue: function (a,
                        b) { this._.value = a; var c = this.document.getById("cke_" + this.id + "_text"); c && (a || b ? c.removeClass("cke_combo_inlinelabel") : (b = this.label, c.addClass("cke_combo_inlinelabel")), c.setText("undefined" != typeof b ? b : a)); var c = "undefined" != typeof b ? b : a, e = this.label, c = c === e ? c : c + ", " + e; (e = this.document.getById("cke_" + this.id + "_label")) && e.setText(c) }, getValue: function () { return this._.value || "" }, unmarkAll: function () { this._.list.unmarkAll() }, mark: function (a) { this._.list.mark(a) }, hideItem: function (a) { this._.list.hideItem(a) },
                    hideGroup: function (a) { this._.list.hideGroup(a) }, showAll: function () { this._.list.showAll() }, add: function (a, b, c, e) { this._.items[a] = c || a; this._.list.add(a, b, c, e) }, startGroup: function (a) { this._.list.startGroup(a) }, commit: function () { this._.committed || (this._.list.commit(), this._.committed = 1, CKEDITOR.ui.fire("ready", this)); this._.committed = 1 }, setState: function (a) {
                        if (this._.state != a) {
                            var b = this.document.getById("cke_" + this.id), c = b.getElementsByTag("a").getItem(0); b.setState(a, "cke_combo"); a == CKEDITOR.TRISTATE_DISABLED ?
                                b.setAttribute("aria-disabled", !0) : b.removeAttribute("aria-disabled"); c && c.setAttribute("aria-expanded", a == CKEDITOR.TRISTATE_ON); this._.state = a
                        }
                    }, getState: function () { return this._.state }, enable: function () { this._.state == CKEDITOR.TRISTATE_DISABLED && this.setState(this._.lastState) }, disable: function () { this._.state != CKEDITOR.TRISTATE_DISABLED && (this._.lastState = this._.state, this.setState(CKEDITOR.TRISTATE_DISABLED)) }, destroy: function () {
                        CKEDITOR.tools.array.forEach(this._.listeners, function (a) { a.removeListener() });
                        this._.listeners = []
                    }, select: function (a) { if (!CKEDITOR.tools.isEmpty(this._.items)) for (var b in this._.items) if (a({ value: b, text: this._.items[b] })) { this.setValue(b); break } }
                }, statics: { handler: { create: function (a) { return new CKEDITOR.ui.richCombo(a) } } }
            }); CKEDITOR.ui.prototype.addRichCombo = function (a, b) { this.add(a, CKEDITOR.UI_RICHCOMBO, b) }
    })(); CKEDITOR.plugins.add("format", {
        requires: "richcombo", init: function (a) {
            if (!a.blockless) {
                for (var f = a.config, c = a.lang.format, l = f.format_tags.split(";"), d = {}, m = 0, n = [], g = 0; g < l.length; g++) { var h = l[g], k = new CKEDITOR.style(f["format_" + h]); if (!a.filter.customConfig || a.filter.check(k)) m++, d[h] = k, d[h]._.enterMode = a.config.enterMode, n.push(k) } 0 !== m && a.ui.addRichCombo("Format", {
                    label: c.label, title: c.panelTitle, toolbar: "styles,20", allowedContent: n, panel: {
                        css: [CKEDITOR.skin.getPath("editor")].concat(f.contentsCss),
                        multiSelect: !1, attributes: { "aria-label": c.panelTitle }
                    }, init: function () { this.startGroup(c.panelTitle); for (var a in d) { var e = c["tag_" + a]; this.add(a, d[a].buildPreview(e), e) } }, onClick: function (b) { a.focus(); a.fire("saveSnapshot"); b = d[b]; var e = a.elementPath(); a.fire("stylesRemove", { type: CKEDITOR.STYLE_BLOCK }); b.checkActive(e, a) || a.applyStyle(b); setTimeout(function () { a.fire("saveSnapshot") }, 0) }, onRender: function () {
                        a.on("selectionChange", function (b) {
                            var e = this.getValue(); b = b.data.path; this.refresh(); for (var c in d) if (d[c].checkActive(b,
                                a)) { c != e && this.setValue(c, a.lang.format["tag_" + c]); return } this.setValue("")
                        }, this)
                    }, onOpen: function () { this.showAll(); for (var b in d) a.activeFilter.check(d[b]) || this.hideItem(b) }, refresh: function () { var b = a.elementPath(); if (b) { if (b.isContextFor("p")) for (var c in d) if (a.activeFilter.check(d[c])) return; this.setState(CKEDITOR.TRISTATE_DISABLED) } }
                })
            }
        }
    }); CKEDITOR.config.format_tags = "p;h1;h2;h3;h4;h5;h6;pre;address;div"; CKEDITOR.config.format_p = { element: "p" }; CKEDITOR.config.format_div = { element: "div" };
    CKEDITOR.config.format_pre = { element: "pre" }; CKEDITOR.config.format_address = { element: "address" }; CKEDITOR.config.format_h1 = { element: "h1" }; CKEDITOR.config.format_h2 = { element: "h2" }; CKEDITOR.config.format_h3 = { element: "h3" }; CKEDITOR.config.format_h4 = { element: "h4" }; CKEDITOR.config.format_h5 = { element: "h5" }; CKEDITOR.config.format_h6 = { element: "h6" }; (function () { var b = { canUndo: !1, exec: function (a) { var b = a.document.createElement("hr"); a.insertElement(b) }, allowedContent: "hr", requiredContent: "hr" }; CKEDITOR.plugins.add("horizontalrule", { init: function (a) { a.blockless || (a.addCommand("horizontalrule", b), a.ui.addButton && a.ui.addButton("HorizontalRule", { label: a.lang.horizontalrule.toolbar, command: "horizontalrule", toolbar: "insert,40" })) } }) })(); CKEDITOR.plugins.add("htmlwriter", { init: function (b) { var a = new CKEDITOR.htmlWriter; a.forceSimpleAmpersand = b.config.forceSimpleAmpersand; a.indentationChars = "string" === typeof b.config.dataIndentationChars ? b.config.dataIndentationChars : "\t"; b.dataProcessor.writer = a } });
    CKEDITOR.htmlWriter = CKEDITOR.tools.createClass({
        base: CKEDITOR.htmlParser.basicWriter, $: function () {
            this.base(); this.indentationChars = "\t"; this.selfClosingEnd = " /\x3e"; this.lineBreakChars = "\n"; this.sortAttributes = 1; this._.indent = 0; this._.indentation = ""; this._.inPre = 0; this._.rules = {}; var b = CKEDITOR.dtd, a; for (a in CKEDITOR.tools.extend({}, b.$nonBodyContent, b.$block, b.$listItem, b.$tableContent)) this.setRules(a, {
                indent: !b[a]["#"], breakBeforeOpen: 1, breakBeforeClose: !b[a]["#"], breakAfterClose: 1, needsSpace: a in
                    b.$block && !(a in { li: 1, dt: 1, dd: 1 })
            }); this.setRules("br", { breakAfterOpen: 1 }); this.setRules("title", { indent: 0, breakAfterOpen: 0 }); this.setRules("style", { indent: 0, breakBeforeClose: 1 }); this.setRules("pre", { breakAfterOpen: 1, indent: 0 })
        }, proto: {
            openTag: function (b) { var a = this._.rules[b]; this._.afterCloser && a && a.needsSpace && this._.needsSpace && this._.output.push("\n"); this._.indent ? this.indentation() : a && a.breakBeforeOpen && (this.lineBreak(), this.indentation()); this._.output.push("\x3c", b); this._.afterCloser = 0 },
            openTagClose: function (b, a) { var c = this._.rules[b]; a ? (this._.output.push(this.selfClosingEnd), c && c.breakAfterClose && (this._.needsSpace = c.needsSpace)) : (this._.output.push("\x3e"), c && c.indent && (this._.indentation += this.indentationChars)); c && c.breakAfterOpen && this.lineBreak(); "pre" == b && (this._.inPre = 1) }, attribute: function (b, a) { "string" == typeof a && (a = CKEDITOR.tools.htmlEncodeAttr(a), this.forceSimpleAmpersand && (a = a.replace(/&amp;/g, "\x26"))); this._.output.push(" ", b, '\x3d"', a, '"') }, closeTag: function (b) {
                var a =
                    this._.rules[b]; a && a.indent && (this._.indentation = this._.indentation.substr(this.indentationChars.length)); this._.indent ? this.indentation() : a && a.breakBeforeClose && (this.lineBreak(), this.indentation()); this._.output.push("\x3c/", b, "\x3e"); "pre" == b && (this._.inPre = 0); a && a.breakAfterClose && (this.lineBreak(), this._.needsSpace = a.needsSpace); this._.afterCloser = 1
            }, text: function (b) { this._.indent && (this.indentation(), !this._.inPre && (b = CKEDITOR.tools.ltrim(b))); this._.output.push(b) }, comment: function (b) {
                this._.indent &&
                this.indentation(); this._.output.push("\x3c!--", b, "--\x3e")
            }, lineBreak: function () { !this._.inPre && 0 < this._.output.length && this._.output.push(this.lineBreakChars); this._.indent = 1 }, indentation: function () { !this._.inPre && this._.indentation && this._.output.push(this._.indentation); this._.indent = 0 }, reset: function () { this._.output = []; this._.indent = 0; this._.indentation = ""; this._.afterCloser = 0; this._.inPre = 0; this._.needsSpace = 0 }, setRules: function (b, a) {
                var c = this._.rules[b]; c ? CKEDITOR.tools.extend(c, a, !0) : this._.rules[b] =
                    a
            }
        }
    }); (function () {
        function v(a) {
            function e(a) { var b = !1; h.attachListener(h, "keydown", function () { var d = c.getBody().getElementsByTag(a); if (!b) { for (var e = 0; e < d.count(); e++)d.getItem(e).setCustomData("retain", !0); b = !0 } }, null, null, 1); h.attachListener(h, "keyup", function () { var d = c.getElementsByTag(a); b && (1 == d.count() && !d.getItem(0).getCustomData("retain") && CKEDITOR.tools.isEmpty(d.getItem(0).getAttributes()) && d.getItem(0).remove(1), b = !1) }) } var b = this.editor; if (b && !b.isDetached()) {
                var c = a.document, f = c.body, d = c.getElementById("cke_actscrpt");
                d && d.parentNode.removeChild(d); (d = c.getElementById("cke_shimscrpt")) && d.parentNode.removeChild(d); (d = c.getElementById("cke_basetagscrpt")) && d.parentNode.removeChild(d); f.contentEditable = !0; CKEDITOR.env.ie && (f.hideFocus = !0, f.disabled = !0, f.removeAttribute("disabled")); delete this._.isLoadingData; this.$ = f; c = new CKEDITOR.dom.document(c); this.setup(); this.fixInitialSelection(); var h = this; CKEDITOR.env.ie && !CKEDITOR.env.edge && c.getDocumentElement().addClass(c.$.compatMode); CKEDITOR.env.ie && !CKEDITOR.env.edge &&
                    b.enterMode != CKEDITOR.ENTER_P ? e("p") : CKEDITOR.env.edge && 15 > CKEDITOR.env.version && b.enterMode != CKEDITOR.ENTER_DIV && e("div"); if (CKEDITOR.env.webkit || CKEDITOR.env.ie && 10 < CKEDITOR.env.version) c.getDocumentElement().on("mousedown", function (a) { a.data.getTarget().is("html") && setTimeout(function () { b.editable().focus() }) }); w(b); try { b.document.$.execCommand("2D-position", !1, !0) } catch (g) { } (CKEDITOR.env.gecko || CKEDITOR.env.ie && "CSS1Compat" == b.document.$.compatMode) && this.attachListener(this, "keydown", function (a) {
                        var d =
                            a.data.getKeystroke(); if (33 == d || 34 == d) if (CKEDITOR.env.ie) setTimeout(function () { b.getSelection().scrollIntoView() }, 0); else if (b.window.$.innerHeight > this.$.offsetHeight) { var c = b.createRange(); c[33 == d ? "moveToElementEditStart" : "moveToElementEditEnd"](this); c.select(); a.data.preventDefault() }
                    }); CKEDITOR.env.ie && this.attachListener(c, "blur", function () { try { c.$.selection.empty() } catch (a) { } }); CKEDITOR.env.iOS && this.attachListener(c, "touchend", function () { a.focus() }); f = b.document.getElementsByTag("title").getItem(0);
                f.data("cke-title", f.getText()); CKEDITOR.env.ie && (b.document.$.title = this._.docTitle); CKEDITOR.tools.setTimeout(function () { "unloaded" == this.status && (this.status = "ready"); b.fire("contentDom"); this._.isPendingFocus && (b.focus(), this._.isPendingFocus = !1); setTimeout(function () { b.fire("dataReady") }, 0) }, 0, this)
            }
        } function w(a) {
            function e() {
                var d; a.editable().attachListener(a, "selectionChange", function () {
                    var c = a.getSelection().getSelectedElement(); c && (d && (d.detachEvent("onresizestart", b), d = null), c.$.attachEvent("onresizestart",
                        b), d = c.$)
                })
            } function b(a) { a.returnValue = !1 } if (CKEDITOR.env.gecko) try { var c = a.document.$; c.execCommand("enableObjectResizing", !1, !a.config.disableObjectResizing); c.execCommand("enableInlineTableEditing", !1, !a.config.disableNativeTableHandles) } catch (f) { } else CKEDITOR.env.ie && 11 > CKEDITOR.env.version && a.config.disableObjectResizing && e()
        } function x() {
            var a = []; if (8 <= CKEDITOR.document.$.documentMode) {
                a.push("html.CSS1Compat [contenteditable\x3dfalse]{min-height:0 !important}"); var e = [], b; for (b in CKEDITOR.dtd.$removeEmpty) e.push("html.CSS1Compat " +
                    b + "[contenteditable\x3dfalse]"); a.push(e.join(",") + "{display:inline-block}")
            } else CKEDITOR.env.gecko && (a.push("html{height:100% !important}"), a.push("img:-moz-broken{-moz-force-broken-image-icon:1;min-width:24px;min-height:24px}")); a.push("html{cursor:text;*cursor:auto}"); a.push("img,input,textarea{cursor:default}"); return a.join("\n")
        } var l; CKEDITOR.plugins.add("wysiwygarea", {
            init: function (a) {
                a.config.fullPage && a.addFeature({
                    allowedContent: "html head title; style [media,type]; body (*)[id]; meta link [*]",
                    requiredContent: "body"
                }); a.addMode("wysiwyg", function (e) {
                    function b(b) { b && b.removeListener(); if (!a.isDestroyed() && !a.isDetached() && (a.editable(new l(a, g.getFrameDocument().getBody())), a.setData(a.getData(1), e), t)) { if (u) a.on("mode", c, { iframe: g, editor: a, callback: e }); a.on("mode", function () { a.status = "ready" }); f() } } function c(a) { a && a.removeListener(); g.on("load", function () { p && (p = !1, d()) }) } function f() {
                        m = new MutationObserver(function (b) {
                            for (var c = 0; c < b.length; c++) {
                                var e = b[c]; if ("childList" === e.type && 0 !==
                                    e.addedNodes.length) for (var f = 0; f < e.addedNodes.length; f++) { var g = e.addedNodes[f]; g.contains && g.contains(a.container.$) && (u ? p = !0 : d()) }
                            }
                        }); m.observe(a.config.observableParent, { childList: !0, subtree: !0 })
                    } function d() { var b = a.getData(!1), c; a.editable().preserveIframe = !0; a.editable(null); c = new l(a, g.getFrameDocument().getBody()); a.editable(c); a.status = "recreating"; a.setData(b, { callback: e, internal: !1, noSnapshot: !1 }) } var h = "document.open();" + (CKEDITOR.env.ie ? "(" + CKEDITOR.tools.fixDomain + ")();" : "") + "document.close();",
                        h = CKEDITOR.env.air ? "javascript:void(0)" : CKEDITOR.env.ie && !CKEDITOR.env.edge ? "javascript:void(function(){" + encodeURIComponent(h) + "}())" : "", g = CKEDITOR.dom.element.createFromHtml('\x3ciframe src\x3d"' + h + '" frameBorder\x3d"0"\x3e\x3c/iframe\x3e'); g.setStyles({ width: "100%", height: "100%" }); g.addClass("cke_wysiwyg_frame").addClass("cke_reset"); h = a.ui.space("contents"); h.append(g); var r = CKEDITOR.env.ie && !CKEDITOR.env.edge || CKEDITOR.env.gecko; if (r) g.on("load", b); var k = a.title, n = a.fire("ariaEditorHelpLabel",
                            {}).label, p = !1, u = CKEDITOR.env.ie && 11 === CKEDITOR.env.version, t = !!window.MutationObserver, m; k && (CKEDITOR.env.ie && n && (k += ", " + n), g.setAttribute("title", k)); if (n) { var k = CKEDITOR.tools.getNextId(), q = CKEDITOR.dom.element.createFromHtml('\x3cspan id\x3d"' + k + '" class\x3d"cke_voice_label"\x3e' + n + "\x3c/span\x3e"); h.append(q, 1); g.setAttribute("aria-describedby", k) } a.on("beforeModeUnload", function (a) { a.removeListener(); q && q.remove(); t && m.disconnect() }); a.on("destroy", function () { m && m.disconnect() }); g.setAttributes({
                                tabIndex: a.tabIndex,
                                allowTransparency: "true"
                            }); !r && b(); a.fire("ariaWidget", g)
                })
            }
        }); CKEDITOR.editor.prototype.addContentsCss = function (a) { var e = this.config, b = e.contentsCss; CKEDITOR.tools.isArray(b) || (e.contentsCss = b ? [b] : []); e.contentsCss.push(a) }; l = CKEDITOR.tools.createClass({
            $: function () { this.base.apply(this, arguments); this._.frameLoadedHandler = CKEDITOR.tools.addFunction(function (a) { CKEDITOR.tools.setTimeout(v, 0, this, a) }, this); this._.docTitle = this.getWindow().getFrame().getAttribute("title") || " " }, base: CKEDITOR.editable,
            proto: {
                preserveIframe: !1, setData: function (a, e) {
                    var b = this.editor; if (e) this.setHtml(a), this.fixInitialSelection(), b.fire("dataReady"); else {
                        this._.isLoadingData = !0; b._.dataStore = { id: 1 }; var c = b.config, f = c.fullPage, d = c.docType, h = CKEDITOR.tools.buildStyleHtml(x()).replace(/<style>/, '\x3cstyle data-cke-temp\x3d"1"\x3e'); f || (h += CKEDITOR.tools.buildStyleHtml(b.config.contentsCss)); var g = c.baseHref ? '\x3cbase href\x3d"' + c.baseHref + '" data-cke-temp\x3d"1" /\x3e' : ""; f && (a = a.replace(/<!DOCTYPE[^>]*>/i, function (a) {
                            b.docType =
                            d = a; return ""
                        }).replace(/<\?xml\s[^\?]*\?>/i, function (a) { b.xmlDeclaration = a; return "" })); a = b.dataProcessor.toHtml(a); f ? (/<body[\s|>]/.test(a) || (a = "\x3cbody\x3e" + a), /<html[\s|>]/.test(a) || (a = "\x3chtml\x3e" + a + "\x3c/html\x3e"), /<head[\s|>]/.test(a) ? /<title[\s|>]/.test(a) || (a = a.replace(/<head[^>]*>/, "$\x26\x3ctitle\x3e\x3c/title\x3e")) : a = a.replace(/<html[^>]*>/, "$\x26\x3chead\x3e\x3ctitle\x3e\x3c/title\x3e\x3c/head\x3e"), g && (a = a.replace(/<head[^>]*?>/, "$\x26" + g)), a = a.replace(/<\/head\s*>/, h + "$\x26"), a =
                            d + a) : a = c.docType + '\x3chtml dir\x3d"' + c.contentsLangDirection + '" lang\x3d"' + (c.contentsLanguage || b.langCode) + '"\x3e\x3chead\x3e\x3ctitle\x3e' + this._.docTitle + "\x3c/title\x3e" + g + h + "\x3c/head\x3e\x3cbody" + (c.bodyId ? ' id\x3d"' + c.bodyId + '"' : "") + (c.bodyClass ? ' class\x3d"' + c.bodyClass + '"' : "") + "\x3e" + a + "\x3c/body\x3e\x3c/html\x3e"; CKEDITOR.env.gecko && (a = a.replace(/<body/, '\x3cbody contenteditable\x3d"true" '), 2E4 > CKEDITOR.env.version && (a = a.replace(/<body[^>]*>/, "$\x26\x3c!-- cke-content-start --\x3e")));
                        a = a.replace(/<body/, '\x3cbody role\x3d"textbox" aria-multiline\x3d"true"'); b.title && (a = a.replace(/<body/, '\x3cbody aria-label\x3d"' + CKEDITOR.tools.htmlEncodeAttr(b.title) + '"')); CKEDITOR.env.gecko || (a = a.replace("\x3cbody", '\x3cbody tabindex\x3d"0" ')); c = '\x3cscript id\x3d"cke_actscrpt" type\x3d"text/javascript"' + (CKEDITOR.env.ie ? ' defer\x3d"defer" ' : "") + "\x3evar wasLoaded\x3d0;function onload(){if(!wasLoaded)window.parent.CKEDITOR \x26\x26 window.parent.CKEDITOR.tools.callFunction(" + this._.frameLoadedHandler +
                            ",window);wasLoaded\x3d1;}" + (CKEDITOR.env.ie ? "onload();" : 'document.addEventListener("DOMContentLoaded", onload, false );') + "\x3c/script\x3e"; CKEDITOR.env.ie && 9 > CKEDITOR.env.version && (c += '\x3cscript id\x3d"cke_shimscrpt"\x3ewindow.parent.CKEDITOR.tools.enableHtml5Elements(document)\x3c/script\x3e'); g && CKEDITOR.env.ie && 10 > CKEDITOR.env.version && (c += '\x3cscript id\x3d"cke_basetagscrpt"\x3evar baseTag \x3d document.querySelector( "base" );baseTag.href \x3d baseTag.href;\x3c/script\x3e'); a = a.replace(/(?=\s*<\/(:?head)>)/,
                                c); this.clearCustomData(); this.clearListeners(); b.fire("contentDomUnload"); var l = this.getDocument(); try { l.write(a) } catch (k) { setTimeout(function () { l.write(a) }, 0) }
                    }
                }, getData: function (a) {
                    if (a) return this.getHtml(); a = this.editor; var e = a.config, b = e.fullPage, c = b && a.docType, f = b && a.xmlDeclaration, d = this.getDocument(), d = b ? d.getDocumentElement().getOuterHtml() : d.getBody().getHtml(); CKEDITOR.env.gecko && e.enterMode != CKEDITOR.ENTER_BR && (d = d.replace(/<br>(?=\s*(:?$|<\/body>))/, "")); b && (d = d.replace(/<body(.*?)role="?textbox"?/i,
                        "\x3cbody$1").replace(/<body(.*?)aria-multiline="?true"?/i, "\x3cbody$1").replace(/<body(.*?)tabindex="?0"?/i, "\x3cbody$1").replace(/<body(.*?)aria-label="(.+?)"/i, "\x3cbody$1").replace(/<body(.*?)aria-readonly="?(?:true|false)"?/i, "\x3cbody$1")); d = a.dataProcessor.toDataFormat(d); f && (d = f + "\n" + d); c && (d = c + "\n" + d); return d
                }, focus: function () { this._.isLoadingData ? this._.isPendingFocus = !0 : l.baseProto.focus.call(this) }, detach: function () {
                    if (!this.preserveIframe) {
                        var a = this.editor, e = a.document, a = a.container.findOne("iframe.cke_wysiwyg_frame");
                        l.baseProto.detach.call(this); this.clearCustomData(this._.expandoNumber); e.getDocumentElement().clearCustomData(); CKEDITOR.tools.removeFunction(this._.frameLoadedHandler); a && (a.clearCustomData(), (e = a.removeCustomData("onResize")) && e.removeListener(), a.isDetached() || a.remove())
                    }
                }
            }
        })
    })(); CKEDITOR.config.disableObjectResizing = !1; CKEDITOR.config.disableNativeTableHandles = !0; CKEDITOR.config.disableNativeSpellChecker = !0; CKEDITOR.config.observableParent = CKEDITOR.document.$; (function () {
        function e(b, a) { a || (a = b.getSelection().getSelectedElement()); if (a && a.is("img") && !a.data("cke-realelement") && !a.isReadOnly()) return a } function f(b) { var a = b.getStyle("float"); if ("inherit" == a || "none" == a) a = 0; a || (a = b.getAttribute("align")); return a } CKEDITOR.plugins.add("image", {
            requires: "dialog", init: function (b) {
                if (!b.plugins.detectConflict("image", ["easyimage", "image2"])) {
                    CKEDITOR.dialog.add("image", this.path + "dialogs/image.js"); var a = "img[alt,!src]{border-style,border-width,float,height,margin,margin-bottom,margin-left,margin-right,margin-top,width}";
                    CKEDITOR.dialog.isTabEnabled(b, "image", "advanced") && (a = "img[alt,dir,id,lang,longdesc,!src,title]{*}(*)"); b.addCommand("image", new CKEDITOR.dialogCommand("image", { allowedContent: a, requiredContent: "img[alt,src]", contentTransformations: [["img{width}: sizeToStyle", "img[width]: sizeToAttribute"], ["img{float}: alignmentToStyle", "img[align]: alignmentToAttribute"]] })); b.ui.addButton && b.ui.addButton("Image", { label: b.lang.common.image, command: "image", toolbar: "insert,10" }); b.on("doubleclick", function (b) {
                        var a =
                            b.data.element; !a.is("img") || a.data("cke-realelement") || a.isReadOnly() || (b.data.dialog = "image")
                    }); b.addMenuItems && b.addMenuItems({ image: { label: b.lang.image.menu, command: "image", group: "image" } }); b.contextMenu && b.contextMenu.addListener(function (a) { if (e(b, a)) return { image: CKEDITOR.TRISTATE_OFF } })
                }
            }, afterInit: function (b) {
                function a(a) {
                    var d = b.getCommand("justify" + a); if (d) {
                        if ("left" == a || "right" == a) d.on("exec", function (d) {
                            var c = e(b), g; c && (g = f(c), g == a ? (c.removeStyle("float"), a == f(c) && c.removeAttribute("align")) :
                                c.setStyle("float", a), d.cancel())
                        }); d.on("refresh", function (d) { var c = e(b); c && (c = f(c), this.setState(c == a ? CKEDITOR.TRISTATE_ON : "right" == a || "left" == a ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED), d.cancel()) })
                    }
                } b.plugins.image2 || (a("left"), a("right"), a("center"), a("block"))
            }
        })
    })(); CKEDITOR.config.image_removeLinkByEmptyURL = !0; (function () {
        function m(a, b) { var e, f; b.on("refresh", function (a) { var b = [k], c; for (c in a.data.states) b.push(a.data.states[c]); this.setState(CKEDITOR.tools.search(b, p) ? p : k) }, b, null, 100); b.on("exec", function (b) { e = a.getSelection(); f = e.createBookmarks(1); b.data || (b.data = {}); b.data.done = !1 }, b, null, 0); b.on("exec", function () { a.forceNextSelectionCheck(); e.selectBookmarks(f) }, b, null, 100) } var k = CKEDITOR.TRISTATE_DISABLED, p = CKEDITOR.TRISTATE_OFF; CKEDITOR.plugins.add("indent", {
            init: function (a) {
                var b = CKEDITOR.plugins.indent.genericDefinition;
                m(a, a.addCommand("indent", new b(!0))); m(a, a.addCommand("outdent", new b)); a.ui.addButton && (a.ui.addButton("Indent", { label: a.lang.indent.indent, command: "indent", directional: !0, toolbar: "indent,20" }), a.ui.addButton("Outdent", { label: a.lang.indent.outdent, command: "outdent", directional: !0, toolbar: "indent,10" })); a.on("dirChanged", function (b) {
                    var f = a.createRange(), l = b.data.node; f.setStartBefore(l); f.setEndAfter(l); for (var n = new CKEDITOR.dom.walker(f), c; c = n.next();)if (c.type == CKEDITOR.NODE_ELEMENT) if (!c.equals(l) &&
                        c.getDirection()) f.setStartAfter(c), n = new CKEDITOR.dom.walker(f); else { var d = a.config.indentClasses; if (d) for (var g = "ltr" == b.data.dir ? ["_rtl", ""] : ["", "_rtl"], h = 0; h < d.length; h++)c.hasClass(d[h] + g[0]) && (c.removeClass(d[h] + g[0]), c.addClass(d[h] + g[1])); d = c.getStyle("margin-right"); g = c.getStyle("margin-left"); d ? c.setStyle("margin-left", d) : c.removeStyle("margin-left"); g ? c.setStyle("margin-right", g) : c.removeStyle("margin-right") }
                })
            }
        }); CKEDITOR.plugins.indent = {
            genericDefinition: function (a) {
                this.isIndent = !!a;
                this.startDisabled = !this.isIndent
            }, specificDefinition: function (a, b, e) { this.name = b; this.editor = a; this.jobs = {}; this.enterBr = a.config.enterMode == CKEDITOR.ENTER_BR; this.isIndent = !!e; this.relatedGlobal = e ? "indent" : "outdent"; this.indentKey = e ? 9 : CKEDITOR.SHIFT + 9; this.database = {} }, registerCommands: function (a, b) {
                a.on("pluginsLoaded", function () {
                    for (var a in b) (function (a, b) {
                        var e = a.getCommand(b.relatedGlobal), c; for (c in b.jobs) e.on("exec", function (d) {
                            d.data.done || (a.fire("lockSnapshot"), b.execJob(a, c) && (d.data.done =
                                !0), a.fire("unlockSnapshot"), CKEDITOR.dom.element.clearAllMarkers(b.database))
                        }, this, null, c), e.on("refresh", function (d) { d.data.states || (d.data.states = {}); d.data.states[b.name + "@" + c] = b.refreshJob(a, c, d.data.path) }, this, null, c); a.addFeature(b)
                    })(this, b[a])
                })
            }
        }; CKEDITOR.plugins.indent.genericDefinition.prototype = { context: "p", exec: function () { } }; CKEDITOR.plugins.indent.specificDefinition.prototype = {
            execJob: function (a, b) { var e = this.jobs[b]; if (e.state != k) return e.exec.call(this, a) }, refreshJob: function (a,
                b, e) { b = this.jobs[b]; a.activeFilter.checkFeature(this) ? b.state = b.refresh.call(this, a, e) : b.state = k; return b.state }, getContext: function (a) { return a.contains(this.context) }
        }
    })(); (function () {
        function w(f) {
            function g(b) {
                for (var e = c.startContainer, a = c.endContainer; e && !e.getParent().equals(b);)e = e.getParent(); for (; a && !a.getParent().equals(b);)a = a.getParent(); if (!e || !a) return !1; for (var d = [], h = !1; !h;)e.equals(a) && (h = !0), d.push(e), e = e.getNext(); if (1 > d.length) return !1; e = b.getParents(!0); for (a = 0; a < e.length; a++)if (e[a].getName && p[e[a].getName()]) { b = e[a]; break } for (var e = k.isIndent ? 1 : -1, a = d[0], d = d[d.length - 1], h = CKEDITOR.plugins.list.listToArray(b, q), m = h[d.getCustomData("listarray_index")].indent,
                    a = a.getCustomData("listarray_index"); a <= d.getCustomData("listarray_index"); a++)if (h[a].indent += e, 0 < e) { for (var g = h[a].parent, n = a - 1; 0 <= n; n--)if (h[n].indent === e) { g = h[n].parent; break } h[a].parent = new CKEDITOR.dom.element(g.getName(), g.getDocument()) } for (a = d.getCustomData("listarray_index") + 1; a < h.length && h[a].indent > m; a++)h[a].indent += e; e = CKEDITOR.plugins.list.arrayToList(h, q, null, f.config.enterMode, b.getDirection()); if (!k.isIndent) {
                        var t; if ((t = b.getParent()) && t.is("li")) for (var d = e.listNode.getChildren(),
                            r = [], l, a = d.count() - 1; 0 <= a; a--)(l = d.getItem(a)) && l.is && l.is("li") && r.push(l)
                    } e && e.listNode.replace(b); if (r && r.length) for (a = 0; a < r.length; a++) { for (l = b = r[a]; (l = l.getNext()) && l.is && l.getName() in p;)CKEDITOR.env.needsNbspFiller && !b.getFirst(x) && b.append(c.document.createText(" ")), b.append(l); b.insertAfter(t) } e && f.fire("contentDomInvalidated"); return !0
            } for (var k = this, q = this.database, p = this.context, c, m = f.getSelection(), m = (m && m.getRanges()).createIterator(); c = m.getNextRange();) {
                for (var b = c.getCommonAncestor(); b &&
                    (b.type != CKEDITOR.NODE_ELEMENT || !p[b.getName()]);) { if (f.editable().equals(b)) { b = !1; break } b = b.getParent() } b || (b = c.startPath().contains(p)) && c.setEndAt(b, CKEDITOR.POSITION_BEFORE_END); if (!b) { var d = c.getEnclosedNode(); d && d.type == CKEDITOR.NODE_ELEMENT && d.getName() in p && (c.setStartAt(d, CKEDITOR.POSITION_AFTER_START), c.setEndAt(d, CKEDITOR.POSITION_BEFORE_END), b = d) } b && c.startContainer.type == CKEDITOR.NODE_ELEMENT && c.startContainer.getName() in p && (d = new CKEDITOR.dom.walker(c), d.evaluator = n, c.startContainer =
                        d.next()); b && c.endContainer.type == CKEDITOR.NODE_ELEMENT && c.endContainer.getName() in p && (d = new CKEDITOR.dom.walker(c), d.evaluator = n, c.endContainer = d.previous()); if (b) return g(b)
            } return 0
        } function n(f) { return f.type == CKEDITOR.NODE_ELEMENT && f.is("li") } function x(f) { return y(f) && z(f) } var y = CKEDITOR.dom.walker.whitespaces(!0), z = CKEDITOR.dom.walker.bookmark(!1, !0), u = CKEDITOR.TRISTATE_DISABLED, v = CKEDITOR.TRISTATE_OFF; CKEDITOR.plugins.add("indentlist", {
            requires: "indent", init: function (f) {
                function g(f) {
                    k.specificDefinition.apply(this,
                        arguments); this.requiredContent = ["ul", "ol"]; f.on("key", function (g) { var c = f.elementPath(); if ("wysiwyg" == f.mode && g.data.keyCode == this.indentKey && c) { var m = this.getContext(c); !m || this.isIndent && CKEDITOR.plugins.indentList.firstItemInPath(this.context, c, m) || (f.execCommand(this.relatedGlobal), g.cancel()) } }, this); this.jobs[this.isIndent ? 10 : 30] = {
                            refresh: this.isIndent ? function (f, c) { var g = this.getContext(c), b = CKEDITOR.plugins.indentList.firstItemInPath(this.context, c, g); return g && this.isIndent && !b ? v : u } : function (f,
                                c) { return !this.getContext(c) || this.isIndent ? u : v }, exec: CKEDITOR.tools.bind(w, this)
                        }
                } var k = CKEDITOR.plugins.indent; k.registerCommands(f, { indentlist: new g(f, "indentlist", !0), outdentlist: new g(f, "outdentlist") }); CKEDITOR.tools.extend(g.prototype, k.specificDefinition.prototype, { context: { ol: 1, ul: 1 } })
            }
        }); CKEDITOR.plugins.indentList = {}; CKEDITOR.plugins.indentList.firstItemInPath = function (f, g, k) { var q = g.contains(n); k || (k = g.contains(f)); return k && q && q.equals(k.getFirst(n)) }
    })(); (function () {
        function f(b, a) { var c = k.exec(b), d = k.exec(a); if (c) { if (!c[2] && "px" == d[2]) return d[1]; if ("px" == c[2] && !d[2]) return d[1] + "px" } return a } function m(b) { return { elements: { $: function (a) { var c = a.attributes, c = c && c["data-cke-realelement"], d = l(b, decodeURIComponent(c)); if ((c = (c = c && new CKEDITOR.htmlParser.fragment.fromHtml(d)) && c.children[0]) && a.attributes["data-cke-resizable"]) { var e = (new h(a)).rules; a = c.attributes; d = e.width; e = e.height; d && (a.width = f(a.width, d)); e && (a.height = f(a.height, e)) } return c } } } }
        function l(b, a) { var c = [], d = /^cke:/i, e = new CKEDITOR.htmlParser.filter({ elements: { "^": function (a) { d.test(a.name) && (a.name = a.name.replace(d, ""), c.push(a)) }, iframe: function (a) { a.children = [] } } }), n = b.activeFilter, f = new CKEDITOR.htmlParser.basicWriter, g = CKEDITOR.htmlParser.fragment.fromHtml(a); e.applyTo(g); n.applyTo(g); CKEDITOR.tools.array.forEach(c, function (a) { a.name = "cke:" + a.name }); g.writeHtml(f); return f.getHtml() } var h = CKEDITOR.htmlParser.cssStyle, g = CKEDITOR.tools.cssLength, k = /^((?:\d*(?:\.\d+))|(?:\d+))(.*)?$/i;
        CKEDITOR.plugins.add("fakeobjects", { init: function (b) { b.filter.allow("img[!data-cke-realelement,src,alt,title](*){*}", "fakeobjects") }, afterInit: function (b) { var a = b.dataProcessor; (a = a && a.htmlFilter) && a.addRules(m(b), { applyToAll: !0 }) } }); CKEDITOR.editor.prototype.createFakeElement = function (b, a, c, d) {
            var e = this.lang.fakeobjects, e = e[c] || e.unknown; a = { "class": a, "data-cke-realelement": encodeURIComponent(b.getOuterHtml()), "data-cke-real-node-type": b.type, alt: e, title: e, align: b.getAttribute("align") || "" }; CKEDITOR.env.hc ||
                (a.src = CKEDITOR.tools.transparentImageData); c && (a["data-cke-real-element-type"] = c); d && (a["data-cke-resizable"] = d, c = new h, d = b.getAttribute("width"), b = b.getAttribute("height"), d && (c.rules.width = g(d)), b && (c.rules.height = g(b)), c.populate(a)); return this.document.createElement("img", { attributes: a })
        }; CKEDITOR.editor.prototype.createFakeParserElement = function (b, a, c, d) {
            var e = this.lang.fakeobjects, e = e[c] || e.unknown, f; f = new CKEDITOR.htmlParser.basicWriter; b.writeHtml(f); f = f.getHtml(); a = {
                "class": a, "data-cke-realelement": encodeURIComponent(f),
                "data-cke-real-node-type": b.type, alt: e, title: e, align: b.attributes.align || ""
            }; CKEDITOR.env.hc || (a.src = CKEDITOR.tools.transparentImageData); c && (a["data-cke-real-element-type"] = c); d && (a["data-cke-resizable"] = d, d = b.attributes, b = new h, c = d.width, d = d.height, void 0 !== c && (b.rules.width = g(c)), void 0 !== d && (b.rules.height = g(d)), b.populate(a)); return new CKEDITOR.htmlParser.element("img", a)
        }; CKEDITOR.editor.prototype.restoreRealElement = function (b) {
            if (b.data("cke-real-node-type") != CKEDITOR.NODE_ELEMENT) return null;
            var a = decodeURIComponent(b.data("cke-realelement")), a = l(this, a), a = CKEDITOR.dom.element.createFromHtml(a, this.document); if (b.data("cke-resizable")) { var c = b.getStyle("width"); b = b.getStyle("height"); c && a.setAttribute("width", f(a.getAttribute("width"), c)); b && a.setAttribute("height", f(a.getAttribute("height"), b)) } return a
        }
    })(); (function () {
        function p(c) { return c.replace(/'/g, "\\$\x26") } function q(c) { for (var b = c.length, a = [], e, f = 0; f < b; f++)e = c.charCodeAt(f), a.push(e); return "String.fromCharCode(" + a.join(",") + ")" } function r(c, b) { for (var a = c.plugins.link, e = a.compiledProtectionFunction.params, a = [a.compiledProtectionFunction.name, "("], f, d, g = 0; g < e.length; g++)f = e[g].toLowerCase(), d = b[f], 0 < g && a.push(","), a.push("'", d ? p(encodeURIComponent(b[f])) : "", "'"); a.push(")"); return a.join("") } function n(c) {
            c = c.config.emailProtection || ""; var b;
            c && "encode" != c && (b = {}, c.replace(/^([^(]+)\(([^)]+)\)$/, function (a, c, f) { b.name = c; b.params = []; f.replace(/[^,\s]+/g, function (a) { b.params.push(a) }) })); return b
        } CKEDITOR.plugins.add("link", {
            requires: "dialog,fakeobjects", onLoad: function () {
                function c(b) { return a.replace(/%1/g, "rtl" == b ? "right" : "left").replace(/%2/g, "cke_contents_" + b) } var b = "background:url(" + CKEDITOR.getUrl(this.path + "images" + (CKEDITOR.env.hidpi ? "/hidpi" : "") + "/anchor.png") + ") no-repeat %1 center;border:1px dotted #00f;background-size:16px;",
                    a = ".%2 a.cke_anchor,.%2 a.cke_anchor_empty,.cke_editable.%2 a[name],.cke_editable.%2 a[data-cke-saved-name]{" + b + "padding-%1:18px;cursor:auto;}.%2 img.cke_anchor{" + b + "width:16px;min-height:15px;height:1.15em;vertical-align:text-bottom;}"; CKEDITOR.addCss(c("ltr") + c("rtl"))
            }, init: function (c) {
                var b = "a[!href]"; CKEDITOR.dialog.isTabEnabled(c, "link", "advanced") && (b = b.replace("]", ",accesskey,charset,dir,id,lang,name,rel,tabindex,title,type,download]{*}(*)")); CKEDITOR.dialog.isTabEnabled(c, "link", "target") &&
                    (b = b.replace("]", ",target,onclick]")); c.addCommand("link", new CKEDITOR.dialogCommand("link", { allowedContent: b, requiredContent: "a[href]" })); c.addCommand("anchor", new CKEDITOR.dialogCommand("anchor", { allowedContent: "a[!name,id]", requiredContent: "a[name]" })); c.addCommand("unlink", new CKEDITOR.unlinkCommand); c.addCommand("removeAnchor", new CKEDITOR.removeAnchorCommand); c.setKeystroke(CKEDITOR.CTRL + 76, "link"); c.setKeystroke(CKEDITOR.CTRL + 75, "link"); c.ui.addButton && (c.ui.addButton("Link", {
                        label: c.lang.link.toolbar,
                        command: "link", toolbar: "links,10"
                    }), c.ui.addButton("Unlink", { label: c.lang.link.unlink, command: "unlink", toolbar: "links,20" }), c.ui.addButton("Anchor", { label: c.lang.link.anchor.toolbar, command: "anchor", toolbar: "links,30" })); CKEDITOR.dialog.add("link", this.path + "dialogs/link.js"); CKEDITOR.dialog.add("anchor", this.path + "dialogs/anchor.js"); c.on("doubleclick", function (a) {
                        var b = a.data.element.getAscendant({ a: 1, img: 1 }, !0); b && !b.isReadOnly() && (b.is("a") ? (a.data.dialog = !b.getAttribute("name") || b.getAttribute("href") &&
                            b.getChildCount() ? "link" : "anchor", a.data.link = b) : CKEDITOR.plugins.link.tryRestoreFakeAnchor(c, b) && (a.data.dialog = "anchor"))
                    }, null, null, 0); c.on("doubleclick", function (a) { a.data.dialog in { link: 1, anchor: 1 } && a.data.link && c.getSelection().selectElement(a.data.link) }, null, null, 20); c.addMenuItems && c.addMenuItems({
                        anchor: { label: c.lang.link.anchor.menu, command: "anchor", group: "anchor", order: 1 }, removeAnchor: { label: c.lang.link.anchor.remove, command: "removeAnchor", group: "anchor", order: 5 }, link: {
                            label: c.lang.link.menu,
                            command: "link", group: "link", order: 1
                        }, unlink: { label: c.lang.link.unlink, command: "unlink", group: "link", order: 5 }
                    }); c.contextMenu && c.contextMenu.addListener(function (a) {
                        if (!a || a.isReadOnly()) return null; a = CKEDITOR.plugins.link.tryRestoreFakeAnchor(c, a); if (!a && !(a = CKEDITOR.plugins.link.getSelectedLink(c))) return null; var b = {}; a.getAttribute("href") && a.getChildCount() && (b = { link: CKEDITOR.TRISTATE_OFF, unlink: CKEDITOR.TRISTATE_OFF }); a && a.hasAttribute("name") && (b.anchor = b.removeAnchor = CKEDITOR.TRISTATE_OFF);
                        return b
                    }); this.compiledProtectionFunction = n(c)
            }, afterInit: function (c) { c.dataProcessor.dataFilter.addRules({ elements: { a: function (a) { return a.attributes.name ? a.children.length ? null : c.createFakeParserElement(a, "cke_anchor", "anchor") : null } } }); var b = c._.elementsPath && c._.elementsPath.filters; b && b.push(function (a, b) { if ("a" == b && (CKEDITOR.plugins.link.tryRestoreFakeAnchor(c, a) || a.getAttribute("name") && (!a.getAttribute("href") || !a.getChildCount()))) return "anchor" }) }
        }); var t = /^javascript:/, u = /^(?:mailto)(?:(?!\?(subject|body)=).)+/i,
            v = /subject=([^;?:@&=$,\/]*)/i, w = /body=([^;?:@&=$,\/]*)/i, x = /^#(.*)$/, y = /^((?:http|https|ftp|news):\/\/)?(.*)$/, z = /^(_(?:self|top|parent|blank))$/, A = /^javascript:void\(location\.href='mailto:'\+String\.fromCharCode\(([^)]+)\)(?:\+'(.*)')?\)$/, B = /^javascript:([^(]+)\(([^)]+)\)$/, C = /\s*window.open\(\s*this\.href\s*,\s*(?:'([^']*)'|null)\s*,\s*'([^']*)'\s*\)\s*;\s*return\s*false;*\s*/, D = /(?:^|,)([^=]+)=(\d+|yes|no)/gi, E = /^tel:(.*)$/, m = {
                id: "advId", dir: "advLangDir", accessKey: "advAccessKey", name: "advName",
                lang: "advLangCode", tabindex: "advTabIndex", title: "advTitle", type: "advContentType", "class": "advCSSClasses", charset: "advCharset", style: "advStyles", rel: "advRel"
            }; CKEDITOR.plugins.link = {
                getSelectedLink: function (c, b) {
                    var a = c.getSelection(), e = a.getSelectedElement(), f = a.getRanges(), d = [], g; if (!b && e && e.is("a")) return e; for (e = 0; e < f.length; e++)if (g = a.getRanges()[e], g.shrink(CKEDITOR.SHRINK_ELEMENT, !0, { skipBogus: !0 }), (g = c.elementPath(g.getCommonAncestor()).contains("a", 1)) && b) d.push(g); else if (g) return g; return b ?
                        d : null
                }, getEditorAnchors: function (c) { for (var b = c.editable(), a = b.isInline() && !c.plugins.divarea ? c.document : b, b = a.getElementsByTag("a"), a = a.getElementsByTag("img"), e = [], f = 0, d; d = b.getItem(f++);)(d.data("cke-saved-name") || d.hasAttribute("name")) && e.push({ name: d.data("cke-saved-name") || d.getAttribute("name"), id: d.getAttribute("id") }); for (f = 0; d = a.getItem(f++);)(d = this.tryRestoreFakeAnchor(c, d)) && e.push({ name: d.getAttribute("name"), id: d.getAttribute("id") }); return e }, fakeAnchor: !0, tryRestoreFakeAnchor: function (c,
                    b) { if (b && b.data("cke-real-element-type") && "anchor" == b.data("cke-real-element-type")) { var a = c.restoreRealElement(b); if (a.data("cke-saved-name")) return a } }, parseLinkAttributes: function (c, b) {
                        var a = b && (b.data("cke-saved-href") || b.getAttribute("href")) || "", e = c.plugins.link.compiledProtectionFunction, f = c.config.emailProtection, d = {}, g; a.match(t) && ("encode" == f ? a = a.replace(A, function (a, b, c) { c = c || ""; return "mailto:" + String.fromCharCode.apply(String, b.split(",")) + c.replace(/\\'/g, "'") }) : f && a.replace(B, function (a,
                            b, c) { if (b == e.name) { d.type = "email"; a = d.email = {}; b = /(^')|('$)/g; c = c.match(/[^,\s]+/g); for (var f = c.length, g, h, k = 0; k < f; k++)g = decodeURIComponent, h = c[k].replace(b, "").replace(/\\'/g, "'"), h = g(h), g = e.params[k].toLowerCase(), a[g] = h; a.address = [a.name, a.domain].join("@") } })); if (!d.type) if (f = a.match(x)) d.type = "anchor", d.anchor = {}, d.anchor.name = d.anchor.id = f[1]; else if (f = a.match(E)) d.type = "tel", d.tel = f[1]; else if (f = a.match(u)) {
                                g = a.match(v); var a = a.match(w), k = d.email = {}; d.type = "email"; k.address = f[0].replace("mailto:",
                                    ""); g && (k.subject = decodeURIComponent(g[1])); a && (k.body = decodeURIComponent(a[1]))
                            } else a && (g = a.match(y)) && (d.type = "url", d.url = {}, d.url.protocol = g[1], d.url.url = g[2]); if (b) {
                                if (a = b.getAttribute("target")) d.target = { type: a.match(z) ? a : "frame", name: a }; else if (a = (a = b.data("cke-pa-onclick") || b.getAttribute("onclick")) && a.match(C)) for (d.target = { type: "popup", name: a[1] }; f = D.exec(a[2]);)"yes" != f[2] && "1" != f[2] || f[1] in { height: 1, width: 1, top: 1, left: 1 } ? isFinite(f[2]) && (d.target[f[1]] = f[2]) : d.target[f[1]] = !0; null !==
                                    b.getAttribute("download") && (d.download = !0); var a = {}, h; for (h in m) (f = b.getAttribute(h)) && (a[m[h]] = f); if (h = b.data("cke-saved-name") || a.advName) a.advName = h; CKEDITOR.tools.isEmpty(a) || (d.advanced = a)
                            } return d
                    }, getLinkAttributes: function (c, b) {
                        var a = c.config.emailProtection || "", e = {}; switch (b.type) {
                            case "url": var a = b.url && void 0 !== b.url.protocol ? b.url.protocol : "http://", f = b.url && CKEDITOR.tools.trim(b.url.url) || ""; e["data-cke-saved-href"] = 0 === f.indexOf("/") ? f : a + f; break; case "anchor": a = b.anchor && b.anchor.id;
                                e["data-cke-saved-href"] = "#" + (b.anchor && b.anchor.name || a || ""); break; case "email": var d = b.email, f = d.address; switch (a) {
                                    case "": case "encode": var g = encodeURIComponent(d.subject || ""), k = encodeURIComponent(d.body || ""), d = []; g && d.push("subject\x3d" + g); k && d.push("body\x3d" + k); d = d.length ? "?" + d.join("\x26") : ""; "encode" == a ? (a = ["javascript:void(location.href\x3d'mailto:'+", q(f)], d && a.push("+'", p(d), "'"), a.push(")")) : a = ["mailto:", f, d]; break; default: a = f.split("@", 2), d.name = a[0], d.domain = a[1], a = ["javascript:", r(c,
                                        d)]
                                }e["data-cke-saved-href"] = a.join(""); break; case "tel": e["data-cke-saved-href"] = "tel:" + b.tel
                        }if (b.target) if ("popup" == b.target.type) {
                            for (var a = ["window.open(this.href, '", b.target.name || "", "', '"], h = "resizable status location toolbar menubar fullscreen scrollbars dependent".split(" "), f = h.length, g = function (a) { b.target[a] && h.push(a + "\x3d" + b.target[a]) }, d = 0; d < f; d++)h[d] += b.target[h[d]] ? "\x3dyes" : "\x3dno"; g("width"); g("left"); g("height"); g("top"); a.push(h.join(","), "'); return false;"); e["data-cke-pa-onclick"] =
                                a.join("")
                        } else "notSet" != b.target.type && b.target.name && (e.target = b.target.name); b.download && (e.download = ""); if (b.advanced) { for (var l in m) (a = b.advanced[m[l]]) && (e[l] = a); e.name && (e["data-cke-saved-name"] = e.name) } e["data-cke-saved-href"] && (e.href = e["data-cke-saved-href"]); l = { target: 1, onclick: 1, "data-cke-pa-onclick": 1, "data-cke-saved-name": 1, download: 1 }; b.advanced && CKEDITOR.tools.extend(l, m); for (var n in e) delete l[n]; return { set: e, removed: CKEDITOR.tools.object.keys(l) }
                    }, showDisplayTextForElement: function (c,
                        b) { var a = { img: 1, table: 1, tbody: 1, thead: 1, tfoot: 1, input: 1, select: 1, textarea: 1 }, e = b.getSelection(); return b.widgets && b.widgets.focused || e && 1 < e.getRanges().length ? !1 : !c || !c.getName || !c.is(a) }
            }; CKEDITOR.unlinkCommand = function () { }; CKEDITOR.unlinkCommand.prototype = {
                exec: function (c) {
                    if (CKEDITOR.env.ie) {
                        var b = c.getSelection().getRanges()[0], a = b.getPreviousEditableNode() && b.getPreviousEditableNode().getAscendant("a", !0) || b.getNextEditableNode() && b.getNextEditableNode().getAscendant("a", !0), e; b.collapsed && a &&
                            (e = b.createBookmark(), b.selectNodeContents(a), b.select())
                    } a = new CKEDITOR.style({ element: "a", type: CKEDITOR.STYLE_INLINE, alwaysRemoveElement: 1 }); c.removeStyle(a); e && (b.moveToBookmark(e), b.select())
                }, refresh: function (c, b) { var a = b.lastElement && b.lastElement.getAscendant("a", !0); a && "a" == a.getName() && a.getAttribute("href") && a.getChildCount() ? this.setState(CKEDITOR.TRISTATE_OFF) : this.setState(CKEDITOR.TRISTATE_DISABLED) }, contextSensitive: 1, startDisabled: 1, requiredContent: "a[href]", editorFocus: 1
            }; CKEDITOR.removeAnchorCommand =
                function () { }; CKEDITOR.removeAnchorCommand.prototype = { exec: function (c) { var b = c.getSelection(), a = b.createBookmarks(), e; if (b && (e = b.getSelectedElement()) && (e.getChildCount() ? e.is("a") : CKEDITOR.plugins.link.tryRestoreFakeAnchor(c, e))) e.remove(1); else if (e = CKEDITOR.plugins.link.getSelectedLink(c)) e.hasAttribute("href") ? (e.removeAttributes({ name: 1, "data-cke-saved-name": 1 }), e.removeClass("cke_anchor")) : e.remove(1); b.selectBookmarks(a) }, requiredContent: "a[name]" }; CKEDITOR.tools.extend(CKEDITOR.config, {
                    linkShowAdvancedTab: !0,
                    linkShowTargetTab: !0, linkDefaultProtocol: "http://"
                })
    })(); (function () {
        function K(a, l, d, f) {
            for (var e = CKEDITOR.plugins.list.listToArray(l.root, d), g = [], b = 0; b < l.contents.length; b++) { var h = l.contents[b]; (h = h.getAscendant("li", !0)) && !h.getCustomData("list_item_processed") && (g.push(h), CKEDITOR.dom.element.setMarker(d, h, "list_item_processed", !0)) } for (var h = l.root.getDocument(), k, c, b = 0; b < g.length; b++) {
                var p = g[b].getCustomData("listarray_index"); k = e[p].parent; k.is(this.type) || (c = h.createElement(this.type), k.copyAttributes(c, { start: 1, type: 1 }), c.removeStyle("list-style-type"),
                    e[p].parent = c)
            } d = CKEDITOR.plugins.list.arrayToList(e, d, null, a.config.enterMode); for (var m, e = d.listNode.getChildCount(), b = 0; b < e && (m = d.listNode.getChild(b)); b++)m.getName() == this.type && f.push(m); d.listNode.replace(l.root); a.fire("contentDomInvalidated")
        } function L(a, l, d) {
            var f = l.contents, e = l.root.getDocument(), g = []; if (1 == f.length && f[0].equals(l.root)) { var b = e.createElement("div"); f[0].moveChildren && f[0].moveChildren(b); f[0].append(b); f[0] = b } l = l.contents[0].getParent(); for (b = 0; b < f.length; b++)l = l.getCommonAncestor(f[b].getParent());
            a = a.config.useComputedState; for (var h, k, b = 0; b < f.length; b++)for (var c = f[b], p; p = c.getParent();) { if (p.equals(l)) { g.push(c); !k && c.getDirection() && (k = 1); c = c.getDirection(a); null !== h && (h = h && h != c ? null : c); break } c = p } if (!(1 > g.length)) {
                f = g[g.length - 1].getNext(); b = e.createElement(this.type); for (d.push(b); g.length;)d = g.shift(), a = e.createElement("li"), c = d, c.is("pre") || M.test(c.getName()) || "false" == c.getAttribute("contenteditable") ? d.appendTo(a) : (d.copyAttributes(a), h && d.getDirection() && (a.removeStyle("direction"),
                    a.removeAttribute("dir")), d.moveChildren(a), d.remove()), a.appendTo(b); h && k && b.setAttribute("dir", h); f ? b.insertBefore(f) : b.appendTo(l)
            }
        } function N(a, l, d) {
            function f(b) { if (!(!(c = k[b ? "getFirst" : "getLast"]()) || c.is && c.isBlockBoundary() || !(p = l.root[b ? "getPrevious" : "getNext"](CKEDITOR.dom.walker.invisible(!0))) || p.is && p.isBlockBoundary({ br: 1 }))) a.document.createElement("br")[b ? "insertBefore" : "insertAfter"](c) } for (var e = CKEDITOR.plugins.list.listToArray(l.root, d), g = [], b = 0; b < l.contents.length; b++) {
                var h =
                    l.contents[b]; (h = h.getAscendant("li", !0)) && !h.getCustomData("list_item_processed") && (g.push(h), CKEDITOR.dom.element.setMarker(d, h, "list_item_processed", !0))
            } h = null; for (b = 0; b < g.length; b++)h = g[b].getCustomData("listarray_index"), e[h].indent = -1; for (b = h + 1; b < e.length; b++)if (e[b].indent > e[b - 1].indent + 1) { g = e[b - 1].indent + 1 - e[b].indent; for (h = e[b].indent; e[b] && e[b].indent >= h;)e[b].indent += g, b++; b-- } var k = CKEDITOR.plugins.list.arrayToList(e, d, null, a.config.enterMode, l.root.getAttribute("dir")).listNode, c, p;
            f(!0); f(); k.replace(l.root); a.fire("contentDomInvalidated")
        } function C(a, l) { this.name = a; this.context = this.type = l; this.allowedContent = l + " li"; this.requiredContent = l } function F(a, l, d, f) { for (var e, g; e = a[f ? "getLast" : "getFirst"](O);)(g = e.getDirection(1)) !== l.getDirection(1) && e.setAttribute("dir", g), e.remove(), d ? e[f ? "insertBefore" : "insertAfter"](d) : l.append(e, f), d = e } function G(a) {
            function l(d) {
                var f = a[d ? "getPrevious" : "getNext"](t); f && f.type == CKEDITOR.NODE_ELEMENT && f.is(a.getName()) && (F(a, f, null, !d), a.remove(),
                    a = f)
            } l(); l(1)
        } function H(a) { return a.type == CKEDITOR.NODE_ELEMENT && (a.getName() in CKEDITOR.dtd.$block || a.getName() in CKEDITOR.dtd.$listItem) && CKEDITOR.dtd[a.getName()]["#"] } function D(a, l, d) {
            a.fire("saveSnapshot"); d.enlarge(CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS); var f = d.extractContents(); l.trim(!1, !0); var e = l.createBookmark(), g = new CKEDITOR.dom.elementPath(l.startContainer), b = g.block, g = g.lastElement.getAscendant("li", 1) || b, h = new CKEDITOR.dom.elementPath(d.startContainer), k = h.contains(CKEDITOR.dtd.$listItem),
                h = h.contains(CKEDITOR.dtd.$list); b ? (b = b.getBogus()) && b.remove() : h && (b = h.getPrevious(t)) && z(b) && b.remove(); (b = f.getLast()) && b.type == CKEDITOR.NODE_ELEMENT && b.is("br") && b.remove(); (b = l.startContainer.getChild(l.startOffset)) ? f.insertBefore(b) : l.startContainer.append(f); k && (f = A(k)) && (g.contains(k) ? (F(f, k.getParent(), k), f.remove()) : g.append(f)); for (; d.checkStartOfBlock() && d.checkEndOfBlock();) {
                    h = d.startPath(); f = h.block; if (!f) break; f.is("li") && (g = f.getParent(), f.equals(g.getLast(t)) && f.equals(g.getFirst(t)) &&
                        (f = g)); d.moveToPosition(f, CKEDITOR.POSITION_BEFORE_START); f.remove()
                } d = d.clone(); f = a.editable(); d.setEndAt(f, CKEDITOR.POSITION_BEFORE_END); d = new CKEDITOR.dom.walker(d); d.evaluator = function (a) { return t(a) && !z(a) }; (d = d.next()) && d.type == CKEDITOR.NODE_ELEMENT && d.getName() in CKEDITOR.dtd.$list && G(d); l.moveToBookmark(e); l.select(); a.fire("saveSnapshot")
        } function A(a) { return (a = a.getLast(t)) && a.type == CKEDITOR.NODE_ELEMENT && a.getName() in u ? a : null } var u = { ol: 1, ul: 1 }, P = CKEDITOR.dom.walker.whitespaces(), I = CKEDITOR.dom.walker.bookmark(),
            t = function (a) { return !(P(a) || I(a)) }, z = CKEDITOR.dom.walker.bogus(); CKEDITOR.plugins.list = {
                listToArray: function (a, l, d, f, e) {
                    if (!u[a.getName()]) return []; f || (f = 0); d || (d = []); for (var g = 0, b = a.getChildCount(); g < b; g++) {
                        var h = a.getChild(g); h.type == CKEDITOR.NODE_ELEMENT && h.getName() in CKEDITOR.dtd.$list && CKEDITOR.plugins.list.listToArray(h, l, d, f + 1); if ("li" == h.$.nodeName.toLowerCase()) {
                            var k = { parent: a, indent: f, element: h, contents: [] }; e ? k.grandparent = e : (k.grandparent = a.getParent(), k.grandparent && "li" == k.grandparent.$.nodeName.toLowerCase() &&
                                (k.grandparent = k.grandparent.getParent())); l && CKEDITOR.dom.element.setMarker(l, h, "listarray_index", d.length); d.push(k); for (var c = 0, p = h.getChildCount(), m; c < p; c++)m = h.getChild(c), m.type == CKEDITOR.NODE_ELEMENT && u[m.getName()] ? CKEDITOR.plugins.list.listToArray(m, l, d, f + 1, k.grandparent) : k.contents.push(m)
                        }
                    } return d
                }, arrayToList: function (a, l, d, f, e) {
                    d || (d = 0); if (!a || a.length < d + 1) return null; for (var g, b = a[d].parent.getDocument(), h = new CKEDITOR.dom.documentFragment(b), k = null, c = d, p = Math.max(a[d].indent, 0), m =
                        null, n, r, y = f == CKEDITOR.ENTER_P ? "p" : "div"; ;) {
                            var q = a[c]; g = q.grandparent; n = q.element.getDirection(1); if (q.indent == p) { k && a[c].parent.getName() == k.getName() || (k = a[c].parent.clone(!1, 1), e && k.setAttribute("dir", e), h.append(k)); m = k.append(q.element.clone(0, 1)); n != k.getDirection(1) && m.setAttribute("dir", n); for (g = 0; g < q.contents.length; g++)m.append(q.contents[g].clone(1, 1)); c++ } else if (q.indent == Math.max(p, 0) + 1) q = a[c - 1].element.getDirection(1), c = CKEDITOR.plugins.list.arrayToList(a, null, c, f, q != n ? n : null), !m.getChildCount() &&
                                CKEDITOR.env.needsNbspFiller && 7 >= b.$.documentMode && m.append(b.createText(" ")), m.append(c.listNode), c = c.nextIndex; else if (-1 == q.indent && !d && g) {
                                    u[g.getName()] ? (m = q.element.clone(!1, !0), n != g.getDirection(1) && m.setAttribute("dir", n)) : m = new CKEDITOR.dom.documentFragment(b); var k = g.getDirection(1) != n, w = q.element, B = w.getAttribute("class"), E = w.getAttribute("style"), J = m.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT && (f != CKEDITOR.ENTER_BR || k || E || B), v, z = q.contents.length, x; for (g = 0; g < z; g++)if (v = q.contents[g], I(v) &&
                                        1 < z) J ? x = v.clone(1, 1) : m.append(v.clone(1, 1)); else if (v.type == CKEDITOR.NODE_ELEMENT && v.isBlockBoundary()) { k && !v.getDirection() && v.setAttribute("dir", n); r = v; var A = w.getAttribute("style"); A && r.setAttribute("style", A.replace(/([^;])$/, "$1;") + (r.getAttribute("style") || "")); B && v.addClass(B); r = null; x && (m.append(x), x = null); m.append(v.clone(1, 1)) } else J ? (r || (r = b.createElement(y), m.append(r), k && r.setAttribute("dir", n)), E && r.setAttribute("style", E), B && r.setAttribute("class", B), x && (r.append(x), x = null), r.append(v.clone(1,
                                            1))) : m.append(v.clone(1, 1)); x && ((r || m).append(x), x = null); m.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT && c != a.length - 1 && (CKEDITOR.env.needsBrFiller && (n = m.getLast()) && n.type == CKEDITOR.NODE_ELEMENT && n.is("br") && n.remove(), (n = m.getLast(t)) && n.type == CKEDITOR.NODE_ELEMENT && n.is(CKEDITOR.dtd.$block) || m.append(b.createElement("br"))); n = m.$.nodeName.toLowerCase(); "div" != n && "p" != n || m.appendBogus(); h.append(m); k = null; c++
                                } else return null; r = null; if (a.length <= c || Math.max(a[c].indent, 0) < p) break
                    } if (l) for (a = h.getFirst(); a;) {
                        if (a.type ==
                            CKEDITOR.NODE_ELEMENT && (CKEDITOR.dom.element.clearMarkers(l, a), a.getName() in CKEDITOR.dtd.$listItem && (d = a, b = e = f = void 0, f = d.getDirection()))) { for (e = d.getParent(); e && !(b = e.getDirection());)e = e.getParent(); f == b && d.removeAttribute("dir") } a = a.getNextSourceNode()
                    } return { listNode: h, nextIndex: c }
                }
            }; var M = /^h[1-6]$/, O = CKEDITOR.dom.walker.nodeType(CKEDITOR.NODE_ELEMENT); C.prototype = {
                exec: function (a) {
                    function l(a) { return u[a.root.getName()] && !d(a.root, [CKEDITOR.NODE_COMMENT]) } function d(a, b) {
                        return CKEDITOR.tools.array.filter(a.getChildren().toArray(),
                            function (a) { return -1 === CKEDITOR.tools.array.indexOf(b, a.type) }).length
                    } function f(a) { var b = !0; if (0 === a.getChildCount()) return !1; a.forEach(function (a) { if (a.type !== CKEDITOR.NODE_COMMENT) return b = !1 }, null, !0); return b } this.refresh(a, a.elementPath()); var e = a.config, g = a.getSelection(), b = g && g.getRanges(); if (this.state == CKEDITOR.TRISTATE_OFF) {
                        var h = a.editable(); if (h.getFirst(t)) { var k = 1 == b.length && b[0]; (e = k && k.getEnclosedNode()) && e.is && this.type == e.getName() && this.setState(CKEDITOR.TRISTATE_ON) } else e.enterMode ==
                            CKEDITOR.ENTER_BR ? h.appendBogus() : b[0].fixBlock(1, e.enterMode == CKEDITOR.ENTER_P ? "p" : "div"), g.selectRanges(b)
                    } for (var e = g.createBookmarks(!0), h = [], c = {}, b = b.createIterator(), p = 0; (k = b.getNextRange()) && ++p;) {
                        var m = k.getBoundaryNodes(), n = m.startNode, r = m.endNode; n.type == CKEDITOR.NODE_ELEMENT && "td" == n.getName() && k.setStartAt(m.startNode, CKEDITOR.POSITION_AFTER_START); r.type == CKEDITOR.NODE_ELEMENT && "td" == r.getName() && k.setEndAt(m.endNode, CKEDITOR.POSITION_BEFORE_END); k = k.createIterator(); for (k.forceBrBreak =
                            this.state == CKEDITOR.TRISTATE_OFF; m = k.getNextParagraph();)if (!m.getCustomData("list_block") && !f(m)) {
                                CKEDITOR.dom.element.setMarker(c, m, "list_block", 1); for (var y = a.elementPath(m), n = y.elements, r = 0, y = y.blockLimit, q, w = n.length - 1; 0 <= w && (q = n[w]); w--)if (u[q.getName()] && y.contains(q)) { y.removeCustomData("list_group_object_" + p); (n = q.getCustomData("list_group_object")) ? n.contents.push(m) : (n = { root: q, contents: [m] }, h.push(n), CKEDITOR.dom.element.setMarker(c, q, "list_group_object", n)); r = 1; break } r || (r = y, r.getCustomData("list_group_object_" +
                                    p) ? r.getCustomData("list_group_object_" + p).contents.push(m) : (n = { root: r, contents: [m] }, CKEDITOR.dom.element.setMarker(c, r, "list_group_object_" + p, n), h.push(n)))
                            }
                    } for (q = []; 0 < h.length;)n = h.shift(), this.state == CKEDITOR.TRISTATE_OFF ? l(n) || (u[n.root.getName()] ? K.call(this, a, n, c, q) : L.call(this, a, n, q)) : this.state == CKEDITOR.TRISTATE_ON && u[n.root.getName()] && !l(n) && N.call(this, a, n, c); for (w = 0; w < q.length; w++)G(q[w]); CKEDITOR.dom.element.clearAllMarkers(c); g.selectBookmarks(e); a.focus()
                }, refresh: function (a, l) {
                    var d =
                        l.contains(u, 1), f = l.blockLimit || l.root; d && f.contains(d) ? this.setState(d.is(this.type) ? CKEDITOR.TRISTATE_ON : CKEDITOR.TRISTATE_OFF) : this.setState(CKEDITOR.TRISTATE_OFF)
                }
            }; CKEDITOR.plugins.add("list", {
                requires: "indentlist", init: function (a) {
                    a.blockless || (a.addCommand("numberedlist", new C("numberedlist", "ol")), a.addCommand("bulletedlist", new C("bulletedlist", "ul")), a.ui.addButton && (a.ui.addButton("NumberedList", { isToggle: !0, label: a.lang.list.numberedlist, command: "numberedlist", directional: !0, toolbar: "list,10" }),
                        a.ui.addButton("BulletedList", { isToggle: !0, label: a.lang.list.bulletedlist, command: "bulletedlist", directional: !0, toolbar: "list,20" })), a.on("key", function (l) {
                            var d = l.data.domEvent.getKey(), f; if ("wysiwyg" == a.mode && d in { 8: 1, 46: 1 }) {
                                var e = a.getSelection().getRanges()[0], g = e && e.startPath(); if (e && e.collapsed) {
                                    var b = 8 == d, h = a.editable(), k = new CKEDITOR.dom.walker(e.clone()); k.evaluator = function (a) { return t(a) && !z(a) }; k.guard = function (a, b) { return !(b && a.type == CKEDITOR.NODE_ELEMENT && a.is("table")) }; d = e.clone();
                                    if (b) {
                                        var c; (c = g.contains(u)) && e.checkBoundaryOfElement(c, CKEDITOR.START) && (c = c.getParent()) && c.is("li") && (c = A(c)) ? (f = c, c = c.getPrevious(t), d.moveToPosition(c && z(c) ? c : f, CKEDITOR.POSITION_BEFORE_START)) : (k.range.setStartAt(h, CKEDITOR.POSITION_AFTER_START), k.range.setEnd(e.startContainer, e.startOffset), (c = k.previous()) && c.type == CKEDITOR.NODE_ELEMENT && (c.getName() in u || c.is("li")) && (c.is("li") || (k.range.selectNodeContents(c), k.reset(), k.evaluator = H, c = k.previous()), f = c, d.moveToElementEditEnd(f), d.moveToPosition(d.endPath().block,
                                            CKEDITOR.POSITION_BEFORE_END))); if (f) D(a, d, e), l.cancel(); else { var p = g.contains(u); p && e.checkBoundaryOfElement(p, CKEDITOR.START) && (f = p.getFirst(t), e.checkBoundaryOfElement(f, CKEDITOR.START) && (c = p.getPrevious(t), A(f) ? c && (e.moveToElementEditEnd(c), e.select()) : a.execCommand("outdent"), l.cancel())) }
                                    } else if (f = g.contains("li")) {
                                        if (k.range.setEndAt(h, CKEDITOR.POSITION_BEFORE_END), b = (h = f.getLast(t)) && H(h) ? h : f, g = 0, (c = k.next()) && c.type == CKEDITOR.NODE_ELEMENT && c.getName() in u && c.equals(h) ? (g = 1, c = k.next()) : e.checkBoundaryOfElement(b,
                                            CKEDITOR.END) && (g = 2), g && c) { e = e.clone(); e.moveToElementEditStart(c); if (1 == g && (d.optimize(), !d.startContainer.equals(f))) { for (f = d.startContainer; f.is(CKEDITOR.dtd.$inline);)p = f, f = f.getParent(); p && d.moveToPosition(p, CKEDITOR.POSITION_AFTER_END) } 2 == g && (d.moveToPosition(d.endPath().block, CKEDITOR.POSITION_BEFORE_END), e.endPath().block && e.moveToPosition(e.endPath().block, CKEDITOR.POSITION_AFTER_START)); D(a, d, e); l.cancel() }
                                    } else k.range.setEndAt(h, CKEDITOR.POSITION_BEFORE_END), (c = k.next()) && c.type == CKEDITOR.NODE_ELEMENT &&
                                        c.is(u) && (c = c.getFirst(t), g.block && e.checkStartOfBlock() && e.checkEndOfBlock() ? (g.block.remove(), e.moveToElementEditStart(c), e.select()) : A(c) ? (e.moveToElementEditStart(c), e.select()) : (e = e.clone(), e.moveToElementEditStart(c), D(a, d, e)), l.cancel()); setTimeout(function () { a.selectionChange(1) })
                                }
                            }
                        }))
                }
            })
    })(); (function () {
        function V(a, c, d) { return n(c) && n(d) && d.equals(c.getNext(function (a) { return !(E(a) || F(a) || u(a)) })) } function z(a) { this.upper = a[0]; this.lower = a[1]; this.set.apply(this, a.slice(2)) } function O(a) { var c = a.element; if (c && n(c) && (c = c.getAscendant(a.triggers, !0)) && a.editable.contains(c)) { var d = P(c); if ("true" == d.getAttribute("contenteditable")) return c; if (d.is(a.triggers)) return d } return null } function ka(a, c, d) { r(a, c); r(a, d); a = c.size.bottom; d = d.size.top; return a && d ? 0 | (a + d) / 2 : a || d } function w(a, c, d) {
            return c =
                c[d ? "getPrevious" : "getNext"](function (b) { return b && b.type == CKEDITOR.NODE_TEXT && !E(b) || n(b) && !u(b) && !A(a, b) })
        } function q(a, c, d) { return a > c && a < d } function P(a, c) { if (a.data("cke-editable")) return null; for (c || (a = a.getParent()); a && !a.data("cke-editable");) { if (a.hasAttribute("contenteditable")) return a; a = a.getParent() } return null } function la(a) {
            var c = a.doc, d = G('\x3cspan contenteditable\x3d"false" data-cke-magic-line\x3d"1" style\x3d"' + Q + "position:absolute;border-top:1px dashed " + a.boxColor + '"\x3e\x3c/span\x3e',
                c), b = CKEDITOR.getUrl(this.path + "images/" + (t.hidpi ? "hidpi/" : "") + "icon" + (a.rtl ? "-rtl" : "") + ".png"); v(d, {
                    attach: function () { this.wrap.getParent() || this.wrap.appendTo(a.editable, !0); return this }, lineChildren: [v(G('\x3cspan title\x3d"' + a.editor.lang.magicline.title + '" contenteditable\x3d"false"\x3e\x26#8629;\x3c/span\x3e', c), {
                        base: Q + "height:17px;width:17px;" + (a.rtl ? "left" : "right") + ":17px;background:url(" + b + ") center no-repeat " + a.boxColor + ";cursor:pointer;" + (t.hc ? "font-size: 15px;line-height:14px;border:1px solid #fff;text-align:center;" :
                            "") + (t.hidpi ? "background-size: 9px 10px;" : ""), looks: ["top:-8px; border-radius: 2px;", "top:-17px; border-radius: 2px 2px 0px 0px;", "top:-1px; border-radius: 0px 0px 2px 2px;"]
                    }), v(G(W, c), { base: X + "left:0px;border-left-color:" + a.boxColor + ";", looks: ["border-width:8px 0 8px 8px;top:-8px", "border-width:8px 0 0 8px;top:-8px", "border-width:0 0 8px 8px;top:0px"] }), v(G(W, c), {
                        base: X + "right:0px;border-right-color:" + a.boxColor + ";", looks: ["border-width:8px 8px 8px 0;top:-8px", "border-width:8px 8px 0 0;top:-8px",
                            "border-width:0 8px 8px 0;top:0px"]
                    })], detach: function () { this.wrap.getParent() && this.wrap.remove(); return this }, mouseNear: function () { r(a, this); var b = a.holdDistance, c = this.size; return c && q(a.mouse.y, c.top - b, c.bottom + b) && q(a.mouse.x, c.left - b, c.right + b) ? !0 : !1 }, place: function () {
                        var b = a.view, c = a.editable, d = a.trigger, h = d.upper, g = d.lower, l = h || g, p = l.getParent(), m = {}; this.trigger = d; h && r(a, h, !0); g && r(a, g, !0); r(a, p, !0); a.inInlineMode && H(a, !0); p.equals(c) ? (m.left = b.scroll.x, m.right = -b.scroll.x, m.width = "") : (m.left =
                            l.size.left - l.size.margin.left + b.scroll.x - (a.inInlineMode ? b.editable.left + b.editable.border.left : 0), m.width = l.size.outerWidth + l.size.margin.left + l.size.margin.right + b.scroll.x, m.right = ""); h && g ? m.top = h.size.margin.bottom === g.size.margin.top ? 0 | h.size.bottom + h.size.margin.bottom / 2 : h.size.margin.bottom < g.size.margin.top ? h.size.bottom + h.size.margin.bottom : h.size.bottom + h.size.margin.bottom - g.size.margin.top : h ? g || (m.top = h.size.bottom + h.size.margin.bottom) : m.top = g.size.top - g.size.margin.top; d.is(C) || q(m.top,
                                b.scroll.y - 15, b.scroll.y + 5) ? (m.top = a.inInlineMode ? 0 : b.scroll.y, this.look(C)) : d.is(D) || q(m.top, b.pane.bottom - 5, b.pane.bottom + 15) ? (m.top = a.inInlineMode ? b.editable.height + b.editable.padding.top + b.editable.padding.bottom : b.pane.bottom - 1, this.look(D)) : (a.inInlineMode && (m.top -= b.editable.top + b.editable.border.top), this.look(x)); a.inInlineMode && (m.top--, m.top += b.editable.scroll.top, m.left += b.editable.scroll.left); for (var n in m) m[n] = CKEDITOR.tools.cssLength(m[n]); this.setStyles(m)
                    }, look: function (a) {
                        if (this.oldLook !=
                            a) { for (var b = this.lineChildren.length, c; b--;)(c = this.lineChildren[b]).setAttribute("style", c.base + c.looks[0 | a / 2]); this.oldLook = a }
                    }, wrap: new R("span", a.doc)
                }); for (c = d.lineChildren.length; c--;)d.lineChildren[c].appendTo(d); d.look(x); d.appendTo(d.wrap); d.unselectable(); d.lineChildren[0].on("mouseup", function (b) {
                    d.detach(); S(a, function (b) { var c = a.line.trigger; b[c.is(I) ? "insertBefore" : "insertAfter"](c.is(I) ? c.lower : c.upper) }, !0); a.editor.focus(); t.ie || a.enterMode == CKEDITOR.ENTER_BR || a.hotNode.scrollIntoView();
                    b.data.preventDefault(!0)
                }); d.on("mousedown", function (a) { a.data.preventDefault(!0) }); a.line = d
        } function S(a, c, d) { var b = new CKEDITOR.dom.range(a.doc), e = a.editor, f; t.ie && a.enterMode == CKEDITOR.ENTER_BR ? f = a.doc.createText(J) : (f = (f = P(a.element, !0)) && f.data("cke-enter-mode") || a.enterMode, f = new R(K[f], a.doc), f.is("br") || a.doc.createText(J).appendTo(f)); d && e.fire("saveSnapshot"); c(f); b.moveToPosition(f, CKEDITOR.POSITION_AFTER_START); e.getSelection().selectRanges([b]); a.hotNode = f; d && e.fire("saveSnapshot") }
        function Y(a, c) {
            return {
                canUndo: !0, modes: { wysiwyg: 1 }, exec: function () {
                    function d(b) { var d = t.ie && 9 > t.version ? " " : J, f = a.hotNode && a.hotNode.getText() == d && a.element.equals(a.hotNode) && a.lastCmdDirection === !!c; S(a, function (d) { f && a.hotNode && a.hotNode.remove(); d[c ? "insertAfter" : "insertBefore"](b); d.setAttributes({ "data-cke-magicline-hot": 1, "data-cke-magicline-dir": !!c }); a.lastCmdDirection = !!c }); t.ie || a.enterMode == CKEDITOR.ENTER_BR || a.hotNode.scrollIntoView(); a.line.detach() } return function (b) {
                        b = b.getSelection().getStartElement();
                        var e; b = b.getAscendant(Z, 1); if (!aa(a, b) && b && !b.equals(a.editable) && !b.contains(a.editable)) { (e = P(b)) && "false" == e.getAttribute("contenteditable") && (b = e); a.element = b; e = w(a, b, !c); var f; n(e) && e.is(a.triggers) && e.is(ma) && (!w(a, e, !c) || (f = w(a, e, !c)) && n(f) && f.is(a.triggers)) ? d(e) : (f = O(a, b), n(f) && (w(a, f, !c) ? (b = w(a, f, !c)) && n(b) && b.is(a.triggers) && d(f) : d(f))) }
                    }
                }()
            }
        } function A(a, c) { if (!c || c.type != CKEDITOR.NODE_ELEMENT || !c.$) return !1; var d = a.line; return d.wrap.equals(c) || d.wrap.contains(c) } function n(a) {
            return a &&
                a.type == CKEDITOR.NODE_ELEMENT && a.$
        } function u(a) { if (!n(a)) return !1; var c; (c = ba(a)) || (n(a) ? (c = { left: 1, right: 1, center: 1 }, c = !(!c[a.getComputedStyle("float")] && !c[a.getAttribute("align")])) : c = !1); return c } function ba(a) { return !!{ absolute: 1, fixed: 1 }[a.getComputedStyle("position")] } function L(a, c) { return n(c) ? c.is(a.triggers) : null } function aa(a, c) { if (!c) return !1; for (var d = c.getParents(1), b = d.length; b--;)for (var e = a.tabuList.length; e--;)if (d[b].hasAttribute(a.tabuList[e])) return !0; return !1 } function na(a,
            c, d) { c = c[d ? "getLast" : "getFirst"](function (b) { return a.isRelevant(b) && !b.is(oa) }); if (!c) return !1; r(a, c); return d ? c.size.top > a.mouse.y : c.size.bottom < a.mouse.y } function ca(a) {
                var c = a.editable, d = a.mouse, b = a.view, e = a.triggerOffset; H(a); var f = d.y > (a.inInlineMode ? b.editable.top + b.editable.height / 2 : Math.min(b.editable.height, b.pane.height) / 2), c = c[f ? "getLast" : "getFirst"](function (a) { return !(E(a) || F(a)) }); if (!c) return null; A(a, c) && (c = a.line.wrap[f ? "getPrevious" : "getNext"](function (a) { return !(E(a) || F(a)) }));
                if (!n(c) || u(c) || !L(a, c)) return null; r(a, c); return !f && 0 <= c.size.top && q(d.y, 0, c.size.top + e) ? (a = a.inInlineMode || 0 === b.scroll.y ? C : x, new z([null, c, I, M, a])) : f && c.size.bottom <= b.pane.height && q(d.y, c.size.bottom - e, b.pane.height) ? (a = a.inInlineMode || q(c.size.bottom, b.pane.height - e, b.pane.height) ? D : x, new z([c, null, da, M, a])) : null
            } function ea(a) {
                var c = a.mouse, d = a.view, b = a.triggerOffset, e = O(a); if (!e) return null; r(a, e); var b = Math.min(b, 0 | e.size.outerHeight / 2), f = [], k, h; if (q(c.y, e.size.top - 1, e.size.top + b)) h = !1; else if (q(c.y,
                    e.size.bottom - b, e.size.bottom + 1)) h = !0; else return null; if (u(e) || na(a, e, h) || e.getParent().is(fa)) return null; var g = w(a, e, !h); if (g) { if (g && g.type == CKEDITOR.NODE_TEXT) return null; if (n(g)) { if (u(g) || !L(a, g) || g.getParent().is(fa)) return null; f = [g, e][h ? "reverse" : "concat"]().concat([T, M]) } } else e.equals(a.editable[h ? "getLast" : "getFirst"](a.isRelevant)) ? (H(a), h && q(c.y, e.size.bottom - b, d.pane.height) && q(e.size.bottom, d.pane.height - b, d.pane.height) ? k = D : q(c.y, 0, e.size.top + b) && (k = C)) : k = x, f = [null, e][h ? "reverse" :
                        "concat"]().concat([h ? da : I, M, k, e.equals(a.editable[h ? "getLast" : "getFirst"](a.isRelevant)) ? h ? D : C : x]); return 0 in f ? new z(f) : null
            } function U(a, c, d, b) {
                for (var e = c.getDocumentPosition(), f = {}, k = {}, h = {}, g = {}, l = y.length; l--;)f[y[l]] = parseInt(c.getComputedStyle.call(c, "border-" + y[l] + "-width"), 10) || 0, h[y[l]] = parseInt(c.getComputedStyle.call(c, "padding-" + y[l]), 10) || 0, k[y[l]] = parseInt(c.getComputedStyle.call(c, "margin-" + y[l]), 10) || 0; d && !b || N(a, b); g.top = e.y - (d ? 0 : a.view.scroll.y); g.left = e.x - (d ? 0 : a.view.scroll.x);
                g.outerWidth = c.$.offsetWidth; g.outerHeight = c.$.offsetHeight; g.height = g.outerHeight - (h.top + h.bottom + f.top + f.bottom); g.width = g.outerWidth - (h.left + h.right + f.left + f.right); g.bottom = g.top + g.outerHeight; g.right = g.left + g.outerWidth; a.inInlineMode && (g.scroll = { top: c.$.scrollTop, left: c.$.scrollLeft }); return v({ border: f, padding: h, margin: k, ignoreScroll: d }, g, !0)
            } function r(a, c, d) {
                if (!n(c)) return c.size = null; if (!c.size) c.size = {}; else if (c.size.ignoreScroll == d && c.size.date > new Date - ga) return null; return v(c.size,
                    U(a, c, d), { date: +new Date }, !0)
            } function H(a, c) { a.view.editable = U(a, a.editable, c, !0) } function N(a, c) { a.view || (a.view = {}); var d = a.view; if (!(!c && d && d.date > new Date - ga)) { var b = a.win, d = b.getScrollPosition(), b = b.getViewPaneSize(); v(a.view, { scroll: { x: d.x, y: d.y, width: a.doc.$.documentElement.scrollWidth - b.width, height: a.doc.$.documentElement.scrollHeight - b.height }, pane: { width: b.width, height: b.height, bottom: b.height + d.y }, date: +new Date }, !0) } } function pa(a, c, d, b) {
                for (var e = b, f = b, k = 0, h = !1, g = !1, l = a.view.pane.height,
                    p = a.mouse; p.y + k < l && 0 < p.y - k;) { h || (h = c(e, b)); g || (g = c(f, b)); !h && 0 < p.y - k && (e = d(a, { x: p.x, y: p.y - k })); !g && p.y + k < l && (f = d(a, { x: p.x, y: p.y + k })); if (h && g) break; k += 2 } return new z([e, f, null, null])
            } CKEDITOR.plugins.add("magicline", {
                init: function (a) {
                    var c = a.config, d = c.magicline_triggerOffset || 30, b = {
                        editor: a, enterMode: c.enterMode, triggerOffset: d, holdDistance: 0 | d * (c.magicline_holdDistance || .5), boxColor: c.magicline_color || "#ff0000", rtl: "rtl" == c.contentsLangDirection, tabuList: ["data-cke-hidden-sel"].concat(c.magicline_tabuList ||
                            []), triggers: c.magicline_everywhere ? Z : { table: 1, hr: 1, div: 1, ul: 1, ol: 1, dl: 1, form: 1, blockquote: 1 }
                    }, e, f, k; b.isRelevant = function (a) { return n(a) && !A(b, a) && !u(a) }; a.on("contentDom", function () {
                        var d = a.editable(), g = a.document, l = a.window; v(b, { editable: d, inInlineMode: d.isInline(), doc: g, win: l, hotNode: null }, !0); b.boundary = b.inInlineMode ? b.editable : b.doc.getDocumentElement(); d.is(B.$inline) || (b.inInlineMode && !ba(d) && d.setStyles({ position: "relative", top: null, left: null }), la.call(this, b), N(b), d.attachListener(a, "beforeUndoImage",
                            function () { b.line.detach() }), d.attachListener(a, "beforeGetData", function () { b.line.wrap.getParent() && (b.line.detach(), a.once("getData", function () { b.line.attach() }, null, null, 1E3)) }, null, null, 0), d.attachListener(b.inInlineMode ? g : g.getWindow().getFrame(), "mouseout", function (c) {
                                if ("wysiwyg" == a.mode) if (b.inInlineMode) { var d = c.data.$.clientX; c = c.data.$.clientY; N(b); H(b, !0); var e = b.view.editable, f = b.view.scroll; d > e.left - f.x && d < e.right - f.x && c > e.top - f.y && c < e.bottom - f.y || (clearTimeout(k), k = null, b.line.detach()) } else clearTimeout(k),
                                    k = null, b.line.detach()
                            }), d.attachListener(d, "keyup", function () { b.hiddenMode = 0 }), d.attachListener(d, "keydown", function (c) { if ("wysiwyg" == a.mode) switch (c.data.getKeystroke()) { case 2228240: case 16: b.hiddenMode = 1, b.line.detach() } }), d.attachListener(b.inInlineMode ? d : g, "mousemove", function (c) {
                                f = !0; if ("wysiwyg" == a.mode && !a.readOnly && !k) {
                                    var d = { x: c.data.$.clientX, y: c.data.$.clientY }; k = setTimeout(function () {
                                        b.mouse = d; k = b.trigger = null; N(b); f && !b.hiddenMode && a.focusManager.hasFocus && !b.line.mouseNear() && (b.element =
                                            ha(b, !0)) && ((b.trigger = ca(b) || ea(b) || ia(b)) && !aa(b, b.trigger.upper || b.trigger.lower) ? b.line.attach().place() : (b.trigger = null, b.line.detach()), f = !1)
                                    }, 30)
                                }
                            }), d.attachListener(l, "scroll", function () { "wysiwyg" == a.mode && (b.line.detach(), t.webkit && (b.hiddenMode = 1, clearTimeout(e), e = setTimeout(function () { b.mouseDown || (b.hiddenMode = 0) }, 50))) }), d.attachListener(ja ? g : l, "mousedown", function () { "wysiwyg" == a.mode && (b.line.detach(), b.hiddenMode = 1, b.mouseDown = 1) }), d.attachListener(ja ? g : l, "mouseup", function () {
                                b.hiddenMode =
                                0; b.mouseDown = 0
                            }), a.addCommand("accessPreviousSpace", Y(b)), a.addCommand("accessNextSpace", Y(b, !0)), a.setKeystroke([[c.magicline_keystrokePrevious, "accessPreviousSpace"], [c.magicline_keystrokeNext, "accessNextSpace"]]), a.on("loadSnapshot", function () { var c, d, e, f; for (f in { p: 1, br: 1, div: 1 }) for (c = a.document.getElementsByTag(f), e = c.count(); e--;)if ((d = c.getItem(e)).data("cke-magicline-hot")) { b.hotNode = d; b.lastCmdDirection = "true" === d.data("cke-magicline-dir") ? !0 : !1; return } }), a._.magiclineBackdoor = {
                                accessFocusSpace: S,
                                boxTrigger: z, isLine: A, getAscendantTrigger: O, getNonEmptyNeighbour: w, getSize: U, that: b, triggerEdge: ea, triggerEditable: ca, triggerExpand: ia
                            })
                    }, this)
                }
            }); var v = CKEDITOR.tools.extend, R = CKEDITOR.dom.element, G = R.createFromHtml, t = CKEDITOR.env, ja = CKEDITOR.env.ie && 9 > CKEDITOR.env.version, B = CKEDITOR.dtd, K = {}, I = 128, da = 64, T = 32, M = 16, C = 4, D = 2, x = 1, J = " ", fa = B.$listItem, oa = B.$tableContent, ma = v({}, B.$nonEditable, B.$empty), Z = B.$block, ga = 100, Q = "width:0px;height:0px;padding:0px;margin:0px;display:block;z-index:9999;color:#fff;position:absolute;font-size: 0px;line-height:0px;",
                X = Q + "border-color:transparent;display:block;border-style:solid;", W = "\x3cspan\x3e" + J + "\x3c/span\x3e"; K[CKEDITOR.ENTER_BR] = "br"; K[CKEDITOR.ENTER_P] = "p"; K[CKEDITOR.ENTER_DIV] = "div"; z.prototype = { set: function (a, c, d) { this.properties = a + c + (d || x); return this }, is: function (a) { return (this.properties & a) == a } }; var ha = function () {
                    function a(a, d) { var b = a.$.elementFromPoint(d.x, d.y); return b && b.nodeType ? new CKEDITOR.dom.element(b) : null } return function (c, d, b) {
                        if (!c.mouse) return null; var e = c.doc, f = c.line.wrap; b = b || c.mouse;
                        var k = a(e, b); d && A(c, k) && (f.hide(), k = a(e, b), f.show()); return !k || k.type != CKEDITOR.NODE_ELEMENT || !k.$ || t.ie && 9 > t.version && !c.boundary.equals(k) && !c.boundary.contains(k) ? null : k
                    }
                }(), E = CKEDITOR.dom.walker.whitespaces(), F = CKEDITOR.dom.walker.nodeType(CKEDITOR.NODE_COMMENT), ia = function () {
                    function a(a) {
                        var b = a.element, e, f, k; if (!n(b) || b.contains(a.editable) || b.isReadOnly()) return null; k = pa(a, function (a, b) { return !b.equals(a) }, function (a, b) { return ha(a, !0, b) }, b); e = k.upper; f = k.lower; if (V(a, e, f)) return k.set(T,
                            8); if (e && b.contains(e)) for (; !e.getParent().equals(b);)e = e.getParent(); else e = b.getFirst(function (b) { return c(a, b) }); if (f && b.contains(f)) for (; !f.getParent().equals(b);)f = f.getParent(); else f = b.getLast(function (b) { return c(a, b) }); if (!e || !f) return null; r(a, e); r(a, f); if (!q(a.mouse.y, e.size.top, f.size.bottom)) return null; for (var b = Number.MAX_VALUE, h, g, l, p; f && !f.equals(e) && (g = e.getNext(a.isRelevant));)h = Math.abs(ka(a, e, g) - a.mouse.y), h < b && (b = h, l = e, p = g), e = g, r(a, e); if (!l || !p || !q(a.mouse.y, l.size.top, p.size.bottom)) return null;
                        k.upper = l; k.lower = p; return k.set(T, 8)
                    } function c(a, b) { return !(b && b.type == CKEDITOR.NODE_TEXT || F(b) || u(b) || A(a, b) || b.type == CKEDITOR.NODE_ELEMENT && b.$ && b.is("br")) } return function (c) { var b = a(c), e; if (e = b) { e = b.upper; var f = b.lower; e = !e || !f || u(f) || u(e) || f.equals(e) || e.equals(f) || f.contains(e) || e.contains(f) ? !1 : L(c, e) && L(c, f) && V(c, e, f) ? !0 : !1 } return e ? b : null }
                }(), y = ["top", "left", "right", "bottom"]
    })(); CKEDITOR.config.magicline_keystrokePrevious = CKEDITOR.CTRL + CKEDITOR.SHIFT + 51;
    CKEDITOR.config.magicline_keystrokeNext = CKEDITOR.CTRL + CKEDITOR.SHIFT + 52; (function () {
        function n(a) { if (!a || a.type != CKEDITOR.NODE_ELEMENT || "form" != a.getName()) return []; for (var c = [], d = ["style", "className"], b = 0; b < d.length; b++) { var e = a.$.elements.namedItem(d[b]); e && (e = new CKEDITOR.dom.element(e), c.push([e, e.nextSibling]), e.remove()) } return c } function h(a, c) { if (a && a.type == CKEDITOR.NODE_ELEMENT && "form" == a.getName() && 0 < c.length) for (var d = c.length - 1; 0 <= d; d--) { var b = c[d][0], e = c[d][1]; e ? b.insertBefore(e) : b.appendTo(a) } } function q(a, c) {
            var d = n(a), b = {}, e = a.$; c || (b["class"] = e.className ||
                "", e.className = ""); b.inline = e.style.cssText || ""; c || (e.style.cssText = "position: static; overflow: visible"); h(d); return b
        } function r(a, c) { var d = n(a), b = a.$; "class" in c && (b.className = c["class"]); "inline" in c && (b.style.cssText = c.inline); h(d) } function t(a) {
            if (!a.editable().isInline()) {
                var c = CKEDITOR.instances, d; for (d in c) { var b = c[d]; "wysiwyg" != b.mode || b.readOnly || (b = b.document.getBody(), b.setAttribute("contentEditable", !1), b.setAttribute("contentEditable", !0)) } a.editable().hasFocus && (a.toolbox.focus(),
                    a.focus())
            }
        } CKEDITOR.plugins.add("maximize", {
            init: function (a) {
                function c() { var c = g.getViewPaneSize(); a.resize(c.width, c.height, null, !0) } function d() { var c = a.getCommand("maximize"); c.state === CKEDITOR.TRISTATE_ON && c.exec() } if (a.elementMode != CKEDITOR.ELEMENT_MODE_INLINE) {
                    var b = a.lang, e = CKEDITOR.document, g = e.getWindow(), l, m, p, n = CKEDITOR.TRISTATE_OFF; a.addCommand("maximize", {
                        modes: { wysiwyg: !CKEDITOR.env.iOS, source: !CKEDITOR.env.iOS }, readOnly: 1, editorFocus: !1, exec: function () {
                            var b = a.container.getFirst(function (a) {
                                return a.type ==
                                    CKEDITOR.NODE_ELEMENT && a.hasClass("cke_inner")
                            }), d = a.ui.space("contents"); if ("wysiwyg" == a.mode) { var f = a.getSelection(); l = f && f.getRanges(); m = g.getScrollPosition() } else { var k = a.editable().$; l = !CKEDITOR.env.ie && [k.selectionStart, k.selectionEnd]; m = [k.scrollLeft, k.scrollTop] } if (this.state == CKEDITOR.TRISTATE_OFF) {
                                g.on("resize", c); p = g.getScrollPosition(); for (f = a.container; f = f.getParent();)f.setCustomData("maximize_saved_styles", q(f)), f.setStyle("z-index", a.config.baseFloatZIndex - 5); d.setCustomData("maximize_saved_styles",
                                    q(d, !0)); b.setCustomData("maximize_saved_styles", q(b, !0)); d = { overflow: CKEDITOR.env.webkit ? "" : "hidden", width: 0, height: 0 }; e.getDocumentElement().setStyles(d); !CKEDITOR.env.gecko && e.getDocumentElement().setStyle("position", "fixed"); CKEDITOR.env.gecko && CKEDITOR.env.quirks || e.getBody().setStyles(d); CKEDITOR.env.ie ? setTimeout(function () { g.$.scrollTo(0, 0) }, 0) : g.$.scrollTo(0, 0); b.setStyle("position", CKEDITOR.env.gecko && CKEDITOR.env.quirks ? "fixed" : "absolute"); b.$.offsetLeft; b.setStyles({
                                        "z-index": a.config.baseFloatZIndex -
                                            5, left: "0px", top: "0px"
                                    }); b.addClass("cke_maximized"); c(); d = b.getDocumentPosition(); b.setStyles({ left: -1 * d.x + "px", top: -1 * d.y + "px" }); CKEDITOR.env.gecko && t(a)
                            } else if (this.state == CKEDITOR.TRISTATE_ON) {
                                g.removeListener("resize", c); for (var f = [d, b], h = 0; h < f.length; h++)r(f[h], f[h].getCustomData("maximize_saved_styles")), f[h].removeCustomData("maximize_saved_styles"); for (f = a.container; f = f.getParent();)r(f, f.getCustomData("maximize_saved_styles")), f.removeCustomData("maximize_saved_styles"); CKEDITOR.env.ie ?
                                    setTimeout(function () { g.$.scrollTo(p.x, p.y) }, 0) : g.$.scrollTo(p.x, p.y); b.removeClass("cke_maximized"); CKEDITOR.env.webkit && (b.setStyle("display", "inline"), setTimeout(function () { b.setStyle("display", "block") }, 0)); a.fire("resize", { outerHeight: a.container.$.offsetHeight, contentsHeight: d.$.offsetHeight, outerWidth: a.container.$.offsetWidth })
                            } this.toggleState(); "wysiwyg" == a.mode ? l ? (CKEDITOR.env.gecko && t(a), a.getSelection().selectRanges(l), (k = a.getSelection().getStartElement()) && k.scrollIntoView(!0)) : g.$.scrollTo(m.x,
                                m.y) : (l && (k.selectionStart = l[0], k.selectionEnd = l[1]), k.scrollLeft = m[0], k.scrollTop = m[1]); l = m = null; n = this.state; a.fire("maximize", this.state)
                        }, canUndo: !1
                    }); a.ui.addButton && a.ui.addButton("Maximize", { isToggle: !0, label: b.maximize.maximize, command: "maximize", toolbar: "tools,10" }); a.on("mode", function () { var b = a.getCommand("maximize"); b.setState(b.state == CKEDITOR.TRISTATE_DISABLED ? CKEDITOR.TRISTATE_DISABLED : n) }, null, null, 100); if (a.config.maximize_historyIntegration) {
                        var h = a.config.maximize_historyIntegration ===
                            CKEDITOR.HISTORY_NATIVE ? "popstate" : "hashchange"; g.on(h, d); a.on("destroy", function () { g.removeListener(h, d) })
                    }
                }
            }
        }); CKEDITOR.config.maximize_historyIntegration = CKEDITOR.HISTORY_NATIVE
    })(); (function () {
        var f = { canUndo: !1, async: !0, exec: function (a, b) { var c = a.lang, e = CKEDITOR.tools.keystrokeToString(c.common.keyboard, a.getCommandKeystroke(CKEDITOR.env.ie ? a.commands.paste : this)), d = b && "undefined" !== typeof b.notification ? b.notification : !b || !b.from || "keystrokeHandler" === b.from && CKEDITOR.env.ie, c = d && "string" === typeof d ? d : c.pastetext.pasteNotification.replace(/%1/, '\x3ckbd aria-label\x3d"' + e.aria + '"\x3e' + e.display + "\x3c/kbd\x3e"); a.execCommand("paste", { type: "text", notification: d ? c : !1 }) } }; CKEDITOR.plugins.add("pastetext",
            { requires: "clipboard", init: function (a) { var b = CKEDITOR.env.safari ? CKEDITOR.CTRL + CKEDITOR.ALT + CKEDITOR.SHIFT + 86 : CKEDITOR.CTRL + CKEDITOR.SHIFT + 86; a.addCommand("pastetext", f); a.setKeystroke(b, "pastetext"); CKEDITOR.plugins.clipboard.addPasteButton(a, "PasteText", { label: a.lang.pastetext.button, command: "pastetext", toolbar: "clipboard,40" }); if (a.config.forcePasteAsPlainText) a.on("beforePaste", function (a) { "html" != a.data.type && (a.data.type = "text") }); a.on("pasteState", function (b) { a.getCommand("pastetext").setState(b.data) }) } })
    })(); (function () {
        CKEDITOR.plugins.add("xml", {}); CKEDITOR.xml = function (c) { var a = null; if ("object" == typeof c) a = c; else if (c = (c || "").replace(/&nbsp;/g, " "), "ActiveXObject" in window) { try { a = new ActiveXObject("MSXML2.DOMDocument") } catch (b) { try { a = new ActiveXObject("Microsoft.XmlDom") } catch (d) { } } a && (a.async = !1, a.resolveExternals = !1, a.validateOnParse = !1, a.loadXML(c)) } else window.DOMParser && (a = (new DOMParser).parseFromString(c, "text/xml")); this.baseXml = a }; CKEDITOR.xml.prototype = {
            selectSingleNode: function (c, a) {
                var b =
                    this.baseXml; if (a || (a = b)) { if ("selectSingleNode" in a) return a.selectSingleNode(c); if (b.evaluate) return (b = b.evaluate(c, a, null, 9, null)) && b.singleNodeValue || null } return null
            }, selectNodes: function (c, a) { var b = this.baseXml, d = []; if (a || (a = b)) { if ("selectNodes" in a) return a.selectNodes(c); if (b.evaluate && (b = b.evaluate(c, a, null, 5, null))) for (var e; e = b.iterateNext();)d.push(e) } return d }, getInnerXml: function (c, a) {
                var b = this.selectSingleNode(c, a), d = []; if (b) for (b = b.firstChild; b;)b.xml ? d.push(b.xml) : window.XMLSerializer &&
                    d.push((new XMLSerializer).serializeToString(b)), b = b.nextSibling; return d.length ? d.join("") : null
            }
        }
    })(); (function () {
        CKEDITOR.plugins.add("ajax", { requires: "xml" }); CKEDITOR.ajax = function () {
            function k() { if (!CKEDITOR.env.ie || "file:" != location.protocol) try { return new XMLHttpRequest } catch (a) { } try { return new ActiveXObject("Msxml2.XMLHTTP") } catch (b) { } try { return new ActiveXObject("Microsoft.XMLHTTP") } catch (c) { } return null } function h(a, b) {
                if (4 != a.readyState || !(200 <= a.status && 300 > a.status || 304 == a.status || 0 === a.status || 1223 == a.status)) return null; switch (b) {
                    case "text": return a.responseText; case "xml": var c = a.responseXML;
                        return new CKEDITOR.xml(c && c.firstChild ? c : a.responseText); case "arraybuffer": return a.response; default: return null
                }
            } function g(a, b, c) { var e = !!b, d = k(); if (!d) return null; e && "text" !== c && "xml" !== c && (d.responseType = c); d.open("GET", a, e); e && (d.onreadystatechange = function () { 4 == d.readyState && (b(h(d, c)), d = null) }); d.send(null); return e ? "" : h(d, c) } function l(a, b, c, e, d) {
                var f = k(); if (!f) return null; f.open("POST", a, !0); f.onreadystatechange = function () { 4 == f.readyState && (e && e(h(f, d)), f = null) }; f.setRequestHeader("Content-type",
                    c || "application/x-www-form-urlencoded; charset\x3dUTF-8"); f.send(b)
            } return { load: function (a, b, c) { return g(a, b, c || "text") }, post: function (a, b, c, e) { return l(a, b, c, e, "text") }, loadXml: function (a, b) { return g(a, b, "xml") }, loadText: function (a, b) { return g(a, b, "text") }, loadBinary: function (a, b) { return g(a, b, "arraybuffer") } }
        }()
    })(); (function () {
        function n(a, b) { return CKEDITOR.tools.array.filter(a, function (a) { return a.canHandle(b) }).sort(function (a, c) { return a.priority === c.priority ? 0 : a.priority - c.priority }) } function k(a, b) { var d = a.shift(); d && d.handle(b, function () { k(a, b) }) } function p(a) { var b = CKEDITOR.tools.array.reduce(a, function (a, c) { return CKEDITOR.tools.array.isArray(c.filters) ? a.concat(c.filters) : a }, []); return CKEDITOR.tools.array.filter(b, function (a, c) { return CKEDITOR.tools.array.indexOf(b, a) === c }) } function l(a, b) {
            var d =
                0, c, e; if (!CKEDITOR.tools.array.isArray(a) || 0 === a.length) return !0; c = CKEDITOR.tools.array.filter(a, function (a) { return -1 === CKEDITOR.tools.array.indexOf(m, a) }); if (0 < c.length) for (e = 0; e < c.length; e++)(function (a) { CKEDITOR.scriptLoader.queue(a, function (e) { e && m.push(a); ++d === c.length && b() }) })(c[e]); return 0 === c.length
        } var m = [], q = CKEDITOR.tools.createClass({
            $: function () { this.handlers = [] }, proto: {
                register: function (a) { "number" !== typeof a.priority && (a.priority = 10); this.handlers.push(a) }, addPasteListener: function (a) {
                    a.on("paste",
                        function (b) { var d = n(this.handlers, b), c; if (0 !== d.length) { c = p(d); c = l(c, function () { return a.fire("paste", b.data) }); if (!c) return b.cancel(); k(d, b) } }, this, null, 3)
                }
            }
        }); CKEDITOR.plugins.add("pastetools", { requires: ["clipboard", "ajax"], beforeInit: function (a) { a.pasteTools = new q; a.pasteTools.addPasteListener(a) } }); CKEDITOR.plugins.pastetools = {
            filters: {}, loadFilters: l, createFilter: function (a) {
                var b = CKEDITOR.tools.array.isArray(a.rules) ? a.rules : [a.rules], d = a.additionalTransforms; return function (a, e) {
                    var f = new CKEDITOR.htmlParser.basicWriter,
                    g = new CKEDITOR.htmlParser.filter, h; d && (a = d(a, e)); CKEDITOR.tools.array.forEach(b, function (b) { g.addRules(b(a, e, g)) }); h = CKEDITOR.htmlParser.fragment.fromHtml(a); g.applyTo(h); h.writeHtml(f); return f.getHtml()
                }
            }, getClipboardData: function (a, b) { var d; return CKEDITOR.plugins.clipboard.isCustomDataTypesSupported || "text/html" === b ? (d = a.dataTransfer.getData(b, !0)) || "text/html" !== b ? d : a.dataValue : null }, getConfigValue: function (a, b) {
                if (a && a.config) {
                    var d = CKEDITOR.tools, c = a.config, e = d.object.keys(c), f = ["pasteTools_" +
                        b, "pasteFromWord_" + b, "pasteFromWord" + d.capitalize(b, !0)], f = d.array.find(f, function (a) { return -1 !== d.array.indexOf(e, a) }); return c[f]
                }
            }, getContentGeneratorName: function (a) { if ((a = /<meta\s+name=["']?generator["']?\s+content=["']?(\w+)/gi.exec(a)) && a.length) return a = a[1].toLowerCase(), 0 === a.indexOf("microsoft") ? "microsoft" : 0 === a.indexOf("libreoffice") ? "libreoffice" : "unknown" }
        }; CKEDITOR.pasteFilters = CKEDITOR.plugins.pastetools.filters
    })(); (function () {
        CKEDITOR.plugins.add("pastefromgdocs", {
            requires: "pastetools", init: function (a) {
                var c = CKEDITOR.plugins.getPath("pastetools"), d = this.path; a.pasteTools.register({
                    filters: [CKEDITOR.getUrl(c + "filter/common.js"), CKEDITOR.getUrl(d + "filter/default.js")], canHandle: function (a) { return /id=(\"|\')?docs\-internal\-guid\-/.test(a.data.dataValue) }, handle: function (c, d) {
                        var b = c.data, e = CKEDITOR.plugins.pastetools.getClipboardData(b, "text/html"); b.dontFilter = !0; b.dataValue = CKEDITOR.pasteFilters.gdocs(e, a);
                        !0 === a.config.forcePasteAsPlainText && (b.type = "text"); d()
                    }
                })
            }
        })
    })(); (function () {
        CKEDITOR.plugins.add("pastefromlibreoffice", {
            requires: "pastetools", isSupportedEnvironment: function () { var b = CKEDITOR.env.ie && 11 >= CKEDITOR.env.version; return !(CKEDITOR.env.webkit && !CKEDITOR.env.chrome) && !b }, init: function (b) {
                if (this.isSupportedEnvironment()) {
                    var d = CKEDITOR.plugins.getPath("pastetools"), f = this.path; b.pasteTools.register({
                        priority: 100, filters: [CKEDITOR.getUrl(d + "filter/common.js"), CKEDITOR.getUrl(d + "filter/image.js"), CKEDITOR.getUrl(f + "filter/default.js")], canHandle: function (a) {
                            a =
                            a.data; return (a = a.dataTransfer.getData("text/html", !0) || a.dataValue) ? "libreoffice" === CKEDITOR.plugins.pastetools.getContentGeneratorName(a) : !1
                        }, handle: function (a, d) { var c = a.data, e = c.dataValue || CKEDITOR.plugins.pastetools.getClipboardData(c, "text/html"); c.dontFilter = !0; e = CKEDITOR.pasteFilters.image(e, b, CKEDITOR.plugins.pastetools.getClipboardData(c, "text/rtf")); c.dataValue = CKEDITOR.pasteFilters.libreoffice(e, b); !0 === b.config.forcePasteAsPlainText && (c.type = "text"); d() }
                    })
                }
            }
        })
    })(); (function () {
        CKEDITOR.plugins.add("pastefromword", {
            requires: "pastetools", init: function (a) {
                var f = 0, e = CKEDITOR.plugins.getPath("pastetools"), h = this.path, k = void 0 === a.config.pasteFromWord_inlineImages ? !0 : a.config.pasteFromWord_inlineImages, e = [CKEDITOR.getUrl(e + "filter/common.js"), CKEDITOR.getUrl(e + "filter/image.js"), CKEDITOR.getUrl(h + "filter/default.js")]; a.addCommand("pastefromword", {
                    canUndo: !1, async: !0, exec: function (a, b) {
                        f = 1; a.execCommand("paste", {
                            type: "html", notification: b && "undefined" !== typeof b.notification ?
                                b.notification : !0
                        })
                    }
                }); CKEDITOR.plugins.clipboard.addPasteButton(a, "PasteFromWord", { label: a.lang.pastefromword.toolbar, command: "pastefromword", toolbar: "clipboard,50" }); a.pasteTools.register({
                    filters: a.config.pasteFromWordCleanupFile ? [a.config.pasteFromWordCleanupFile] : e, canHandle: function (a) {
                        a = CKEDITOR.plugins.pastetools.getClipboardData(a.data, "text/html"); var b = CKEDITOR.plugins.pastetools.getContentGeneratorName(a), d = /(class="?Mso|style=["'][^"]*?\bmso\-|w:WordDocument|<o:\w+>|<\/font>)/, b = b ? "microsoft" ===
                            b : d.test(a); return a && (f || b)
                    }, handle: function (e, b) {
                        var d = e.data, c = CKEDITOR.plugins.pastetools.getClipboardData(d, "text/html"), g = CKEDITOR.plugins.pastetools.getClipboardData(d, "text/rtf"), c = { dataValue: c, dataTransfer: { "text/rtf": g } }; if (!1 !== a.fire("pasteFromWord", c) || f) {
                            d.dontFilter = !0; if (f || !a.config.pasteFromWordPromptCleanup || confirm(a.lang.pastefromword.confirmCleanup)) c.dataValue = CKEDITOR.cleanWord(c.dataValue, a), CKEDITOR.plugins.clipboard.isCustomDataTypesSupported && k && CKEDITOR.pasteFilters.image &&
                                (c.dataValue = CKEDITOR.pasteFilters.image(c.dataValue, a, g)), a.fire("afterPasteFromWord", c), d.dataValue = c.dataValue, !0 === a.config.forcePasteAsPlainText ? d.type = "text" : CKEDITOR.plugins.clipboard.isCustomCopyCutSupported || "allow-word" !== a.config.forcePasteAsPlainText || (d.type = "html"); f = 0; b()
                        }
                    }
                })
            }
        })
    })(); CKEDITOR.plugins.add("removeformat", { init: function (a) { a.addCommand("removeFormat", CKEDITOR.plugins.removeformat.commands.removeformat); a.ui.addButton && a.ui.addButton("RemoveFormat", { label: a.lang.removeformat.toolbar, command: "removeFormat", toolbar: "cleanup,10" }) } });
    CKEDITOR.plugins.removeformat = {
        commands: {
            removeformat: {
                exec: function (a) {
                    for (var h = a._.removeFormatRegex || (a._.removeFormatRegex = new RegExp("^(?:" + a.config.removeFormatTags.replace(/,/g, "|") + ")$", "i")), c = a._.removeAttributes || (a._.removeAttributes = a.config.removeFormatAttributes.split(",")), e = CKEDITOR.plugins.removeformat.filter, m = a.getSelection().getRanges(), n = m.createIterator(), p = function (a) { return a.type == CKEDITOR.NODE_ELEMENT }, f; f = n.getNextRange();) {
                        f.enlarge(CKEDITOR.ENLARGE_INLINE); var l = f.createBookmark(),
                            b = l.startNode, d = l.endNode, k = function (b) { for (var c = a.elementPath(b), f = c.elements, d = 1, g; (g = f[d]) && !g.equals(c.block) && !g.equals(c.blockLimit); d++)h.test(g.getName()) && e(a, g) && b.breakParent(g) }; k(b); if (d) for (k(d), b = b.getNextSourceNode(!0, CKEDITOR.NODE_ELEMENT); b && !b.equals(d);)if (b.isReadOnly()) { if (b.getPosition(d) & CKEDITOR.POSITION_CONTAINS) break; b = b.getNext(p) } else k = b.getNextSourceNode(!1, CKEDITOR.NODE_ELEMENT), "img" == b.getName() && b.data("cke-realelement") || !e(a, b) || (h.test(b.getName()) ? b.remove(1) :
                                (b.removeAttributes(c), a.fire("removeFormatCleanup", b))), b = k; f.moveToBookmark(l)
                    } a.forceNextSelectionCheck(); a.getSelection().selectRanges(m)
                }
            }
        }, filter: function (a, h) { for (var c = a._.removeFormatFilters || [], e = 0; e < c.length; e++)if (!1 === c[e](h)) return !1; return !0 }
    }; CKEDITOR.editor.prototype.addRemoveFormatFilter = function (a) { this._.removeFormatFilters || (this._.removeFormatFilters = []); this._.removeFormatFilters.push(a) }; CKEDITOR.config.removeFormatTags = "b,big,cite,code,del,dfn,em,font,i,ins,kbd,q,s,samp,small,span,strike,strong,sub,sup,tt,u,var";
    CKEDITOR.config.removeFormatAttributes = "class,style,lang,width,height,align,hspace,valign"; (function () {
        var f = { preserveState: !0, editorFocus: !1, readOnly: 1, exec: function (a) { this.toggleState(); this.refresh(a) }, refresh: function (a) { if (a.document) { var b = this.state == CKEDITOR.TRISTATE_ON ? "attachClass" : "removeClass"; a.editable()[b]("cke_show_borders") } } }; CKEDITOR.plugins.add("showborders", {
            modes: { wysiwyg: 1 }, onLoad: function () {
                var a; a = (CKEDITOR.env.ie6Compat ? [".%1 table.%2,", ".%1 table.%2 td, .%1 table.%2 th", "{", "border : #d3d3d3 1px dotted", "}"] : ".%1 table.%2,;.%1 table.%2 \x3e tr \x3e td, .%1 table.%2 \x3e tr \x3e th,;.%1 table.%2 \x3e tbody \x3e tr \x3e td, .%1 table.%2 \x3e tbody \x3e tr \x3e th,;.%1 table.%2 \x3e thead \x3e tr \x3e td, .%1 table.%2 \x3e thead \x3e tr \x3e th,;.%1 table.%2 \x3e tfoot \x3e tr \x3e td, .%1 table.%2 \x3e tfoot \x3e tr \x3e th;{;border : #d3d3d3 1px dotted;}".split(";")).join("").replace(/%2/g,
                    "cke_show_border").replace(/%1/g, "cke_show_borders "); CKEDITOR.addCss(a)
            }, init: function (a) {
                var b = a.addCommand("showborders", f); b.canUndo = !1; !1 !== a.config.startupShowBorders && b.setState(CKEDITOR.TRISTATE_ON); a.on("mode", function () { b.state != CKEDITOR.TRISTATE_DISABLED && b.refresh(a) }, null, null, 100); a.on("contentDom", function () { b.state != CKEDITOR.TRISTATE_DISABLED && b.refresh(a) }); a.on("removeFormatCleanup", function (d) {
                    d = d.data; a.getCommand("showborders").state == CKEDITOR.TRISTATE_ON && d.is("table") && (!d.hasAttribute("border") ||
                        0 >= parseInt(d.getAttribute("border"), 10)) && d.addClass("cke_show_border")
                })
            }, afterInit: function (a) {
                var b = a.dataProcessor; a = b && b.dataFilter; b = b && b.htmlFilter; a && a.addRules({ elements: { table: function (a) { a = a.attributes; var b = a["class"], c = parseInt(a.border, 10); c && !(0 >= c) || b && -1 != b.indexOf("cke_show_border") || (a["class"] = (b || "") + " cke_show_border") } } }); b && b.addRules({
                    elements: {
                        table: function (a) {
                            a = a.attributes; var b = a["class"]; b && (a["class"] = b.replace("cke_show_border", "").replace(/\s{2}/, " ").replace(/^\s+|\s+$/,
                                ""))
                        }
                    }
                })
            }
        }); CKEDITOR.on("dialogDefinition", function (a) {
            var b = a.data.name; if ("table" == b || "tableProperties" == b) if (a = a.data.definition, b = a.getContents("info").get("txtBorder"), b.commit = CKEDITOR.tools.override(b.commit, function (a) { return function (b, c) { a.apply(this, arguments); var e = parseInt(this.getValue(), 10); c[!e || 0 >= e ? "addClass" : "removeClass"]("cke_show_border") } }), a = (a = a.getContents("advanced")) && a.get("advCSSClasses")) a.setup = CKEDITOR.tools.override(a.setup, function (a) {
                return function () {
                    a.apply(this,
                        arguments); this.setValue(this.getValue().replace(/cke_show_border/, ""))
                }
            }), a.commit = CKEDITOR.tools.override(a.commit, function (a) { return function (b, c) { a.apply(this, arguments); parseInt(c.getAttribute("border"), 10) || c.addClass("cke_show_border") } })
        })
    })(); (function () {
        CKEDITOR.plugins.add("sourcearea", {
            init: function (a) {
                function d() { var a = e && this.equals(CKEDITOR.document.getActive()); this.hide(); this.setStyle("height", this.getParent().$.clientHeight + "px"); this.setStyle("width", this.getParent().$.clientWidth + "px"); this.show(); a && this.focus() } if (a.elementMode != CKEDITOR.ELEMENT_MODE_INLINE) {
                    var f = CKEDITOR.plugins.sourcearea; a.addMode("source", function (e) {
                        var b = a.ui.space("contents").getDocument().createElement("textarea"); b.setStyles(CKEDITOR.tools.extend({
                            width: CKEDITOR.env.ie7Compat ?
                                "99%" : "100%", height: "100%", resize: "none", outline: "none", "text-align": "left"
                        }, CKEDITOR.tools.cssVendorPrefix("tab-size", a.config.sourceAreaTabSize || 4))); b.setAttribute("dir", "ltr"); b.addClass("cke_source").addClass("cke_reset").addClass("cke_enable_context_menu"); a.ui.space("contents").append(b); b = a.editable(new c(a, b)); b.setData(a.getData(1)); CKEDITOR.env.ie && (b.attachListener(a, "resize", d, b), b.attachListener(CKEDITOR.document.getWindow(), "resize", d, b), CKEDITOR.tools.setTimeout(d, 0, b)); a.fire("ariaWidget",
                            this); e()
                    }); a.addCommand("source", f.commands.source); a.ui.addButton && a.ui.addButton("Source", { isToggle: !0, label: a.lang.sourcearea.toolbar, command: "source", toolbar: "mode,10" }); a.on("mode", function () { a.getCommand("source").setState("source" == a.mode ? CKEDITOR.TRISTATE_ON : CKEDITOR.TRISTATE_OFF) }); var e = CKEDITOR.env.ie && 9 == CKEDITOR.env.version
                }
            }
        }); var c = CKEDITOR.tools.createClass({
            base: CKEDITOR.editable, proto: {
                setData: function (a) { this.setValue(a); this.status = "ready"; this.editor.fire("dataReady") }, getData: function () { return this.getValue() },
                insertHtml: function () { }, insertElement: function () { }, insertText: function () { }, setReadOnly: function (a) { this[(a ? "set" : "remove") + "Attribute"]("readOnly", "readonly") }, detach: function () { c.baseProto.detach.call(this); this.clearCustomData(); this.remove() }
            }
        })
    })();
    CKEDITOR.plugins.sourcearea = { commands: { source: { modes: { wysiwyg: 1, source: 1 }, editorFocus: !1, readOnly: 1, exec: function (c) { "wysiwyg" == c.mode && c.fire("saveSnapshot"); c.getCommand("source").setState(CKEDITOR.TRISTATE_DISABLED); c.setMode("source" == c.mode ? "wysiwyg" : "source") }, canUndo: !1 } } }; CKEDITOR.plugins.add("specialchar", {
        availableLangs: { af: 1, ar: 1, az: 1, bg: 1, ca: 1, cs: 1, cy: 1, da: 1, de: 1, "de-ch": 1, el: 1, en: 1, "en-au": 1, "en-ca": 1, "en-gb": 1, eo: 1, es: 1, "es-mx": 1, et: 1, eu: 1, fa: 1, fi: 1, fr: 1, "fr-ca": 1, gl: 1, he: 1, hr: 1, hu: 1, id: 1, it: 1, ja: 1, km: 1, ko: 1, ku: 1, lt: 1, lv: 1, nb: 1, nl: 1, no: 1, oc: 1, pl: 1, pt: 1, "pt-br": 1, ro: 1, ru: 1, si: 1, sk: 1, sl: 1, sq: 1, sr: 1, "sr-latn": 1, sv: 1, th: 1, tr: 1, tt: 1, ug: 1, uk: 1, vi: 1, zh: 1, "zh-cn": 1 }, requires: "dialog", init: function (a) {
            var c = this; CKEDITOR.dialog.add("specialchar", this.path + "dialogs/specialchar.js");
            a.addCommand("specialchar", { exec: function () { var b = a.langCode, b = c.availableLangs[b] ? b : c.availableLangs[b.replace(/-.*/, "")] ? b.replace(/-.*/, "") : "en"; CKEDITOR.scriptLoader.load(CKEDITOR.getUrl(c.path + "dialogs/lang/" + b + ".js"), function () { CKEDITOR.tools.extend(a.lang.specialchar, c.langEntries[b]); a.openDialog("specialchar") }) }, modes: { wysiwyg: 1 }, canUndo: !1 }); a.ui.addButton && a.ui.addButton("SpecialChar", { label: a.lang.specialchar.toolbar, command: "specialchar", toolbar: "insert,50" })
        }
    });
    CKEDITOR.config.specialChars = "! \x26quot; # $ % \x26amp; ' ( ) * + - . / 0 1 2 3 4 5 6 7 8 9 : ; \x26lt; \x3d \x26gt; ? @ A B C D E F G H I J K L M N O P Q R S T U V W X Y Z [ ] ^ _ ` a b c d e f g h i j k l m n o p q r s t u v w x y z { | } ~ \x26euro; \x26lsquo; \x26rsquo; \x26ldquo; \x26rdquo; \x26ndash; \x26mdash; \x26iexcl; \x26cent; \x26pound; \x26curren; \x26yen; \x26brvbar; \x26sect; \x26uml; \x26copy; \x26ordf; \x26laquo; \x26not; \x26reg; \x26macr; \x26deg; \x26sup2; \x26sup3; \x26acute; \x26micro; \x26para; \x26middot; \x26cedil; \x26sup1; \x26ordm; \x26raquo; \x26frac14; \x26frac12; \x26frac34; \x26iquest; \x26Agrave; \x26Aacute; \x26Acirc; \x26Atilde; \x26Auml; \x26Aring; \x26AElig; \x26Ccedil; \x26Egrave; \x26Eacute; \x26Ecirc; \x26Euml; \x26Igrave; \x26Iacute; \x26Icirc; \x26Iuml; \x26ETH; \x26Ntilde; \x26Ograve; \x26Oacute; \x26Ocirc; \x26Otilde; \x26Ouml; \x26times; \x26Oslash; \x26Ugrave; \x26Uacute; \x26Ucirc; \x26Uuml; \x26Yacute; \x26THORN; \x26szlig; \x26agrave; \x26aacute; \x26acirc; \x26atilde; \x26auml; \x26aring; \x26aelig; \x26ccedil; \x26egrave; \x26eacute; \x26ecirc; \x26euml; \x26igrave; \x26iacute; \x26icirc; \x26iuml; \x26eth; \x26ntilde; \x26ograve; \x26oacute; \x26ocirc; \x26otilde; \x26ouml; \x26divide; \x26oslash; \x26ugrave; \x26uacute; \x26ucirc; \x26uuml; \x26yacute; \x26thorn; \x26yuml; \x26OElig; \x26oelig; \x26#372; \x26#374 \x26#373 \x26#375; \x26sbquo; \x26#8219; \x26bdquo; \x26hellip; \x26trade; \x26#9658; \x26bull; \x26rarr; \x26rArr; \x26hArr; \x26diams; \x26asymp;".split(" "); CKEDITOR.plugins.add("menubutton", {
        requires: "button,menu", onLoad: function () {
            var d = function (c) {
                var a = this._, d = CKEDITOR.document.getById(a.id), b = a.menu; a.state !== CKEDITOR.TRISTATE_DISABLED && (a.on && b ? b.hide() : (a.previousState = a.state, b || (b = a.menu = new CKEDITOR.menu(c, { panel: { className: "cke_menu_panel", attributes: { "aria-label": c.lang.common.options } } }), b.onHide = CKEDITOR.tools.bind(function () {
                    var b = this.command ? c.getCommand(this.command).modes : this.modes; this.setState(!b || b[c.mode] ? a.previousState : CKEDITOR.TRISTATE_DISABLED);
                    a.on = 0; d.setAttribute("aria-expanded", "false")
                }, this), this.onMenu && b.addListener(this.onMenu)), this.setState(CKEDITOR.TRISTATE_ON), a.on = 1, d.setAttribute("aria-expanded", "true"), setTimeout(function () { b.show(CKEDITOR.document.getById(a.id), 4) }, 0)))
            }; CKEDITOR.ui.menuButton = CKEDITOR.tools.createClass({ base: CKEDITOR.ui.button, $: function (c) { delete c.panel; this.base(c); this.hasArrow = "menu"; this.click = d }, statics: { handler: { create: function (c) { return new CKEDITOR.ui.menuButton(c) } } } })
        }, beforeInit: function (d) {
            d.ui.addHandler(CKEDITOR.UI_MENUBUTTON,
                CKEDITOR.ui.menuButton.handler)
        }
    }); CKEDITOR.UI_MENUBUTTON = "menubutton"; CKEDITOR.plugins.add("scayt", {
        requires: "menubutton,dialog", tabToOpen: null, dialogName: "scaytDialog", onLoad: function (a) {
            "moono-lisa" == (CKEDITOR.skinName || a.config.skin) && CKEDITOR.document.appendStyleSheet(CKEDITOR.getUrl(this.path + "skins/" + CKEDITOR.skin.name + "/scayt.css")); CKEDITOR.document.appendStyleSheet(CKEDITOR.getUrl(this.path + "dialogs/dialog.css")); var c = !1; CKEDITOR.on("instanceLoaded", function (a) {
                if (!c && CKEDITOR.plugins.autocomplete) {
                    c = !0; var b = CKEDITOR.plugins.autocomplete.prototype.getModel;
                    CKEDITOR.plugins.autocomplete.prototype.getModel = function (a) { var d = this.editor; a = b.bind(this)(a); a.on("change-isActive", function (a) { a.data ? d.fire("autocompletePanelShow") : d.fire("autocompletePanelHide") }); return a }
                }
            })
        }, init: function (a) {
            var c = this, d = CKEDITOR.plugins.scayt; this.bindEvents(a); this.parseConfig(a); this.addRule(a); CKEDITOR.dialog.add(this.dialogName, CKEDITOR.getUrl(this.path + "dialogs/options.js")); this.addMenuItems(a); var b = a.lang.scayt, e = CKEDITOR.env; a.ui.add("Scayt", CKEDITOR.UI_MENUBUTTON,
                {
                    label: b.text_title, title: a.plugins.wsc ? a.lang.wsc.title : b.text_title, modes: { wysiwyg: !(e.ie && (8 > e.version || e.quirks)) }, toolbar: "spellchecker,20", refresh: function () { var b = a.ui.instances.Scayt.getState(); a.scayt && (b = d.state.scayt[a.name] ? CKEDITOR.TRISTATE_ON : CKEDITOR.TRISTATE_OFF); a.fire("scaytButtonState", b) }, onRender: function () { var b = this; a.on("scaytButtonState", function (a) { void 0 !== typeof a.data && b.setState(a.data) }) }, onMenu: function () {
                        var b = a.scayt; a.getMenuItem("scaytToggle").label = a.lang.scayt[b &&
                            d.state.scayt[a.name] ? "btn_disable" : "btn_enable"]; var c = { scaytToggle: CKEDITOR.TRISTATE_OFF, scaytOptions: b ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, scaytLangs: b ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, scaytDict: b ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, scaytAbout: b ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, WSC: a.plugins.wsc ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED }; a.config.scayt_uiTabs[0] || delete c.scaytOptions; a.config.scayt_uiTabs[1] || delete c.scaytLangs;
                        a.config.scayt_uiTabs[2] || delete c.scaytDict; b && !CKEDITOR.plugins.scayt.isNewUdSupported(b) && (delete c.scaytDict, a.config.scayt_uiTabs[2] = 0, CKEDITOR.plugins.scayt.alarmCompatibilityMessage()); return c
                    }
                }); a.contextMenu && a.addMenuItems && (a.contextMenu.addListener(function (b, d) { var e = a.scayt, l, m; e && (m = e.getSelectionNode()) && (l = c.menuGenerator(a, m), e.showBanner("." + a.contextMenu._.definition.panel.className.split(" ").join(" ."))); return l }), a.contextMenu._.onHide = CKEDITOR.tools.override(a.contextMenu._.onHide,
                    function (b) { return function () { var d = a.scayt; d && d.hideBanner(); return b.apply(this) } }))
        }, addMenuItems: function (a) {
            var c = this, d = CKEDITOR.plugins.scayt; a.addMenuGroup("scaytButton"); for (var b = a.config.scayt_contextMenuItemsOrder.split("|"), e = 0; e < b.length; e++)b[e] = "scayt_" + b[e]; if ((b = ["grayt_description", "grayt_suggest", "grayt_control"].concat(b)) && b.length) for (e = 0; e < b.length; e++)a.addMenuGroup(b[e], e - 10); a.addCommand("scaytToggle", {
                exec: function (a) {
                    var b = a.scayt; d.state.scayt[a.name] = !d.state.scayt[a.name];
                    !0 === d.state.scayt[a.name] ? b || d.createScayt(a) : b && d.destroy(a)
                }
            }); a.addCommand("scaytAbout", { exec: function (a) { a.scayt.tabToOpen = "about"; d.openDialog(c.dialogName, a) } }); a.addCommand("scaytOptions", { exec: function (a) { a.scayt.tabToOpen = "options"; d.openDialog(c.dialogName, a) } }); a.addCommand("scaytLangs", { exec: function (a) { a.scayt.tabToOpen = "langs"; d.openDialog(c.dialogName, a) } }); a.addCommand("scaytDict", { exec: function (a) { a.scayt.tabToOpen = "dictionaries"; d.openDialog(c.dialogName, a) } }); b = {
                scaytToggle: {
                    label: a.lang.scayt.btn_enable,
                    group: "scaytButton", command: "scaytToggle"
                }, scaytAbout: { label: a.lang.scayt.btn_about, group: "scaytButton", command: "scaytAbout" }, scaytOptions: { label: a.lang.scayt.btn_options, group: "scaytButton", command: "scaytOptions" }, scaytLangs: { label: a.lang.scayt.btn_langs, group: "scaytButton", command: "scaytLangs" }, scaytDict: { label: a.lang.scayt.btn_dictionaries, group: "scaytButton", command: "scaytDict" }
            }; a.plugins.wsc && (b.WSC = {
                label: a.lang.wsc.toolbar, group: "scaytButton", onClick: function () {
                    var b = CKEDITOR.plugins.scayt,
                    d = a.scayt, c = a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? a.container.getText() : a.document.getBody().getText(); (c = c.replace(/\s/g, "")) ? (d && b.state.scayt[a.name] && d.setMarkupPaused && d.setMarkupPaused(!0), a.lockSelection(), a.execCommand("checkspell")) : alert("Nothing to check!")
                }
            }); a.addMenuItems(b)
        }, bindEvents: function (a) {
            var c = CKEDITOR.plugins.scayt, d = a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE, b = function () { c.destroy(a) }, e = function () { !c.state.scayt[a.name] || a.readOnly || a.scayt || c.createScayt(a) }, f = function () {
                var b =
                    a.editable(); b.attachListener(b, "focus", function (b) { CKEDITOR.plugins.scayt && !a.scayt && setTimeout(e, 0); b = CKEDITOR.plugins.scayt && CKEDITOR.plugins.scayt.state.scayt[a.name] && a.scayt; var c, k; if ((d || b) && a._.savedSelection) { b = a._.savedSelection.getSelectedElement(); b = !b && a._.savedSelection.getRanges(); for (var f = 0; f < b.length; f++)k = b[f], "string" === typeof k.startContainer.$.nodeValue && (c = k.startContainer.getText().length, (c < k.startOffset || c < k.endOffset) && a.unlockSelection(!1)) } }, this, null, -10)
            }, g = function () {
                d ?
                    a.config.scayt_inlineModeImmediateMarkup ? e() : (a.on("blur", function () { setTimeout(b, 0) }), a.on("focus", e), a.focusManager.hasFocus && e()) : e(); f(); var c = a.editable(); c.attachListener(c, "mousedown", function (b) { b = b.data.getTarget(); var d = a.widgets && a.widgets.getByElement(b); d && (d.wrapper = b.getAscendant(function (a) { return a.hasAttribute("data-cke-widget-wrapper") }, !0)) }, this, null, -10)
            }; a.on("contentDom", g); a.on("beforeCommandExec", function (b) {
                var d = a.scayt, e = !1, f = !1, h = !0; b.data.name in c.options.disablingCommandExec &&
                    "wysiwyg" == a.mode ? d && (c.destroy(a), a.fire("scaytButtonState", CKEDITOR.TRISTATE_DISABLED)) : "bold" !== b.data.name && "italic" !== b.data.name && "underline" !== b.data.name && "strike" !== b.data.name && "subscript" !== b.data.name && "superscript" !== b.data.name && "enter" !== b.data.name && "cut" !== b.data.name && "language" !== b.data.name || !d || ("cut" === b.data.name && (h = !1, f = !0), "language" === b.data.name && (f = e = !0), a.fire("reloadMarkupScayt", { removeOptions: { removeInside: h, forceBookmark: f, language: e }, timeout: 0 }))
            }); a.on("beforeSetMode",
                function (b) { if ("source" == b.data) { if (b = a.scayt) c.destroy(a), a.fire("scaytButtonState", CKEDITOR.TRISTATE_DISABLED); a.document && a.document.getBody().removeAttribute("_jquid") } }); a.on("afterCommandExec", function (b) { "wysiwyg" != a.mode || "undo" != b.data.name && "redo" != b.data.name || setTimeout(function () { c.reloadMarkup(a.scayt) }, 250) }); a.on("readOnly", function (b) {
                    var d; b && (d = a.scayt, !0 === b.editor.readOnly ? d && d.fire("removeMarkupInDocument", {}) : d ? c.reloadMarkup(d) : "wysiwyg" == b.editor.mode && !0 === c.state.scayt[b.editor.name] &&
                        (c.createScayt(a), b.editor.fire("scaytButtonState", CKEDITOR.TRISTATE_ON)))
                }); a.on("beforeDestroy", b); a.on("setData", function () { b(); (a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE || a.plugins.divarea) && g() }, this, null, 50); a.on("reloadMarkupScayt", function (b) {
                    var d = b.data && b.data.removeOptions, e = b.data && b.data.timeout, f = b.data && b.data.language, h = a.scayt; h && setTimeout(function () {
                        f && (d.selectionNode = a.plugins.language.getCurrentLangElement(a), d.selectionNode = d.selectionNode && d.selectionNode.$ || null); h.removeMarkupInSelectionNode(d);
                        c.reloadMarkup(h)
                    }, e || 0)
                }); a.on("insertElement", function () { a.fire("reloadMarkupScayt", { removeOptions: { forceBookmark: !0 } }) }, this, null, 50); a.on("insertHtml", function () { a.scayt && a.scayt.setFocused && a.scayt.setFocused(!0); a.fire("reloadMarkupScayt") }, this, null, 50); a.on("insertText", function () { a.scayt && a.scayt.setFocused && a.scayt.setFocused(!0); a.fire("reloadMarkupScayt") }, this, null, 50); a.on("scaytDialogShown", function (b) { b.data.selectPage(a.scayt.tabToOpen) }); a.on("autocompletePanelShow", function (b) {
                    (b =
                        a.scayt) && b.setMarkupPaused && b.setMarkupPaused(!0)
                }); a.on("autocompletePanelHide", function (b) { (b = a.scayt) && b.setMarkupPaused && b.setMarkupPaused(!1) })
        }, parseConfig: function (a) {
            var c = CKEDITOR.plugins.scayt; c.replaceOldOptionsNames(a.config); "boolean" !== typeof a.config.scayt_autoStartup && (a.config.scayt_autoStartup = !1); c.state.scayt[a.name] = a.config.scayt_autoStartup; "boolean" !== typeof a.config.grayt_autoStartup && (a.config.grayt_autoStartup = !1); "boolean" !== typeof a.config.scayt_inlineModeImmediateMarkup &&
                (a.config.scayt_inlineModeImmediateMarkup = !1); c.state.grayt[a.name] = a.config.grayt_autoStartup; a.config.scayt_contextCommands || (a.config.scayt_contextCommands = "ignoreall|add"); a.config.scayt_contextMenuItemsOrder || (a.config.scayt_contextMenuItemsOrder = "suggest|moresuggest|control"); a.config.scayt_sLang || (a.config.scayt_sLang = "en_US"); if (void 0 === a.config.scayt_maxSuggestions || "number" != typeof a.config.scayt_maxSuggestions || 0 > a.config.scayt_maxSuggestions) a.config.scayt_maxSuggestions = 3; if (void 0 ===
                    a.config.scayt_minWordLength || "number" != typeof a.config.scayt_minWordLength || 1 > a.config.scayt_minWordLength) a.config.scayt_minWordLength = 3; if (void 0 === a.config.scayt_customDictionaryIds || "string" !== typeof a.config.scayt_customDictionaryIds) a.config.scayt_customDictionaryIds = ""; if (void 0 === a.config.scayt_userDictionaryName || "string" !== typeof a.config.scayt_userDictionaryName) a.config.scayt_userDictionaryName = null; if ("string" === typeof a.config.scayt_uiTabs && 3 === a.config.scayt_uiTabs.split(",").length) {
                        var d =
                            [], b = []; a.config.scayt_uiTabs = a.config.scayt_uiTabs.split(","); CKEDITOR.tools.search(a.config.scayt_uiTabs, function (a) { 1 === Number(a) || 0 === Number(a) ? (b.push(!0), d.push(Number(a))) : b.push(!1) }); null === CKEDITOR.tools.search(b, !1) ? a.config.scayt_uiTabs = d : a.config.scayt_uiTabs = [1, 1, 1]
                    } else a.config.scayt_uiTabs = [1, 1, 1]; "string" != typeof a.config.scayt_serviceProtocol && (a.config.scayt_serviceProtocol = null); "string" != typeof a.config.scayt_serviceHost && (a.config.scayt_serviceHost = null); "string" != typeof a.config.scayt_servicePort &&
                        (a.config.scayt_servicePort = null); "string" != typeof a.config.scayt_servicePath && (a.config.scayt_servicePath = null); a.config.scayt_moreSuggestions || (a.config.scayt_moreSuggestions = "on"); "string" !== typeof a.config.scayt_customerId && (a.config.scayt_customerId = "1:WvF0D4-UtPqN1-43nkD4-NKvUm2-daQqk3-LmNiI-z7Ysb4-mwry24-T8YrS3-Q2tpq2"); "string" !== typeof a.config.scayt_customPunctuation && (a.config.scayt_customPunctuation = "-"); "string" !== typeof a.config.scayt_srcUrl && (a.config.scayt_srcUrl = "https://svc.webspellchecker.net/spellcheck31/wscbundle/wscbundle.js");
            "boolean" !== typeof CKEDITOR.config.scayt_handleCheckDirty && (CKEDITOR.config.scayt_handleCheckDirty = !0); "boolean" !== typeof CKEDITOR.config.scayt_handleUndoRedo && (CKEDITOR.config.scayt_handleUndoRedo = !0); CKEDITOR.config.scayt_handleUndoRedo = CKEDITOR.plugins.undo ? CKEDITOR.config.scayt_handleUndoRedo : !1; a.config.scayt_ignoreAllCapsWords && "boolean" !== typeof a.config.scayt_ignoreAllCapsWords && (a.config.scayt_ignoreAllCapsWords = !1); a.config.scayt_ignoreDomainNames && "boolean" !== typeof a.config.scayt_ignoreDomainNames &&
                (a.config.scayt_ignoreDomainNames = !1); a.config.scayt_ignoreWordsWithMixedCases && "boolean" !== typeof a.config.scayt_ignoreWordsWithMixedCases && (a.config.scayt_ignoreWordsWithMixedCases = !1); a.config.scayt_ignoreWordsWithNumbers && "boolean" !== typeof a.config.scayt_ignoreWordsWithNumbers && (a.config.scayt_ignoreWordsWithNumbers = !1); if (a.config.scayt_disableOptionsStorage) {
                    var c = CKEDITOR.tools.isArray(a.config.scayt_disableOptionsStorage) ? a.config.scayt_disableOptionsStorage : "string" === typeof a.config.scayt_disableOptionsStorage ?
                        [a.config.scayt_disableOptionsStorage] : void 0, e = "all options lang ignore-all-caps-words ignore-domain-names ignore-words-with-mixed-cases ignore-words-with-numbers".split(" "), f = ["lang", "ignore-all-caps-words", "ignore-domain-names", "ignore-words-with-mixed-cases", "ignore-words-with-numbers"], g = CKEDITOR.tools.search, k = CKEDITOR.tools.indexOf; a.config.scayt_disableOptionsStorage = function (a) {
                            for (var b = [], d = 0; d < a.length; d++) {
                                var c = a[d], p = !!g(a, "options"); if (!g(e, c) || p && g(f, function (a) { if ("lang" === a) return !1 })) return;
                                g(f, c) && f.splice(k(f, c), 1); if ("all" === c || p && g(a, "lang")) return []; "options" === c && (f = ["lang"])
                            } return b = b.concat(f)
                        }(c)
                }
        }, addRule: function (a) {
            var c = CKEDITOR.plugins.scayt, d = a.dataProcessor, b = d && d.htmlFilter, e = a._.elementsPath && a._.elementsPath.filters, d = d && d.dataFilter, f = a.addRemoveFormatFilter, g = function (b) { if (a.scayt && (b.hasAttribute(c.options.data_attribute_name) || b.hasAttribute(c.options.problem_grammar_data_attribute))) return !1 }, k = function (b) {
                var d = !0; a.scayt && (b.hasAttribute(c.options.data_attribute_name) ||
                    b.hasAttribute(c.options.problem_grammar_data_attribute)) && (d = !1); return d
            }; e && e.push(g); d && d.addRules({ elements: { span: function (a) { var b = a.hasClass(c.options.misspelled_word_class) && a.attributes[c.options.data_attribute_name], d = a.hasClass(c.options.problem_grammar_class) && a.attributes[c.options.problem_grammar_data_attribute]; c && (b || d) && delete a.name; return a } } }); b && b.addRules({
                elements: {
                    span: function (a) {
                        var b = a.hasClass(c.options.misspelled_word_class) && a.attributes[c.options.data_attribute_name],
                        d = a.hasClass(c.options.problem_grammar_class) && a.attributes[c.options.problem_grammar_data_attribute]; c && (b || d) && delete a.name; return a
                    }
                }
            }); f && f.call(a, k)
        }, scaytMenuDefinition: function (a) {
            var c = this, d = CKEDITOR.plugins.scayt; a = a.scayt; return {
                scayt: {
                    scayt_ignore: { label: a.getLocal("btn_ignore"), group: "scayt_control", order: 1, exec: function (a) { a.scayt.ignoreWord() } }, scayt_ignoreall: { label: a.getLocal("btn_ignoreAll"), group: "scayt_control", order: 2, exec: function (a) { a.scayt.ignoreAllWords() } }, scayt_add: {
                        label: a.getLocal("btn_addWord"),
                        group: "scayt_control", order: 3, exec: function (a) { var d = a.scayt; setTimeout(function () { d.addWordToUserDictionary() }, 10) }
                    }, scayt_option: { label: a.getLocal("btn_options"), group: "scayt_control", order: 4, exec: function (a) { a.scayt.tabToOpen = "options"; d.openDialog(c.dialogName, a) }, verification: function (a) { return 1 == a.config.scayt_uiTabs[0] ? !0 : !1 } }, scayt_language: {
                        label: a.getLocal("btn_langs"), group: "scayt_control", order: 5, exec: function (a) { a.scayt.tabToOpen = "langs"; d.openDialog(c.dialogName, a) }, verification: function (a) {
                            return 1 ==
                                a.config.scayt_uiTabs[1] ? !0 : !1
                        }
                    }, scayt_dictionary: { label: a.getLocal("btn_dictionaries"), group: "scayt_control", order: 6, exec: function (a) { a.scayt.tabToOpen = "dictionaries"; d.openDialog(c.dialogName, a) }, verification: function (a) { return 1 == a.config.scayt_uiTabs[2] ? !0 : !1 } }, scayt_about: { label: a.getLocal("btn_about"), group: "scayt_control", order: 7, exec: function (a) { a.scayt.tabToOpen = "about"; d.openDialog(c.dialogName, a) } }
                }, grayt: {
                    grayt_problemdescription: {
                        label: "Grammar problem description", group: "grayt_description",
                        order: 1, state: CKEDITOR.TRISTATE_DISABLED, exec: function (a) { }
                    }, grayt_ignore: { label: a.getLocal("btn_ignore"), group: "grayt_control", order: 2, exec: function (a) { a.scayt.ignorePhrase() } }, grayt_ignoreall: { label: a.getLocal("btn_ignoreAll"), group: "grayt_control", order: 3, exec: function (a) { a.scayt.ignoreAllPhrases() } }
                }
            }
        }, buildSuggestionMenuItems: function (a, c, d) {
            var b = {}, e = {}, f = d ? "word" : "phrase", g = d ? "startGrammarCheck" : "startSpellCheck", k = a.scayt; if (0 < c.length && "no_any_suggestions" !== c[0]) if (d) for (d = 0; d < c.length; d++) {
                var l =
                    "scayt_suggest_" + CKEDITOR.plugins.scayt.suggestions[d].replace(" ", "_"); a.addCommand(l, this.createCommand(CKEDITOR.plugins.scayt.suggestions[d], f, g)); d < a.config.scayt_maxSuggestions ? (a.addMenuItem(l, { label: c[d], command: l, group: "scayt_suggest", order: d + 1 }), b[l] = CKEDITOR.TRISTATE_OFF) : (a.addMenuItem(l, { label: c[d], command: l, group: "scayt_moresuggest", order: d + 1 }), e[l] = CKEDITOR.TRISTATE_OFF, "on" === a.config.scayt_moreSuggestions && (a.addMenuItem("scayt_moresuggest", {
                        label: k.getLocal("btn_moreSuggestions"),
                        group: "scayt_moresuggest", order: 10, getItems: function () { return e }
                    }), b.scayt_moresuggest = CKEDITOR.TRISTATE_OFF))
            } else for (d = 0; d < c.length; d++)l = "grayt_suggest_" + CKEDITOR.plugins.scayt.suggestions[d].replace(" ", "_"), a.addCommand(l, this.createCommand(CKEDITOR.plugins.scayt.suggestions[d], f, g)), a.addMenuItem(l, { label: c[d], command: l, group: "grayt_suggest", order: d + 1 }), b[l] = CKEDITOR.TRISTATE_OFF; else b.no_scayt_suggest = CKEDITOR.TRISTATE_DISABLED, a.addCommand("no_scayt_suggest", { exec: function () { } }), a.addMenuItem("no_scayt_suggest",
                { label: k.getLocal("btn_noSuggestions") || "no_scayt_suggest", command: "no_scayt_suggest", group: "scayt_suggest", order: 0 }); return b
        }, menuGenerator: function (a, c) {
            var d = a.scayt, b = this.scaytMenuDefinition(a), e = {}, f = a.config.scayt_contextCommands.split("|"), g = c.getAttribute(d.getLangAttribute()) || d.getLang(), k, l, m, n; l = d.isScaytNode(c); m = d.isGraytNode(c); l ? (b = b.scayt, k = c.getAttribute(d.getScaytNodeAttributeName()), d.fire("getSuggestionsList", { lang: g, word: k }), e = this.buildSuggestionMenuItems(a, CKEDITOR.plugins.scayt.suggestions,
                l)) : m && (b = b.grayt, e = c.getAttribute(d.getGraytNodeAttributeName()), d.getGraytNodeRuleAttributeName ? (k = c.getAttribute(d.getGraytNodeRuleAttributeName()), d.getProblemDescriptionText(e, k, g)) : d.getProblemDescriptionText(e, g), n = d.getProblemDescriptionText(e, k, g), b.grayt_problemdescription && n && (n = n.replace(/([.!?])\s/g, "$1\x3cbr\x3e"), b.grayt_problemdescription.label = n), d.fire("getGrammarSuggestionsList", { lang: g, phrase: e, rule: k }), e = this.buildSuggestionMenuItems(a, CKEDITOR.plugins.scayt.suggestions, l)); if (l &&
                    "off" == a.config.scayt_contextCommands) return e; for (var h in b) l && -1 == CKEDITOR.tools.indexOf(f, h.replace("scayt_", "")) && "all" != a.config.scayt_contextCommands || m && "grayt_problemdescription" !== h && -1 == CKEDITOR.tools.indexOf(f, h.replace("grayt_", "")) && "all" != a.config.scayt_contextCommands || (e[h] = "undefined" != typeof b[h].state ? b[h].state : CKEDITOR.TRISTATE_OFF, "function" !== typeof b[h].verification || b[h].verification(a) || delete e[h], a.addCommand(h, { exec: b[h].exec }), a.addMenuItem(h, {
                        label: a.lang.scayt[b[h].label] ||
                            b[h].label, command: h, group: b[h].group, order: b[h].order
                    })); return e
        }, createCommand: function (a, c, d) { return { exec: function (b) { b = b.scayt; var e = {}; e[c] = a; b.replaceSelectionNode(e); "startGrammarCheck" === d && b.removeMarkupInSelectionNode({ grammarOnly: !0 }); b.fire(d) } } }
    });
    CKEDITOR.plugins.scayt = {
        charsToObserve: [{ charName: "cke-fillingChar", charCode: function () { var a = CKEDITOR.version, c = [4, 5, 6], d = String.fromCharCode(8203), b = Array(8).join(d), e, f; if (!a) return d; for (var a = a.split("."), g = 0; g < c.length; g++) { e = c[g]; f = Number(a[g]); if (f > e) return b; if (f < e) break } return d }() }], state: { scayt: {}, grayt: {} }, warningCounter: 0, suggestions: [], options: {
            disablingCommandExec: { source: !0, newpage: !0, templates: !0 }, data_attribute_name: "data-scayt-word", misspelled_word_class: "scayt-misspell-word",
            problem_grammar_data_attribute: "data-grayt-phrase", problem_grammar_class: "gramm-problem"
        }, backCompatibilityMap: { scayt_service_protocol: "scayt_serviceProtocol", scayt_service_host: "scayt_serviceHost", scayt_service_port: "scayt_servicePort", scayt_service_path: "scayt_servicePath", scayt_customerid: "scayt_customerId" }, openDialog: function (a, c) { var d = c.scayt; d.isAllModulesReady && !1 === d.isAllModulesReady() || (c.lockSelection(), c.openDialog(a)) }, alarmCompatibilityMessage: function () {
            5 > this.warningCounter && (console.warn("You are using the latest version of SCAYT plugin for CKEditor with the old application version. In order to have access to the newest features, it is recommended to upgrade the application version to latest one as well. Contact us for more details at support@webspellchecker.net."),
                this.warningCounter += 1)
        }, isNewUdSupported: function (a) { return a.getUserDictionary ? !0 : !1 }, reloadMarkup: function (a) { var c; a && (c = a.getScaytLangList(), a.reloadMarkup ? a.reloadMarkup() : (this.alarmCompatibilityMessage(), c && c.ltr && c.rtl && a.fire("startSpellCheck, startGrammarCheck"))) }, replaceOldOptionsNames: function (a) { for (var c in a) c in this.backCompatibilityMap && (a[this.backCompatibilityMap[c]] = a[c], delete a[c]) }, createScayt: function (a) {
            var c = this, d = CKEDITOR.plugins.scayt; this.loadScaytLibrary(a, function (a) {
                function e(a) {
                    return new SCAYT.CKSCAYT(a,
                        function () { }, function () { })
                } var f; a.window && (f = "BODY" == a.editable().$.nodeName ? a.window.getFrame() : a.editable()); if (f) {
                    f = {
                        lang: a.config.scayt_sLang, container: f.$, customDictionary: a.config.scayt_customDictionaryIds, userDictionaryName: a.config.scayt_userDictionaryName, localization: a.langCode, customer_id: a.config.scayt_customerId, customPunctuation: a.config.scayt_customPunctuation, debug: a.config.scayt_debug, data_attribute_name: c.options.data_attribute_name, misspelled_word_class: c.options.misspelled_word_class,
                        problem_grammar_data_attribute: c.options.problem_grammar_data_attribute, problem_grammar_class: c.options.problem_grammar_class, "options-to-restore": a.config.scayt_disableOptionsStorage, focused: a.editable().hasFocus, ignoreElementsRegex: a.config.scayt_elementsToIgnore, ignoreGraytElementsRegex: a.config.grayt_elementsToIgnore, minWordLength: a.config.scayt_minWordLength, graytAutoStartup: a.config.grayt_autoStartup, charsToObserve: d.charsToObserve
                    }; a.config.scayt_serviceProtocol && (f.service_protocol = a.config.scayt_serviceProtocol);
                    a.config.scayt_serviceHost && (f.service_host = a.config.scayt_serviceHost); a.config.scayt_servicePort && (f.service_port = a.config.scayt_servicePort); a.config.scayt_servicePath && (f.service_path = a.config.scayt_servicePath); "boolean" === typeof a.config.scayt_ignoreAllCapsWords && (f["ignore-all-caps-words"] = a.config.scayt_ignoreAllCapsWords); "boolean" === typeof a.config.scayt_ignoreDomainNames && (f["ignore-domain-names"] = a.config.scayt_ignoreDomainNames); "boolean" === typeof a.config.scayt_ignoreWordsWithMixedCases &&
                        (f["ignore-words-with-mixed-cases"] = a.config.scayt_ignoreWordsWithMixedCases); "boolean" === typeof a.config.scayt_ignoreWordsWithNumbers && (f["ignore-words-with-numbers"] = a.config.scayt_ignoreWordsWithNumbers); var g; try { g = e(f) } catch (k) { c.alarmCompatibilityMessage(), delete f.charsToObserve, g = e(f) } g.subscribe("suggestionListSend", function (a) {
                            for (var b = {}, d = [], c = 0; c < a.suggestionList.length; c++)b["word_" + a.suggestionList[c]] || (b["word_" + a.suggestionList[c]] = a.suggestionList[c], d.push(a.suggestionList[c]));
                            CKEDITOR.plugins.scayt.suggestions = d
                        }); g.subscribe("selectionIsChanged", function (d) { a.getSelection().isLocked && "restoreSelection" !== d.action && a.lockSelection(); "restoreSelection" === d.action && a.selectionChange(!0) }); g.subscribe("graytStateChanged", function (c) { d.state.grayt[a.name] = c.state }); g.addMarkupHandler && g.addMarkupHandler(function (d) { var c = a.editable(), e = c.getCustomData(d.charName); e && (e.$ = d.node, c.setCustomData(d.charName, e)) }); a.scayt = g; a.fire("scaytButtonState", a.readOnly ? CKEDITOR.TRISTATE_DISABLED :
                            CKEDITOR.TRISTATE_ON)
                } else d.state.scayt[a.name] = !1
            })
        }, destroy: function (a) { a.scayt && a.scayt.destroy(); delete a.scayt; a.fire("scaytButtonState", CKEDITOR.TRISTATE_OFF) }, loadScaytLibrary: function (a, c) { var d, b = function () { CKEDITOR.fireOnce("scaytReady"); a.scayt || "function" === typeof c && c(a) }; "undefined" === typeof window.SCAYT || "function" !== typeof window.SCAYT.CKSCAYT ? (d = a.config.scayt_srcUrl, CKEDITOR.scriptLoader.load(d, function (a) { a && b() })) : window.SCAYT && "function" === typeof window.SCAYT.CKSCAYT && b() }
    };
    CKEDITOR.on("dialogDefinition", function (a) {
        var c = a.data.name; a = a.data.definition.dialog; "scaytDialog" !== c && "checkspell" !== c && (a.on("show", function (a) { a = a.sender && a.sender.getParentEditor(); var b = CKEDITOR.plugins.scayt, c = a.scayt; c && b.state.scayt[a.name] && c.setMarkupPaused && c.setMarkupPaused(!0) }), a.on("hide", function (a) { a = a.sender && a.sender.getParentEditor(); var b = CKEDITOR.plugins.scayt, c = a.scayt; c && b.state.scayt[a.name] && c.setMarkupPaused && c.setMarkupPaused(!1) })); if ("scaytDialog" === c) a.on("cancel",
            function (a) { return !1 }, this, null, -1); if ("checkspell" === c) a.on("cancel", function (a) { a = a.sender && a.sender.getParentEditor(); var b = CKEDITOR.plugins.scayt, c = a.scayt; c && b.state.scayt[a.name] && c.setMarkupPaused && c.setMarkupPaused(!1); a.unlockSelection() }, this, null, -2); if ("link" === c) a.on("ok", function (a) { var b = a.sender && a.sender.getParentEditor(); b && setTimeout(function () { b.fire("reloadMarkupScayt", { removeOptions: { removeInside: !0, forceBookmark: !0 }, timeout: 0 }) }, 0) }); if ("replace" === c) a.on("hide", function (a) {
                a =
                a.sender && a.sender.getParentEditor(); var b = CKEDITOR.plugins.scayt, c = a.scayt; a && setTimeout(function () { c && (c.fire("removeMarkupInDocument", {}), b.reloadMarkup(c)) }, 0)
            })
    });
    CKEDITOR.on("scaytReady", function () {
        if (!0 === CKEDITOR.config.scayt_handleCheckDirty) {
            var a = CKEDITOR.editor.prototype; a.checkDirty = CKEDITOR.tools.override(a.checkDirty, function (a) { return function () { var b = null, c = this.scayt; if (CKEDITOR.plugins.scayt && CKEDITOR.plugins.scayt.state.scayt[this.name] && this.scayt) { if (b = "ready" == this.status) var f = c.removeMarkupFromString(this.getSnapshot()), c = c.removeMarkupFromString(this._.previousValue), b = b && c !== f } else b = a.call(this); return b } }); a.resetDirty = CKEDITOR.tools.override(a.resetDirty,
                function (a) { return function () { var b = this.scayt; CKEDITOR.plugins.scayt && CKEDITOR.plugins.scayt.state.scayt[this.name] && this.scayt ? this._.previousValue = b.removeMarkupFromString(this.getSnapshot()) : a.call(this) } })
        } if (!0 === CKEDITOR.config.scayt_handleUndoRedo) {
            var a = CKEDITOR.plugins.undo.Image.prototype, c = "function" == typeof a.equalsContent ? "equalsContent" : "equals"; a[c] = CKEDITOR.tools.override(a[c], function (a) {
                return function (b) {
                    var c = b.editor.scayt, f = this.contents, g = b.contents, k = null; CKEDITOR.plugins.scayt &&
                        CKEDITOR.plugins.scayt.state.scayt[b.editor.name] && b.editor.scayt && (this.contents = c.removeMarkupFromString(f) || "", b.contents = c.removeMarkupFromString(g) || ""); k = a.apply(this, arguments); this.contents = f; b.contents = g; return k
                }
            })
        }
    }); (function () {
        CKEDITOR.plugins.add("stylescombo", {
            requires: "richcombo", init: function (c) {
                var k = c.config, h = c.lang.stylescombo, e = {}, l = [], m = []; c.on("stylesSet", function (a) {
                    if (a = a.data.styles) {
                        for (var b, f, d, n, g = 0, h = a.length; g < h; g++)(b = a[g], c.blockless && b.element in CKEDITOR.dtd.$block || "string" == typeof b.type && !CKEDITOR.style.customHandlers[b.type] || (f = b.name, n = b.language || c.langCode, b = new CKEDITOR.style(b), c.filter.customConfig && !c.filter.check(b))) || (b._name = f, b._.enterMode = k.enterMode, b._.type = d = b.assignedTo ||
                            b.type, b._.weight = g + 1E3 * (d == CKEDITOR.STYLE_OBJECT ? 1 : d == CKEDITOR.STYLE_BLOCK ? 2 : 3), b._.language = n, e[f] = b, l.push(b), m.push(b)); l.sort(function (a, b) { return a._.weight - b._.weight })
                    }
                }); c.on("stylesRemove", function (a) { a = a.data && a.data.type; var b = void 0 === a, f; for (f in e) { var d = e[f]; (b || d.type === a) && c.removeStyle(d) } }); c.ui.addRichCombo("Styles", {
                    label: h.label, title: h.panelTitle, toolbar: "styles,10", allowedContent: m, panel: { css: [CKEDITOR.skin.getPath("editor")].concat(k.contentsCss), multiSelect: !0, attributes: { "aria-label": h.panelTitle } },
                    init: function () { var a, b, c, d, e, g, k; g = 0; for (k = l.length; g < k; g++)a = l[g], b = a._name, d = a._.type, e = a._.definition.language, d != c && (this.startGroup(h["panelTitle" + String(d)]), c = d), this.add(b, a.type == CKEDITOR.STYLE_OBJECT ? b : a.buildPreview(), b, e); this.commit() }, onClick: function (a) { c.focus(); c.fire("saveSnapshot"); a = e[a]; var b = c.elementPath(); if (a.group && a.removeStylesFromSameGroup(c)) c.applyStyle(a); else c[a.checkActive(b, c) ? "removeStyle" : "applyStyle"](a); c.fire("saveSnapshot") }, onRender: function () {
                        c.on("selectionChange",
                            function (a) { var b = this.getValue(); a = a.data.path.elements; for (var f = 0, d = a.length, h; f < d; f++) { h = a[f]; for (var g in e) if (e[g].checkElementRemovable(h, !0, c)) { g != b && this.setValue(g); return } } this.setValue("") }, this)
                    }, onOpen: function () {
                        var a = c.getSelection(), a = a.getSelectedElement() || a.getStartElement() || c.editable(), a = c.elementPath(a), b = [0, 0, 0, 0]; this.showAll(); this.unmarkAll(); for (var f in e) { var d = e[f], k = d._.type; d.checkApplicable(a, c, c.activeFilter) ? b[k]++ : this.hideItem(f); d.checkActive(a, c) && this.mark(f) } b[CKEDITOR.STYLE_BLOCK] ||
                            this.hideGroup(h["panelTitle" + String(CKEDITOR.STYLE_BLOCK)]); b[CKEDITOR.STYLE_INLINE] || this.hideGroup(h["panelTitle" + String(CKEDITOR.STYLE_INLINE)]); b[CKEDITOR.STYLE_OBJECT] || this.hideGroup(h["panelTitle" + String(CKEDITOR.STYLE_OBJECT)])
                    }, refresh: function () { var a = c.elementPath(); if (a) { for (var b in e) if (e[b].checkApplicable(a, c, c.activeFilter)) return; this.setState(CKEDITOR.TRISTATE_DISABLED) } }, reset: function () { e = {}; l = [] }
                })
            }
        })
    })(); (function () {
        function k(c) {
            return {
                editorFocus: !1, canUndo: !0, modes: { wysiwyg: 1 }, exec: function (d) {
                    if (d.editable().hasFocus) {
                        var e = d.getSelection(), b; if (b = (new CKEDITOR.dom.elementPath(e.getStartElement(), e.root)).contains({ td: 1, th: 1 }, 1)) {
                            var e = d.createRange(), a = CKEDITOR.tools.tryThese(function () { var a = b.getParent().$.cells[b.$.cellIndex + (c ? -1 : 1)]; a.parentNode.parentNode; return a }, function () { var a = b.getParent(), a = a.getAscendant("table").$.rows[a.$.rowIndex + (c ? -1 : 1)]; return a.cells[c ? a.cells.length - 1 : 0] });
                            if (a || c) if (a) a = new CKEDITOR.dom.element(a), e.moveToElementEditStart(a), e.checkStartOfBlock() && e.checkEndOfBlock() || e.selectNodeContents(a); else return !0; else { for (var f = b.getAscendant("table").$, a = b.getParent().$.cells, f = new CKEDITOR.dom.element(f.insertRow(-1), d.document), g = 0, h = a.length; g < h; g++)f.append((new CKEDITOR.dom.element(a[g], d.document)).clone(!1, !1)).appendBogus(); e.moveToElementEditStart(f) } e.select(!0); return !0
                        }
                    } return !1
                }
            }
        } var h = { editorFocus: !1, modes: { wysiwyg: 1, source: 1 } }, g = {
            exec: function (c) {
                c.container.focusNext(!0,
                    c.tabIndex)
            }
        }, f = { exec: function (c) { c.container.focusPrevious(!0, c.tabIndex) } }; CKEDITOR.plugins.add("tab", {
            init: function (c) {
                for (var d = !1 !== c.config.enableTabKeyTools, e = c.config.tabSpaces || 0, b = ""; e--;)b += " "; if (b) c.on("key", function (a) { 9 == a.data.keyCode && (c.insertText(b), a.cancel()) }); if (d) c.on("key", function (a) { (9 == a.data.keyCode && c.execCommand("selectNextCell") || a.data.keyCode == CKEDITOR.SHIFT + 9 && c.execCommand("selectPreviousCell")) && a.cancel() }); c.addCommand("blur", CKEDITOR.tools.extend(g, h)); c.addCommand("blurBack",
                    CKEDITOR.tools.extend(f, h)); c.addCommand("selectNextCell", k()); c.addCommand("selectPreviousCell", k(!0))
            }
        })
    })();
    CKEDITOR.dom.element.prototype.focusNext = function (k, h) {
        var g = void 0 === h ? this.getTabIndex() : h, f, c, d, e, b, a; if (0 >= g) for (b = this.getNextSourceNode(k, CKEDITOR.NODE_ELEMENT); b;) { if (b.isVisible() && 0 === b.getTabIndex()) { d = b; break } b = b.getNextSourceNode(!1, CKEDITOR.NODE_ELEMENT) } else for (b = this.getDocument().getBody().getFirst(); b = b.getNextSourceNode(!1, CKEDITOR.NODE_ELEMENT);) {
            if (!f) if (!c && b.equals(this)) { if (c = !0, k) { if (!(b = b.getNextSourceNode(!0, CKEDITOR.NODE_ELEMENT))) break; f = 1 } } else c && !this.contains(b) &&
                (f = 1); if (b.isVisible() && !(0 > (a = b.getTabIndex()))) { if (f && a == g) { d = b; break } a > g && (!d || !e || a < e) ? (d = b, e = a) : d || 0 !== a || (d = b, e = a) }
        } d && d.focus()
    };
    CKEDITOR.dom.element.prototype.focusPrevious = function (k, h) { for (var g = void 0 === h ? this.getTabIndex() : h, f, c, d, e = 0, b, a = this.getDocument().getBody().getLast(); a = a.getPreviousSourceNode(!1, CKEDITOR.NODE_ELEMENT);) { if (!f) if (!c && a.equals(this)) { if (c = !0, k) { if (!(a = a.getPreviousSourceNode(!0, CKEDITOR.NODE_ELEMENT))) break; f = 1 } } else c && !this.contains(a) && (f = 1); if (a.isVisible() && !(0 > (b = a.getTabIndex()))) if (0 >= g) { if (f && 0 === b) { d = a; break } b > e && (d = a, e = b) } else { if (f && b == g) { d = a; break } b < g && (!d || b > e) && (d = a, e = b) } } d && d.focus() }; CKEDITOR.plugins.add("table", {
        requires: "dialog", init: function (a) {
            function f(c) { return CKEDITOR.tools.extend(c || {}, { contextSensitive: 1, refresh: function (c, b) { this.setState(b.contains("table", 1) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED) } }) } if (!a.blockless) {
                var e = a.lang.table; a.addCommand("table", new CKEDITOR.dialogCommand("table", {
                    context: "table", allowedContent: "table{width,height,border-collapse}[align,border,cellpadding,cellspacing,summary];caption tbody thead tfoot;th td tr[scope];td{border*,background-color,vertical-align,width,height}[colspan,rowspan];" +
                        (a.plugins.dialogadvtab ? "table" + a.plugins.dialogadvtab.allowedContent() : ""), requiredContent: "table", contentTransformations: [["table{width}: sizeToStyle", "table[width]: sizeToAttribute"], ["td: splitBorderShorthand"], [{
                            element: "table", right: function (c) {
                                if (c.styles) {
                                    var a; if (c.styles.border) a = CKEDITOR.tools.style.parse.border(c.styles.border); else if (CKEDITOR.env.ie && 8 === CKEDITOR.env.version) {
                                        var b = c.styles; b["border-left"] && b["border-left"] === b["border-right"] && b["border-right"] === b["border-top"] &&
                                            b["border-top"] === b["border-bottom"] && (a = CKEDITOR.tools.style.parse.border(b["border-top"]))
                                    } a && a.style && "solid" === a.style && a.width && 0 !== parseFloat(a.width) && (c.attributes.border = 1); "collapse" == c.styles["border-collapse"] && (c.attributes.cellspacing = 0)
                                }
                            }
                        }]]
                })); a.addCommand("tableProperties", new CKEDITOR.dialogCommand("tableProperties", f())); a.addCommand("tableDelete", f({
                    exec: function (a) {
                        var d = a.elementPath().contains("table", 1); if (d) {
                            var b = d.getParent(), e = a.editable(); 1 != b.getChildCount() || b.is("td",
                                "th") || b.equals(e) || (d = b); a = a.createRange(); a.moveToPosition(d, CKEDITOR.POSITION_BEFORE_START); d.remove(); a.select()
                        }
                    }
                })); a.ui.addButton && a.ui.addButton("Table", { label: e.toolbar, command: "table", toolbar: "insert,30" }); CKEDITOR.dialog.add("table", this.path + "dialogs/table.js"); CKEDITOR.dialog.add("tableProperties", this.path + "dialogs/table.js"); a.addMenuItems && a.addMenuItems({
                    table: { label: e.menu, command: "tableProperties", group: "table", order: 5 }, tabledelete: {
                        label: e.deleteTable, command: "tableDelete", group: "table",
                        order: 1
                    }
                }); a.on("doubleclick", function (a) { a.data.element.is("table") && (a.data.dialog = "tableProperties") }); a.contextMenu && a.contextMenu.addListener(function () { return { tabledelete: CKEDITOR.TRISTATE_OFF, table: CKEDITOR.TRISTATE_OFF } })
            }
        }
    }); (function () {
        function q(d, f) {
            function b(a) { return f ? f.contains(a) && a.getAscendant("table", !0).equals(f) : !0 } function c(a) { var b = /^(?:td|th)$/; 0 < e.length || a.type != CKEDITOR.NODE_ELEMENT || !b.test(a.getName()) || a.getCustomData("selected_cell") || (CKEDITOR.dom.element.setMarker(h, a, "selected_cell", !0), e.push(a)) } var e = [], h = {}; if (!d) return e; for (var a = d.getRanges(), k = 0; k < a.length; k++) {
                var g = a[k]; if (g.collapsed) (g = g.getCommonAncestor().getAscendant({ td: 1, th: 1 }, !0)) && b(g) && e.push(g); else {
                    var g = new CKEDITOR.dom.walker(g),
                    m; for (g.guard = c; m = g.next();)m.type == CKEDITOR.NODE_ELEMENT && m.is(CKEDITOR.dtd.table) || (m = m.getAscendant({ td: 1, th: 1 }, !0)) && !m.getCustomData("selected_cell") && b(m) && (CKEDITOR.dom.element.setMarker(h, m, "selected_cell", !0), e.push(m))
                }
            } CKEDITOR.dom.element.clearAllMarkers(h); return e
        } function r(d, f) {
            for (var b = D(d) ? d : q(d), c = b[0], e = c.getAscendant("table"), c = c.getDocument(), h = b[0].getParent(), a = h.$.rowIndex, b = b[b.length - 1], k = b.getParent().$.rowIndex + b.$.rowSpan - 1, b = new CKEDITOR.dom.element(e.$.rows[k]), a =
                f ? a : k, h = f ? h : b, b = CKEDITOR.tools.buildTableMap(e), e = b[a], a = f ? b[a - 1] : b[a + 1], b = b[0].length, c = c.createElement("tr"), k = 0; e[k] && k < b; k++) { var g; 1 < e[k].rowSpan && a && e[k] == a[k] ? (g = e[k], g.rowSpan += 1) : (g = (new CKEDITOR.dom.element(e[k])).clone(), g.removeAttribute("rowSpan"), g.appendBogus(), c.append(g), g = g.$); k += g.colSpan - 1 } f ? c.insertBefore(h) : c.insertAfter(h); return c
        } function B(d) {
            if (d instanceof CKEDITOR.dom.selection) {
                var f = d.getRanges(), b = q(d), c = b[0].getAscendant("table"), e = CKEDITOR.tools.buildTableMap(c),
                h = b[0].getParent().$.rowIndex, b = b[b.length - 1], a = b.getParent().$.rowIndex + b.$.rowSpan - 1, b = []; d.reset(); for (d = h; d <= a; d++) { for (var k = e[d], g = new CKEDITOR.dom.element(c.$.rows[d]), m = 0; m < k.length; m++) { var l = new CKEDITOR.dom.element(k[m]), n = l.getParent().$.rowIndex; 1 == l.$.rowSpan ? l.remove() : (--l.$.rowSpan, n == d && (n = e[d + 1], n[m - 1] ? l.insertAfter(new CKEDITOR.dom.element(n[m - 1])) : (new CKEDITOR.dom.element(c.$.rows[d + 1])).append(l, 1))); m += l.$.colSpan - 1 } b.push(g) } e = c.$.rows; f[0].moveToPosition(c, CKEDITOR.POSITION_BEFORE_START);
                h = new CKEDITOR.dom.element(e[a + 1] || (0 < h ? e[h - 1] : null) || c.$.parentNode); for (d = b.length; 0 <= d; d--)B(b[d]); return c.$.parentNode ? h : (f[0].select(), null)
            } d instanceof CKEDITOR.dom.element && (c = d.getAscendant("table"), 1 == c.$.rows.length ? c.remove() : d.remove()); return null
        } function v(d) { for (var f = d.getParent().$.cells, b = 0, c = 0; c < f.length; c++) { var e = f[c], b = b + e.colSpan; if (e == d.$) break } return b - 1 } function w(d, f) { for (var b = f ? Infinity : 0, c = 0; c < d.length; c++) { var e = v(d[c]); if (f ? e < b : e > b) b = e } return b } function u(d, f) {
            for (var b =
                D(d) ? d : q(d), c = b[0].getAscendant("table"), e = w(b, 1), b = w(b), h = f ? e : b, a = CKEDITOR.tools.buildTableMap(c), c = [], e = [], b = [], k = a.length, g = 0; g < k; g++) { var m = f ? a[g][h - 1] : a[g][h + 1]; c.push(a[g][h]); e.push(m) } for (g = 0; g < k; g++)c[g] && (1 < c[g].colSpan && e[g] == c[g] ? (a = c[g], a.colSpan += 1) : (h = new CKEDITOR.dom.element(c[g]), a = h.clone(), a.removeAttribute("colSpan"), a.appendBogus(), a[f ? "insertBefore" : "insertAfter"].call(a, h), b.push(a), a = a.$), g += a.rowSpan - 1); return b
        } function y(d) {
            function f(a) {
                var b = a.getRanges(), c, d; if (1 !== b.length) return a;
                b = b[0]; if (b.collapsed || 0 !== b.endOffset) return a; c = b.endContainer; d = c.getName().toLowerCase(); if ("td" !== d && "th" !== d) return a; for ((d = c.getPrevious()) || (d = c.getParent().getPrevious().getLast()); d.type !== CKEDITOR.NODE_TEXT && "br" !== d.getName().toLowerCase();)if (d = d.getLast(), !d) return a; b.setEndAt(d, CKEDITOR.POSITION_BEFORE_END); return b.select()
            } CKEDITOR.env.webkit && !d.isFake && (d = f(d)); var b = d.getRanges(), c = q(d), e = c[0], h = c[c.length - 1], c = e.getAscendant("table"), a = CKEDITOR.tools.buildTableMap(c), k, g, m =
                []; d.reset(); var l = 0; for (d = a.length; l < d; l++)for (var n = 0, p = a[l].length; n < p; n++)void 0 === k && a[l][n] == e.$ && (k = n), a[l][n] == h.$ && (g = n); for (l = k; l <= g; l++)for (n = 0; n < a.length; n++)h = a[n], e = new CKEDITOR.dom.element(c.$.rows[n]), h = new CKEDITOR.dom.element(h[l]), h.$ && (1 == h.$.colSpan ? h.remove() : --h.$.colSpan, n += h.$.rowSpan - 1, e.$.cells.length || m.push(e)); k = a[0].length - 1 > g ? new CKEDITOR.dom.element(a[0][g + 1]) : k && -1 !== a[0][k - 1].cellIndex ? new CKEDITOR.dom.element(a[0][k - 1]) : new CKEDITOR.dom.element(c.$.parentNode);
            m.length == d && (b[0].moveToPosition(c, CKEDITOR.POSITION_AFTER_END), b[0].select(), c.remove()); return k
        } function t(d, f) { var b = d.getStartElement().getAscendant({ td: 1, th: 1 }, !0); if (b) { var c = b.clone(); c.appendBogus(); f ? c.insertBefore(b) : c.insertAfter(b) } } function z(d) {
            if (d instanceof CKEDITOR.dom.selection) {
                var f = d.getRanges(), b = q(d), c = b[0] && b[0].getAscendant("table"), e; a: {
                    var h = 0; e = b.length - 1; for (var a = {}, k, g; k = b[h++];)CKEDITOR.dom.element.setMarker(a, k, "delete_cell", !0); for (h = 0; k = b[h++];)if ((g = k.getPrevious()) &&
                        !g.getCustomData("delete_cell") || (g = k.getNext()) && !g.getCustomData("delete_cell")) { CKEDITOR.dom.element.clearAllMarkers(a); e = g; break a } CKEDITOR.dom.element.clearAllMarkers(a); h = b[0].getParent(); (h = h.getPrevious()) ? e = h.getLast() : (h = b[e].getParent(), e = (h = h.getNext()) ? h.getChild(0) : null)
                } d.reset(); for (d = b.length - 1; 0 <= d; d--)z(b[d]); e ? p(e, !0) : c && (f[0].moveToPosition(c, CKEDITOR.POSITION_BEFORE_START), f[0].select(), c.remove())
            } else d instanceof CKEDITOR.dom.element && (f = d.getParent(), 1 == f.getChildCount() ?
                f.remove() : d.remove())
        } function p(d, f) { var b = d.getDocument(), c = CKEDITOR.document; CKEDITOR.env.ie && 10 == CKEDITOR.env.version && (c.focus(), b.focus()); b = new CKEDITOR.dom.range(b); b["moveToElementEdit" + (f ? "End" : "Start")](d) || (b.selectNodeContents(d), b.collapse(f ? !1 : !0)); b.select(!0) } function A(d, f, b) { d = d[f]; if ("undefined" == typeof b) return d; for (f = 0; d && f < d.length; f++) { if (b.is && d[f] == b.$) return f; if (f == b) return new CKEDITOR.dom.element(d[f]) } return b.is ? -1 : null } function x(d, f, b) {
            var c = q(d), e; if ((f ? 1 != c.length :
                2 > c.length) || (e = d.getCommonAncestor()) && e.type == CKEDITOR.NODE_ELEMENT && e.is("table")) return !1; d = c[0]; e = d.getAscendant("table"); var h = CKEDITOR.tools.buildTableMap(e), a = h.length, k = h[0].length, g = d.getParent().$.rowIndex, m = A(h, g, d), l; if (f) { var n; try { var p = parseInt(d.getAttribute("rowspan"), 10) || 1; l = parseInt(d.getAttribute("colspan"), 10) || 1; n = h["up" == f ? g - p : "down" == f ? g + p : g]["left" == f ? m - l : "right" == f ? m + l : m] } catch (x) { return !1 } if (!n || d.$ == n) return !1; c["up" == f || "left" == f ? "unshift" : "push"](new CKEDITOR.dom.element(n)) } f =
                    d.getDocument(); var r = g, p = n = 0, u = !b && new CKEDITOR.dom.documentFragment(f), w = 0; for (f = 0; f < c.length; f++) {
                        l = c[f]; var t = l.getParent(), y = l.getFirst(), v = l.$.colSpan, z = l.$.rowSpan, t = t.$.rowIndex, B = A(h, t, l), w = w + v * z, p = Math.max(p, B - m + v); n = Math.max(n, t - g + z); b || (v = l, (z = v.getBogus()) && z.remove(), v.trim(), l.getChildren().count() && (t == r || !y || y.isBlockBoundary && y.isBlockBoundary({ br: 1 }) || (r = u.getLast(CKEDITOR.dom.walker.whitespaces(!0)), !r || r.is && r.is("br") || u.append("br")), l.moveChildren(u)), f ? l.remove() : l.setHtml(""));
                        r = t
                    } if (b) return n * p == w; u.moveChildren(d); d.appendBogus(); p >= k ? d.removeAttribute("rowSpan") : d.$.rowSpan = n; n >= a ? d.removeAttribute("colSpan") : d.$.colSpan = p; b = new CKEDITOR.dom.nodeList(e.$.rows); c = b.count(); for (f = c - 1; 0 <= f; f--)e = b.getItem(f), e.$.cells.length || (e.remove(), c++); return d
        } function C(d, f) {
            var b = q(d); if (1 < b.length) return !1; if (f) return !0; var b = b[0], c = b.getParent(), e = c.getAscendant("table"), h = CKEDITOR.tools.buildTableMap(e), a = c.$.rowIndex, k = A(h, a, b), g = b.$.rowSpan, m; if (1 < g) {
                m = Math.ceil(g / 2); for (var g =
                    Math.floor(g / 2), c = a + m, e = new CKEDITOR.dom.element(e.$.rows[c]), h = A(h, c), l, c = b.clone(), a = 0; a < h.length; a++)if (l = h[a], l.parentNode == e.$ && a > k) { c.insertBefore(new CKEDITOR.dom.element(l)); break } else l = null; l || e.append(c)
            } else for (g = m = 1, e = c.clone(), e.insertAfter(c), e.append(c = b.clone()), l = A(h, a), k = 0; k < l.length; k++)l[k].rowSpan++; c.appendBogus(); b.$.rowSpan = m; c.$.rowSpan = g; 1 == m && b.removeAttribute("rowSpan"); 1 == g && c.removeAttribute("rowSpan"); return c
        } function E(d, f) {
            var b = q(d); if (1 < b.length) return !1; if (f) return !0;
            var b = b[0], c = b.getParent(), e = c.getAscendant("table"), e = CKEDITOR.tools.buildTableMap(e), h = A(e, c.$.rowIndex, b), a = b.$.colSpan; if (1 < a) c = Math.ceil(a / 2), a = Math.floor(a / 2); else { for (var a = c = 1, k = [], g = 0; g < e.length; g++) { var m = e[g]; k.push(m[h]); 1 < m[h].rowSpan && (g += m[h].rowSpan - 1) } for (e = 0; e < k.length; e++)k[e].colSpan++ } e = b.clone(); e.insertAfter(b); e.appendBogus(); b.$.colSpan = c; e.$.colSpan = a; 1 == c && b.removeAttribute("colSpan"); 1 == a && e.removeAttribute("colSpan"); return e
        } var D = CKEDITOR.tools.isArray; CKEDITOR.plugins.tabletools =
        {
            requires: "table,dialog,contextmenu", init: function (d) {
                function f(a) { return CKEDITOR.tools.extend(a || {}, { contextSensitive: 1, refresh: function (a, b) { this.setState(b.contains({ td: 1, th: 1 }, 1) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED) } }) } function b(a, b) { var c = d.addCommand(a, b); d.addFeature(c) } var c = d.lang.table, e = CKEDITOR.tools.style.parse, h = "td{width} td{height} td{border-color} td{background-color} td{white-space} td{vertical-align} td{text-align} td[colspan] td[rowspan] th".split(" "); b("cellProperties",
                    new CKEDITOR.dialogCommand("cellProperties", f({
                        allowedContent: "td th{width,height,border-color,background-color,white-space,vertical-align,text-align}[colspan,rowspan]", requiredContent: h, contentTransformations: [[{ element: "td", left: function (a) { return a.styles.background && e.background(a.styles.background).color }, right: function (a) { a.styles["background-color"] = e.background(a.styles.background).color } }, {
                            element: "td", check: "td{vertical-align}", left: function (a) { return a.attributes && a.attributes.valign },
                            right: function (a) { a.styles["vertical-align"] = a.attributes.valign; delete a.attributes.valign }
                        }], [{ element: "tr", check: "td{height}", left: function (a) { return a.styles && a.styles.height }, right: function (a) { CKEDITOR.tools.array.forEach(a.children, function (b) { b.name in { td: 1, th: 1 } && (b.attributes["cke-row-height"] = a.styles.height) }); delete a.styles.height } }], [{
                            element: "td", check: "td{height}", left: function (a) { return (a = a.attributes) && a["cke-row-height"] }, right: function (a) {
                                a.styles.height = a.attributes["cke-row-height"];
                                delete a.attributes["cke-row-height"]
                            }
                        }]]
                    }))); CKEDITOR.dialog.add("cellProperties", this.path + "dialogs/tableCell.js"); b("rowDelete", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); (a = B(a)) && p(a) } })); b("rowInsertBefore", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); a = q(a); r(a, !0) } })); b("rowInsertAfter", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); a = q(a); r(a) } })); b("columnDelete", f({
                        requiredContent: "table", exec: function (a) {
                            a = a.getSelection(); (a = y(a)) &&
                                p(a, !0)
                        }
                    })); b("columnInsertBefore", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); a = q(a); u(a, !0) } })); b("columnInsertAfter", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); a = q(a); u(a) } })); b("cellDelete", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); z(a) } })); b("cellMerge", f({ allowedContent: "td[colspan,rowspan]", requiredContent: "td[colspan,rowspan]", exec: function (a, b) { b.cell = x(a.getSelection()); p(b.cell, !0) } })); b("cellMergeRight", f({
                        allowedContent: "td[colspan]",
                        requiredContent: "td[colspan]", exec: function (a, b) { b.cell = x(a.getSelection(), "right"); p(b.cell, !0) }
                    })); b("cellMergeDown", f({ allowedContent: "td[rowspan]", requiredContent: "td[rowspan]", exec: function (a, b) { b.cell = x(a.getSelection(), "down"); p(b.cell, !0) } })); b("cellVerticalSplit", f({ allowedContent: "td[rowspan]", requiredContent: "td[rowspan]", exec: function (a) { p(E(a.getSelection())) } })); b("cellHorizontalSplit", f({ allowedContent: "td[colspan]", requiredContent: "td[colspan]", exec: function (a) { p(C(a.getSelection())) } }));
                b("cellInsertBefore", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); t(a, !0) } })); b("cellInsertAfter", f({ requiredContent: "table", exec: function (a) { a = a.getSelection(); t(a) } })); d.addMenuItems && d.addMenuItems({
                    tablecell: {
                        label: c.cell.menu, group: "tablecell", order: 1, getItems: function () {
                            var a = d.getSelection(), b = q(a), a = {
                                tablecell_insertBefore: CKEDITOR.TRISTATE_OFF, tablecell_insertAfter: CKEDITOR.TRISTATE_OFF, tablecell_delete: CKEDITOR.TRISTATE_OFF, tablecell_merge: x(a, null, !0) ? CKEDITOR.TRISTATE_OFF :
                                    CKEDITOR.TRISTATE_DISABLED, tablecell_merge_right: x(a, "right", !0) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, tablecell_merge_down: x(a, "down", !0) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, tablecell_split_vertical: E(a, !0) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED, tablecell_split_horizontal: C(a, !0) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED
                            }; d.filter.check(h) && (a.tablecell_properties = 0 < b.length ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED); return a
                        }
                    }, tablecell_insertBefore: {
                        label: c.cell.insertBefore,
                        group: "tablecell", command: "cellInsertBefore", order: 5
                    }, tablecell_insertAfter: { label: c.cell.insertAfter, group: "tablecell", command: "cellInsertAfter", order: 10 }, tablecell_delete: { label: c.cell.deleteCell, group: "tablecell", command: "cellDelete", order: 15 }, tablecell_merge: { label: c.cell.merge, group: "tablecell", command: "cellMerge", order: 16 }, tablecell_merge_right: { label: c.cell.mergeRight, group: "tablecell", command: "cellMergeRight", order: 17 }, tablecell_merge_down: {
                        label: c.cell.mergeDown, group: "tablecell", command: "cellMergeDown",
                        order: 18
                    }, tablecell_split_horizontal: { label: c.cell.splitHorizontal, group: "tablecell", command: "cellHorizontalSplit", order: 19 }, tablecell_split_vertical: { label: c.cell.splitVertical, group: "tablecell", command: "cellVerticalSplit", order: 20 }, tablecell_properties: { label: c.cell.title, group: "tablecellproperties", command: "cellProperties", order: 21 }, tablerow: {
                        label: c.row.menu, group: "tablerow", order: 1, getItems: function () {
                            return {
                                tablerow_insertBefore: CKEDITOR.TRISTATE_OFF, tablerow_insertAfter: CKEDITOR.TRISTATE_OFF,
                                tablerow_delete: CKEDITOR.TRISTATE_OFF
                            }
                        }
                    }, tablerow_insertBefore: { label: c.row.insertBefore, group: "tablerow", command: "rowInsertBefore", order: 5 }, tablerow_insertAfter: { label: c.row.insertAfter, group: "tablerow", command: "rowInsertAfter", order: 10 }, tablerow_delete: { label: c.row.deleteRow, group: "tablerow", command: "rowDelete", order: 15 }, tablecolumn: {
                        label: c.column.menu, group: "tablecolumn", order: 1, getItems: function () {
                            return {
                                tablecolumn_insertBefore: CKEDITOR.TRISTATE_OFF, tablecolumn_insertAfter: CKEDITOR.TRISTATE_OFF,
                                tablecolumn_delete: CKEDITOR.TRISTATE_OFF
                            }
                        }
                    }, tablecolumn_insertBefore: { label: c.column.insertBefore, group: "tablecolumn", command: "columnInsertBefore", order: 5 }, tablecolumn_insertAfter: { label: c.column.insertAfter, group: "tablecolumn", command: "columnInsertAfter", order: 10 }, tablecolumn_delete: { label: c.column.deleteColumn, group: "tablecolumn", command: "columnDelete", order: 15 }
                }); d.contextMenu && d.contextMenu.addListener(function (a, b, c) {
                    return (a = c.contains({ td: 1, th: 1 }, 1)) && !a.isReadOnly() ? {
                        tablecell: CKEDITOR.TRISTATE_OFF,
                        tablerow: CKEDITOR.TRISTATE_OFF, tablecolumn: CKEDITOR.TRISTATE_OFF
                    } : null
                })
            }, getCellColIndex: v, insertRow: r, insertColumn: u, getSelectedCells: q
        }; CKEDITOR.plugins.add("tabletools", CKEDITOR.plugins.tabletools)
    })();
    CKEDITOR.tools.buildTableMap = function (q, r, B, v, w) { q = q.$.rows; B = B || 0; v = "number" === typeof v ? v : q.length - 1; w = "number" === typeof w ? w : -1; var u = -1, y = []; for (r = r || 0; r <= v; r++) { u++; !y[u] && (y[u] = []); for (var t = -1, z = B; z <= (-1 === w ? q[r].cells.length - 1 : w); z++) { var p = q[r].cells[z]; if (!p) break; for (t++; y[u][t];)t++; for (var A = isNaN(p.colSpan) ? 1 : p.colSpan, p = isNaN(p.rowSpan) ? 1 : p.rowSpan, x = 0; x < p && !(r + x > v); x++) { y[u + x] || (y[u + x] = []); for (var C = 0; C < A; C++)y[u + x][t + C] = q[r].cells[z] } t += A - 1; if (-1 !== w && t >= w) break } } return y };
    CKEDITOR.config.tabletools_scopedHeaders = !1; (function () {
        function D(a) { return CKEDITOR.plugins.widget && CKEDITOR.plugins.widget.isDomWidget(a) } function z(a, b) {
            var c = a.getAscendant("table"), d = b.getAscendant("table"), e = CKEDITOR.tools.buildTableMap(c), g = r(a), k = r(b), h = [], f = {}, l, p; c.contains(d) && (b = b.getAscendant({ td: 1, th: 1 }), k = r(b)); g > k && (c = g, g = k, k = c, c = a, a = b, b = c); for (c = 0; c < e[g].length; c++)if (a.$ === e[g][c]) { l = c; break } for (c = 0; c < e[k].length; c++)if (b.$ === e[k][c]) { p = c; break } l > p && (c = l, l = p, p = c); for (c = g; c <= k; c++)for (g = l; g <= p; g++)d = new CKEDITOR.dom.element(e[c][g]),
                d.$ && !d.getCustomData("selected_cell") && (h.push(d), CKEDITOR.dom.element.setMarker(f, d, "selected_cell", !0)); CKEDITOR.dom.element.clearAllMarkers(f); return h
        } function J(a) { return (a = a.editable().findOne(".cke_table-faked-selection")) && a.getAscendant("table") } function A(a, b) {
            var c = a.editable().find(".cke_table-faked-selection"), d = a.editable().findOne("[data-cke-table-faked-selection-table]"), e; a.fire("lockSnapshot"); a.editable().removeClass("cke_table-faked-selection-editor"); for (e = 0; e < c.count(); e++)c.getItem(e).removeClass("cke_table-faked-selection");
            d && d.data("cke-table-faked-selection-table", !1); a.fire("unlockSnapshot"); b && (m = { active: !1 }, a.getSelection().isInTable() && a.getSelection().reset())
        } function t(a, b) { var c = [], d, e; for (e = 0; e < b.length; e++)d = a.createRange(), d.setStartBefore(b[e]), d.setEndAfter(b[e]), c.push(d); a.getSelection().selectRanges(c) } function E(a) { var b = a.editable().find(".cke_table-faked-selection"); 1 > b.count() || (b = z(b.getItem(0), b.getItem(b.count() - 1)), t(a, b)) } function K(a, b, c) {
            var d = v(a.getSelection(!0)); b = b.is("table") ? null :
                b; var e; (e = m.active && !m.first) && !(e = b) && (e = a.getSelection().getRanges(), e = 1 < d.length || e[0] && !e[0].collapsed ? !0 : !1); if (e) m.first = b || d[0], m.dirty = b ? !1 : 1 !== d.length; else if (m.active && b && m.first.getAscendant("table").equals(b.getAscendant("table"))) { d = z(m.first, b); if (!m.dirty && 1 === d.length && !D(c.data.getTarget())) return A(a, "mouseup" === c.name); m.dirty = !0; m.last = b; t(a, d) }
        } function L(a) {
            var b = (a = a.editor || a.sender.editor) && a.getSelection(), c = b && b.getRanges() || [], d = c && c[0].getEnclosedNode(), d = d && d.type ==
                CKEDITOR.NODE_ELEMENT && d.is("img"), e; if (b && (A(a), b.isInTable() && b.isFake)) if (d) a.getSelection().reset(); else if (!c[0]._getTableElement({ table: 1 }).hasAttribute("data-cke-tableselection-ignored")) {
                    1 === c.length && c[0]._getTableElement() && c[0]._getTableElement().is("table") && (e = c[0]._getTableElement()); e = v(b, e); a.fire("lockSnapshot"); for (b = 0; b < e.length; b++)e[b].addClass("cke_table-faked-selection"); 0 < e.length && (a.editable().addClass("cke_table-faked-selection-editor"), e[0].getAscendant("table").data("cke-table-faked-selection-table",
                        "")); a.fire("unlockSnapshot")
                }
        } function r(a) { return a.getAscendant("tr", !0).$.rowIndex } function w(a) {
            function b(a, b) { return a && b ? a.equals(b) || a.contains(b) || b.contains(a) || a.getCommonAncestor(b).is(l) : !1 } function c(a) { return !a.getAscendant("table", !0) && a.getDocument().equals(e.document) } function d(a, b, d, e) {
                if ("mousedown" === a.name && (CKEDITOR.tools.getMouseButton(a) === CKEDITOR.MOUSE_BUTTON_LEFT || !e)) return !0; if (b = a.name === (CKEDITOR.env.gecko ? "mousedown" : "mouseup") && !c(a.data.getTarget())) a = a.data.getTarget().getAscendant({
                    td: 1,
                    th: 1
                }, !0), b = !(a && a.hasClass("cke_table-faked-selection")); return b
            } if (a.data.getTarget().getName && ("mouseup" === a.name || !D(a.data.getTarget()))) {
                var e = a.editor || a.listenerData.editor, g = e.getSelection(1), k = J(e), h = a.data.getTarget(), f = h && h.getAscendant({ td: 1, th: 1 }, !0), h = h && h.getAscendant("table", !0), l = { table: 1, thead: 1, tbody: 1, tfoot: 1, tr: 1, td: 1, th: 1 }; h && h.hasAttribute("data-cke-tableselection-ignored") || (d(a, g, k, h) && A(e, !0), !m.active && "mousedown" === a.name && CKEDITOR.tools.getMouseButton(a) === CKEDITOR.MOUSE_BUTTON_LEFT &&
                    h && (m = { active: !0 }, CKEDITOR.document.on("mouseup", w, null, { editor: e })), (f || h) && K(e, f || h, a), "mouseup" === a.name && (CKEDITOR.tools.getMouseButton(a) === CKEDITOR.MOUSE_BUTTON_LEFT && (c(a.data.getTarget()) || b(k, h)) && E(e), m = { active: !1 }, CKEDITOR.document.removeListener("mouseup", w)))
            }
        } function M(a) { var b = a.data.getTarget().getAscendant("table", !0); m.active = !1; b && b.hasAttribute("data-cke-tableselection-ignored") || (a = a.data.getTarget().getAscendant({ td: 1, th: 1 }, !0), !a || a.hasClass("cke_table-faked-selection")) } function N(a,
            b) {
                function c(a) { a.cancel() } var d = a.getSelection(), e = d.createBookmarks(), g = a.document, k = a.createRange(), h = g.getDocumentElement().$, f = CKEDITOR.env.ie && 9 > CKEDITOR.env.version, l = a.blockless || CKEDITOR.env.ie ? "span" : "div", p, x, n, m; g.getById("cke_table_copybin") || (p = g.createElement(l), x = g.createElement(l), x.setAttributes({ id: "cke_table_copybin", "data-cke-temp": "1" }), p.setStyles({ position: "absolute", width: "1px", height: "1px", overflow: "hidden" }), p.setStyle("ltr" == a.config.contentsLangDirection ? "left" : "right",
                    "-5000px"), p.setHtml(a.getSelectedHtml(!0)), a.fire("lockSnapshot"), x.append(p), a.editable().append(x), m = a.on("selectionChange", c, null, null, 0), f && (n = h.scrollTop), k.selectNodeContents(p), k.select(), f && (h.scrollTop = n), setTimeout(function () { x.remove(); d.selectBookmarks(e); m.removeListener(); a.fire("unlockSnapshot"); b && (a.extractSelectedHtml(), a.fire("saveSnapshot")) }, 100))
        } function F(a) {
            var b = a.editor || a.sender.editor, c = b.getSelection(); c.isInTable() && (c.getRanges()[0]._getTableElement({ table: 1 }).hasAttribute("data-cke-tableselection-ignored") ||
                N(b, "cut" === a.name))
        } function q(a) { this._reset(); a && this.setSelectedCells(a) } function B(a, b, c) { a.on("beforeCommandExec", function (d) { -1 !== CKEDITOR.tools.array.indexOf(b, d.data.name) && (d.data.selectedCells = v(a.getSelection())) }); a.on("afterCommandExec", function (d) { -1 !== CKEDITOR.tools.array.indexOf(b, d.data.name) && c(a, d.data) }, null, null, 9) } var m = { active: !1 }, y, v, C, G, H; q.prototype = {}; q.prototype._reset = function () { this.cells = { first: null, last: null, all: [] }; this.rows = { first: null, last: null } }; q.prototype.setSelectedCells =
            function (a) { this._reset(); a = a.slice(0); this._arraySortByDOMOrder(a); this.cells.all = a; this.cells.first = a[0]; this.cells.last = a[a.length - 1]; this.rows.first = a[0].getAscendant("tr"); this.rows.last = this.cells.last.getAscendant("tr") }; q.prototype.getTableMap = function () {
                var a = C(this.cells.first), b; a: { b = this.cells.last; var c = b.getAscendant("table"), d = r(b), c = CKEDITOR.tools.buildTableMap(c), e; for (e = 0; e < c[d].length; e++)if ((new CKEDITOR.dom.element(c[d][e])).equals(b)) { b = e; break a } b = void 0 } return CKEDITOR.tools.buildTableMap(this._getTable(),
                    r(this.rows.first), a, r(this.rows.last), b)
            }; q.prototype._getTable = function () { return this.rows.first.getAscendant("table") }; q.prototype.insertRow = function (a, b, c) { if ("undefined" === typeof a) a = 1; else if (0 >= a) return; for (var d = this.cells.first.$.cellIndex, e = this.cells.last.$.cellIndex, g = c ? [] : this.cells.all, k, h = 0; h < a; h++)k = G(c ? this.cells.all : g, b), k = CKEDITOR.tools.array.filter(k.find("td, th").toArray(), function (a) { return c ? !0 : a.$.cellIndex >= d && a.$.cellIndex <= e }), g = b ? k.concat(g) : g.concat(k); this.setSelectedCells(g) };
        q.prototype.insertColumn = function (a) { function b(a) { a = r(a); return a >= e && a <= g } if ("undefined" === typeof a) a = 1; else if (0 >= a) return; for (var c = this.cells, d = c.all, e = r(c.first), g = r(c.last), c = 0; c < a; c++)d = d.concat(CKEDITOR.tools.array.filter(H(d), b)); this.setSelectedCells(d) }; q.prototype.emptyCells = function (a) { a = a || this.cells.all; for (var b = 0; b < a.length; b++)a[b].setHtml("") }; q.prototype._arraySortByDOMOrder = function (a) { a.sort(function (a, c) { return a.getPosition(c) & CKEDITOR.POSITION_PRECEDING ? -1 : 1 }) }; var I = {
            onPaste: function (a) {
                function b(a) {
                    var b =
                        d.createRange(); b.selectNodeContents(a); b.select()
                } function c(a) { return Math.max.apply(null, CKEDITOR.tools.array.map(a, function (a) { return a.length }, 0)) } var d = a.editor, e = d.getSelection(), g = v(e), k = e.isInTable(!0) && this.isBoundarySelection(e), h = this.findTableInPastedContent(d, a.data.dataValue), f, l; (function (a, b, d, c) {
                    a = a.getRanges(); var e = a.length && a[0]._getTableElement({ table: 1 }); if (!b.length || e && e.hasAttribute("data-cke-tableselection-ignored") || c && !d) return !1; if (b = !c) (b = a[0]) ? (b = b.clone(), b.enlarge(CKEDITOR.ENLARGE_ELEMENT),
                        b = (b = b.getEnclosedNode()) && b.is && b.is(CKEDITOR.dtd.$tableContent)) : b = void 0, b = !b; return b ? !1 : !0
                })(e, g, h, k) && "drop" !== a.data.method && (g = g[0].getAscendant("table"), f = new q(v(e, g)), d.once("afterPaste", function () { var a; if (l) { a = new CKEDITOR.dom.element(l[0][0]); var b = l[l.length - 1]; a = z(a, new CKEDITOR.dom.element(b[b.length - 1])) } else a = f.cells.all; t(d, a) }), h ? (a.stop(), k ? (f.insertRow(1, 1 === k, !0), e.selectElement(f.rows.first)) : (f.emptyCells(), t(d, f.cells.all)), a = f.getTableMap(), l = CKEDITOR.tools.buildTableMap(h),
                    f.insertRow(l.length - a.length), f.insertColumn(c(l) - c(a)), a = f.getTableMap(), this.pasteTable(f, a, l), d.fire("saveSnapshot"), setTimeout(function () { d.fire("afterPaste") }, 0)) : (b(f.cells.first), d.once("afterPaste", function () { d.fire("lockSnapshot"); f.emptyCells(f.cells.all.slice(1)); t(d, f.cells.all); d.fire("unlockSnapshot") })))
            }, isBoundarySelection: function (a) {
                a = a.getRanges()[0]; var b = a.endContainer.getAscendant("tr", !0); if (b && a.collapsed) {
                    if (a.checkBoundaryOfElement(b, CKEDITOR.START)) return 1; if (a.checkBoundaryOfElement(b,
                        CKEDITOR.END)) return 2
                } return 0
            }, findTableInPastedContent: function (a, b) { var c = a.dataProcessor, d = new CKEDITOR.dom.element("body"); c || (c = new CKEDITOR.htmlDataProcessor(a)); d.setHtml(c.toHtml(b), { fixForBody: !1 }); return 1 < d.getChildCount() ? null : d.findOne("table") }, pasteTable: function (a, b, c) {
                var d, e = C(a.cells.first), g = a._getTable(), k = {}, h, f, l, p; for (l = 0; l < c.length; l++)for (h = new CKEDITOR.dom.element(g.$.rows[a.rows.first.$.rowIndex + l]), p = 0; p < c[l].length; p++)if (f = new CKEDITOR.dom.element(c[l][p]), d = b[l] &&
                    b[l][p] ? new CKEDITOR.dom.element(b[l][p]) : null, f && !f.getCustomData("processed")) { if (d && d.getParent()) f.replace(d); else if (0 === p || c[l][p - 1]) (d = 0 !== p ? new CKEDITOR.dom.element(c[l][p - 1]) : null) && h.equals(d.getParent()) ? f.insertAfter(d) : 0 < e ? h.$.cells[e] ? f.insertAfter(new CKEDITOR.dom.element(h.$.cells[e])) : h.append(f) : h.append(f, !0); CKEDITOR.dom.element.setMarker(k, f, "processed", !0) } else f.getCustomData("processed") && d && d.remove(); CKEDITOR.dom.element.clearAllMarkers(k)
            }
        }; CKEDITOR.plugins.tableselection =
        {
            getCellsBetween: z, keyboardIntegration: function (a) {
                function b(a) { var b = a.getEnclosedNode(); b && "function" === typeof b.is && b.is({ td: 1, th: 1 }) ? b.setText("") : a.deleteContents(); CKEDITOR.tools.array.forEach(a._find("td"), function (a) { a.appendBogus() }) } var c = a.editable(); c.attachListener(c, "keydown", function (a) {
                    function c(b, e) {
                        if (!e.length) return null; var l = a.createRange(), g = CKEDITOR.dom.range.mergeRanges(e); CKEDITOR.tools.array.forEach(g, function (a) { a.enlarge(CKEDITOR.ENLARGE_ELEMENT) }); var m = g[0].getBoundaryNodes(),
                            n = m.startNode, m = m.endNode; if (n && n.is && n.is(k)) { for (var q = n.getAscendant("table", !0), u = n.getPreviousSourceNode(!1, CKEDITOR.NODE_ELEMENT, q), r = !1, t = function (a) { return !n.contains(a) && a.is && a.is("td", "th") }; u && !t(u);)u = u.getPreviousSourceNode(!1, CKEDITOR.NODE_ELEMENT, q); !u && m && m.is && !m.is("table") && m.getNext() && (u = m.getNext().findOne("td, th"), r = !0); if (u) l["moveToElementEdit" + (r ? "Start" : "End")](u); else l.setStartBefore(n.getAscendant("table", !0)), l.collapse(!0); g[0].deleteContents(); return [l] } if (n) return l.moveToElementEditablePosition(n),
                                [l]
                    } var g = { 37: 1, 38: 1, 39: 1, 40: 1, 8: 1, 46: 1, 13: 1 }, k = CKEDITOR.tools.extend({ table: 1 }, CKEDITOR.dtd.$tableContent); delete k.td; delete k.th; return function (h) {
                        var f = h.data.getKey(), l = h.data.getKeystroke(), k, m = 37 === f || 38 == f, n, q, r; if (g[f] && !a.readOnly && (k = a.getSelection()) && k.isInTable() && k.isFake) {
                            n = k.getRanges(); q = n[0]._getTableElement(); r = n[n.length - 1]._getTableElement(); if (13 !== f || a.plugins.enterkey) h.data.preventDefault(), h.cancel(); if (36 < f && 41 > f) n[0].moveToElementEditablePosition(m ? q : r, !m), k.selectRanges([n[0]]);
                            else if (13 !== f || 13 === l || l === CKEDITOR.SHIFT + 13) { for (h = 0; h < n.length; h++)b(n[h]); (h = c(q, n)) ? n = h : n[0].moveToElementEditablePosition(q); k.selectRanges(n); 13 === f && a.plugins.enterkey ? (a.fire("lockSnapshot"), 13 === l ? a.execCommand("enter") : a.execCommand("shiftEnter"), a.fire("unlockSnapshot"), a.fire("saveSnapshot")) : 13 !== f && a.fire("saveSnapshot") }
                        }
                    }
                }(a), null, null, -1); c.attachListener(c, "keypress", function (c) {
                    var e = a.getSelection(), g = c.data.$.charCode || 13 === c.data.getKey(), k; if (!a.readOnly && e && e.isInTable() &&
                        e.isFake && g && !(c.data.getKeystroke() & CKEDITOR.CTRL)) { c = e.getRanges(); g = c[0].getEnclosedNode().getAscendant({ td: 1, th: 1 }, !0); for (k = 0; k < c.length; k++)b(c[k]); g && (c[0].moveToElementEditablePosition(g), e.selectRanges([c[0]])) }
                }, null, null, -1); c.attachListener(c, "keyup", function (a) { return function (b) { b = b.data.getKey(); var c = a.getSelection(); 9 === b && c.isInTable() && E(a) } }(a), null, null, -1)
            }
        }; CKEDITOR.plugins.add("tableselection", {
            requires: "clipboard,tabletools", isSupportedEnvironment: function () {
                return !(CKEDITOR.env.ie &&
                    11 > CKEDITOR.env.version)
            }, onLoad: function () { y = CKEDITOR.plugins.tabletools; v = y.getSelectedCells; C = y.getCellColIndex; G = y.insertRow; H = y.insertColumn; CKEDITOR.document.appendStyleSheet(this.path + "styles/tableselection.css") }, init: function (a) {
                this.isSupportedEnvironment() && (a.addContentsCss && a.addContentsCss(this.path + "styles/tableselection.css"), a.on("contentDom", function () {
                    var b = a.editable(), c = b.isInline() ? b : a.document, d = { editor: a }; b.attachListener(c, "mousedown", w, null, d); b.attachListener(c, "mousemove",
                        w, null, d); b.attachListener(c, "mouseup", w, null, d); b.attachListener(b, "dragstart", M); b.attachListener(a, "selectionCheck", L); CKEDITOR.plugins.tableselection.keyboardIntegration(a); CKEDITOR.plugins.clipboard && !CKEDITOR.plugins.clipboard.isCustomCopyCutSupported && (b.attachListener(b, "cut", F), b.attachListener(b, "copy", F))
                }), a.on("paste", I.onPaste, I), B(a, "rowInsertBefore rowInsertAfter columnInsertBefore columnInsertAfter cellInsertBefore cellInsertAfter".split(" "), function (a, c) { t(a, c.selectedCells) }),
                    B(a, ["cellMerge", "cellMergeRight", "cellMergeDown"], function (a, c) { t(a, [c.commandData.cell]) }), B(a, ["cellDelete"], function (a) { A(a, !0) }))
            }
        })
    })(); (function () {
        function n(a, b) { return CKEDITOR.tools.array.reduce(b, function (a, b) { return b(a) }, a) } var g = [CKEDITOR.CTRL + 90, CKEDITOR.CTRL + 89, CKEDITOR.CTRL + CKEDITOR.SHIFT + 90], p = { 8: 1, 46: 1 }; CKEDITOR.plugins.add("undo", {
            init: function (a) {
                function b(a) { d.enabled && !1 !== a.data.command.canUndo && d.save() } function c() { d.enabled = a.readOnly ? !1 : "wysiwyg" == a.mode; d.onChange() } var d = a.undoManager = new e(a), l = d.editingHandler = new k(d), f = a.addCommand("undo", {
                    exec: function () { d.undo() && (a.selectionChange(), this.fire("afterUndo")) },
                    startDisabled: !0, canUndo: !1
                }), h = a.addCommand("redo", { exec: function () { d.redo() && (a.selectionChange(), this.fire("afterRedo")) }, startDisabled: !0, canUndo: !1 }); a.setKeystroke([[g[0], "undo"], [g[1], "redo"], [g[2], "redo"]]); d.onChange = function () { f.setState(d.undoable() ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED); h.setState(d.redoable() ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED) }; a.on("beforeCommandExec", b); a.on("afterCommandExec", b); a.on("saveSnapshot", function (a) { d.save(a.data && a.data.contentOnly) });
                a.on("contentDom", l.attachListeners, l); a.on("instanceReady", function () { a.fire("saveSnapshot") }); a.on("beforeModeUnload", function () { "wysiwyg" == a.mode && d.save(!0) }); a.on("mode", c); a.on("readOnly", c); a.ui.addButton && (a.ui.addButton("Undo", { label: a.lang.undo.undo, command: "undo", toolbar: "undo,10" }), a.ui.addButton("Redo", { label: a.lang.undo.redo, command: "redo", toolbar: "undo,20" })); a.resetUndo = function () { d.reset(); a.fire("saveSnapshot") }; a.on("updateSnapshot", function () { d.currentImage && d.update() }); a.on("lockSnapshot",
                    function (a) { a = a.data; d.lock(a && a.dontUpdate, a && a.forceUpdate) }); a.on("unlockSnapshot", d.unlock, d)
            }
        }); CKEDITOR.plugins.undo = {}; var e = CKEDITOR.plugins.undo.UndoManager = function (a) { this.strokesRecorded = [0, 0]; this.locked = null; this.previousKeyGroup = -1; this.limit = a.config.undoStackSize || 20; this.strokesLimit = 25; this._filterRules = []; this.editor = a; this.reset(); CKEDITOR.env.ie && this.addFilterRule(function (a) { return a.replace(/\s+data-cke-expando=".*?"/g, "") }) }; e.prototype = {
            type: function (a, b) {
                var c = e.getKeyGroup(a),
                d = this.strokesRecorded[c] + 1; b = b || d >= this.strokesLimit; this.typing || (this.hasUndo = this.typing = !0, this.hasRedo = !1, this.onChange()); b ? (d = 0, this.editor.fire("saveSnapshot")) : this.editor.fire("change"); this.strokesRecorded[c] = d; this.previousKeyGroup = c
            }, keyGroupChanged: function (a) { return e.getKeyGroup(a) != this.previousKeyGroup }, reset: function () { this.snapshots = []; this.index = -1; this.currentImage = null; this.hasRedo = this.hasUndo = !1; this.locked = null; this.resetType() }, resetType: function () {
                this.strokesRecorded =
                [0, 0]; this.typing = !1; this.previousKeyGroup = -1
            }, refreshState: function () { this.hasUndo = !!this.getNextImage(!0); this.hasRedo = !!this.getNextImage(!1); this.resetType(); this.onChange() }, save: function (a, b, c) {
                var d = this.editor; if (this.locked || "ready" != d.status || "wysiwyg" != d.mode) return !1; var e = d.editable(); if (!e || "ready" != e.status) return !1; e = this.snapshots; b || (b = new f(d)); if (!1 === b.contents) return !1; if (this.currentImage) if (b.equalsContent(this.currentImage)) { if (a || b.equalsSelection(this.currentImage)) return !1 } else !1 !==
                    c && d.fire("change"); e.splice(this.index + 1, e.length - this.index - 1); e.length == this.limit && e.shift(); this.index = e.push(b) - 1; this.currentImage = b; !1 !== c && this.refreshState(); return !0
            }, restoreImage: function (a) {
                var b = this.editor, c; a.bookmarks && (b.focus(), c = b.getSelection()); this.locked = { level: 999 }; this.editor.loadSnapshot(a.contents); a.bookmarks ? c.selectBookmarks(a.bookmarks) : CKEDITOR.env.ie && (c = this.editor.document.getBody().$.createTextRange(), c.collapse(!0), c.select()); this.locked = null; this.index = a.index;
                this.currentImage = this.snapshots[this.index]; this.update(); this.refreshState(); b.fire("change")
            }, getNextImage: function (a) { var b = this.snapshots, c = this.currentImage, d; if (c) if (a) for (d = this.index - 1; 0 <= d; d--) { if (a = b[d], !c.equalsContent(a)) return a.index = d, a } else for (d = this.index + 1; d < b.length; d++)if (a = b[d], !c.equalsContent(a)) return a.index = d, a; return null }, redoable: function () { return this.enabled && this.hasRedo }, undoable: function () { return this.enabled && this.hasUndo }, undo: function () {
                if (this.undoable()) {
                    this.save(!0);
                    var a = this.getNextImage(!0); if (a) return this.restoreImage(a), !0
                } return !1
            }, redo: function () { if (this.redoable() && (this.save(!0), this.redoable())) { var a = this.getNextImage(!1); if (a) return this.restoreImage(a), !0 } return !1 }, update: function (a) { if (!this.locked) { a || (a = new f(this.editor)); for (var b = this.index, c = this.snapshots; 0 < b && this.currentImage.equalsContent(c[b - 1]);)--b; c.splice(b, this.index - b + 1, a); this.index = b; this.currentImage = a } }, updateSelection: function (a) {
                if (!this.snapshots.length) return !1; var b = this.snapshots,
                    c = b[b.length - 1]; return c.equalsContent(a) && !c.equalsSelection(a) ? (this.currentImage = b[b.length - 1] = a, !0) : !1
            }, lock: function (a, b) { if (this.locked) this.locked.level++; else if (a) this.locked = { level: 1 }; else { var c = null; if (b) c = !0; else { var d = new f(this.editor, !0); this.currentImage && this.currentImage.equalsContent(d) && (c = d) } this.locked = { update: c, level: 1 } } }, unlock: function () {
                if (this.locked && !--this.locked.level) {
                    var a = this.locked.update; this.locked = null; if (!0 === a) this.update(); else if (a) {
                        var b = new f(this.editor,
                            !0); a.equalsContent(b) || this.update()
                    }
                }
            }, addFilterRule: function (a) { this._filterRules.push(a) }
        }; e.navigationKeyCodes = { 37: 1, 38: 1, 39: 1, 40: 1, 36: 1, 35: 1, 33: 1, 34: 1 }; e.keyGroups = { PRINTABLE: 0, FUNCTIONAL: 1 }; e.isNavigationKey = function (a) { return !!e.navigationKeyCodes[a] }; e.getKeyGroup = function (a) { var b = e.keyGroups; return p[a] ? b.FUNCTIONAL : b.PRINTABLE }; e.getOppositeKeyGroup = function (a) { var b = e.keyGroups; return a == b.FUNCTIONAL ? b.PRINTABLE : b.FUNCTIONAL }; e.ieFunctionalKeysBug = function (a) {
            return CKEDITOR.env.ie &&
                e.getKeyGroup(a) == e.keyGroups.FUNCTIONAL
        }; var f = CKEDITOR.plugins.undo.Image = function (a, b) { this.editor = a; a.fire("beforeUndoImage"); var c = a.getSnapshot(); c && (this.contents = n(c, a.undoManager._filterRules)); b || (this.bookmarks = (c = c && a.getSelection()) && c.createBookmarks2(!0)); a.fire("afterUndoImage") }, h = /\b(?:href|src|name)="[^"]*?"/gi; f.prototype = {
            equalsContent: function (a) {
                var b = this.contents; a = a.contents; CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) && (b = b.replace(h, ""), a = a.replace(h,
                    "")); return b != a ? !1 : !0
            }, equalsSelection: function (a) { var b = this.bookmarks; a = a.bookmarks; if (b || a) { if (!b || !a || b.length != a.length) return !1; for (var c = 0; c < b.length; c++) { var d = b[c], e = a[c]; if (d.startOffset != e.startOffset || d.endOffset != e.endOffset || !CKEDITOR.tools.arrayCompare(d.start, e.start) || !CKEDITOR.tools.arrayCompare(d.end, e.end)) return !1 } } return !0 }
        }; var k = CKEDITOR.plugins.undo.NativeEditingHandler = function (a) {
            this.undoManager = a; this.ignoreInputEvent = !1; this.keyEventsStack = new m; this.lastKeydownImage =
                null
        }; k.prototype = {
            onKeydown: function (a) { var b = a.data.getKey(); if (229 !== b) if (-1 < CKEDITOR.tools.indexOf(g, a.data.getKeystroke())) a.data.preventDefault(); else if (this.keyEventsStack.cleanUp(a), a = this.undoManager, this.keyEventsStack.getLast(b) || this.keyEventsStack.push(b), this.lastKeydownImage = new f(a.editor), e.isNavigationKey(b) || this.undoManager.keyGroupChanged(b)) if (a.strokesRecorded[0] || a.strokesRecorded[1]) a.save(!1, this.lastKeydownImage, !1), a.resetType() }, onInput: function () {
                if (this.ignoreInputEvent) this.ignoreInputEvent =
                    !1; else { var a = this.keyEventsStack.getLast(); a || (a = this.keyEventsStack.push(0)); this.keyEventsStack.increment(a.keyCode); this.keyEventsStack.getTotalInputs() >= this.undoManager.strokesLimit && (this.undoManager.type(a.keyCode, !0), this.keyEventsStack.resetInputs()) }
            }, onKeyup: function (a) {
                var b = this.undoManager; a = a.data.getKey(); var c = this.keyEventsStack.getTotalInputs(); this.keyEventsStack.remove(a); if (!(e.ieFunctionalKeysBug(a) && this.lastKeydownImage && this.lastKeydownImage.equalsContent(new f(b.editor,
                    !0)))) if (0 < c) b.type(a); else if (e.isNavigationKey(a)) this.onNavigationKey(!0)
            }, onNavigationKey: function (a) { var b = this.undoManager; !a && b.save(!0, null, !1) || b.updateSelection(new f(b.editor)); b.resetType() }, ignoreInputEventListener: function () { this.ignoreInputEvent = !0 }, activateInputEventListener: function () { this.ignoreInputEvent = !1 }, attachListeners: function () {
                var a = this.undoManager.editor, b = a.editable(), c = this; b.attachListener(b, "keydown", function (a) { c.onKeydown(a); if (e.ieFunctionalKeysBug(a.data.getKey())) c.onInput() },
                    null, null, 999); b.attachListener(b, CKEDITOR.env.ie ? "keypress" : "input", c.onInput, c, null, 999); b.attachListener(b, "keyup", c.onKeyup, c, null, 999); b.attachListener(b, "paste", c.ignoreInputEventListener, c, null, 999); b.attachListener(b, "drop", c.ignoreInputEventListener, c, null, 999); a.on("afterPaste", c.activateInputEventListener, c, null, 999); b.attachListener(b.isInline() ? b : a.document.getDocumentElement(), "click", function () { c.onNavigationKey() }, null, null, 999); b.attachListener(this.undoManager.editor, "blur", function () { c.keyEventsStack.remove(9) },
                        null, null, 999)
            }
        }; var m = CKEDITOR.plugins.undo.KeyEventsStack = function () { this.stack = [] }; m.prototype = {
            push: function (a) { a = this.stack.push({ keyCode: a, inputs: 0 }); return this.stack[a - 1] }, getLastIndex: function (a) { if ("number" != typeof a) return this.stack.length - 1; for (var b = this.stack.length; b--;)if (this.stack[b].keyCode == a) return b; return -1 }, getLast: function (a) { a = this.getLastIndex(a); return -1 != a ? this.stack[a] : null }, increment: function (a) { this.getLast(a).inputs++ }, remove: function (a) {
                a = this.getLastIndex(a); -1 !=
                    a && this.stack.splice(a, 1)
            }, resetInputs: function (a) { if ("number" == typeof a) this.getLast(a).inputs = 0; else for (a = this.stack.length; a--;)this.stack[a].inputs = 0 }, getTotalInputs: function () { for (var a = this.stack.length, b = 0; a--;)b += this.stack[a].inputs; return b }, cleanUp: function (a) { a = a.data.$; a.ctrlKey || a.metaKey || this.remove(17); a.shiftKey || this.remove(16); a.altKey || this.remove(18) }
        }
    })(); (function () {
        function m(a, d) { CKEDITOR.tools.extend(this, { editor: a, editable: a.editable(), doc: a.document, win: a.window }, d, !0); this.inline = this.editable.isInline(); this.inline || (this.frame = this.win.getFrame()); this.target = this[this.inline ? "editable" : "doc"] } function n(a, d) { CKEDITOR.tools.extend(this, d, { editor: a }, !0) } function p(a, d) {
            var b = a.editable(); CKEDITOR.tools.extend(this, { editor: a, editable: b, inline: b.isInline(), doc: a.document, win: a.window, container: CKEDITOR.document.getBody(), winTop: CKEDITOR.document.getWindow() },
                d, !0); this.hidden = {}; this.visible = {}; this.inline || (this.frame = this.win.getFrame()); this.queryViewport(); var c = CKEDITOR.tools.bind(this.queryViewport, this), e = CKEDITOR.tools.bind(this.hideVisible, this), g = CKEDITOR.tools.bind(this.removeAll, this); b.attachListener(this.winTop, "resize", c); b.attachListener(this.winTop, "scroll", c); b.attachListener(this.winTop, "resize", e); b.attachListener(this.win, "scroll", e); b.attachListener(this.inline ? b : this.frame, "mouseout", function (a) {
                    var b = a.data.$.clientX; a = a.data.$.clientY;
                    this.queryViewport(); (b <= this.rect.left || b >= this.rect.right || a <= this.rect.top || a >= this.rect.bottom) && this.hideVisible(); (0 >= b || b >= this.winTopPane.width || 0 >= a || a >= this.winTopPane.height) && this.hideVisible()
                }, this); b.attachListener(a, "resize", c); b.attachListener(a, "mode", g); a.on("destroy", g); this.lineTpl = (new CKEDITOR.template('\x3cdiv data-cke-lineutils-line\x3d"1" class\x3d"cke_reset_all" style\x3d"{lineStyle}"\x3e\x3cspan style\x3d"{tipLeftStyle}"\x3e\x26nbsp;\x3c/span\x3e\x3cspan style\x3d"{tipRightStyle}"\x3e\x26nbsp;\x3c/span\x3e\x3c/div\x3e')).output({
                    lineStyle: CKEDITOR.tools.writeCssText(CKEDITOR.tools.extend({},
                        t, this.lineStyle, !0)), tipLeftStyle: CKEDITOR.tools.writeCssText(CKEDITOR.tools.extend({}, q, { left: "0px", "border-left-color": "red", "border-width": "6px 0 6px 6px" }, this.tipCss, this.tipLeftStyle, !0)), tipRightStyle: CKEDITOR.tools.writeCssText(CKEDITOR.tools.extend({}, q, { right: "0px", "border-right-color": "red", "border-width": "6px 6px 6px 0" }, this.tipCss, this.tipRightStyle, !0))
                })
        } function l(a) {
            var d; if (d = a && a.type == CKEDITOR.NODE_ELEMENT) d = !(r[a.getComputedStyle("float")] || r[a.getAttribute("align")]); return d &&
                !u[a.getComputedStyle("position")]
        } CKEDITOR.plugins.add("lineutils"); CKEDITOR.LINEUTILS_BEFORE = 1; CKEDITOR.LINEUTILS_AFTER = 2; CKEDITOR.LINEUTILS_INSIDE = 4; m.prototype = {
            start: function (a) {
                var d = this, b = this.editor, c = this.doc, e, g, f, h, k = CKEDITOR.tools.eventsBuffer(50, function () { b.readOnly || "wysiwyg" != b.mode || (d.relations = {}, (g = c.$.elementFromPoint(f, h)) && g.nodeType && (e = new CKEDITOR.dom.element(g), d.traverseSearch(e), isNaN(f + h) || d.pixelSearch(e, f, h), a && a(d.relations, f, h))) }); this.listener = this.editable.attachListener(this.target,
                    "mousemove", function (a) { f = a.data.$.clientX; h = a.data.$.clientY; k.input() }); this.editable.attachListener(this.inline ? this.editable : this.frame, "mouseout", function () { k.reset() })
            }, stop: function () { this.listener && this.listener.removeListener() }, getRange: function () {
                var a = {}; a[CKEDITOR.LINEUTILS_BEFORE] = CKEDITOR.POSITION_BEFORE_START; a[CKEDITOR.LINEUTILS_AFTER] = CKEDITOR.POSITION_AFTER_END; a[CKEDITOR.LINEUTILS_INSIDE] = CKEDITOR.POSITION_AFTER_START; return function (d) {
                    var b = this.editor.createRange(); b.moveToPosition(this.relations[d.uid].element,
                        a[d.type]); return b
                }
            }(), store: function () { function a(a, b, c) { var e = a.getUniqueId(); e in c ? c[e].type |= b : c[e] = { element: a, type: b } } return function (d, b) { var c; b & CKEDITOR.LINEUTILS_AFTER && l(c = d.getNext()) && c.isVisible() && (a(c, CKEDITOR.LINEUTILS_BEFORE, this.relations), b ^= CKEDITOR.LINEUTILS_AFTER); b & CKEDITOR.LINEUTILS_INSIDE && l(c = d.getFirst()) && c.isVisible() && (a(c, CKEDITOR.LINEUTILS_BEFORE, this.relations), b ^= CKEDITOR.LINEUTILS_INSIDE); a(d, b, this.relations) } }(), traverseSearch: function (a) {
                var d, b, c; do if (c = a.$["data-cke-expando"],
                    !(c && c in this.relations)) { if (a.equals(this.editable)) break; if (l(a)) for (d in this.lookups) (b = this.lookups[d](a)) && this.store(a, b) } while ((!a || a.type != CKEDITOR.NODE_ELEMENT || "true" != a.getAttribute("contenteditable")) && (a = a.getParent()))
            }, pixelSearch: function () {
                function a(a, c, e, g, f) { for (var h = 0, k; f(e);) { e += g; if (25 == ++h) break; if (k = this.doc.$.elementFromPoint(c, e)) if (k == a) h = 0; else if (d(a, k) && (h = 0, l(k = new CKEDITOR.dom.element(k)))) return k } } var d = CKEDITOR.env.ie || CKEDITOR.env.webkit ? function (a, c) { return a.contains(c) } :
                    function (a, c) { return !!(a.compareDocumentPosition(c) & 16) }; return function (b, c, d) { var g = this.win.getViewPaneSize().height, f = a.call(this, b.$, c, d, -1, function (a) { return 0 < a }); c = a.call(this, b.$, c, d, 1, function (a) { return a < g }); if (f) for (this.traverseSearch(f); !f.getParent().equals(b);)f = f.getParent(); if (c) for (this.traverseSearch(c); !c.getParent().equals(b);)c = c.getParent(); for (; f || c;) { f && (f = f.getNext(l)); if (!f || f.equals(c)) break; this.traverseSearch(f); c && (c = c.getPrevious(l)); if (!c || c.equals(f)) break; this.traverseSearch(c) } }
            }(),
            greedySearch: function () { this.relations = {}; for (var a = this.editable.getElementsByTag("*"), d = 0, b, c, e; b = a.getItem(d++);)if (!b.equals(this.editable) && b.type == CKEDITOR.NODE_ELEMENT && (b.hasAttribute("contenteditable") || !b.isReadOnly()) && l(b) && b.isVisible()) for (e in this.lookups) (c = this.lookups[e](b)) && this.store(b, c); return this.relations }
        }; n.prototype = {
            locate: function () {
                function a(a, b) {
                    var c = a.element[b === CKEDITOR.LINEUTILS_BEFORE ? "getPrevious" : "getNext"](); return c && l(c) ? (a.siblingRect = c.getClientRect(),
                        b == CKEDITOR.LINEUTILS_BEFORE ? (a.siblingRect.bottom + a.elementRect.top) / 2 : (a.elementRect.bottom + a.siblingRect.top) / 2) : b == CKEDITOR.LINEUTILS_BEFORE ? a.elementRect.top : a.elementRect.bottom
                } return function (d) {
                    var b; this.locations = {}; for (var c in d) b = d[c], b.elementRect = b.element.getClientRect(), b.type & CKEDITOR.LINEUTILS_BEFORE && this.store(c, CKEDITOR.LINEUTILS_BEFORE, a(b, CKEDITOR.LINEUTILS_BEFORE)), b.type & CKEDITOR.LINEUTILS_AFTER && this.store(c, CKEDITOR.LINEUTILS_AFTER, a(b, CKEDITOR.LINEUTILS_AFTER)), b.type &
                        CKEDITOR.LINEUTILS_INSIDE && this.store(c, CKEDITOR.LINEUTILS_INSIDE, (b.elementRect.top + b.elementRect.bottom) / 2); return this.locations
                }
            }(), sort: function () { var a, d, b, c; return function (e, g) { a = this.locations; d = []; for (var f in a) for (var h in a[f]) if (b = Math.abs(e - a[f][h]), d.length) { for (c = 0; c < d.length; c++)if (b < d[c].dist) { d.splice(c, 0, { uid: +f, type: h, dist: b }); break } c == d.length && d.push({ uid: +f, type: h, dist: b }) } else d.push({ uid: +f, type: h, dist: b }); return "undefined" != typeof g ? d.slice(0, g) : d } }(), store: function (a,
                d, b) { this.locations[a] || (this.locations[a] = {}); this.locations[a][d] = b }
        }; var q = { display: "block", width: "0px", height: "0px", "border-color": "transparent", "border-style": "solid", position: "absolute", top: "-6px" }, t = { height: "0px", "border-top": "1px dashed red", position: "absolute", "z-index": 9999 }; p.prototype = {
            removeAll: function () { for (var a in this.hidden) this.hidden[a].remove(), delete this.hidden[a]; for (a in this.visible) this.visible[a].remove(), delete this.visible[a] }, hideLine: function (a) {
                var d = a.getUniqueId();
                a.hide(); this.hidden[d] = a; delete this.visible[d]
            }, showLine: function (a) { var d = a.getUniqueId(); a.show(); this.visible[d] = a; delete this.hidden[d] }, hideVisible: function () { for (var a in this.visible) this.hideLine(this.visible[a]) }, placeLine: function (a, d) {
                var b, c, e; if (b = this.getStyle(a.uid, a.type)) {
                    for (e in this.visible) if (this.visible[e].getCustomData("hash") !== this.hash) { c = this.visible[e]; break } if (!c) for (e in this.hidden) if (this.hidden[e].getCustomData("hash") !== this.hash) {
                        this.showLine(c = this.hidden[e]);
                        break
                    } c || this.showLine(c = this.addLine()); c.setCustomData("hash", this.hash); this.visible[c.getUniqueId()] = c; c.setStyles(b); d && d(c)
                }
            }, getStyle: function (a, d) {
                var b = this.relations[a], c = this.locations[a][d], e = {}; e.width = b.siblingRect ? Math.max(b.siblingRect.width, b.elementRect.width) : b.elementRect.width; e.top = this.inline ? c + this.winTopScroll.y - this.rect.relativeY : this.rect.top + this.winTopScroll.y + c; if (e.top - this.winTopScroll.y < this.rect.top || e.top - this.winTopScroll.y > this.rect.bottom) return !1; this.inline ?
                    e.left = b.elementRect.left - this.rect.relativeX : (0 < b.elementRect.left ? e.left = this.rect.left + b.elementRect.left : (e.width += b.elementRect.left, e.left = this.rect.left), 0 < (b = e.left + e.width - (this.rect.left + this.winPane.width)) && (e.width -= b)); e.left += this.winTopScroll.x; for (var g in e) e[g] = CKEDITOR.tools.cssLength(e[g]); return e
            }, addLine: function () { var a = CKEDITOR.dom.element.createFromHtml(this.lineTpl); a.appendTo(this.container); return a }, prepare: function (a, d) { this.relations = a; this.locations = d; this.hash = Math.random() },
            cleanup: function () { var a, d; for (d in this.visible) a = this.visible[d], a.getCustomData("hash") !== this.hash && this.hideLine(a) }, queryViewport: function () { this.winPane = this.win.getViewPaneSize(); this.winTopScroll = this.winTop.getScrollPosition(); this.winTopPane = this.winTop.getViewPaneSize(); this.rect = this.getClientRect(this.inline ? this.editable : this.frame) }, getClientRect: function (a) {
                a = a.getClientRect(); var d = this.container.getDocumentPosition(), b = this.container.getComputedStyle("position"); a.relativeX = a.relativeY =
                    0; "static" != b && (a.relativeY = d.y, a.relativeX = d.x, a.top -= a.relativeY, a.bottom -= a.relativeY, a.left -= a.relativeX, a.right -= a.relativeX); return a
            }
        }; var r = { left: 1, right: 1, center: 1 }, u = { absolute: 1, fixed: 1 }; CKEDITOR.plugins.lineutils = { finder: m, locator: n, liner: p }
    })(); (function () {
        function e(a) { return a.getName && !a.hasAttribute("data-cke-temp") } CKEDITOR.plugins.add("widgetselection", {
            init: function (a) {
                if (CKEDITOR.env.webkit) {
                    var b = CKEDITOR.plugins.widgetselection; a.on("contentDom", function (a) {
                        a = a.editor; var c = a.editable(); c.attachListener(c, "keydown", function (a) { a.data.getKeystroke() == CKEDITOR.CTRL + 65 && CKEDITOR.tools.setTimeout(function () { b.addFillers(c) || b.removeFillers(c) }, 0) }, null, null, -1); a.on("selectionCheck", function (a) { b.removeFillers(a.editor.editable()) });
                        a.on("paste", function (a) { a.data.dataValue = b.cleanPasteData(a.data.dataValue) }); "selectall" in a.plugins && b.addSelectAllIntegration(a)
                    })
                }
            }
        }); CKEDITOR.plugins.widgetselection = {
            startFiller: null, endFiller: null, fillerAttribute: "data-cke-filler-webkit", fillerContent: "\x26nbsp;", fillerTagName: "div", addFillers: function (a) {
                var b = a.editor; if (!this.isWholeContentSelected(a) && 0 < a.getChildCount()) {
                    var d = a.getFirst(e), c = a.getLast(e); d && d.type == CKEDITOR.NODE_ELEMENT && !d.isEditable() && (this.startFiller = this.createFiller(),
                        a.append(this.startFiller, 1)); c && c.type == CKEDITOR.NODE_ELEMENT && !c.isEditable() && (this.endFiller = this.createFiller(!0), a.append(this.endFiller, 0)); if (this.hasFiller(a)) return b = b.createRange(), b.selectNodeContents(a), b.select(), !0
                } return !1
            }, removeFillers: function (a) {
                if (this.hasFiller(a) && !this.isWholeContentSelected(a)) {
                    var b = a.findOne(this.fillerTagName + "[" + this.fillerAttribute + "\x3dstart]"), d = a.findOne(this.fillerTagName + "[" + this.fillerAttribute + "\x3dend]"); this.startFiller && b && this.startFiller.equals(b) ?
                        this.removeFiller(this.startFiller, a) : this.startFiller = b; this.endFiller && d && this.endFiller.equals(d) ? this.removeFiller(this.endFiller, a) : this.endFiller = d
                }
            }, cleanPasteData: function (a) { a && a.length && (a = a.replace(this.createFillerRegex(), "").replace(this.createFillerRegex(!0), "")); return a }, isWholeContentSelected: function (a) {
                var b = a.editor.getSelection().getRanges()[0]; return !b || b && b.collapsed ? !1 : (b = b.clone(), b.enlarge(CKEDITOR.ENLARGE_ELEMENT), !!(b && a && b.startContainer && b.endContainer && 0 === b.startOffset &&
                    b.endOffset === a.getChildCount() && b.startContainer.equals(a) && b.endContainer.equals(a)))
            }, hasFiller: function (a) { return 0 < a.find(this.fillerTagName + "[" + this.fillerAttribute + "]").count() }, createFiller: function (a) {
                var b = new CKEDITOR.dom.element(this.fillerTagName); b.setHtml(this.fillerContent); b.setAttribute(this.fillerAttribute, a ? "end" : "start"); b.setAttribute("data-cke-temp", 1); b.setStyles({
                    display: "block", width: 0, height: 0, padding: 0, border: 0, margin: 0, position: "absolute", top: 0, left: "-9999px", opacity: 0,
                    overflow: "hidden"
                }); return b
            }, removeFiller: function (a, b) {
                if (a) {
                    var d = b.editor, c = b.editor.getSelection().getRanges()[0].startPath(), f = d.createRange(), g, e; c.contains(a) && (g = a.getHtml(), e = !0); c = "start" == a.getAttribute(this.fillerAttribute); a.remove(); g && 0 < g.length && g != this.fillerContent ? (b.insertHtmlIntoRange(g, d.getSelection().getRanges()[0]), f.setStartAt(b.getChild(b.getChildCount() - 1), CKEDITOR.POSITION_BEFORE_END), d.getSelection().selectRanges([f])) : e && (c ? f.setStartAt(b.getFirst().getNext(), CKEDITOR.POSITION_AFTER_START) :
                        f.setEndAt(b.getLast().getPrevious(), CKEDITOR.POSITION_BEFORE_END), b.editor.getSelection().selectRanges([f]))
                }
            }, createFillerRegex: function (a) { var b = this.createFiller(a).getOuterHtml().replace(/style="[^"]*"/gi, 'style\x3d"[^"]*"').replace(/>[^<]*</gi, "\x3e[^\x3c]*\x3c"); return new RegExp((a ? "" : "^") + b + (a ? "$" : "")) }, addSelectAllIntegration: function (a) { var b = this; a.editable().attachListener(a, "beforeCommandExec", function (d) { var c = a.editable(); "selectAll" == d.data.name && c && b.addFillers(c) }, null, null, 9999) }
        }
    })(); (function () {
        function q(a) { this.editor = a; this.registered = {}; this.instances = {}; this.selected = []; this.widgetHoldingFocusedEditable = this.focused = null; this._ = { nextId: 0, upcasts: [], upcastCallbacks: [], filters: {} }; R(this); S(this); this.on("checkWidgets", T); this.editor.on("contentDomInvalidated", this.checkWidgets, this); U(this); V(this); W(this); X(this); Y(this) } function h(a, b, c, d, e) {
            var f = a.editor; CKEDITOR.tools.extend(this, d, {
                editor: f, id: b, inline: "span" == c.getParent().getName(), element: c, data: CKEDITOR.tools.extend({},
                    "function" == typeof d.defaults ? d.defaults() : d.defaults), dataReady: !1, inited: !1, ready: !1, edit: h.prototype.edit, focusedEditable: null, definition: d, repository: a, draggable: !1 !== d.draggable, _: { downcastFn: d.downcast && "string" == typeof d.downcast ? d.downcasts[d.downcast] : d.downcast }
            }, !0); a.fire("instanceCreated", this); Z(this, d); this.init && this.init(); this.inited = !0; (a = this.element.data("cke-widget-data")) && this.setData(JSON.parse(decodeURIComponent(a))); e && this.setData(e); this.data.classes || this.setData("classes",
                this.getClasses()); this.dataReady = !0; v(this); this.fire("data", this.data); this.isInited() && f.editable().contains(this.wrapper) && (this.ready = !0, this.fire("ready"))
        } function t(a, b, c) { CKEDITOR.dom.element.call(this, b.$); this.editor = a; this._ = {}; b = this.filter = c.filter; CKEDITOR.dtd[this.getName()].p ? (this.enterMode = b ? b.getAllowedEnterMode(a.enterMode) : a.enterMode, this.shiftEnterMode = b ? b.getAllowedEnterMode(a.shiftEnterMode, !0) : a.shiftEnterMode) : this.enterMode = this.shiftEnterMode = CKEDITOR.ENTER_BR } function aa(a,
            b) {
                a.addCommand(b.name, {
                    exec: function (a, d) {
                        function e() { a.widgets.finalizeCreation(k) } var f = a.widgets.focused; if (f && f.name == b.name) f.edit(); else if (b.insert) b.insert({ editor: a, commandData: d }); else if (b.template) {
                            var f = "function" == typeof b.defaults ? b.defaults() : b.defaults, f = CKEDITOR.tools.object.merge(f || {}, d && d.startupData || {}), f = CKEDITOR.dom.element.createFromHtml(b.template.output(f), a.document), g, l = a.widgets.wrapElement(f, b.name), k = new CKEDITOR.dom.documentFragment(l.getDocument()); k.append(l);
                            (g = a.widgets.initOn(f, b, d && d.startupData)) ? (f = g.once("edit", function (b) { if (b.data.dialog) g.once("dialog", function (b) { b = b.data; var d, f; d = b.once("ok", e, null, null, 20); f = b.once("cancel", function (b) { b.data && !1 === b.data.hide || a.widgets.destroy(g, !0) }); b.once("hide", function () { d.removeListener(); f.removeListener() }) }); else e() }, null, null, 999), g.edit(), f.removeListener()) : e()
                        }
                    }, allowedContent: b.allowedContent, requiredContent: b.requiredContent, contentForms: b.contentForms, contentTransformations: b.contentTransformations
                })
        }
        function ba(a, b) { function c(a, e) { var c = b.upcast.split(","), d, f; for (f = 0; f < c.length; f++)if (d = c[f], d === a.name) return b.upcasts[d].call(this, a, e); return !1 } function d(b, e, c) { var d = CKEDITOR.tools.getIndex(a._.upcasts, function (a) { return a[2] > c }); 0 > d && (d = a._.upcasts.length); a._.upcasts.splice(d, 0, [CKEDITOR.tools.bind(b, e), e.name, c]) } var e = b.upcast, f = b.upcastPriority || 10; e && ("string" == typeof e ? d(c, b, f) : d(e, b, f)) } function x(a, b) {
            a.focused = null; if (b.isInited()) {
                var c = b.editor.checkDirty(); a.fire("widgetBlurred",
                    { widget: b }); b.setFocused(!1); !c && b.editor.resetDirty()
            }
        } function T(a) {
            a = a.data; if ("wysiwyg" == this.editor.mode) {
                var b = this.editor.editable(), c = this.instances, d, e, f, g; if (b) {
                    for (d in c) c[d].isReady() && !b.contains(c[d].wrapper) && this.destroy(c[d], !0); if (a && a.initOnlyNew) c = this.initOnAll(); else {
                        var l = b.find(".cke_widget_wrapper"), c = []; d = 0; for (e = l.count(); d < e; d++) {
                            f = l.getItem(d); if (g = !this.getByElement(f, !0)) { a: { g = ca; for (var k = f; k = k.getParent();)if (g(k)) { g = !0; break a } g = !1 } g = !g } g && b.contains(f) && (f.addClass("cke_widget_new"),
                                c.push(this.initOn(f.getFirst(h.isDomWidgetElement))))
                        }
                    } a && a.focusInited && 1 == c.length && c[0].focus()
                }
            }
        } function y(a) {
            if ("undefined" != typeof a.attributes && a.attributes["data-widget"]) {
                var b = z(a), c = A(a), d = !1; b && b.value && b.value.match(/^\s/g) && (b.parent.attributes["data-cke-white-space-first"] = 1, b.value = b.value.replace(/^\s/g, "\x26nbsp;"), d = !0); c && c.value && c.value.match(/\s$/g) && (c.parent.attributes["data-cke-white-space-last"] = 1, c.value = c.value.replace(/\s$/g, "\x26nbsp;"), d = !0); d && (a.attributes["data-cke-widget-white-space"] =
                    1)
            }
        } function z(a) { return a.find(function (a) { return 3 === a.type }, !0).shift() } function A(a) { return a.find(function (a) { return 3 === a.type }, !0).pop() } function B(a, b, c) { if (!c.allowedContent && !c.disallowedContent) return null; var d = this._.filters[a]; d || (this._.filters[a] = d = {}); a = d[b]; a || (a = c.allowedContent ? new CKEDITOR.filter(c.allowedContent) : this.editor.filter.clone(), d[b] = a, c.disallowedContent && a.disallow(c.disallowedContent)); return a } function da(a) {
            var b = [], c = a._.upcasts, d = a._.upcastCallbacks; return {
                toBeWrapped: b,
                iterator: function (a) {
                    var f, g, l, k, n; if ("data-cke-widget-wrapper" in a.attributes) return (a = a.getFirst(h.isParserWidgetElement)) && b.push([a]), !1; if ("data-widget" in a.attributes) return b.push([a]), !1; if (n = c.length) {
                        if (a.attributes["data-cke-widget-upcasted"]) return !1; k = 0; for (f = d.length; k < f; ++k)if (!1 === d[k](a)) return; for (k = 0; k < n; ++k)if (f = c[k], l = {}, g = f[0](a, l)) return g instanceof CKEDITOR.htmlParser.element && (a = g), a.attributes["data-cke-widget-data"] = encodeURIComponent(JSON.stringify(l)), a.attributes["data-cke-widget-upcasted"] =
                            1, b.push([a, f[1]]), !1
                    }
                }
            }
        } function C(a, b) { return { tabindex: -1, contenteditable: "false", "data-cke-widget-wrapper": 1, "data-cke-filter": "off", "class": "cke_widget_wrapper cke_widget_new cke_widget_" + (a ? "inline" : "block") + (b ? " cke_widget_" + b : "") } } function D(a, b, c) { if (a.type == CKEDITOR.NODE_ELEMENT) { var d = CKEDITOR.dtd[a.name]; if (d && !d[c.name]) { var d = a.split(b), e = a.parent; b = d.getIndex(); a.children.length || (--b, a.remove()); d.children.length || d.remove(); return D(e, b, c) } } a.add(c, b) } function E(a, b) {
            return "boolean" ==
                typeof a.inline ? a.inline : !!CKEDITOR.dtd.$inline[b]
        } function ca(a) { return a.hasAttribute("data-cke-temp") } function p(a, b, c, d) {
            var e = a.editor; e.fire("lockSnapshot"); c ? (d = c.data("cke-widget-editable"), d = b.editables[d], a.widgetHoldingFocusedEditable = b, b.focusedEditable = d, c.addClass("cke_widget_editable_focused"), d.filter && e.setActiveFilter(d.filter), e.setActiveEnterMode(d.enterMode, d.shiftEnterMode)) : (d || b.focusedEditable.removeClass("cke_widget_editable_focused"), b.focusedEditable = null, a.widgetHoldingFocusedEditable =
                null, e.setActiveFilter(null), e.setActiveEnterMode(null, null)); e.fire("unlockSnapshot")
        } function ea(a) { a.contextMenu && a.contextMenu.addListener(function (b) { if (b = a.widgets.getByElement(b, !0)) return b.fire("contextMenu", {}) }) } function fa(a, b) { return CKEDITOR.tools.trim(b) } function X(a) {
            var b = a.editor, c = CKEDITOR.plugins.lineutils; b.on("dragstart", function (c) { var e = c.data.target; h.isDomDragHandler(e) && (e = a.getByElement(e), c.data.dataTransfer.setData("cke/widget-id", e.id), b.focus(), e.focus()) }); b.on("drop",
                function (c) {
                    function e(a, b) { return a && b ? a.wrapper.equals(b.wrapper) || a.wrapper.contains(b.wrapper) : !1 } var f = c.data.dataTransfer, g = f.getData("cke/widget-id"), l = f.getTransferType(b), f = b.createRange(), k = function (a) { a = a.getBoundaryNodes().startNode; a.type !== CKEDITOR.NODE_ELEMENT && (a = a.getParent()); return b.widgets.getByElement(a) }(c.data.dropRange); if ("" !== g && l === CKEDITOR.DATA_TRANSFER_CROSS_EDITORS) c.cancel(); else if (l == CKEDITOR.DATA_TRANSFER_INTERNAL) if ("" === g && 0 < b.widgets.selected.length) c.data.dataTransfer.setData("text/html",
                        F(b)); else if (g = a.instances[g]) e(g, k) ? c.cancel() : (f.setStartBefore(g.wrapper), f.setEndAfter(g.wrapper), c.data.dragRange = f, delete CKEDITOR.plugins.clipboard.dragStartContainerChildCount, delete CKEDITOR.plugins.clipboard.dragEndContainerChildCount, c.data.dataTransfer.setData("text/html", g.getClipboardHtml()), b.widgets.destroy(g, !0))
                }); b.on("contentDom", function () {
                    var d = b.editable(); CKEDITOR.tools.extend(a, {
                        finder: new c.finder(b, {
                            lookups: {
                                "default": function (b) {
                                    if (!b.is(CKEDITOR.dtd.$listItem) && b.is(CKEDITOR.dtd.$block) &&
                                        !h.isDomNestedEditable(b) && !a._.draggedWidget.wrapper.contains(b)) { var c = h.getNestedEditable(d, b); if (c) { b = a._.draggedWidget; if (a.getByElement(c) == b) return; c = CKEDITOR.filter.instances[c.data("cke-filter")]; b = b.requiredContent; if (c && b && !c.check(b)) return } return CKEDITOR.LINEUTILS_BEFORE | CKEDITOR.LINEUTILS_AFTER }
                                }
                            }
                        }), locator: new c.locator(b), liner: new c.liner(b, { lineStyle: { cursor: "move !important", "border-top-color": "#666" }, tipLeftStyle: { "border-left-color": "#666" }, tipRightStyle: { "border-right-color": "#666" } })
                    },
                        !0)
                })
        } function V(a) {
            var b = a.editor; b.on("contentDom", function () {
                var c = b.editable(), d = c.isInline() ? c : b.document, e, f; c.attachListener(d, "mousedown", function (c) { var d = c.data.getTarget(); e = d instanceof CKEDITOR.dom.element ? a.getByElement(d) : null; f = 0; e && (e.inline && d.type == CKEDITOR.NODE_ELEMENT && d.hasAttribute("data-cke-widget-drag-handler") ? (f = 1, a.focused != e && b.getSelection().removeAllRanges()) : h.getNestedEditable(e.wrapper, d) ? e = null : (c.data.preventDefault(), CKEDITOR.env.ie || e.focus())) }); c.attachListener(d,
                    "mouseup", function () { f && e && e.wrapper && (f = 0, e.focus()) }); CKEDITOR.env.ie && c.attachListener(d, "mouseup", function () { setTimeout(function () { e && e.wrapper && c.contains(e.wrapper) && (e.focus(), e = null) }) })
            }); b.on("doubleclick", function (b) { var d = a.getByElement(b.data.element); if (d && !h.getNestedEditable(d.wrapper, b.data.element)) return d.fire("doubleclick", { element: b.data.element }) }, null, null, 1)
        } function W(a) {
            a.editor.on("key", function (b) {
                var c = a.focused, d = a.widgetHoldingFocusedEditable, e; c ? e = c.fire("key", { keyCode: b.data.keyCode }) :
                    d && (c = b.data.keyCode, b = d.focusedEditable, c == CKEDITOR.CTRL + 65 ? (c = b.getBogus(), d = d.editor.createRange(), d.selectNodeContents(b), c && d.setEndAt(c, CKEDITOR.POSITION_BEFORE_START), d.select(), e = !1) : 8 == c || 46 == c ? (e = d.editor.getSelection().getRanges(), d = e[0], e = !(1 == e.length && d.collapsed && d.checkBoundaryOfElement(b, CKEDITOR[8 == c ? "START" : "END"]))) : e = void 0); return e
            }, null, null, 1)
        } function Y(a) {
            function b(b) { 1 > a.selected.length || G(c, "cut" === b.name) } var c = a.editor; c.on("contentDom", function () {
                var a = c.editable();
                a.attachListener(a, "copy", b); a.attachListener(a, "cut", b)
            })
        } function U(a) {
            function b() { var a = e.getSelection(); if (a && (a = a.getRanges()[0]) && !a.collapsed) { var b = c(a.startContainer), d = c(a.endContainer); !b && d ? (a.setEndBefore(d.wrapper), a.select()) : b && !d && (a.setStartAfter(b.wrapper), a.select()) } } function c(a) { return a ? a.type == CKEDITOR.NODE_TEXT ? c(a.getParent()) : e.widgets.getByElement(a) : null } function d() { a.fire("checkSelection") } var e = a.editor; e.on("selectionCheck", d); e.on("contentDom", function () {
                e.editable().attachListener(e,
                    "key", function () { setTimeout(d, 10) })
            }); if (!CKEDITOR.env.ie) a.on("checkSelection", b); a.on("checkSelection", a.checkSelection, a); e.on("selectionChange", function (b) { var c = (b = h.getNestedEditable(e.editable(), b.data.selection.getStartElement())) && a.getByElement(b), d = a.widgetHoldingFocusedEditable; d ? d === c && d.focusedEditable.equals(b) || (p(a, d, null), c && b && p(a, c, b)) : c && b && p(a, c, b) }); e.on("dataReady", function () { H(a).commit() }); e.on("blur", function () {
                var b; (b = a.focused) && x(a, b); (b = a.widgetHoldingFocusedEditable) &&
                    p(a, b, null)
            })
        } function S(a) {
            var b = a.editor, c = {}; b.on("toDataFormat", function (b) {
                var e = CKEDITOR.tools.getNextNumber(), f = []; b.data.downcastingSessionId = e; c[e] = f; b.data.dataValue.forEach(function (b) {
                    var c = b.attributes, e; if ("data-cke-widget-white-space" in c) { e = z(b); var d = A(b); e.parent.attributes["data-cke-white-space-first"] && (e.value = e.value.replace(/^&nbsp;/g, " ")); d.parent.attributes["data-cke-white-space-last"] && (d.value = d.value.replace(/&nbsp;$/g, " ")) } if ("data-cke-widget-id" in c) {
                        if (c = a.instances[c["data-cke-widget-id"]]) e =
                            b.getFirst(h.isParserWidgetElement), f.push({ wrapper: b, element: e, widget: c, editables: {} }), e && "1" != e.attributes["data-cke-widget-keep-attr"] && delete e.attributes["data-widget"]
                    } else if ("data-cke-widget-editable" in c) return 0 < f.length && (f[f.length - 1].editables[c["data-cke-widget-editable"]] = b), !1
                }, CKEDITOR.NODE_ELEMENT, !0)
            }, null, null, 8); b.on("toDataFormat", function (a) {
                if (a.data.downcastingSessionId) for (var b = c[a.data.downcastingSessionId], f, g, l, k, h, m; f = b.shift();) {
                    g = f.widget; l = f.element; k = g._.downcastFn &&
                        g._.downcastFn.call(g, l); a.data.widgetsCopy && g.getClipboardHtml && (k = CKEDITOR.htmlParser.fragment.fromHtml(g.getClipboardHtml()), k = k.children[0]); for (m in f.editables) h = f.editables[m], delete h.attributes.contenteditable, h.setHtml(g.editables[m].getData()); k || (k = l); k ? f.wrapper.replaceWith(k) : f.wrapper.remove()
                }
            }, null, null, 13); b.on("contentDomUnload", function () { a.destroyAll(!0) })
        } function R(a) {
            var b = a.editor, c, d; b.on("toHtml", function (b) {
                var d = da(a), g; for (b.data.dataValue.forEach(d.iterator, CKEDITOR.NODE_ELEMENT,
                    !0); g = d.toBeWrapped.pop();) { var l = g[0], k = l.parent; k.type == CKEDITOR.NODE_ELEMENT && k.attributes["data-cke-widget-wrapper"] && k.replaceWith(l); a.wrapElement(g[0], g[1]) } c = b.data.protectedWhitespaces ? 3 == b.data.dataValue.children.length && h.isParserWidgetWrapper(b.data.dataValue.children[1]) : 1 == b.data.dataValue.children.length && h.isParserWidgetWrapper(b.data.dataValue.children[0])
            }, null, null, 8); b.on("dataReady", function () {
                if (d) for (var c = b.editable().find(".cke_widget_wrapper"), f, g, l = 0, k = c.count(); l < k; ++l)f =
                    c.getItem(l), g = f.getFirst(h.isDomWidgetElement), g.type == CKEDITOR.NODE_ELEMENT && g.data("widget") ? (g.replace(f), a.wrapElement(g)) : f.remove(); d = 0; a.destroyAll(!0); a.initOnAll()
            }); b.on("loadSnapshot", function (b) { /data-cke-widget/.test(b.data) && (d = 1); a.destroyAll(!0) }, null, null, 9); b.on("paste", function (a) { a = a.data; a.dataValue = a.dataValue.replace(ga, fa); a.range && (a = h.getNestedEditable(b.editable(), a.range.startContainer)) && (a = CKEDITOR.filter.instances[a.data("cke-filter")]) && b.setActiveFilter(a) }); b.on("afterInsertHtml",
                function (d) { d.data.intoRange ? a.checkWidgets({ initOnlyNew: !0 }) : (b.fire("lockSnapshot"), a.checkWidgets({ initOnlyNew: !0, focusInited: c }), b.fire("unlockSnapshot")) })
        } function H(a) {
            var b = a.selected, c = [], d = b.slice(0), e = null; return {
                select: function (a) { 0 > CKEDITOR.tools.indexOf(b, a) && c.push(a); a = CKEDITOR.tools.indexOf(d, a); 0 <= a && d.splice(a, 1); return this }, focus: function (a) { e = a; return this }, commit: function () {
                    var f = a.focused !== e, g, l; a.editor.fire("lockSnapshot"); for (f && (g = a.focused) && x(a, g); g = d.pop();)b.splice(CKEDITOR.tools.indexOf(b,
                        g), 1), g.isInited() && (l = g.editor.checkDirty(), g.setSelected(!1), !l && g.editor.resetDirty()); f && e && (l = a.editor.checkDirty(), a.focused = e, a.fire("widgetFocused", { widget: e }), e.setFocused(!0), !l && a.editor.resetDirty()); for (; g = c.pop();)b.push(g), g.setSelected(!0); a.editor.fire("unlockSnapshot")
                }
            }
        } function ha(a) { a && a.addFilterRule(function (a) { return a.replace(/\s*cke_widget_selected/g, "").replace(/\s*cke_widget_focused/g, "") }) } function I(a, b, c) {
            var d = 0; b = J(b); var e = a.data.classes || {}, f; if (b) {
                for (e = CKEDITOR.tools.clone(e); f =
                    b.pop();)c ? e[f] || (d = e[f] = 1) : e[f] && (delete e[f], d = 1); d && a.setData("classes", e)
            }
        } function K(a) { a.cancel() } function L(a, b) { var c = function (a) { return a == CKEDITOR.ENTER_BR ? "br" : a == CKEDITOR.ENTER_DIV ? "div" : "p" }(a.editor.config.enterMode), d = new CKEDITOR.dom.element(c); "br" !== c && d.appendBogus(); "after" === b ? d.insertAfter(a.wrapper) : d.insertBefore(a.wrapper); (function (b) { var c = a.editor.createRange(); c.setStart(b, 0); a.editor.getSelection().selectRanges([c]) })(d) } function G(a, b) {
            var c = a.widgets.focused, d, e, f;
            u.hasCopyBin(a) || (e = new u(a, { beforeDestroy: function () { !b && c && c.focus(); f && a.getSelection().selectBookmarks(f); d && CKEDITOR.plugins.widgetselection.addFillers(a.editable()) }, afterDestroy: function () { b && !a.readOnly && (c ? a.widgets.del(c) : a.extractSelectedHtml(), a.fire("saveSnapshot")) } }), c || (d = CKEDITOR.env.webkit && CKEDITOR.plugins.widgetselection.isWholeContentSelected(a.editable()), f = a.getSelection().createBookmarks(!0)), e.handle(F(a)))
        } function J(a) {
            return (a = (a = a.getDefinition().attributes) && a["class"]) ?
                a.split(/\s+/) : null
        } function M() { var a = CKEDITOR.document.getActive(), b = this.editor, c = b.editable(); (c.isInline() ? c : b.document.getWindow().getFrame()).equals(a) && b.focusManager.focus(c) } function N() { CKEDITOR.env.gecko && this.editor.unlockSelection(); CKEDITOR.env.webkit || (this.editor.forceNextSelectionCheck(), this.editor.selectionChange(1)) } function F(a) {
            var b = a.getSelectedHtml(!0); if (a.widgets.focused) return a.widgets.focused.getClipboardHtml(); a.once("toDataFormat", function (a) { a.data.widgetsCopy = !0 },
                null, null, -1); return a.dataProcessor.toDataFormat(b)
        } function Z(a, b) {
            var c = a.editor.config.widget_keystrokeInsertLineBefore, d = a.editor.config.widget_keystrokeInsertLineAfter; ia(a); O(a); ja(a); P(a); ka(a); la(a); ma(a); if (CKEDITOR.env.ie && 9 > CKEDITOR.env.version) a.wrapper.on("dragstart", function (b) { var c = b.data.getTarget(); h.getNestedEditable(a, c) || a.inline && h.isDomDragHandler(c) || b.data.preventDefault() }); a.wrapper.removeClass("cke_widget_new"); a.element.addClass("cke_widget_element"); a.on("key", function (b) {
                b =
                b.data.keyCode; if (b == c) L(a, "before"), a.editor.fire("saveSnapshot"); else if (b == d) L(a, "after"), a.editor.fire("saveSnapshot"); else if (13 == b) a.edit(); else { if (b == CKEDITOR.CTRL + 67 || b == CKEDITOR.CTRL + 88) { G(a.editor, b == CKEDITOR.CTRL + 88); return } if (b in Q || CKEDITOR.CTRL & b || CKEDITOR.ALT & b) return } return !1
            }, null, null, 999); a.on("doubleclick", function (b) { a.edit() && b.cancel() }); if (b.data) a.on("data", b.data); if (b.edit) a.on("edit", b.edit)
        } function ia(a) {
            (a.wrapper = a.element.getParent()).setAttribute("data-cke-widget-id",
                a.id)
        } function O(a, b) { a.partSelectors || (a.partSelectors = a.parts); if (a.parts) { var c = {}, d, e; for (e in a.partSelectors) b || !a.parts[e] || "string" == typeof a.parts[e] ? (d = a.wrapper.findOne(a.partSelectors[e]), c[e] = d) : c[e] = a.parts[e]; a.parts = c } } function ja(a) { var b = a.editables, c, d; a.editables = {}; if (a.editables) for (c in b) d = b[c], a.initEditable(c, "string" == typeof d ? { selector: d } : d) } function P(a) {
            if (!0 === a.mask) na(a); else if (a.mask) {
                var b = new CKEDITOR.tools.buffers.throttle(250, oa, a), c = CKEDITOR.env.gecko ? 300 : 0,
                d, e; a.on("focus", function () { b.input(); d = a.editor.on("change", b.input); e = a.on("blur", function () { d.removeListener(); e.removeListener() }) }); a.editor.on("instanceReady", function () { setTimeout(function () { b.input() }, c) }); a.editor.on("mode", function () { setTimeout(function () { b.input() }, c) }); if (CKEDITOR.env.gecko) { var f = a.element.find("img"); CKEDITOR.tools.array.forEach(f.toArray(), function (a) { a.on("load", function () { b.input() }) }) } for (var g in a.editables) a.editables[g].on("focus", function () {
                    a.editor.on("change",
                        b.input); e && e.removeListener()
                }), a.editables[g].on("blur", function () { a.editor.removeListener("change", b.input) }); b.input()
            }
        } function na(a) { var b = a.wrapper.findOne(".cke_widget_mask"); b || (b = new CKEDITOR.dom.element("img", a.editor.document), b.setAttributes({ src: CKEDITOR.tools.transparentImageData, "class": "cke_reset cke_widget_mask" }), a.wrapper.append(b)); a.mask = b } function oa() {
            if (this.wrapper) {
                this.maskPart = this.maskPart || this.mask; var a = this.parts[this.maskPart], b; if (a && "string" != typeof a) {
                    b = this.wrapper.findOne(".cke_widget_partial_mask");
                    b || (b = new CKEDITOR.dom.element("img", this.editor.document), b.setAttributes({ src: CKEDITOR.tools.transparentImageData, "class": "cke_reset cke_widget_partial_mask" }), this.wrapper.append(b)); this.mask = b; var c = b.$, d = a.$, e = !(c.offsetTop == d.offsetTop && c.offsetLeft == d.offsetLeft); if (c.offsetWidth != d.offsetWidth || c.offsetHeight != d.offsetHeight || e) c = a.getParent(), d = CKEDITOR.plugins.widget.isDomWidget(c), b.setStyles({
                        top: a.$.offsetTop + (d ? 0 : c.$.offsetTop) + "px", left: a.$.offsetLeft + (d ? 0 : c.$.offsetLeft) + "px", width: a.$.offsetWidth +
                            "px", height: a.$.offsetHeight + "px"
                    })
                }
            }
        } function ka(a) {
            if (a.draggable) {
                var b = a.editor, c = a.wrapper.getLast(h.isDomDragHandlerContainer), d; c ? d = c.findOne("img") : (c = new CKEDITOR.dom.element("span", b.document), c.setAttributes({ "class": "cke_reset cke_widget_drag_handler_container", style: "background:rgba(220,220,220,0.5);background-image:url(" + b.plugins.widget.path + "images/handle.png);display:none;" }), d = new CKEDITOR.dom.element("img", b.document), d.setAttributes({
                    "class": "cke_reset cke_widget_drag_handler",
                    "data-cke-widget-drag-handler": "1", src: CKEDITOR.tools.transparentImageData, width: 15, title: b.lang.widget.move, height: 15, role: "presentation"
                }), a.inline && d.setAttribute("draggable", "true"), c.append(d), a.wrapper.append(c)); a.wrapper.on("dragover", function (a) { a.data.preventDefault() }); a.wrapper.on("mouseenter", a.updateDragHandlerPosition, a); setTimeout(function () { a.on("data", a.updateDragHandlerPosition, a) }, 50); if (!a.inline && (d.on("mousedown", pa, a), CKEDITOR.env.ie && 9 > CKEDITOR.env.version)) d.on("dragstart",
                    function (a) { a.data.preventDefault(!0) }); a.dragHandlerContainer = c
            }
        } function pa(a) {
            function b() { var b; for (r.reset(); b = l.pop();)b.removeListener(); var c = k; b = a.sender; var d = this.repository.finder, e = this.repository.liner, f = this.editor, g = this.editor.editable(); CKEDITOR.tools.isEmpty(e.visible) || (c = d.getRange(c[0]), this.focus(), f.fire("drop", { dropRange: c, target: c.startContainer })); g.removeClass("cke_widget_dragging"); e.hideVisible(); f.fire("dragend", { target: b }) } if (CKEDITOR.tools.getMouseButton(a) === CKEDITOR.MOUSE_BUTTON_LEFT) {
                var c =
                    this.repository.finder, d = this.repository.locator, e = this.repository.liner, f = this.editor, g = f.editable(), l = [], k = [], h, m; this.repository._.draggedWidget = this; var w = c.greedySearch(), r = CKEDITOR.tools.eventsBuffer(50, function () { h = d.locate(w); k = d.sort(m, 1); k.length && (e.prepare(w, h), e.placeLine(k[0]), e.cleanup()) }); g.addClass("cke_widget_dragging"); l.push(g.on("mousemove", function (a) { m = a.data.$.clientY; r.input() })); f.fire("dragstart", { target: a.sender }); l.push(f.document.once("mouseup", b, this)); g.isInline() ||
                        l.push(CKEDITOR.document.once("mouseup", b, this))
            }
        } function la(a) { var b = null; a.on("data", function () { var a = this.data.classes, d; if (b != a) { for (d in b) a && a[d] || this.removeClass(d); for (d in a) this.addClass(d); b = a } }) } function ma(a) { a.on("data", function () { if (a.wrapper) { var b = this.getLabel ? this.getLabel() : this.editor.lang.widget.label.replace(/%1/, this.pathName || this.element.getName()); a.wrapper.setAttribute("role", "region"); a.wrapper.setAttribute("aria-label", b) } }, null, null, 9999) } function v(a) {
            a.element.data("cke-widget-data",
                encodeURIComponent(JSON.stringify(a.data)))
        } function qa() {
            function a() { } function b(a, b, c) { return c && this.checkElement(a) ? (a = c.widgets.getByElement(a, !0)) && a.checkStyleActive(this) : !1 } function c(a) {
                function b(a, c, d) { for (var e = a.length, f = 0; f < e;) { if (c.call(d, a[f], f, a)) return a[f]; f++ } } function c(a) {
                    function b(a, c) {
                        var d = CKEDITOR.tools.object.keys(a), e = CKEDITOR.tools.object.keys(c); if (d.length !== e.length) return !1; for (var f in a) if (("object" !== typeof a[f] || "object" !== typeof c[f] || !b(a[f], c[f])) && a[f] !==
                            c[f]) return !1; return !0
                    } return function (c) { return b(a.getDefinition(), c.getDefinition()) }
                } var h = a.widget, k; d[h] || (d[h] = {}); for (var n = 0, m = a.group.length; n < m; n++)k = a.group[n], d[h][k] || (d[h][k] = []), k = d[h][k], b(k, c(a)) || k.push(a)
            } var d = {}; CKEDITOR.style.addCustomHandler({
                type: "widget", setup: function (a) { this.widget = a.widget; (this.group = "string" == typeof a.group ? [a.group] : a.group) && c(this) }, apply: function (a) {
                    var b; a instanceof CKEDITOR.editor && this.checkApplicable(a.elementPath(), a) && (b = a.widgets.focused,
                        this.group && this.removeStylesFromSameGroup(a), b.applyStyle(this))
                }, remove: function (a) { a instanceof CKEDITOR.editor && this.checkApplicable(a.elementPath(), a) && a.widgets.focused.removeStyle(this) }, removeStylesFromSameGroup: function (a) {
                    var b = !1, c, h; if (!(a instanceof CKEDITOR.editor)) return !1; h = a.elementPath(); if (this.checkApplicable(h, a)) for (var k = 0, n = this.group.length; k < n; k++) {
                        c = d[this.widget][this.group[k]]; for (var m = 0; m < c.length; m++)c[m] !== this && c[m].checkActive(h, a) && (a.widgets.focused.removeStyle(c[m]),
                            b = !0)
                    } return b
                }, checkActive: function (a, b) { return this.checkElementMatch(a.lastElement, 0, b) }, checkApplicable: function (a, b) { return b instanceof CKEDITOR.editor ? this.checkElement(a.lastElement) : !1 }, checkElementMatch: b, checkElementRemovable: b, checkElement: function (a) { return h.isDomWidgetWrapper(a) ? (a = a.getFirst(h.isDomWidgetElement)) && a.data("widget") == this.widget : !1 }, buildPreview: function (a) { return a || this._.definition.name }, toAllowedContentRules: function (a) {
                    if (!a) return null; a = a.widgets.registered[this.widget];
                    var b, c = {}; if (!a) return null; if (a.styleableElements) { b = this.getClassesArray(); if (!b) return null; c[a.styleableElements] = { classes: b, propertiesOnly: !0 }; return c } return a.styleToAllowedContentRules ? a.styleToAllowedContentRules(this) : null
                }, getClassesArray: function () { var a = this._.definition.attributes && this._.definition.attributes["class"]; return a ? CKEDITOR.tools.trim(a).split(/\s+/) : null }, applyToRange: a, removeFromRange: a, applyToObject: a
            })
        } CKEDITOR.plugins.add("widget", {
            requires: "lineutils,clipboard,widgetselection",
            onLoad: function () {
                void 0 !== CKEDITOR.document.$.querySelectorAll && (CKEDITOR.addCss('.cke_widget_wrapper{position:relative;outline:none}.cke_widget_inline{display:inline-block}.cke_widget_wrapper:hover\x3e.cke_widget_element{outline:2px solid #ffd25c;cursor:default}.cke_widget_wrapper:hover .cke_widget_editable{outline:2px solid #ffd25c}.cke_widget_wrapper.cke_widget_focused\x3e.cke_widget_element,.cke_widget_wrapper .cke_widget_editable.cke_widget_editable_focused{outline:2px solid #47a4f5}.cke_widget_editable{cursor:text}.cke_widget_drag_handler_container{position:absolute;width:15px;height:0;display:block;opacity:0.75;transition:height 0s 0.2s;line-height:0}.cke_widget_wrapper:hover\x3e.cke_widget_drag_handler_container{height:15px;transition:none}.cke_widget_drag_handler_container:hover{opacity:1}.cke_editable[contenteditable\x3d"false"] .cke_widget_drag_handler_container{display:none;}img.cke_widget_drag_handler{cursor:move;width:15px;height:15px;display:inline-block}.cke_widget_mask{position:absolute;top:0;left:0;width:100%;height:100%;display:block}.cke_widget_partial_mask{position:absolute;display:block}.cke_editable.cke_widget_dragging, .cke_editable.cke_widget_dragging *{cursor:move !important}'),
                    qa())
            }, beforeInit: function (a) { void 0 !== CKEDITOR.document.$.querySelectorAll && (a.widgets = new q(a)) }, afterInit: function (a) { if (void 0 !== CKEDITOR.document.$.querySelectorAll) { var b = a.widgets.registered, c, d, e; for (d in b) c = b[d], (e = c.button) && a.ui.addButton && a.ui.addButton(CKEDITOR.tools.capitalize(c.name, !0), { label: e, command: c.name, toolbar: "insert,10" }); ea(a); ha(a.undoManager) } }
        }); q.prototype = {
            MIN_SELECTION_CHECK_INTERVAL: 500, add: function (a, b) {
                var c = this.editor; b = CKEDITOR.tools.prototypedCopy(b); b.name =
                    a; b._ = b._ || {}; c.fire("widgetDefinition", b); b.template && (b.template = new CKEDITOR.template(b.template)); aa(c, b); ba(this, b); this.registered[a] = b; if (b.dialog && c.plugins.dialog) var d = CKEDITOR.on("dialogDefinition", function (a) { a = a.data.definition; var f = a.dialog; a.getMode || f.getName() !== b.dialog || (a.getMode = function () { var a = f.getModel(c); return a && a instanceof CKEDITOR.plugins.widget && a.ready ? CKEDITOR.dialog.EDITING_MODE : CKEDITOR.dialog.CREATION_MODE }); d.removeListener() }); return b
            }, addUpcastCallback: function (a) { this._.upcastCallbacks.push(a) },
            checkSelection: function () { if (this.editor.getSelection()) { var a = this.editor.getSelection(), b = a.getSelectedElement(), c = H(this), d; if (b && (d = this.getByElement(b, !0))) return c.focus(d).select(d).commit(); a = a.getRanges()[0]; if (!a || a.collapsed) return c.commit(); a = new CKEDITOR.dom.walker(a); for (a.evaluator = h.isDomWidgetWrapper; b = a.next();)c.select(this.getByElement(b)); c.commit() } }, checkWidgets: function (a) { this.fire("checkWidgets", CKEDITOR.tools.copy(a || {})) }, del: function (a) {
                if (this.focused === a) {
                    var b = a.editor,
                    c = b.createRange(), d; (d = c.moveToClosestEditablePosition(a.wrapper, !0)) || (d = c.moveToClosestEditablePosition(a.wrapper, !1)); d && b.getSelection().selectRanges([c])
                } a.wrapper.remove(); this.destroy(a, !0)
            }, destroy: function (a, b) { this.widgetHoldingFocusedEditable === a && p(this, a, null, b); a.destroy(b); delete this.instances[a.id]; this.fire("instanceDestroyed", a) }, destroyAll: function (a, b) {
                var c, d, e = this.instances; if (b && !a) {
                    d = b.find(".cke_widget_wrapper"); for (var e = d.count(), f = 0; f < e; ++f)(c = this.getByElement(d.getItem(f),
                        !0)) && this.destroy(c)
                } else for (d in e) c = e[d], this.destroy(c, a)
            }, finalizeCreation: function (a) { (a = a.getFirst()) && h.isDomWidgetWrapper(a) && (this.editor.insertElement(a), a = this.getByElement(a), a.ready = !0, a.fire("ready"), a.focus()) }, getByElement: function () { function a(a) { return a.is(b) && a.data("cke-widget-id") } var b = { div: 1, span: 1 }; return function (b, d) { if (!b) return null; var e = a(b); if (!d && !e) { var f = this.editor.editable(); do b = b.getParent(); while (b && !b.equals(f) && !(e = a(b))) } return this.instances[e] || null } }(),
            initOn: function (a, b, c) { b ? "string" == typeof b && (b = this.registered[b]) : b = this.registered[a.data("widget")]; if (!b) return null; var d = this.wrapElement(a, b.name); return d ? d.hasClass("cke_widget_new") ? (a = new h(this, this._.nextId++, a, b, c), a.isInited() ? this.instances[a.id] = a : null) : this.getByElement(a) : null }, initOnAll: function (a) { a = (a || this.editor.editable()).find(".cke_widget_new"); for (var b = [], c, d = a.count(); d--;)(c = this.initOn(a.getItem(d).getFirst(h.isDomWidgetElement))) && b.push(c); return b }, onWidget: function (a) {
                var b =
                    Array.prototype.slice.call(arguments); b.shift(); for (var c in this.instances) { var d = this.instances[c]; d.name == a && d.on.apply(d, b) } this.on("instanceCreated", function (c) { c = c.data; c.name == a && c.on.apply(c, b) })
            }, parseElementClasses: function (a) { if (!a) return null; a = CKEDITOR.tools.trim(a).split(/\s+/); for (var b, c = {}, d = 0; b = a.pop();)-1 == b.indexOf("cke_") && (c[b] = d = 1); return d ? c : null }, wrapElement: function (a, b) {
                var c = null, d, e; if (a instanceof CKEDITOR.dom.element) {
                    b = b || a.data("widget"); d = this.registered[b]; if (!d) return null;
                    if ((c = a.getParent()) && c.type == CKEDITOR.NODE_ELEMENT && c.data("cke-widget-wrapper")) return c; a.hasAttribute("data-cke-widget-keep-attr") || a.data("cke-widget-keep-attr", a.data("widget") ? 1 : 0); a.data("widget", b); (e = E(d, a.getName())) && y(a); c = new CKEDITOR.dom.element(e ? "span" : "div", a.getDocument()); c.setAttributes(C(e, b)); c.data("cke-display-name", d.pathName ? d.pathName : a.getName()); a.getParent(!0) && c.replace(a); a.appendTo(c)
                } else if (a instanceof CKEDITOR.htmlParser.element) {
                    b = b || a.attributes["data-widget"];
                    d = this.registered[b]; if (!d) return null; if ((c = a.parent) && c.type == CKEDITOR.NODE_ELEMENT && c.attributes["data-cke-widget-wrapper"]) return c; "data-cke-widget-keep-attr" in a.attributes || (a.attributes["data-cke-widget-keep-attr"] = a.attributes["data-widget"] ? 1 : 0); b && (a.attributes["data-widget"] = b); (e = E(d, a.name)) && y(a); c = new CKEDITOR.htmlParser.element(e ? "span" : "div", C(e, b)); c.attributes["data-cke-display-name"] = d.pathName ? d.pathName : a.name; d = a.parent; var f; d && (f = a.getIndex(), a.remove()); c.add(a); d && D(d,
                        f, c)
                } return c
            }, _tests_createEditableFilter: B
        }; CKEDITOR.event.implementOn(q.prototype); h.prototype = {
            addClass: function (a) { this.element.addClass(a); this.wrapper.addClass(h.WRAPPER_CLASS_PREFIX + a) }, applyStyle: function (a) { I(this, a, 1) }, checkStyleActive: function (a) { a = J(a); var b; if (!a) return !1; for (; b = a.pop();)if (!this.hasClass(b)) return !1; return !0 }, destroy: function (a) {
                this.fire("destroy"); if (this.editables) for (var b in this.editables) this.destroyEditable(b, a); a || ("0" == this.element.data("cke-widget-keep-attr") &&
                    this.element.removeAttribute("data-widget"), this.element.removeAttributes(["data-cke-widget-data", "data-cke-widget-keep-attr"]), this.element.removeClass("cke_widget_element"), this.element.replace(this.wrapper)); this.wrapper = null
            }, destroyEditable: function (a, b) {
                var c = this.editables[a], d = !0; c.removeListener("focus", N); c.removeListener("blur", M); this.editor.focusManager.remove(c); if (c.filter) {
                    for (var e in this.repository.instances) {
                        var f = this.repository.instances[e]; f.editables && (f = f.editables[a]) && f !==
                            c && c.filter === f.filter && (d = !1)
                    } d && (c.filter.destroy(), (d = this.repository._.filters[this.name]) && delete d[a])
                } b || (this.repository.destroyAll(!1, c), c.removeClass("cke_widget_editable"), c.removeClass("cke_widget_editable_focused"), c.removeAttributes(["contenteditable", "data-cke-widget-editable", "data-cke-enter-mode"])); delete this.editables[a]
            }, edit: function () {
                var a = { dialog: this.dialog }, b = this; if (!1 === this.fire("edit", a) || !a.dialog) return !1; this.editor.openDialog(a.dialog, function (a) {
                    var d, e; !1 !== b.fire("dialog",
                        a) && (d = a.on("show", function () { a.setupContent(b) }), e = a.on("ok", function () { var d, e = b.on("data", function (a) { d = 1; a.cancel() }, null, null, 0); b.editor.fire("saveSnapshot"); a.commitContent(b); e.removeListener(); d && (b.fire("data", b.data), b.editor.fire("saveSnapshot")) }), a.once("hide", function () { d.removeListener(); e.removeListener() }))
                }, b); return !0
            }, getClasses: function () { return this.repository.parseElementClasses(this.element.getAttribute("class")) }, getClipboardHtml: function () {
                var a = this.editor.createRange();
                a.setStartBefore(this.wrapper); a.setEndAfter(this.wrapper); return this.editor.editable().getHtmlFromRange(a).getHtml()
            }, hasClass: function (a) { return this.element.hasClass(a) }, initEditable: function (a, b) {
                var c = this._findOneNotNested(b.selector); return c && c.is(CKEDITOR.dtd.$editable) ? (c = new t(this.editor, c, { filter: B.call(this.repository, this.name, a, b) }), this.editables[a] = c, c.setAttributes({ contenteditable: "true", "data-cke-widget-editable": a, "data-cke-enter-mode": c.enterMode }), c.filter && c.data("cke-filter",
                    c.filter.id), c.addClass("cke_widget_editable"), c.removeClass("cke_widget_editable_focused"), b.pathName && c.data("cke-display-name", b.pathName), this.editor.focusManager.add(c), c.on("focus", N, this), CKEDITOR.env.ie && c.on("blur", M, this), c._.initialSetData = !0, c.setData(c.getHtml()), !0) : !1
            }, _findOneNotNested: function (a) { a = this.wrapper.find(a); for (var b, c, d = 0; d < a.count(); d++)if (b = a.getItem(d), c = b.getAscendant(h.isDomWidgetWrapper), this.wrapper.equals(c)) return b; return null }, isInited: function () {
                return !(!this.wrapper ||
                    !this.inited)
            }, isReady: function () { return this.isInited() && this.ready }, focus: function () { var a = this.editor.getSelection(); if (a) { var b = this.editor.checkDirty(); a.fake(this.wrapper); !b && this.editor.resetDirty() } this.editor.focus() }, refreshMask: function () { P(this) }, refreshParts: function (a) { O(this, "undefined" !== typeof a ? a : !0) }, removeClass: function (a) { this.element.removeClass(a); this.wrapper.removeClass(h.WRAPPER_CLASS_PREFIX + a) }, removeStyle: function (a) { I(this, a, 0) }, setData: function (a, b) {
                var c = this.data,
                d = 0; if ("string" == typeof a) c[a] !== b && (c[a] = b, d = 1); else { var e = a; for (a in e) c[a] !== e[a] && (d = 1, c[a] = e[a]) } d && this.dataReady && (v(this), this.fire("data", c)); return this
            }, setFocused: function (a) { this.wrapper[a ? "addClass" : "removeClass"]("cke_widget_focused"); this.fire(a ? "focus" : "blur"); return this }, setSelected: function (a) { this.wrapper[a ? "addClass" : "removeClass"]("cke_widget_selected"); this.fire(a ? "select" : "deselect"); return this }, updateDragHandlerPosition: function () {
                var a = this.editor, b = this.element.$, c = this._.dragHandlerOffset,
                b = { x: b.offsetLeft, y: b.offsetTop - 15 }; c && b.x == c.x && b.y == c.y || (c = a.checkDirty(), a.fire("lockSnapshot"), this.dragHandlerContainer.setStyles({ top: b.y + "px", left: b.x + "px" }), this.dragHandlerContainer.removeStyle("display"), a.fire("unlockSnapshot"), !c && a.resetDirty(), this._.dragHandlerOffset = b)
            }
        }; CKEDITOR.event.implementOn(h.prototype); h.getNestedEditable = function (a, b) { return !b || b.equals(a) ? null : h.isDomNestedEditable(b) ? b : h.getNestedEditable(a, b.getParent()) }; h.isDomDragHandler = function (a) {
            return a.type ==
                CKEDITOR.NODE_ELEMENT && a.hasAttribute("data-cke-widget-drag-handler")
        }; h.isDomDragHandlerContainer = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.hasClass("cke_widget_drag_handler_container") }; h.isDomNestedEditable = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.hasAttribute("data-cke-widget-editable") }; h.isDomWidgetElement = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.hasAttribute("data-widget") }; h.isDomWidgetWrapper = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && a.hasAttribute("data-cke-widget-wrapper") };
        h.isDomWidget = function (a) { return a ? this.isDomWidgetWrapper(a) || this.isDomWidgetElement(a) : !1 }; h.isParserWidgetElement = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && !!a.attributes["data-widget"] }; h.isParserWidgetWrapper = function (a) { return a.type == CKEDITOR.NODE_ELEMENT && !!a.attributes["data-cke-widget-wrapper"] }; h.WRAPPER_CLASS_PREFIX = "cke_widget_wrapper_"; t.prototype = CKEDITOR.tools.extend(CKEDITOR.tools.prototypedCopy(CKEDITOR.dom.element.prototype), {
            setData: function (a) {
                this._.initialSetData ||
                this.editor.widgets.destroyAll(!1, this); this._.initialSetData = !1; a = this.editor.dataProcessor.unprotectRealComments(a); a = this.editor.dataProcessor.unprotectSource(a); a = this.editor.dataProcessor.toHtml(a, { context: this.getName(), filter: this.filter, enterMode: this.enterMode }); this.setHtml(a); this.editor.widgets.initOnAll(this)
            }, getData: function () { return this.editor.dataProcessor.toDataFormat(this.getHtml(), { context: this.getName(), filter: this.filter, enterMode: this.enterMode }) }
        }); var ga = /^(?:<(?:div|span)(?: data-cke-temp="1")?(?: id="cke_copybin")?(?: data-cke-temp="1")?>)?(?:<(?:div|span)(?: style="[^"]+")?>)?<span [^>]*data-cke-copybin-start="1"[^>]*>.?<\/span>([\s\S]+)<span [^>]*data-cke-copybin-end="1"[^>]*>.?<\/span>(?:<\/(?:div|span)>)?(?:<\/(?:div|span)>)?$/i,
            Q = { 37: 1, 38: 1, 39: 1, 40: 1, 8: 1, 46: 1 }; Q[CKEDITOR.SHIFT + 121] = 1; var u = CKEDITOR.tools.createClass({
                $: function (a, b) { this._.createCopyBin(a, b); this._.createListeners(b) }, _: {
                    createCopyBin: function (a) {
                        var b = a.document, c = CKEDITOR.env.edge && 16 <= CKEDITOR.env.version, d = !a.blockless && !CKEDITOR.env.ie || c ? "div" : "span", c = b.createElement(d), b = b.createElement(d); b.setAttributes({ id: "cke_copybin", "data-cke-temp": "1" }); c.setStyles({ position: "absolute", width: "1px", height: "1px", overflow: "hidden" }); c.setStyle("ltr" == a.config.contentsLangDirection ?
                            "left" : "right", "-5000px"); this.editor = a; this.copyBin = c; this.container = b
                    }, createListeners: function (a) { a && (a.beforeDestroy && (this.beforeDestroy = a.beforeDestroy), a.afterDestroy && (this.afterDestroy = a.afterDestroy)) }
                }, proto: {
                    handle: function (a) {
                        var b = this.copyBin, c = this.editor, d = this.container, e = CKEDITOR.env.ie && 9 > CKEDITOR.env.version, f = c.document.getDocumentElement().$, g = c.createRange(), h = this, k = CKEDITOR.env.mac && CKEDITOR.env.webkit, n = k ? 100 : 0, m = window.requestAnimationFrame && !k ? requestAnimationFrame : setTimeout,
                        p, r, q; b.setHtml('\x3cspan data-cke-copybin-start\x3d"1"\x3e​\x3c/span\x3e' + a + '\x3cspan data-cke-copybin-end\x3d"1"\x3e​\x3c/span\x3e'); c.fire("lockSnapshot"); d.append(b); c.editable().append(d); p = c.on("selectionChange", K, null, null, 0); r = c.widgets.on("checkSelection", K, null, null, 0); e && (q = f.scrollTop); g.selectNodeContents(b); g.select(); e && (f.scrollTop = q); return new CKEDITOR.tools.promise(function (a) {
                            m(function () {
                                h.beforeDestroy && h.beforeDestroy(); d.remove(); p.removeListener(); r.removeListener(); c.fire("unlockSnapshot");
                                h.afterDestroy && h.afterDestroy(); a()
                            }, n)
                        })
                    }
                }, statics: { hasCopyBin: function (a) { return !!u.getCopyBin(a) }, getCopyBin: function (a) { return a.document.getById("cke_copybin") } }
            }); CKEDITOR.plugins.widget = h; h.repository = q; h.nestedEditable = t
    })(); CKEDITOR.config.widget_keystrokeInsertLineBefore = CKEDITOR.SHIFT + CKEDITOR.ALT + 13; CKEDITOR.config.widget_keystrokeInsertLineAfter = CKEDITOR.SHIFT + 13; (function () {
        function e(a, b, c) { this.editor = a; this.notification = null; this._message = new CKEDITOR.template(b); this._singularMessage = c ? new CKEDITOR.template(c) : null; this._tasks = []; this._doneTasks = this._doneWeights = this._totalWeights = 0 } function d(a) { this._weight = a || 1; this._doneWeight = 0; this._isCanceled = !1 } CKEDITOR.plugins.add("notificationaggregator", { requires: "notification" }); e.prototype = {
            createTask: function (a) {
                a = a || {}; var b = !this.notification, c; b && (this.notification = this._createNotification()); c = this._addTask(a);
                c.on("updated", this._onTaskUpdate, this); c.on("done", this._onTaskDone, this); c.on("canceled", function () { this._removeTask(c) }, this); this.update(); b && this.notification.show(); return c
            }, update: function () { this._updateNotification(); this.isFinished() && this.fire("finished") }, getPercentage: function () { return 0 === this.getTaskCount() ? 1 : this._doneWeights / this._totalWeights }, isFinished: function () { return this.getDoneTaskCount() === this.getTaskCount() }, getTaskCount: function () { return this._tasks.length }, getDoneTaskCount: function () { return this._doneTasks },
            _updateNotification: function () { this.notification.update({ message: this._getNotificationMessage(), progress: this.getPercentage() }) }, _getNotificationMessage: function () { var a = this.getTaskCount(), b = { current: this.getDoneTaskCount(), max: a, percentage: Math.round(100 * this.getPercentage()) }; return (1 == a && this._singularMessage ? this._singularMessage : this._message).output(b) }, _createNotification: function () { return new CKEDITOR.plugins.notification(this.editor, { type: "progress" }) }, _addTask: function (a) {
                a = new d(a.weight);
                this._tasks.push(a); this._totalWeights += a._weight; return a
            }, _removeTask: function (a) { var b = CKEDITOR.tools.indexOf(this._tasks, a); -1 !== b && (a._doneWeight && (this._doneWeights -= a._doneWeight), this._totalWeights -= a._weight, this._tasks.splice(b, 1), this.update()) }, _onTaskUpdate: function (a) { this._doneWeights += a.data; this.update() }, _onTaskDone: function () { this._doneTasks += 1; this.update() }
        }; CKEDITOR.event.implementOn(e.prototype); d.prototype = {
            done: function () { this.update(this._weight) }, update: function (a) {
                if (!this.isDone() &&
                    !this.isCanceled()) { a = Math.min(this._weight, a); var b = a - this._doneWeight; this._doneWeight = a; this.fire("updated", b); this.isDone() && this.fire("done") }
            }, cancel: function () { this.isDone() || this.isCanceled() || (this._isCanceled = !0, this.fire("canceled")) }, isDone: function () { return this._weight === this._doneWeight }, isCanceled: function () { return this._isCanceled }
        }; CKEDITOR.event.implementOn(d.prototype); CKEDITOR.plugins.notificationAggregator = e; CKEDITOR.plugins.notificationAggregator.task = d
    })(); (function () {
        CKEDITOR.plugins.add("uploadwidget", { requires: "widget,clipboard,filetools,notificationaggregator", init: function (a) { a.filter.allow("*[!data-widget,!data-cke-upload-id]") }, isSupportedEnvironment: function () { return CKEDITOR.plugins.clipboard.isFileApiSupported } }); CKEDITOR.fileTools || (CKEDITOR.fileTools = {}); CKEDITOR.tools.extend(CKEDITOR.fileTools, {
            addUploadWidget: function (a, c, e) {
                var g = CKEDITOR.fileTools, b = a.uploadRepository, m = e.supportedTypes ? 10 : 20; CKEDITOR.plugins.clipboard.addFileMatcher(a,
                    function (a) { return e.supportedTypes ? g.isTypeSupported(a, e.supportedTypes) : !0 }); if (e.fileToElement) a.on("paste", function (d) {
                        d = d.data; var l = a.widgets.registered[c], k = d.dataTransfer, e = k.getFilesCount(), h = l.loadMethod || "loadAndUpload", f, n; if (!d.dataValue && e) for (n = 0; n < e; n++)if (f = k.getFile(n), !l.supportedTypes || g.isTypeSupported(f, l.supportedTypes)) {
                            var m = l.fileToElement(f); f = b.create(f, void 0, l.loaderType); m && (f[h](l.uploadUrl, l.additionalRequestParameters), CKEDITOR.fileTools.markElement(m, c, f.id), "loadAndUpload" !=
                                h && "upload" != h || l.skipNotifications || CKEDITOR.fileTools.bindNotifications(a, f), d.dataValue += m.getOuterHtml())
                        }
                    }, null, null, m); CKEDITOR.tools.extend(e, {
                        downcast: function () { return new CKEDITOR.htmlParser.text("") }, init: function () {
                            var d = this, c = this.wrapper.findOne("[data-cke-upload-id]").data("cke-upload-id"), k = b.loaders[c], e = CKEDITOR.tools.capitalize, h, f; k.on("update", function (b) {
                                if ("abort" === k.status && "function" === typeof d.onAbort) d.onAbort(k); if (d.wrapper && d.wrapper.getParent()) {
                                    a.fire("lockSnapshot");
                                    b = "on" + e(k.status); if ("abort" === k.status || "function" !== typeof d[b] || !1 !== d[b](k)) f = "cke_upload_" + k.status, d.wrapper && f != h && (h && d.wrapper.removeClass(h), d.wrapper.addClass(f), h = f), "error" != k.status && "abort" != k.status || a.widgets.del(d); a.fire("unlockSnapshot")
                                } else CKEDITOR.instances[a.name] && a.editable().find('[data-cke-upload-id\x3d"' + c + '"]').count() || k.abort(), b.removeListener()
                            }); k.update()
                        }, replaceWith: function (d, c) {
                            if ("" === d.trim()) a.widgets.del(this); else {
                                var b = this == a.widgets.focused, e = a.editable(),
                                h = a.createRange(), f, g; b || (g = a.getSelection().createBookmarks()); h.setStartBefore(this.wrapper); h.setEndAfter(this.wrapper); b && (f = h.createBookmark()); e.insertHtmlIntoRange(d, h, c); a.widgets.checkWidgets({ initOnlyNew: !0 }); a.widgets.destroy(this, !0); b ? (h.moveToBookmark(f), h.select()) : a.getSelection().selectBookmarks(g); a.fire("change")
                            }
                        }, _getLoader: function () { var a = this.wrapper.findOne("[data-cke-upload-id]"); return a ? this.editor.uploadRepository.loaders[a.data("cke-upload-id")] : null }
                    }); a.widgets.add(c,
                        e)
            }, markElement: function (a, c, e) { a.setAttributes({ "data-cke-upload-id": e, "data-widget": c }) }, bindNotifications: function (a, c) {
                function e() {
                    g = a._.uploadWidgetNotificaionAggregator; if (!g || g.isFinished()) g = a._.uploadWidgetNotificaionAggregator = new CKEDITOR.plugins.notificationAggregator(a, a.lang.uploadwidget.uploadMany, a.lang.uploadwidget.uploadOne), g.once("finished", function () {
                        var b = g.getTaskCount(); 0 === b ? g.notification.hide() : g.notification.update({
                            message: 1 == b ? a.lang.uploadwidget.doneOne : a.lang.uploadwidget.doneMany.replace("%1",
                                b), type: "success", important: 1
                        })
                    })
                } var g, b = null; c.on("update", function () { !b && c.uploadTotal && (e(), b = g.createTask({ weight: c.uploadTotal })); b && "uploading" == c.status && b.update(c.uploaded) }); c.on("uploaded", function () { b && b.done() }); c.on("error", function () { b && b.cancel(); a.showNotification(c.message, "warning") }); c.on("abort", function () { b && b.cancel(); CKEDITOR.instances[a.name] && a.showNotification(a.lang.uploadwidget.abort, "info") })
            }
        })
    })(); (function () {
        function l(a) { 9 >= a && (a = "0" + a); return String(a) } function n(a) { var b = new Date, b = [b.getFullYear(), b.getMonth() + 1, b.getDate(), b.getHours(), b.getMinutes(), b.getSeconds()]; d += 1; return "image-" + CKEDITOR.tools.array.map(b, l).join("") + "-" + d + "." + a } var d = 0; CKEDITOR.plugins.add("uploadimage", {
            requires: "uploadwidget", onLoad: function () { CKEDITOR.addCss(".cke_upload_uploading img{opacity: 0.3}") }, isSupportedEnvironment: function () { return CKEDITOR.plugins.clipboard.isFileApiSupported }, init: function (a) {
                if (this.isSupportedEnvironment()) {
                    var b =
                        CKEDITOR.fileTools, d = b.getUploadUrl(a.config, "image"); d && (a.config.clipboard_handleImages && (a.config.clipboard_handleImages = !1, CKEDITOR.warn("clipboard-image-handling-disabled", { editor: a.name, plugin: "uploadimage" })), b.addUploadWidget(a, "uploadimage", {
                            supportedTypes: a.config.uploadImage_supportedTypes, uploadUrl: d, fileToElement: function () { var a = new CKEDITOR.dom.element("img"); a.setAttribute("src", "data:image/gif;base64,R0lGODlhDgAOAIAAAAAAAP///yH5BAAAAAAALAAAAAAOAA4AAAIMhI+py+0Po5y02qsKADs\x3d"); return a },
                            parts: { img: "img" }, onUploading: function (a) { this.parts.img.setAttribute("src", a.data) }, onUploaded: function (a) { var b = this.parts.img.$; this.replaceWith('\x3cimg src\x3d"' + a.url + '" width\x3d"' + (a.responseData.width || b.naturalWidth) + '" height\x3d"' + (a.responseData.height || b.naturalHeight) + '"\x3e') }
                        }), a.on("paste", function (g) {
                            if (g.data.dataValue.match(/<img[\s\S]+data:/i)) {
                                g = g.data; var e = document.implementation.createHTMLDocument(""), e = new CKEDITOR.dom.element(e.body), m, f, k; e.data("cke-editable", 1); e.appendHtml(g.dataValue);
                                m = e.find("img"); for (k = 0; k < m.count(); k++) { f = m.getItem(k); var c = f.getAttribute("src"), h = c && "data:" == c.substring(0, 5), l = null === f.data("cke-realelement"); h && l && !f.data("cke-upload-id") && !f.isReadOnly(1) && (h = (h = c.match(/image\/([a-z]+?);/i)) && h[1] || "jpg", c = a.uploadRepository.create(c, n(h)), c.upload(d), b.markElement(f, "uploadimage", c.id), b.bindNotifications(a, c)) } g.dataValue = e.getHtml()
                            }
                        }))
                }
            }
        }); CKEDITOR.config.uploadImage_supportedTypes = /image\/(jpeg|png|gif|bmp)/
    })(); CKEDITOR.config.plugins = 'dialogui,dialog,about,a11yhelp,basicstyles,blockquote,notification,button,toolbar,clipboard,panel,floatpanel,menu,contextmenu,resize,elementspath,enterkey,entities,popup,filetools,filebrowser,floatingspace,listblock,richcombo,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentlist,fakeobjects,link,list,magicline,maximize,pastetext,xml,ajax,pastetools,pastefromgdocs,pastefromlibreoffice,pastefromword,removeformat,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,tableselection,undo,lineutils,widgetselection,widget,notificationaggregator,uploadwidget,uploadimage'; CKEDITOR.config.skin = 'moono-lisa'; (function () { var setIcons = function (icons, strip) { var path = CKEDITOR.getUrl('plugins/' + strip); icons = icons.split(','); for (var i = 0; i < icons.length; i++)CKEDITOR.skin.icons[icons[i]] = { path: path, offset: -icons[++i], bgsize: icons[++i] }; }; if (CKEDITOR.env.hidpi) setIcons('about,0,,bold,24,,italic,48,,strike,72,,subscript,96,,superscript,120,,underline,144,,blockquote,168,,copy-rtl,192,,copy,216,,cut-rtl,240,,cut,264,,paste-rtl,288,,paste,312,,horizontalrule,336,,image,360,,indent-rtl,384,,indent,408,,outdent-rtl,432,,outdent,456,,anchor-rtl,480,,anchor,504,,link,528,,unlink,552,,bulletedlist-rtl,576,,bulletedlist,600,,numberedlist-rtl,624,,numberedlist,648,,maximize,672,,pastetext-rtl,696,,pastetext,720,,pastefromword-rtl,744,,pastefromword,768,,removeformat,792,,source-rtl,816,,source,840,,specialchar,864,,scayt,888,,table,912,,redo-rtl,936,,redo,960,,undo-rtl,984,,undo,1008,', 'icons_hidpi.png'); else setIcons('about,0,auto,bold,24,auto,italic,48,auto,strike,72,auto,subscript,96,auto,superscript,120,auto,underline,144,auto,blockquote,168,auto,copy-rtl,192,auto,copy,216,auto,cut-rtl,240,auto,cut,264,auto,paste-rtl,288,auto,paste,312,auto,horizontalrule,336,auto,image,360,auto,indent-rtl,384,auto,indent,408,auto,outdent-rtl,432,auto,outdent,456,auto,anchor-rtl,480,auto,anchor,504,auto,link,528,auto,unlink,552,auto,bulletedlist-rtl,576,auto,bulletedlist,600,auto,numberedlist-rtl,624,auto,numberedlist,648,auto,maximize,672,auto,pastetext-rtl,696,auto,pastetext,720,auto,pastefromword-rtl,744,auto,pastefromword,768,auto,removeformat,792,auto,source-rtl,816,auto,source,840,auto,specialchar,864,auto,scayt,888,auto,table,912,auto,redo-rtl,936,auto,redo,960,auto,undo-rtl,984,auto,undo,1008,auto', 'icons.png'); })(); CKEDITOR.lang.languages = { "af": 1, "sq": 1, "ar": 1, "az": 1, "eu": 1, "bn": 1, "bs": 1, "bg": 1, "ca": 1, "zh-cn": 1, "zh": 1, "hr": 1, "cs": 1, "da": 1, "nl": 1, "en": 1, "en-au": 1, "en-ca": 1, "en-gb": 1, "eo": 1, "et": 1, "fo": 1, "fi": 1, "fr": 1, "fr-ca": 1, "gl": 1, "ka": 1, "de": 1, "de-ch": 1, "el": 1, "gu": 1, "he": 1, "hi": 1, "hu": 1, "is": 1, "id": 1, "it": 1, "ja": 1, "km": 1, "ko": 1, "ku": 1, "lv": 1, "lt": 1, "mk": 1, "ms": 1, "mn": 1, "no": 1, "nb": 1, "oc": 1, "fa": 1, "pl": 1, "pt-br": 1, "pt": 1, "ro": 1, "ru": 1, "sr": 1, "sr-latn": 1, "si": 1, "sk": 1, "sl": 1, "es": 1, "es-mx": 1, "sv": 1, "tt": 1, "th": 1, "tr": 1, "ug": 1, "uk": 1, "vi": 1, "cy": 1 };
}());
