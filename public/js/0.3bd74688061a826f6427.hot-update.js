webpackHotUpdate(0,{

/***/ 541:
/***/ function(module, exports, __webpack_require__) {

	eval("/* WEBPACK VAR INJECTION */(function(module) {/* REACT HOT LOADER */ if (true) { (function () { var ReactHotAPI = __webpack_require__(310), RootInstanceProvider = __webpack_require__(318), ReactMount = __webpack_require__(320), React = __webpack_require__(410); module.makeHot = module.hot.data ? module.hot.data.makeHot : ReactHotAPI(function () { return RootInstanceProvider.getRootInstances(ReactMount); }, React); })(); } try { (function () {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n\tvalue: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nvar _react = __webpack_require__(410);\n\nvar _react2 = _interopRequireDefault(_react);\n\nvar _Point = __webpack_require__(542);\n\nvar _Point2 = _interopRequireDefault(_Point);\n\nvar _Page = __webpack_require__(543);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError(\"this hasn't been initialised - super() hasn't been called\"); } return call && (typeof call === \"object\" || typeof call === \"function\") ? call : self; }\n\nfunction _inherits(subClass, superClass) { if (typeof superClass !== \"function\" && superClass !== null) { throw new TypeError(\"Super expression must either be null or a function, not \" + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }\n\nvar Page = function (_Component) {\n\t_inherits(Page, _Component);\n\n\tfunction Page() {\n\t\t_classCallCheck(this, Page);\n\n\t\treturn _possibleConstructorReturn(this, (Page.__proto__ || Object.getPrototypeOf(Page)).apply(this, arguments));\n\t}\n\n\t_createClass(Page, [{\n\t\tkey: 'onYearBtnClick',\n\t\tvalue: function onYearBtnClick(e) {\n\t\t\tthis.props.setShowMode(e.target.innerText);\n\t\t}\n\t}, {\n\t\tkey: 'render',\n\t\tvalue: function render() {\n\t\t\tvar _props = this.props,\n\t\t\t    points = _props.points,\n\t\t\t    showMode = _props.showMode;\n\n\t\t\treturn _react2.default.createElement(\n\t\t\t\t'div',\n\t\t\t\tnull,\n\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t'div',\n\t\t\t\t\t{ 'data-spy': 'affix-top', 'data-offset-top': '60' },\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'button',\n\t\t\t\t\t\t{\n\t\t\t\t\t\t\ttype: 'button',\n\t\t\t\t\t\t\tclassName: showMode.indexOf(_Page.ALL) != -1 ? 'btn btn-news btn-allNews active' : 'btn btn-news btn-allNews',\n\t\t\t\t\t\t\tonClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t{ className: 'transparent' },\n\t\t\t\t\t\t\t_Page.ALL\n\t\t\t\t\t\t)\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement('br', null),\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'button',\n\t\t\t\t\t\t{\n\t\t\t\t\t\t\ttype: 'button',\n\t\t\t\t\t\t\tclassName: showMode.indexOf(_Page.CHECK_INN) != -1 ? 'btn btn-news btn-checkInn active' : 'btn btn-news btn-checkInn',\n\t\t\t\t\t\t\tonClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t{ className: 'transparent' },\n\t\t\t\t\t\t\t_Page.CHECK_INN\n\t\t\t\t\t\t)\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'button',\n\t\t\t\t\t\t{\n\t\t\t\t\t\t\ttype: 'button',\n\t\t\t\t\t\t\tclassName: showMode.indexOf(_Page.TEA_SERVICE) != -1 ? 'btn btn-news btn-tea active' : 'btn btn-news btn-tea',\n\t\t\t\t\t\t\tonClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t{ className: 'transparent' },\n\t\t\t\t\t\t\t_Page.TEA_SERVICE\n\t\t\t\t\t\t)\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'button',\n\t\t\t\t\t\t{\n\t\t\t\t\t\t\ttype: 'button',\n\t\t\t\t\t\t\tclassName: showMode.indexOf(_Page.COUCH_SERVICE) != -1 ? 'btn btn-news btn-couch active' : 'btn btn-news btn-couch',\n\t\t\t\t\t\t\tonClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t{ className: 'transparent' },\n\t\t\t\t\t\t\t_Page.COUCH_SERVICE\n\t\t\t\t\t\t)\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'button',\n\t\t\t\t\t\t{\n\t\t\t\t\t\t\ttype: 'button',\n\t\t\t\t\t\t\tclassName: showMode.indexOf(_Page.WALK_SERVICE) != -1 ? 'btn btn-news btn-walk active' : 'btn btn-news btn-walk',\n\t\t\t\t\t\t\tonClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t{ className: 'transparent' },\n\t\t\t\t\t\t\t_Page.WALK_SERVICE\n\t\t\t\t\t\t)\n\t\t\t\t\t)\n\t\t\t\t),\n\t\t\t\tpoints.length == 0 ? _react2.default.createElement(\n\t\t\t\t\t'div',\n\t\t\t\t\t{ className: 'text-center' },\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'h3',\n\t\t\t\t\t\tnull,\n\t\t\t\t\t\t'\\u0417\\u0430\\u0433\\u0440\\u0443\\u0436\\u0430\\u0435\\u043C \\u0441\\u043E\\u0431\\u044B\\u0442\\u0438\\u044F'\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement('div', { className: 'loader' })\n\t\t\t\t) : points.map(function (point) {\n\t\t\t\t\treturn showMode.indexOf(_Page.ALL) != -1 ? _react2.default.createElement(_Point2.default, { key: point.id, point: point }) : showMode.indexOf(point.type) != -1 ? _react2.default.createElement(_Point2.default, { key: point.id, point: point }) : '';\n\t\t\t\t})\n\t\t\t);\n\t\t}\n\t}]);\n\n\treturn Page;\n}(_react.Component);\n\nexports.default = Page;\n\n\nPage.propTypes = {\n\tpoints: _react.PropTypes.array.isRequired,\n\tsetShowMode: _react.PropTypes.func.isRequired\n};\n\n/* REACT HOT LOADER */ }).call(this); } finally { if (true) { (function () { var foundReactClasses = module.hot.data && module.hot.data.foundReactClasses || false; if (module.exports && module.makeHot) { var makeExportsHot = __webpack_require__(544); if (makeExportsHot(module, __webpack_require__(410))) { foundReactClasses = true; } var shouldAcceptModule = true && foundReactClasses; if (shouldAcceptModule) { module.hot.accept(function (err) { if (err) { console.error(\"Cannot apply hot update to \" + \"Page.js\" + \": \" + err.message); } }); } } module.hot.dispose(function (data) { data.makeHot = module.makeHot; data.foundReactClasses = foundReactClasses; }); })(); } }\n/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNTQxLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vc3JjL2NvbXBvbmVudHMvUGFnZS5qcz9kNzA2Il0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSZWFjdCwgeyBQcm9wVHlwZXMsIENvbXBvbmVudCB9IGZyb20gJ3JlYWN0JztcbmltcG9ydCBQb2ludCBmcm9tICcuLi9jb21wb25lbnRzL1BvaW50JztcbmltcG9ydCB7QUxMLCBDSEVDS19JTk4sIFRFQV9TRVJWSUNFLCBDT1VDSF9TRVJWSUNFLCBXQUxLX1NFUlZJQ0V9IGZyb20gJy4uL2NvbnN0YW50cy9QYWdlJztcblxuZXhwb3J0IGRlZmF1bHQgY2xhc3MgUGFnZSBleHRlbmRzIENvbXBvbmVudCB7XG5cdG9uWWVhckJ0bkNsaWNrKGUpIHtcblx0XHR0aGlzLnByb3BzLnNldFNob3dNb2RlKGUudGFyZ2V0LmlubmVyVGV4dCk7XG5cdH1cblx0cmVuZGVyKCkge1xuXHRcdGNvbnN0IHsgcG9pbnRzLCBzaG93TW9kZSB9ID0gdGhpcy5wcm9wcztcblx0XHRyZXR1cm4gPGRpdj5cblx0XHRcdDxkaXYgZGF0YS1zcHk9J2FmZml4LXRvcCcgZGF0YS1vZmZzZXQtdG9wPSc2MCc+XG5cdFx0XHQ8YnV0dG9uIFxuXHRcdFx0XHR0eXBlPSdidXR0b24nIFxuXHRcdFx0XHRjbGFzc05hbWU9e3Nob3dNb2RlLmluZGV4T2YoQUxMKSAhPSAtMSA/ICdidG4gYnRuLW5ld3MgYnRuLWFsbE5ld3MgYWN0aXZlJyA6ICdidG4gYnRuLW5ld3MgYnRuLWFsbE5ld3MnfVxuXHRcdFx0XHRvbkNsaWNrPXs6OnRoaXMub25ZZWFyQnRuQ2xpY2t9PlxuXHRcdFx0XHQ8c3BhbiBjbGFzc05hbWU9J3RyYW5zcGFyZW50Jz57QUxMfTwvc3Bhbj5cblx0XHRcdDwvYnV0dG9uPjxici8+XG5cdFx0XHQ8YnV0dG9uXG5cdFx0XHRcdHR5cGU9J2J1dHRvbicgXG5cdFx0XHRcdGNsYXNzTmFtZT17c2hvd01vZGUuaW5kZXhPZihDSEVDS19JTk4pICE9IC0xID8gJ2J0biBidG4tbmV3cyBidG4tY2hlY2tJbm4gYWN0aXZlJyA6ICdidG4gYnRuLW5ld3MgYnRuLWNoZWNrSW5uJ30gXG5cdFx0XHRcdG9uQ2xpY2s9ezo6dGhpcy5vblllYXJCdG5DbGlja30+XG5cdFx0XHRcdDxzcGFuIGNsYXNzTmFtZT0ndHJhbnNwYXJlbnQnPntDSEVDS19JTk59PC9zcGFuPlxuXHRcdFx0PC9idXR0b24+XG5cdFx0XHQ8YnV0dG9uIFxuXHRcdFx0XHR0eXBlPSdidXR0b24nIFxuXHRcdFx0XHRjbGFzc05hbWU9e3Nob3dNb2RlLmluZGV4T2YoVEVBX1NFUlZJQ0UpICE9IC0xID8gJ2J0biBidG4tbmV3cyBidG4tdGVhIGFjdGl2ZScgOiAnYnRuIGJ0bi1uZXdzIGJ0bi10ZWEnfVxuXHRcdFx0XHRvbkNsaWNrPXs6OnRoaXMub25ZZWFyQnRuQ2xpY2t9PlxuXHRcdFx0XHQ8c3BhbiBjbGFzc05hbWU9J3RyYW5zcGFyZW50Jz57VEVBX1NFUlZJQ0V9PC9zcGFuPlxuXHRcdFx0PC9idXR0b24+XG5cdFx0XHQ8YnV0dG9uXG5cdFx0XHRcdHR5cGU9J2J1dHRvbidcblx0XHRcdFx0Y2xhc3NOYW1lPXtzaG93TW9kZS5pbmRleE9mKENPVUNIX1NFUlZJQ0UpICE9IC0xID8gJ2J0biBidG4tbmV3cyBidG4tY291Y2ggYWN0aXZlJyA6ICdidG4gYnRuLW5ld3MgYnRuLWNvdWNoJ31cblx0XHRcdFx0b25DbGljaz17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfT5cblx0XHRcdFx0PHNwYW4gY2xhc3NOYW1lPSd0cmFuc3BhcmVudCc+e0NPVUNIX1NFUlZJQ0V9PC9zcGFuPlxuXHRcdFx0PC9idXR0b24+XG5cdFx0XHQ8YnV0dG9uXG5cdFx0XHRcdHR5cGU9J2J1dHRvbidcblx0XHRcdFx0Y2xhc3NOYW1lPXtzaG93TW9kZS5pbmRleE9mKFdBTEtfU0VSVklDRSkgIT0gLTEgPyAnYnRuIGJ0bi1uZXdzIGJ0bi13YWxrIGFjdGl2ZScgOiAnYnRuIGJ0bi1uZXdzIGJ0bi13YWxrJ31cblx0XHRcdFx0b25DbGljaz17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfT5cblx0XHRcdFx0PHNwYW4gY2xhc3NOYW1lPSd0cmFuc3BhcmVudCc+e1dBTEtfU0VSVklDRX08L3NwYW4+XG5cdFx0XHQ8L2J1dHRvbj5cblx0XHRcdDwvZGl2PlxuXG5cdFx0XHR7cG9pbnRzLmxlbmd0aCA9PSAwID8gXG5cdFx0XHRcdDxkaXYgY2xhc3NOYW1lPSd0ZXh0LWNlbnRlcic+XG5cdFx0XHRcdFx0PGgzPtCX0LDQs9GA0YPQttCw0LXQvCDRgdC+0LHRi9GC0LjRjzwvaDM+XG5cdFx0XHRcdFx0PGRpdiBjbGFzc05hbWU9J2xvYWRlcic+PC9kaXY+XG5cdFx0XHRcdDwvZGl2PiA6XG5cdFx0XHRcdHBvaW50cy5tYXAocG9pbnQgPT4ge1xuXHRcdFx0XHRcdHJldHVybiBzaG93TW9kZS5pbmRleE9mKEFMTCkgIT0gLTEgPyA8UG9pbnQga2V5PXtwb2ludC5pZH0gcG9pbnQ9e3BvaW50fSAvPiA6XG5cdFx0XHRcdFx0XHRzaG93TW9kZS5pbmRleE9mKHBvaW50LnR5cGUpICE9IC0xID8gPFBvaW50IGtleT17cG9pbnQuaWR9IHBvaW50PXtwb2ludH0gLz4gOlxuXHRcdFx0XHRcdFx0XHQnJztcblx0XHRcdFx0fSl9XG5cdFx0PC9kaXY+O1xuXHR9XG59XG5cblBhZ2UucHJvcFR5cGVzID0ge1xuXHRwb2ludHM6IFByb3BUeXBlcy5hcnJheS5pc1JlcXVpcmVkLFxuXHRzZXRTaG93TW9kZTogUHJvcFR5cGVzLmZ1bmMuaXNSZXF1aXJlZFxufTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvY29tcG9uZW50cy9QYWdlLmpzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFDQTs7O0FBQUE7QUFDQTs7O0FBQUE7QUFDQTs7Ozs7Ozs7O0FBQ0E7Ozs7Ozs7Ozs7O0FBQ0E7QUFDQTtBQUNBOzs7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUpBO0FBS0E7QUFDQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSkE7QUFNQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSkE7QUFNQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSkE7QUFNQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSkE7QUF6QkE7QUFpQ0E7QUFDQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBRkE7QUFLQTtBQUdBO0FBM0NBO0FBNkNBOzs7Ozs7QUFuREE7QUFDQTtBQUNBO0FBb0RBO0FBQ0E7QUFDQTtBQUZBO0FBQ0E7OyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }

})