webpackHotUpdate(0,{

/***/ 540:
/***/ function(module, exports, __webpack_require__) {

	eval("/* WEBPACK VAR INJECTION */(function(module) {/* REACT HOT LOADER */ if (true) { (function () { var ReactHotAPI = __webpack_require__(310), RootInstanceProvider = __webpack_require__(318), ReactMount = __webpack_require__(320), React = __webpack_require__(410); module.makeHot = module.hot.data ? module.hot.data.makeHot : ReactHotAPI(function () { return RootInstanceProvider.getRootInstances(ReactMount); }, React); })(); } try { (function () {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n  value: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nvar _react = __webpack_require__(410);\n\nvar _react2 = _interopRequireDefault(_react);\n\nvar _redux = __webpack_require__(508);\n\nvar _reactRedux = __webpack_require__(501);\n\nvar _Page = __webpack_require__(541);\n\nvar _Page2 = _interopRequireDefault(_Page);\n\nvar _PageActions = __webpack_require__(547);\n\nvar pageActions = _interopRequireWildcard(_PageActions);\n\nfunction _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError(\"this hasn't been initialised - super() hasn't been called\"); } return call && (typeof call === \"object\" || typeof call === \"function\") ? call : self; }\n\nfunction _inherits(subClass, superClass) { if (typeof superClass !== \"function\" && superClass !== null) { throw new TypeError(\"Super expression must either be null or a function, not \" + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }\n\nvar App = function (_Component) {\n  _inherits(App, _Component);\n\n  function App() {\n    _classCallCheck(this, App);\n\n    return _possibleConstructorReturn(this, (App.__proto__ || Object.getPrototypeOf(App)).apply(this, arguments));\n  }\n\n  _createClass(App, [{\n    key: 'render',\n    value: function render() {\n      var page = this.props.page;\n      var setShowMode = this.props.pageActions.setShowMode;\n\n\n      return _react2.default.createElement(\n        'div',\n        null,\n        _react2.default.createElement(_Page2.default, { key: page.points.id, points: page.points, showMode: page.showMode, setShowMode: setShowMode })\n      );\n    }\n  }]);\n\n  return App;\n}(_react.Component);\n\nfunction mapStateToProps(state) {\n  return {\n    page: state.page\n  };\n}\n\nfunction mapDispatchToProps(dispatch) {\n  return {\n    pageActions: (0, _redux.bindActionCreators)(pageActions, dispatch)\n  };\n}\n\nexports.default = (0, _reactRedux.connect)(mapStateToProps, mapDispatchToProps)(App);\n\n/* REACT HOT LOADER */ }).call(this); } finally { if (true) { (function () { var foundReactClasses = module.hot.data && module.hot.data.foundReactClasses || false; if (module.exports && module.makeHot) { var makeExportsHot = __webpack_require__(543); if (makeExportsHot(module, __webpack_require__(410))) { foundReactClasses = true; } var shouldAcceptModule = true && foundReactClasses; if (shouldAcceptModule) { module.hot.accept(function (err) { if (err) { console.error(\"Cannot apply hot update to \" + \"App.js\" + \": \" + err.message); } }); } } module.hot.dispose(function (data) { data.makeHot = module.makeHot; data.foundReactClasses = foundReactClasses; }); })(); } }\n/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNTQwLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vc3JjL2NvbnRhaW5lcnMvQXBwLmpzP2ViNWEiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJlYWN0LCB7IENvbXBvbmVudCB9IGZyb20gJ3JlYWN0JztcbmltcG9ydCB7IGJpbmRBY3Rpb25DcmVhdG9ycyB9IGZyb20gJ3JlZHV4JztcbmltcG9ydCB7IGNvbm5lY3QgfSBmcm9tICdyZWFjdC1yZWR1eCc7XG5pbXBvcnQgUGFnZSBmcm9tICcuLi9jb21wb25lbnRzL1BhZ2UnO1xuaW1wb3J0ICogYXMgcGFnZUFjdGlvbnMgZnJvbSAnLi4vYWN0aW9ucy9QYWdlQWN0aW9ucyc7XG5cbmNsYXNzIEFwcCBleHRlbmRzIENvbXBvbmVudCB7XG5cbiAgcmVuZGVyKCkge1xuICAgIGNvbnN0IHsgcGFnZSB9ID0gdGhpcy5wcm9wcztcbiAgICBjb25zdCB7IHNldFNob3dNb2RlIH0gPSB0aGlzLnByb3BzLnBhZ2VBY3Rpb25zO1xuXG4gICAgcmV0dXJuIDxkaXY+XG4gICAgICA8UGFnZSBrZXk9e3BhZ2UucG9pbnRzLmlkfSBwb2ludHM9e3BhZ2UucG9pbnRzfSBzaG93TW9kZT17cGFnZS5zaG93TW9kZX0gc2V0U2hvd01vZGU9e3NldFNob3dNb2RlfSAvPlxuICAgIDwvZGl2PjtcbiAgfVxufVxuXG5mdW5jdGlvbiBtYXBTdGF0ZVRvUHJvcHMgKHN0YXRlKSB7XG4gIHJldHVybiB7XG4gICAgcGFnZTogc3RhdGUucGFnZVxuICB9O1xufVxuXG5mdW5jdGlvbiBtYXBEaXNwYXRjaFRvUHJvcHMoZGlzcGF0Y2gpIHtcbiAgcmV0dXJuIHtcbiAgICBwYWdlQWN0aW9uczogYmluZEFjdGlvbkNyZWF0b3JzKHBhZ2VBY3Rpb25zLCBkaXNwYXRjaClcbiAgfTtcbn1cblxuZXhwb3J0IGRlZmF1bHQgY29ubmVjdChtYXBTdGF0ZVRvUHJvcHMsIG1hcERpc3BhdGNoVG9Qcm9wcykoQXBwKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvY29udGFpbmVycy9BcHAuanMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUNBOzs7QUFBQTtBQUNBO0FBQUE7QUFDQTtBQUFBO0FBQ0E7OztBQUFBO0FBQ0E7QUFEQTtBQUNBOzs7Ozs7Ozs7OztBQUNBOzs7Ozs7Ozs7OztBQUVBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFFQTtBQUFBO0FBQUE7QUFDQTtBQURBO0FBR0E7Ozs7OztBQUdBO0FBQ0E7QUFDQTtBQURBO0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQURBO0FBR0E7QUFDQTtBQUNBO0FBQ0E7OyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ },

/***/ 541:
/***/ function(module, exports, __webpack_require__) {

	eval("/* WEBPACK VAR INJECTION */(function(module) {/* REACT HOT LOADER */ if (true) { (function () { var ReactHotAPI = __webpack_require__(310), RootInstanceProvider = __webpack_require__(318), ReactMount = __webpack_require__(320), React = __webpack_require__(410); module.makeHot = module.hot.data ? module.hot.data.makeHot : ReactHotAPI(function () { return RootInstanceProvider.getRootInstances(ReactMount); }, React); })(); } try { (function () {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nvar _react = __webpack_require__(410);\n\nvar _react2 = _interopRequireDefault(_react);\n\nvar _Point = __webpack_require__(542);\n\nvar _Point2 = _interopRequireDefault(_Point);\n\nvar _Page = __webpack_require__(546);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError(\"this hasn't been initialised - super() hasn't been called\"); } return call && (typeof call === \"object\" || typeof call === \"function\") ? call : self; }\n\nfunction _inherits(subClass, superClass) { if (typeof superClass !== \"function\" && superClass !== null) { throw new TypeError(\"Super expression must either be null or a function, not \" + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }\n\nvar Page = function (_Component) {\n    _inherits(Page, _Component);\n\n    function Page() {\n        _classCallCheck(this, Page);\n\n        return _possibleConstructorReturn(this, (Page.__proto__ || Object.getPrototypeOf(Page)).apply(this, arguments));\n    }\n\n    _createClass(Page, [{\n        key: 'onYearBtnClick',\n        value: function onYearBtnClick(e) {\n            this.props.setShowMode(e.target.innerText);\n        }\n    }, {\n        key: 'render',\n        value: function render() {\n            var _props = this.props,\n                points = _props.points,\n                showMode = _props.showMode;\n\n            return _react2.default.createElement(\n                'div',\n                null,\n                '// ',\n                _react2.default.createElement(\n                    'nav',\n                    { className: 'navbar navbar-default navbar-fixed-top newsNavbar' },\n                    '//  ',\n                    _react2.default.createElement(\n                        'div',\n                        { className: 'container' },\n                        '//   ',\n                        _react2.default.createElement(\n                            'button',\n                            { type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n                            _Page.ALL\n                        ),\n                        '//   ',\n                        _react2.default.createElement(\n                            'button',\n                            { type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n                            _Page.CHECK_INN\n                        ),\n                        '//   ',\n                        _react2.default.createElement(\n                            'button',\n                            { type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n                            _Page.TEA_SERVICE\n                        ),\n                        '//   ',\n                        _react2.default.createElement(\n                            'button',\n                            { type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n                            _Page.COUCH_SERVICE\n                        ),\n                        '//   ',\n                        _react2.default.createElement(\n                            'button',\n                            { type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n                            _Page.WALK_SERVICE\n                        ),\n                        '//  '\n                    ),\n                    '// '\n                ),\n                _react2.default.createElement(\n                    'div',\n                    { id: 'over_map' },\n                    _react2.default.createElement(\n                        'div',\n                        { 'class': 'hidden-xs mapInfoPanelWrapper' },\n                        _react2.default.createElement(\n                            'div',\n                            { 'class': 'mapInfoPanel' },\n                            _react2.default.createElement('img', { src: '/img/SVG/menu_map/left_circle_98x85.png', alt: '' }),\n                            _react2.default.createElement(\n                                'div',\n                                { 'class': 'mapInfoPanelCenter inline', 'data-toggle': 'buttons' },\n                                _react2.default.createElement(\n                                    'label',\n                                    { 'class': 'mapInfoPanelBtn btn btn-checkInn', onclick: 'toggleGreyAll()' },\n                                    _react2.default.createElement('input', { 'class': 'checkInnBox', type: 'checkbox', autocomplete: 'off', id: 'inputAll' })\n                                ),\n                                _react2.default.createElement('span', { 'class': 'mapInfoPanelCell checkInnString', id: 'checkInnAll' }),\n                                _react2.default.createElement(\n                                    'label',\n                                    { 'class': 'mapInfoPanelBtn btn btn-tea', onclick: 'toggleGreyTea()' },\n                                    _react2.default.createElement('input', { 'class': 'teaPointsBox', type: 'checkbox', autocomplete: 'off',\n                                        id: 'inputTea' })\n                                ),\n                                _react2.default.createElement('span', { 'class': 'mapInfoPanelCell teaString', id: 'checkInnTea' }),\n                                _react2.default.createElement(\n                                    'label',\n                                    { 'class': 'mapInfoPanelBtn btn btn-couch', onclick: 'toggleGreySleep()' },\n                                    _react2.default.createElement('input', { 'class': 'couchPointsBox', type: 'checkbox', autocomplete: 'off',\n                                        id: 'inputSleep' })\n                                ),\n                                _react2.default.createElement('span', { 'class': 'mapInfoPanelCell couchString', id: 'checkInnSleep' }),\n                                _react2.default.createElement(\n                                    'label',\n                                    { 'class': 'mapInfoPanelBtn btn btn-walk', onclick: 'toggleGreyWalk()' },\n                                    _react2.default.createElement('input', { 'class': 'tableCell walkPointsBox', type: 'checkbox', autocomplete: 'off',\n                                        id: 'inputWalk' })\n                                ),\n                                _react2.default.createElement('span', { 'class': 'mapInfoPanelCell walkString', id: 'checkInnWalk' }),\n                                _react2.default.createElement('input', { id: 'pac-input', 'class': 'pull-right controls pac-input pac-input1', type: 'text',\n                                    placeholder: '\\u041F\\u043E\\u0438\\u0441\\u043A \\u043F\\u043E \\u0430\\u0434\\u0440\\u0435\\u0441\\u0443' })\n                            ),\n                            _react2.default.createElement('img', { src: '/img/SVG/menu_map/right_circle_98x85.png', alt: '' })\n                        )\n                    )\n                ),\n                _react2.default.createElement(\n                    'div',\n                    { className: 'newsContent' },\n                    points.length == 0 ? _react2.default.createElement(\n                        'div',\n                        { className: 'text-center' },\n                        _react2.default.createElement(\n                            'h3',\n                            null,\n                            '\\u0417\\u0430\\u0433\\u0440\\u0443\\u0436\\u0430\\u0435\\u043C \\u0441\\u043E\\u0431\\u044B\\u0442\\u0438\\u044F'\n                        ),\n                        _react2.default.createElement('div', { className: 'loader' })\n                    ) : points.map(function (point) {\n                        return showMode.indexOf(_Page.ALL) != -1 ? _react2.default.createElement(_Point2.default, { key: point.id, authorName: point.authorName }) : showMode.indexOf(point.type) != -1 ? _react2.default.createElement(_Point2.default, { key: point.id, authorName: point.authorName }) : _react2.default.createElement('span', null);\n                    })\n                )\n            );\n        }\n    }]);\n\n    return Page;\n}(_react.Component);\n\nexports.default = Page;\n\n\nPage.propTypes = {\n    points: _react.PropTypes.array.isRequired,\n    setShowMode: _react.PropTypes.func.isRequired\n};\n\n/* REACT HOT LOADER */ }).call(this); } finally { if (true) { (function () { var foundReactClasses = module.hot.data && module.hot.data.foundReactClasses || false; if (module.exports && module.makeHot) { var makeExportsHot = __webpack_require__(543); if (makeExportsHot(module, __webpack_require__(410))) { foundReactClasses = true; } var shouldAcceptModule = true && foundReactClasses; if (shouldAcceptModule) { module.hot.accept(function (err) { if (err) { console.error(\"Cannot apply hot update to \" + \"Page.js\" + \": \" + err.message); } }); } } module.hot.dispose(function (data) { data.makeHot = module.makeHot; data.foundReactClasses = foundReactClasses; }); })(); } }\n/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNTQxLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vc3JjL2NvbXBvbmVudHMvUGFnZS5qcz9kNzA2Il0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSZWFjdCwgeyBQcm9wVHlwZXMsIENvbXBvbmVudCB9IGZyb20gJ3JlYWN0JztcbmltcG9ydCBQb2ludCBmcm9tICcuLi9jb21wb25lbnRzL1BvaW50JztcbmltcG9ydCB7QUxMLCBDSEVDS19JTk4sIFRFQV9TRVJWSUNFLCBDT1VDSF9TRVJWSUNFLCBXQUxLX1NFUlZJQ0V9IGZyb20gJy4uL2NvbnN0YW50cy9QYWdlJztcblxuZXhwb3J0IGRlZmF1bHQgY2xhc3MgUGFnZSBleHRlbmRzIENvbXBvbmVudCB7XG5cdG9uWWVhckJ0bkNsaWNrKGUpIHtcblx0XHR0aGlzLnByb3BzLnNldFNob3dNb2RlKGUudGFyZ2V0LmlubmVyVGV4dCk7XG5cdH1cblx0cmVuZGVyKCkge1xuXHRcdGNvbnN0IHsgcG9pbnRzLCBzaG93TW9kZSB9ID0gdGhpcy5wcm9wcztcblx0XHRyZXR1cm4gPGRpdj5cblx0XHRcdC8vIDxuYXYgY2xhc3NOYW1lPSduYXZiYXIgbmF2YmFyLWRlZmF1bHQgbmF2YmFyLWZpeGVkLXRvcCBuZXdzTmF2YmFyJz5cblx0XHRcdC8vIFx0PGRpdiBjbGFzc05hbWU9J2NvbnRhaW5lcic+XG5cdFx0XHQvLyBcdFx0PGJ1dHRvbiB0eXBlPSdidXR0b24nIGNsYXNzTmFtZT0nYnRuIGJ0bi1kZWZhdWx0IG5hdmJhci1idG4nIG9uQ2xpY2s9ezo6dGhpcy5vblllYXJCdG5DbGlja30+e0FMTH08L2J1dHRvbj5cblx0XHRcdC8vIFx0XHQ8YnV0dG9uIHR5cGU9J2J1dHRvbicgY2xhc3NOYW1lPSdidG4gYnRuLWRlZmF1bHQgbmF2YmFyLWJ0bicgb25DbGljaz17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfT57Q0hFQ0tfSU5OfTwvYnV0dG9uPlxuXHRcdFx0Ly8gXHRcdDxidXR0b24gdHlwZT0nYnV0dG9uJyBjbGFzc05hbWU9J2J0biBidG4tZGVmYXVsdCBuYXZiYXItYnRuJyBvbkNsaWNrPXs6OnRoaXMub25ZZWFyQnRuQ2xpY2t9PntURUFfU0VSVklDRX08L2J1dHRvbj5cblx0XHRcdC8vIFx0XHQ8YnV0dG9uIHR5cGU9J2J1dHRvbicgY2xhc3NOYW1lPSdidG4gYnRuLWRlZmF1bHQgbmF2YmFyLWJ0bicgb25DbGljaz17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfT57Q09VQ0hfU0VSVklDRX08L2J1dHRvbj5cblx0XHRcdC8vIFx0XHQ8YnV0dG9uIHR5cGU9J2J1dHRvbicgY2xhc3NOYW1lPSdidG4gYnRuLWRlZmF1bHQgbmF2YmFyLWJ0bicgb25DbGljaz17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfT57V0FMS19TRVJWSUNFfTwvYnV0dG9uPlxuXHRcdFx0Ly8gXHQ8L2Rpdj5cblx0XHRcdC8vIDwvbmF2PlxuICAgICAgICAgICAgPGRpdiBpZD1cIm92ZXJfbWFwXCI+XG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImhpZGRlbi14cyBtYXBJbmZvUGFuZWxXcmFwcGVyXCI+XG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJtYXBJbmZvUGFuZWxcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxpbWcgc3JjPVwiL2ltZy9TVkcvbWVudV9tYXAvbGVmdF9jaXJjbGVfOTh4ODUucG5nXCIgYWx0PVwiXCIgLz5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJtYXBJbmZvUGFuZWxDZW50ZXIgaW5saW5lXCIgZGF0YS10b2dnbGU9XCJidXR0b25zXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGNsYXNzPVwibWFwSW5mb1BhbmVsQnRuIGJ0biBidG4tY2hlY2tJbm5cIiBvbmNsaWNrPVwidG9nZ2xlR3JleUFsbCgpXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbnB1dCBjbGFzcz1cImNoZWNrSW5uQm94XCIgdHlwZT1cImNoZWNrYm94XCIgYXV0b2NvbXBsZXRlPVwib2ZmXCIgaWQ9XCJpbnB1dEFsbFwiIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9sYWJlbD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuIGNsYXNzPVwibWFwSW5mb1BhbmVsQ2VsbCBjaGVja0lublN0cmluZ1wiIGlkPVwiY2hlY2tJbm5BbGxcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvc3Bhbj5cblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxsYWJlbCBjbGFzcz1cIm1hcEluZm9QYW5lbEJ0biBidG4gYnRuLXRlYVwiIG9uY2xpY2s9XCJ0b2dnbGVHcmV5VGVhKClcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGlucHV0IGNsYXNzPVwidGVhUG9pbnRzQm94XCIgdHlwZT1cImNoZWNrYm94XCIgYXV0b2NvbXBsZXRlPVwib2ZmXCJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlkPVwiaW5wdXRUZWFcIiAvPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvbGFiZWw+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cIm1hcEluZm9QYW5lbENlbGwgdGVhU3RyaW5nXCIgaWQ9XCJjaGVja0lublRlYVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3NwYW4+XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8bGFiZWwgY2xhc3M9XCJtYXBJbmZvUGFuZWxCdG4gYnRuIGJ0bi1jb3VjaFwiIG9uY2xpY2s9XCJ0b2dnbGVHcmV5U2xlZXAoKVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgY2xhc3M9XCJjb3VjaFBvaW50c0JveFwiIHR5cGU9XCJjaGVja2JveFwiIGF1dG9jb21wbGV0ZT1cIm9mZlwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZD1cImlucHV0U2xlZXBcIiAvPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvbGFiZWw+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cIm1hcEluZm9QYW5lbENlbGwgY291Y2hTdHJpbmdcIiBpZD1cImNoZWNrSW5uU2xlZXBcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvc3Bhbj5cblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxsYWJlbCBjbGFzcz1cIm1hcEluZm9QYW5lbEJ0biBidG4gYnRuLXdhbGtcIiBvbmNsaWNrPVwidG9nZ2xlR3JleVdhbGsoKVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgY2xhc3M9XCJ0YWJsZUNlbGwgd2Fsa1BvaW50c0JveFwiIHR5cGU9XCJjaGVja2JveFwiIGF1dG9jb21wbGV0ZT1cIm9mZlwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZD1cImlucHV0V2Fsa1wiIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9sYWJlbD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuIGNsYXNzPVwibWFwSW5mb1BhbmVsQ2VsbCB3YWxrU3RyaW5nXCIgaWQ9XCJjaGVja0lubldhbGtcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvc3Bhbj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgaWQ9XCJwYWMtaW5wdXRcIiBjbGFzcz1cInB1bGwtcmlnaHQgY29udHJvbHMgcGFjLWlucHV0IHBhYy1pbnB1dDFcIiB0eXBlPVwidGV4dFwiXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyPVwi0J/QvtC40YHQuiDQv9C+INCw0LTRgNC10YHRg1wiIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxpbWcgc3JjPVwiL2ltZy9TVkcvbWVudV9tYXAvcmlnaHRfY2lyY2xlXzk4eDg1LnBuZ1wiIGFsdD1cIlwiIC8+XG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgPC9kaXY+XG5cblxuXHRcdFx0PGRpdiBjbGFzc05hbWU9J25ld3NDb250ZW50Jz5cblx0XHRcdFx0e3BvaW50cy5sZW5ndGggPT0gMCA/IFxuXHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPSd0ZXh0LWNlbnRlcic+XG5cdFx0XHRcdFx0XHQ8aDM+0JfQsNCz0YDRg9C20LDQtdC8INGB0L7QsdGL0YLQuNGPPC9oMz5cblx0XHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPSdsb2FkZXInPjwvZGl2PlxuXHRcdFx0XHRcdDwvZGl2PiA6XG5cdFx0XHRcdFx0cG9pbnRzLm1hcChwb2ludCA9PiB7XG5cdFx0XHRcdFx0XHRyZXR1cm4gc2hvd01vZGUuaW5kZXhPZihBTEwpICE9IC0xID8gPFBvaW50IGtleT17cG9pbnQuaWR9IGF1dGhvck5hbWU9e3BvaW50LmF1dGhvck5hbWV9IC8+IDpcblx0XHRcdFx0XHRcdFx0c2hvd01vZGUuaW5kZXhPZihwb2ludC50eXBlKSAhPSAtMSA/IDxQb2ludCBrZXk9e3BvaW50LmlkfSBhdXRob3JOYW1lPXtwb2ludC5hdXRob3JOYW1lfSAvPiA6XG5cdFx0XHRcdFx0XHRcdFx0PHNwYW4gLz47XG5cdFx0XHRcdFx0fSl9XG5cdFx0XHQ8L2Rpdj5cblx0XHQ8L2Rpdj47XG5cdH1cbn1cblxuUGFnZS5wcm9wVHlwZXMgPSB7XG5cdHBvaW50czogUHJvcFR5cGVzLmFycmF5LmlzUmVxdWlyZWQsXG5cdHNldFNob3dNb2RlOiBQcm9wVHlwZXMuZnVuYy5pc1JlcXVpcmVkXG59O1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9jb21wb25lbnRzL1BhZ2UuanMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUNBOzs7QUFBQTtBQUNBOzs7QUFBQTtBQUNBOzs7Ozs7Ozs7QUFDQTs7Ozs7Ozs7Ozs7QUFDQTtBQUNBO0FBQ0E7OztBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBREE7QUFFQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBRkE7QUFHQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSEE7QUFJQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSkE7QUFLQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBTEE7QUFBQTtBQURBO0FBQUE7QUFTQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUNBO0FBREE7QUFHQTtBQUlBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFGQTtBQUlBO0FBSUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUZBO0FBSUE7QUFJQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBRkE7QUFJQTtBQUdBO0FBQ0E7QUFoQ0E7QUFrQ0E7QUFwQ0E7QUFEQTtBQURBO0FBNENBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUZBO0FBS0E7QUFHQTtBQVZBO0FBdERBO0FBbUVBOzs7Ozs7QUF6RUE7QUFDQTtBQUNBO0FBMEVBO0FBQ0E7QUFDQTtBQUZBO0FBQ0E7OyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ },

/***/ 542:
/***/ function(module, exports, __webpack_require__) {

	eval("/* WEBPACK VAR INJECTION */(function(module) {/* REACT HOT LOADER */ if (true) { (function () { var ReactHotAPI = __webpack_require__(310), RootInstanceProvider = __webpack_require__(318), ReactMount = __webpack_require__(320), React = __webpack_require__(410); module.makeHot = module.hot.data ? module.hot.data.makeHot : ReactHotAPI(function () { return RootInstanceProvider.getRootInstances(ReactMount); }, React); })(); } try { (function () {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n\tvalue: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nvar _react = __webpack_require__(410);\n\nvar _react2 = _interopRequireDefault(_react);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError(\"this hasn't been initialised - super() hasn't been called\"); } return call && (typeof call === \"object\" || typeof call === \"function\") ? call : self; }\n\nfunction _inherits(subClass, superClass) { if (typeof superClass !== \"function\" && superClass !== null) { throw new TypeError(\"Super expression must either be null or a function, not \" + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }\n\nvar Page = function (_Component) {\n\t_inherits(Page, _Component);\n\n\tfunction Page() {\n\t\t_classCallCheck(this, Page);\n\n\t\treturn _possibleConstructorReturn(this, (Page.__proto__ || Object.getPrototypeOf(Page)).apply(this, arguments));\n\t}\n\n\t_createClass(Page, [{\n\t\tkey: 'render',\n\t\tvalue: function render() {\n\t\t\treturn _react2.default.createElement(\n\t\t\t\t'div',\n\t\t\t\t{ className: 'row' },\n\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t'h3',\n\t\t\t\t\tnull,\n\t\t\t\t\t'\\u0421\\u043E\\u0437\\u0434\\u0430\\u043B ',\n\t\t\t\t\tthis.props.authorName\n\t\t\t\t)\n\t\t\t);\n\t\t}\n\t}]);\n\n\treturn Page;\n}(_react.Component);\n\nexports.default = Page;\n\n/* REACT HOT LOADER */ }).call(this); } finally { if (true) { (function () { var foundReactClasses = module.hot.data && module.hot.data.foundReactClasses || false; if (module.exports && module.makeHot) { var makeExportsHot = __webpack_require__(543); if (makeExportsHot(module, __webpack_require__(410))) { foundReactClasses = true; } var shouldAcceptModule = true && foundReactClasses; if (shouldAcceptModule) { module.hot.accept(function (err) { if (err) { console.error(\"Cannot apply hot update to \" + \"Point.js\" + \": \" + err.message); } }); } } module.hot.dispose(function (data) { data.makeHot = module.makeHot; data.foundReactClasses = foundReactClasses; }); })(); } }\n/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNTQyLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vc3JjL2NvbXBvbmVudHMvUG9pbnQuanM/NzVmYyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgUmVhY3QsIHsgQ29tcG9uZW50IH0gZnJvbSAncmVhY3QnO1xuXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBQYWdlIGV4dGVuZHMgQ29tcG9uZW50IHtcblx0cmVuZGVyKCkge1xuXHRcdHJldHVybiA8ZGl2IGNsYXNzTmFtZSA9J3Jvdyc+XG5cdFx0XHQ8aDM+0KHQvtC30LTQsNC7IHt0aGlzLnByb3BzLmF1dGhvck5hbWV9PC9oMz5cblx0XHQ8L2Rpdj47XG5cdH1cbn1cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvY29tcG9uZW50cy9Qb2ludC5qcyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQ0E7Ozs7Ozs7Ozs7O0FBQ0E7Ozs7Ozs7Ozs7O0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFEQTtBQUdBOzs7Ozs7QUFMQTtBQUNBOzsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }

})