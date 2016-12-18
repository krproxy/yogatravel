webpackHotUpdate(0,{

/***/ 542:
/***/ function(module, exports, __webpack_require__) {

	eval("/* WEBPACK VAR INJECTION */(function(module) {/* REACT HOT LOADER */ if (true) { (function () { var ReactHotAPI = __webpack_require__(310), RootInstanceProvider = __webpack_require__(318), ReactMount = __webpack_require__(320), React = __webpack_require__(410); module.makeHot = module.hot.data ? module.hot.data.makeHot : ReactHotAPI(function () { return RootInstanceProvider.getRootInstances(ReactMount); }, React); })(); } try { (function () {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nvar _react = __webpack_require__(410);\n\nvar _react2 = _interopRequireDefault(_react);\n\nvar _Page = __webpack_require__(543);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError(\"this hasn't been initialised - super() hasn't been called\"); } return call && (typeof call === \"object\" || typeof call === \"function\") ? call : self; }\n\nfunction _inherits(subClass, superClass) { if (typeof superClass !== \"function\" && superClass !== null) { throw new TypeError(\"Super expression must either be null or a function, not \" + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }\n\nvar Page = function (_Component) {\n    _inherits(Page, _Component);\n\n    function Page() {\n        _classCallCheck(this, Page);\n\n        return _possibleConstructorReturn(this, (Page.__proto__ || Object.getPrototypeOf(Page)).apply(this, arguments));\n    }\n\n    _createClass(Page, [{\n        key: 'render',\n        value: function render() {\n            var point = this.props.point;\n\n            var point_class = void 0,\n                point_img_src = void 0;\n\n            switch (point.type) {\n                case _Page.CHECK_INN:\n                    point_class = 'corporateBlue';\n                    point_img_src = '/img/SVG/map_check-in_47x60.svg';\n                    break;\n                case _Page.TEA_SERVICE:\n                    point_class = 'color-tea';\n                    point_img_src = '/img/SVG/button_tea_135x135.svg';\n                    break;\n                case _Page.COUCH_SERVICE:\n                    point_class = 'color-sleep';\n                    point_img_src = '/img/SVG/button_couch_203_135.svg';\n                    break;\n                case _Page.WALK_SERVICE:\n                    point_class = 'color-walk';\n                    point_img_src = '/img/SVG/button_walk_172x135 (1).svg';\n                    break;\n            }\n\n            return _react2.default.createElement(\n                'div',\n                { className: 'row' },\n                _react2.default.createElement(\n                    'div',\n                    { className: 'col-xs-12' },\n                    _react2.default.createElement(\n                        'div',\n                        { className: 'media' },\n                        _react2.default.createElement(\n                            'div',\n                            { className: 'media-left' },\n                            _react2.default.createElement(\n                                'h3',\n                                null,\n                                _react2.default.createElement(\n                                    'a',\n                                    { className: point_class, href: '/service/' + point.id },\n                                    _react2.default.createElement('img', { className: 'img37', src: point_img_src })\n                                )\n                            )\n                        ),\n                        _react2.default.createElement(\n                            'div',\n                            { className: 'media-body media-middle' },\n                            _react2.default.createElement(\n                                'h3',\n                                null,\n                                _react2.default.createElement(\n                                    'a',\n                                    { className: point_class, href: '/service/{{$point->id}}' },\n                                    point.address\n                                )\n                            )\n                        )\n                    ),\n                    point.description,\n                    _react2.default.createElement(\n                        'div',\n                        { className: 'media' },\n                        _react2.default.createElement(\n                            'div',\n                            { className: 'media-left' },\n                            _react2.default.createElement(\n                                'a',\n                                { href: '{{URL::to(\\'/profile/\\' . $point->user_id)}}' },\n                                _react2.default.createElement('img', { src: point.authorAvatar, className: 'img37 circle .mt--5 media-object' })\n                            )\n                        ),\n                        _react2.default.createElement(\n                            'div',\n                            { className: 'media-body' },\n                            _react2.default.createElement(\n                                'h4',\n                                { className: 'media-heading' },\n                                '\\u0410\\u0432\\u0442\\u043E\\u0440:'\n                            ),\n                            _react2.default.createElement(\n                                'a',\n                                { href: '{{URL::to(\\'/profile/\\' . $point->user_id)}}' },\n                                _react2.default.createElement(\n                                    'span',\n                                    { className: 'f600-16 {{$point_class}} pm-0' },\n                                    point.authorName\n                                )\n                            )\n                        )\n                    ),\n                    _react2.default.createElement('hr', null)\n                )\n            );\n        }\n    }]);\n\n    return Page;\n}(_react.Component);\n\n// @foreach($yogaPoints as $point)\n//     @if($point->type=='teaService')\n//         <?php $point_class = \"color-tea\";$point_img_src = \"/img/SVG/button_tea_135x135.svg\"; ?>\n//     @elseif($point->type=='checkInn')\n//         <?php $point_class = \"corporateBlue\";$point_img_src = \"/img/SVG/map_check-in_47x60.svg\"; ?>\n//     @elseif($point->type=='couchService')\n//         <?php $point_class = \"color-sleep\";$point_img_src = \"/img/SVG/button_couch_203_135.svg\"; ?>\n//     @elseif($point->type=='walkServices')\n//         <?php $point_class = \"color-walk\";$point_img_src = \"/img/SVG/button_walk_172x135 (1).svg\"; ?>\n//     @endif\n\n//     <div class=\"media\">\n//         <div class=\"media-left\">\n//             <h3><a class=\"{{$point_class}}\" href=\"/service/{{$point->id}}\">\n//                     <img class=\"img37\" src=\"{{$point_img_src}}\"\n//                          alt=\"\">\n//                 </a>\n//             </h3>\n//         </div>\n//         <div class=\"media-body media-middle\">\n//             <h3><a class=\"{{$point_class}}\" href=\"/service/{{$point->id}}\">{{$point->address}}</a>\n//             </h3>\n//         </div>\n//     </div>\n//     {{$point->description}}\n//     <div class=\"media\">\n//         <div class=\"media-left\">\n//             <a href=\"{{URL::to('/profile/' . $point->user_id)}}\">\n//                 <img src=\"{{isset(\\app\\User::findOrNew($point->user_id)->avatar)?\\app\\User::findOrNew($point->user_id)->avatar:asset('img/SVG/profile_12x13.svg')}}\"\n//                      alt=\"\" class=\"img37 circle .mt--5 media-object\">\n//             </a>\n//         </div>\n//         <div class=\"media-body\">\n//             <h4 class=\"media-heading\">Автор:</h4>\n//             <a href=\"{{URL::to('/profile/' . $point->user_id)}}\">\n//                 <span class=\"f600-16 {{$point_class}} pm-0\">{{\\app\\User::findOrNew($point->user_id)->name}}</span>\n//             </a>\n//         </div>\n//     </div>\n//     <hr>\n// @endforeach\n\n\nexports.default = Page;\n\n/* REACT HOT LOADER */ }).call(this); } finally { if (true) { (function () { var foundReactClasses = module.hot.data && module.hot.data.foundReactClasses || false; if (module.exports && module.makeHot) { var makeExportsHot = __webpack_require__(544); if (makeExportsHot(module, __webpack_require__(410))) { foundReactClasses = true; } var shouldAcceptModule = true && foundReactClasses; if (shouldAcceptModule) { module.hot.accept(function (err) { if (err) { console.error(\"Cannot apply hot update to \" + \"Point.js\" + \": \" + err.message); } }); } } module.hot.dispose(function (data) { data.makeHot = module.makeHot; data.foundReactClasses = foundReactClasses; }); })(); } }\n/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNTQyLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vc3JjL2NvbXBvbmVudHMvUG9pbnQuanM/NzVmYyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgUmVhY3QsIHsgQ29tcG9uZW50IH0gZnJvbSAncmVhY3QnO1xuaW1wb3J0IHtDSEVDS19JTk4sIFRFQV9TRVJWSUNFLCBDT1VDSF9TRVJWSUNFLCBXQUxLX1NFUlZJQ0V9IGZyb20gJy4uL2NvbnN0YW50cy9QYWdlJztcblxuXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBQYWdlIGV4dGVuZHMgQ29tcG9uZW50IHtcblx0cmVuZGVyKCkge1xuXHRcdGxldCB7cG9pbnR9ID0gdGhpcy5wcm9wcztcblx0XHRsZXQgcG9pbnRfY2xhc3MsIHBvaW50X2ltZ19zcmM7XG5cblx0XHRzd2l0Y2gocG9pbnQudHlwZSl7XG5cdFx0XHRjYXNlIENIRUNLX0lOTjpcblx0XHRcdFx0cG9pbnRfY2xhc3MgPSAnY29ycG9yYXRlQmx1ZSc7XG5cdFx0XHRcdHBvaW50X2ltZ19zcmMgPSAnL2ltZy9TVkcvbWFwX2NoZWNrLWluXzQ3eDYwLnN2Zyc7XG5cdFx0XHRcdGJyZWFrO1xuXHRcdFx0Y2FzZSBURUFfU0VSVklDRTpcblx0XHRcdFx0cG9pbnRfY2xhc3MgPSAnY29sb3ItdGVhJztcblx0XHRcdFx0cG9pbnRfaW1nX3NyYyA9ICcvaW1nL1NWRy9idXR0b25fdGVhXzEzNXgxMzUuc3ZnJztcblx0XHRcdFx0YnJlYWs7XG5cdFx0XHRjYXNlIENPVUNIX1NFUlZJQ0U6XG5cdFx0XHRcdHBvaW50X2NsYXNzID0gJ2NvbG9yLXNsZWVwJztcblx0XHRcdFx0cG9pbnRfaW1nX3NyYyA9ICcvaW1nL1NWRy9idXR0b25fY291Y2hfMjAzXzEzNS5zdmcnO1xuXHRcdFx0XHRicmVhaztcblx0XHRcdGNhc2UgV0FMS19TRVJWSUNFOlxuXHRcdFx0XHRwb2ludF9jbGFzcyA9ICdjb2xvci13YWxrJztcblx0XHRcdFx0cG9pbnRfaW1nX3NyYyA9ICcvaW1nL1NWRy9idXR0b25fd2Fsa18xNzJ4MTM1ICgxKS5zdmcnO1xuXHRcdFx0XHRicmVhaztcblx0XHR9XG5cblx0XHRyZXR1cm4gPGRpdiBjbGFzc05hbWUgPSdyb3cnPlxuXHRcdFx0PGRpdiBjbGFzc05hbWU9J2NvbC14cy0xMic+XG5cblxuXG4gICAgPGRpdiBjbGFzc05hbWU9J21lZGlhJz5cbiAgICAgICAgPGRpdiBjbGFzc05hbWU9J21lZGlhLWxlZnQnPlxuICAgICAgICAgICAgPGgzPjxhIGNsYXNzTmFtZT17cG9pbnRfY2xhc3N9IGhyZWY9eyAnL3NlcnZpY2UvJyArIHBvaW50LmlkIH0+XG4gICAgICAgICAgICAgICAgICAgIDxpbWcgY2xhc3NOYW1lPVwiaW1nMzdcIiBzcmM9e3BvaW50X2ltZ19zcmN9IC8+XG4gICAgICAgICAgICAgICAgPC9hPlxuICAgICAgICAgICAgPC9oMz5cbiAgICAgICAgPC9kaXY+XG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwibWVkaWEtYm9keSBtZWRpYS1taWRkbGVcIj5cbiAgICAgICAgICAgIDxoMz48YSBjbGFzc05hbWU9e3BvaW50X2NsYXNzfSBocmVmPVwiL3NlcnZpY2Uve3skcG9pbnQtPmlkfX1cIj57cG9pbnQuYWRkcmVzc308L2E+XG4gICAgICAgICAgICA8L2gzPlxuICAgICAgICA8L2Rpdj5cbiAgICA8L2Rpdj5cbiAgICB7cG9pbnQuZGVzY3JpcHRpb259XG4gICAgPGRpdiBjbGFzc05hbWU9XCJtZWRpYVwiPlxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIm1lZGlhLWxlZnRcIj5cbiAgICAgICAgICAgIDxhIGhyZWY9XCJ7e1VSTDo6dG8oJy9wcm9maWxlLycgLiAkcG9pbnQtPnVzZXJfaWQpfX1cIj5cbiAgICAgICAgICAgICAgICA8aW1nIHNyYz17cG9pbnQuYXV0aG9yQXZhdGFyfSBjbGFzc05hbWU9XCJpbWczNyBjaXJjbGUgLm10LS01IG1lZGlhLW9iamVjdFwiIC8+XG4gICAgICAgICAgICA8L2E+XG4gICAgICAgIDwvZGl2PlxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIm1lZGlhLWJvZHlcIj5cbiAgICAgICAgICAgIDxoNCBjbGFzc05hbWU9XCJtZWRpYS1oZWFkaW5nXCI+0JDQstGC0L7RgDo8L2g0PlxuICAgICAgICAgICAgPGEgaHJlZj1cInt7VVJMOjp0bygnL3Byb2ZpbGUvJyAuICRwb2ludC0+dXNlcl9pZCl9fVwiPlxuICAgICAgICAgICAgICAgIDxzcGFuIGNsYXNzTmFtZT1cImY2MDAtMTYge3skcG9pbnRfY2xhc3N9fSBwbS0wXCI+e3BvaW50LmF1dGhvck5hbWV9PC9zcGFuPlxuICAgICAgICAgICAgPC9hPlxuICAgICAgICA8L2Rpdj5cbiAgICA8L2Rpdj5cbiAgICA8aHIvPlxuXG5cblxuXG5cblxuXG5cblx0XHRcdFx0XG5cdFx0XHQ8L2Rpdj5cblx0XHQ8L2Rpdj47XG5cdH1cbn1cblxuXG4vLyBAZm9yZWFjaCgkeW9nYVBvaW50cyBhcyAkcG9pbnQpXG4vLyAgICAgQGlmKCRwb2ludC0+dHlwZT09J3RlYVNlcnZpY2UnKVxuLy8gICAgICAgICA8P3BocCAkcG9pbnRfY2xhc3MgPSBcImNvbG9yLXRlYVwiOyRwb2ludF9pbWdfc3JjID0gXCIvaW1nL1NWRy9idXR0b25fdGVhXzEzNXgxMzUuc3ZnXCI7ID8+XG4vLyAgICAgQGVsc2VpZigkcG9pbnQtPnR5cGU9PSdjaGVja0lubicpXG4vLyAgICAgICAgIDw/cGhwICRwb2ludF9jbGFzcyA9IFwiY29ycG9yYXRlQmx1ZVwiOyRwb2ludF9pbWdfc3JjID0gXCIvaW1nL1NWRy9tYXBfY2hlY2staW5fNDd4NjAuc3ZnXCI7ID8+XG4vLyAgICAgQGVsc2VpZigkcG9pbnQtPnR5cGU9PSdjb3VjaFNlcnZpY2UnKVxuLy8gICAgICAgICA8P3BocCAkcG9pbnRfY2xhc3MgPSBcImNvbG9yLXNsZWVwXCI7JHBvaW50X2ltZ19zcmMgPSBcIi9pbWcvU1ZHL2J1dHRvbl9jb3VjaF8yMDNfMTM1LnN2Z1wiOyA/PlxuLy8gICAgIEBlbHNlaWYoJHBvaW50LT50eXBlPT0nd2Fsa1NlcnZpY2VzJylcbi8vICAgICAgICAgPD9waHAgJHBvaW50X2NsYXNzID0gXCJjb2xvci13YWxrXCI7JHBvaW50X2ltZ19zcmMgPSBcIi9pbWcvU1ZHL2J1dHRvbl93YWxrXzE3MngxMzUgKDEpLnN2Z1wiOyA/PlxuLy8gICAgIEBlbmRpZlxuXG4vLyAgICAgPGRpdiBjbGFzcz1cIm1lZGlhXCI+XG4vLyAgICAgICAgIDxkaXYgY2xhc3M9XCJtZWRpYS1sZWZ0XCI+XG4vLyAgICAgICAgICAgICA8aDM+PGEgY2xhc3M9XCJ7eyRwb2ludF9jbGFzc319XCIgaHJlZj1cIi9zZXJ2aWNlL3t7JHBvaW50LT5pZH19XCI+XG4vLyAgICAgICAgICAgICAgICAgICAgIDxpbWcgY2xhc3M9XCJpbWczN1wiIHNyYz1cInt7JHBvaW50X2ltZ19zcmN9fVwiXG4vLyAgICAgICAgICAgICAgICAgICAgICAgICAgYWx0PVwiXCI+XG4vLyAgICAgICAgICAgICAgICAgPC9hPlxuLy8gICAgICAgICAgICAgPC9oMz5cbi8vICAgICAgICAgPC9kaXY+XG4vLyAgICAgICAgIDxkaXYgY2xhc3M9XCJtZWRpYS1ib2R5IG1lZGlhLW1pZGRsZVwiPlxuLy8gICAgICAgICAgICAgPGgzPjxhIGNsYXNzPVwie3skcG9pbnRfY2xhc3N9fVwiIGhyZWY9XCIvc2VydmljZS97eyRwb2ludC0+aWR9fVwiPnt7JHBvaW50LT5hZGRyZXNzfX08L2E+XG4vLyAgICAgICAgICAgICA8L2gzPlxuLy8gICAgICAgICA8L2Rpdj5cbi8vICAgICA8L2Rpdj5cbi8vICAgICB7eyRwb2ludC0+ZGVzY3JpcHRpb259fVxuLy8gICAgIDxkaXYgY2xhc3M9XCJtZWRpYVwiPlxuLy8gICAgICAgICA8ZGl2IGNsYXNzPVwibWVkaWEtbGVmdFwiPlxuLy8gICAgICAgICAgICAgPGEgaHJlZj1cInt7VVJMOjp0bygnL3Byb2ZpbGUvJyAuICRwb2ludC0+dXNlcl9pZCl9fVwiPlxuLy8gICAgICAgICAgICAgICAgIDxpbWcgc3JjPVwie3tpc3NldChcXGFwcFxcVXNlcjo6ZmluZE9yTmV3KCRwb2ludC0+dXNlcl9pZCktPmF2YXRhcik/XFxhcHBcXFVzZXI6OmZpbmRPck5ldygkcG9pbnQtPnVzZXJfaWQpLT5hdmF0YXI6YXNzZXQoJ2ltZy9TVkcvcHJvZmlsZV8xMngxMy5zdmcnKX19XCJcbi8vICAgICAgICAgICAgICAgICAgICAgIGFsdD1cIlwiIGNsYXNzPVwiaW1nMzcgY2lyY2xlIC5tdC0tNSBtZWRpYS1vYmplY3RcIj5cbi8vICAgICAgICAgICAgIDwvYT5cbi8vICAgICAgICAgPC9kaXY+XG4vLyAgICAgICAgIDxkaXYgY2xhc3M9XCJtZWRpYS1ib2R5XCI+XG4vLyAgICAgICAgICAgICA8aDQgY2xhc3M9XCJtZWRpYS1oZWFkaW5nXCI+0JDQstGC0L7RgDo8L2g0PlxuLy8gICAgICAgICAgICAgPGEgaHJlZj1cInt7VVJMOjp0bygnL3Byb2ZpbGUvJyAuICRwb2ludC0+dXNlcl9pZCl9fVwiPlxuLy8gICAgICAgICAgICAgICAgIDxzcGFuIGNsYXNzPVwiZjYwMC0xNiB7eyRwb2ludF9jbGFzc319IHBtLTBcIj57e1xcYXBwXFxVc2VyOjpmaW5kT3JOZXcoJHBvaW50LT51c2VyX2lkKS0+bmFtZX19PC9zcGFuPlxuLy8gICAgICAgICAgICAgPC9hPlxuLy8gICAgICAgICA8L2Rpdj5cbi8vICAgICA8L2Rpdj5cbi8vICAgICA8aHI+XG4vLyBAZW5kZm9yZWFjaFxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9jb21wb25lbnRzL1BvaW50LmpzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFDQTs7O0FBQUE7QUFDQTs7Ozs7Ozs7O0FBRUE7Ozs7Ozs7Ozs7O0FBQ0E7QUFBQTtBQUNBO0FBQ0E7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWhCQTtBQUNBO0FBa0JBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUlBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBREE7QUFBQTtBQURBO0FBTUE7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBREE7QUFQQTtBQVlBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFEQTtBQURBO0FBS0E7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFEQTtBQUZBO0FBTkE7QUFhQTtBQTlCQTtBQURBO0FBMkNBOzs7Ozs7QUFJQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWpIQTtBQUNBOzsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }

})