webpackHotUpdate(0,{

/***/ 541:
/***/ function(module, exports, __webpack_require__) {

	eval("/* WEBPACK VAR INJECTION */(function(module) {/* REACT HOT LOADER */ if (true) { (function () { var ReactHotAPI = __webpack_require__(310), RootInstanceProvider = __webpack_require__(318), ReactMount = __webpack_require__(320), React = __webpack_require__(410); module.makeHot = module.hot.data ? module.hot.data.makeHot : ReactHotAPI(function () { return RootInstanceProvider.getRootInstances(ReactMount); }, React); })(); } try { (function () {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n\tvalue: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nvar _react = __webpack_require__(410);\n\nvar _react2 = _interopRequireDefault(_react);\n\nvar _Point = __webpack_require__(542);\n\nvar _Point2 = _interopRequireDefault(_Point);\n\nvar _Page = __webpack_require__(546);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError(\"this hasn't been initialised - super() hasn't been called\"); } return call && (typeof call === \"object\" || typeof call === \"function\") ? call : self; }\n\nfunction _inherits(subClass, superClass) { if (typeof superClass !== \"function\" && superClass !== null) { throw new TypeError(\"Super expression must either be null or a function, not \" + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }\n\nvar Page = function (_Component) {\n\t_inherits(Page, _Component);\n\n\tfunction Page() {\n\t\t_classCallCheck(this, Page);\n\n\t\treturn _possibleConstructorReturn(this, (Page.__proto__ || Object.getPrototypeOf(Page)).apply(this, arguments));\n\t}\n\n\t_createClass(Page, [{\n\t\tkey: 'onYearBtnClick',\n\t\tvalue: function onYearBtnClick(e) {\n\t\t\tconsole.log(e.target.innerText);\n\t\t\tthis.props.setShowMode(e.target.innerText);\n\t\t}\n\t}, {\n\t\tkey: 'render',\n\t\tvalue: function render() {\n\t\t\tvar _props = this.props,\n\t\t\t    points = _props.points,\n\t\t\t    showMode = _props.showMode;\n\n\t\t\treturn _react2.default.createElement(\n\t\t\t\t'div',\n\t\t\t\tnull,\n\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t'nav',\n\t\t\t\t\t{ className: 'navbar navbar-default navbar-fixed-top newsNavbar' },\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'div',\n\t\t\t\t\t\t{ className: 'container' },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'button',\n\t\t\t\t\t\t\t{ type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t\t_Page.ALL\n\t\t\t\t\t\t),\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'button',\n\t\t\t\t\t\t\t{ type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t\t_Page.CHECK_INN\n\t\t\t\t\t\t),\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'button',\n\t\t\t\t\t\t\t{ type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t\t_Page.TEA_SERVICE\n\t\t\t\t\t\t),\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'button',\n\t\t\t\t\t\t\t{ type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t\t_Page.COUCH_SERVICE\n\t\t\t\t\t\t),\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'button',\n\t\t\t\t\t\t\t{ type: 'button', className: 'btn btn-default navbar-btn', onClick: this.onYearBtnClick.bind(this) },\n\t\t\t\t\t\t\t_Page.WALK_SERVICE\n\t\t\t\t\t\t)\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'div',\n\t\t\t\t\t\t{ className: 'form-group' },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'label',\n\t\t\t\t\t\t\tnull,\n\t\t\t\t\t\t\t_react2.default.createElement('input', { type: 'checkbox',\n\t\t\t\t\t\t\t\tid: 'my-checkbox',\n\t\t\t\t\t\t\t\t'data-size': 'small',\n\t\t\t\t\t\t\t\tname: 'fb_in_wall_posting_allowed',\n\t\t\t\t\t\t\t\tonChange: this.onYearBtnClick.bind(this) }),\n\t\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t\t{ className: 'corporateBlue' },\n\t\t\t\t\t\t\t\t' \\u041F\\u0443\\u0431\\u043B\\u0438\\u043A\\u043E\\u0432\\u0430\\u0442\\u044C \\u0432 \\u043B\\u0435\\u043D\\u0442\\u0435'\n\t\t\t\t\t\t\t)\n\t\t\t\t\t\t)\n\t\t\t\t\t),\n\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t'div',\n\t\t\t\t\t\t{ className: 'form-group' },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'label',\n\t\t\t\t\t\t\tnull,\n\t\t\t\t\t\t\t_react2.default.createElement('input', { type: 'checkbox',\n\t\t\t\t\t\t\t\tid: 'my-checkbox',\n\t\t\t\t\t\t\t\t'data-size': 'small',\n\t\t\t\t\t\t\t\tname: 'fb_in_group_posting_allowed',\n\t\t\t\t\t\t\t\tonChange: this.onYearBtnClick.bind(this) }),\n\t\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t\t'span',\n\t\t\t\t\t\t\t\t{ className: 'corporateBlue' },\n\t\t\t\t\t\t\t\t' \\u041F\\u0443\\u0431\\u043B\\u0438\\u043A\\u043E\\u0432\\u0430\\u0442\\u044C \\u0432 \\u0433\\u0440\\u0443\\u043F\\u043F\\u0435 Yoga Travel'\n\t\t\t\t\t\t\t)\n\t\t\t\t\t\t)\n\t\t\t\t\t)\n\t\t\t\t),\n\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t'div',\n\t\t\t\t\t{ className: 'newsContent' },\n\t\t\t\t\tpoints.length == 0 ? _react2.default.createElement(\n\t\t\t\t\t\t'div',\n\t\t\t\t\t\t{ className: 'text-center' },\n\t\t\t\t\t\t_react2.default.createElement(\n\t\t\t\t\t\t\t'h3',\n\t\t\t\t\t\t\tnull,\n\t\t\t\t\t\t\t'\\u0417\\u0430\\u0433\\u0440\\u0443\\u0436\\u0430\\u0435\\u043C \\u0441\\u043E\\u0431\\u044B\\u0442\\u0438\\u044F'\n\t\t\t\t\t\t),\n\t\t\t\t\t\t_react2.default.createElement('div', { className: 'loader' })\n\t\t\t\t\t) : points.map(function (point) {\n\t\t\t\t\t\treturn showMode.indexOf(_Page.ALL) != -1 ? _react2.default.createElement(_Point2.default, { key: point.id, authorName: point.authorName }) : showMode.indexOf(point.type) != -1 ? _react2.default.createElement(_Point2.default, { key: point.id, authorName: point.authorName }) : _react2.default.createElement('span', null);\n\t\t\t\t\t})\n\t\t\t\t)\n\t\t\t);\n\t\t}\n\t}]);\n\n\treturn Page;\n}(_react.Component);\n\nexports.default = Page;\n\n\nPage.propTypes = {\n\tpoints: _react.PropTypes.array.isRequired,\n\tsetShowMode: _react.PropTypes.func.isRequired\n};\n\n/* REACT HOT LOADER */ }).call(this); } finally { if (true) { (function () { var foundReactClasses = module.hot.data && module.hot.data.foundReactClasses || false; if (module.exports && module.makeHot) { var makeExportsHot = __webpack_require__(543); if (makeExportsHot(module, __webpack_require__(410))) { foundReactClasses = true; } var shouldAcceptModule = true && foundReactClasses; if (shouldAcceptModule) { module.hot.accept(function (err) { if (err) { console.error(\"Cannot apply hot update to \" + \"Page.js\" + \": \" + err.message); } }); } } module.hot.dispose(function (data) { data.makeHot = module.makeHot; data.foundReactClasses = foundReactClasses; }); })(); } }\n/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNTQxLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vc3JjL2NvbXBvbmVudHMvUGFnZS5qcz9kNzA2Il0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSZWFjdCwgeyBQcm9wVHlwZXMsIENvbXBvbmVudCB9IGZyb20gJ3JlYWN0JztcbmltcG9ydCBQb2ludCBmcm9tICcuLi9jb21wb25lbnRzL1BvaW50JztcbmltcG9ydCB7QUxMLCBDSEVDS19JTk4sIFRFQV9TRVJWSUNFLCBDT1VDSF9TRVJWSUNFLCBXQUxLX1NFUlZJQ0V9IGZyb20gJy4uL2NvbnN0YW50cy9QYWdlJztcblxuZXhwb3J0IGRlZmF1bHQgY2xhc3MgUGFnZSBleHRlbmRzIENvbXBvbmVudCB7XG5cdG9uWWVhckJ0bkNsaWNrKGUpIHtcblx0XHRjb25zb2xlLmxvZyhlLnRhcmdldC5pbm5lclRleHQpO1xuXHRcdHRoaXMucHJvcHMuc2V0U2hvd01vZGUoZS50YXJnZXQuaW5uZXJUZXh0KTtcblx0fVxuXHRyZW5kZXIoKSB7XG5cdFx0Y29uc3QgeyBwb2ludHMsIHNob3dNb2RlIH0gPSB0aGlzLnByb3BzO1xuXHRcdHJldHVybiA8ZGl2PlxuXHRcdFx0XG5cdFx0XHQ8bmF2IGNsYXNzTmFtZT0nbmF2YmFyIG5hdmJhci1kZWZhdWx0IG5hdmJhci1maXhlZC10b3AgbmV3c05hdmJhcic+XG5cdFx0XHRcdDxkaXYgY2xhc3NOYW1lPSdjb250YWluZXInPlxuXHRcdFx0XHRcdDxidXR0b24gdHlwZT0nYnV0dG9uJyAgY2xhc3NOYW1lPSdidG4gYnRuLWRlZmF1bHQgbmF2YmFyLWJ0bicgb25DbGljaz17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfT57QUxMfTwvYnV0dG9uPlxuXHRcdFx0XHRcdDxidXR0b24gdHlwZT0nYnV0dG9uJyBjbGFzc05hbWU9J2J0biBidG4tZGVmYXVsdCBuYXZiYXItYnRuJyBvbkNsaWNrPXs6OnRoaXMub25ZZWFyQnRuQ2xpY2t9PntDSEVDS19JTk59PC9idXR0b24+XG5cdFx0XHRcdFx0PGJ1dHRvbiB0eXBlPSdidXR0b24nIGNsYXNzTmFtZT0nYnRuIGJ0bi1kZWZhdWx0IG5hdmJhci1idG4nIG9uQ2xpY2s9ezo6dGhpcy5vblllYXJCdG5DbGlja30+e1RFQV9TRVJWSUNFfTwvYnV0dG9uPlxuXHRcdFx0XHRcdDxidXR0b24gdHlwZT0nYnV0dG9uJyBjbGFzc05hbWU9J2J0biBidG4tZGVmYXVsdCBuYXZiYXItYnRuJyBvbkNsaWNrPXs6OnRoaXMub25ZZWFyQnRuQ2xpY2t9PntDT1VDSF9TRVJWSUNFfTwvYnV0dG9uPlxuXHRcdFx0XHRcdDxidXR0b24gdHlwZT0nYnV0dG9uJyBjbGFzc05hbWU9J2J0biBidG4tZGVmYXVsdCBuYXZiYXItYnRuJyBvbkNsaWNrPXs6OnRoaXMub25ZZWFyQnRuQ2xpY2t9PntXQUxLX1NFUlZJQ0V9PC9idXR0b24+XG5cdFx0XHRcdDwvZGl2PlxuXHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cImZvcm0tZ3JvdXBcIj5cblx0XHRcdFx0XHQ8bGFiZWw+PGlucHV0IHR5cGU9XCJjaGVja2JveFwiXG5cdFx0XHRcdFx0XHRpZD1cIm15LWNoZWNrYm94XCJcblx0XHRcdFx0XHRcdGRhdGEtc2l6ZT1cInNtYWxsXCJcblx0XHRcdFx0XHRcdG5hbWU9XCJmYl9pbl93YWxsX3Bvc3RpbmdfYWxsb3dlZFwiXG5cdFx0XHRcdFx0XHRvbkNoYW5nZT17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfS8+XG5cdFx0XHRcdFx0PHNwYW4gY2xhc3NOYW1lPVwiY29ycG9yYXRlQmx1ZVwiPiDQn9GD0LHQu9C40LrQvtCy0LDRgtGMINCyINC70LXQvdGC0LU8L3NwYW4+XG5cdFx0XHRcdFx0PC9sYWJlbD5cblx0XHRcdFx0PC9kaXY+XG5cdFx0XHRcdDxkaXYgY2xhc3NOYW1lPVwiZm9ybS1ncm91cFwiPlxuXHRcdFx0XHRcdDxsYWJlbD48aW5wdXQgdHlwZT1cImNoZWNrYm94XCJcblx0XHRcdFx0XHRcdGlkPVwibXktY2hlY2tib3hcIlxuXHRcdFx0XHRcdFx0ZGF0YS1zaXplPVwic21hbGxcIlxuXHRcdFx0XHRcdFx0bmFtZT1cImZiX2luX2dyb3VwX3Bvc3RpbmdfYWxsb3dlZFwiXG5cdFx0XHRcdFx0XHRvbkNoYW5nZT17Ojp0aGlzLm9uWWVhckJ0bkNsaWNrfS8+XG5cdFx0XHRcdFx0PHNwYW4gY2xhc3NOYW1lPVwiY29ycG9yYXRlQmx1ZVwiPiDQn9GD0LHQu9C40LrQvtCy0LDRgtGMINCyINCz0YDRg9C/0L/QtSBZb2dhIFRyYXZlbDwvc3Bhbj5cblx0XHRcdFx0XHQ8L2xhYmVsPlxuXHRcdFx0XHQ8L2Rpdj5cblx0XHRcdDwvbmF2PlxuXHRcdFx0XG5cblxuXHRcdFx0PGRpdiBjbGFzc05hbWU9J25ld3NDb250ZW50Jz5cblx0XHRcdFx0e3BvaW50cy5sZW5ndGggPT0gMCA/IFxuXHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPSd0ZXh0LWNlbnRlcic+XG5cdFx0XHRcdFx0XHQ8aDM+0JfQsNCz0YDRg9C20LDQtdC8INGB0L7QsdGL0YLQuNGPPC9oMz5cblx0XHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPSdsb2FkZXInPjwvZGl2PlxuXHRcdFx0XHRcdDwvZGl2PiA6XG5cdFx0XHRcdFx0cG9pbnRzLm1hcChwb2ludCA9PiB7XG5cdFx0XHRcdFx0XHRyZXR1cm4gc2hvd01vZGUuaW5kZXhPZihBTEwpICE9IC0xID8gPFBvaW50IGtleT17cG9pbnQuaWR9IGF1dGhvck5hbWU9e3BvaW50LmF1dGhvck5hbWV9IC8+IDpcblx0XHRcdFx0XHRcdFx0c2hvd01vZGUuaW5kZXhPZihwb2ludC50eXBlKSAhPSAtMSA/IDxQb2ludCBrZXk9e3BvaW50LmlkfSBhdXRob3JOYW1lPXtwb2ludC5hdXRob3JOYW1lfSAvPiA6XG5cdFx0XHRcdFx0XHRcdFx0PHNwYW4gLz47XG5cdFx0XHRcdFx0fSl9XG5cdFx0XHQ8L2Rpdj5cblx0XHQ8L2Rpdj47XG5cdH1cbn1cblxuUGFnZS5wcm9wVHlwZXMgPSB7XG5cdHBvaW50czogUHJvcFR5cGVzLmFycmF5LmlzUmVxdWlyZWQsXG5cdHNldFNob3dNb2RlOiBQcm9wVHlwZXMuZnVuYy5pc1JlcXVpcmVkXG59O1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9jb21wb25lbnRzL1BhZ2UuanMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUNBOzs7QUFBQTtBQUNBOzs7QUFBQTtBQUNBOzs7Ozs7Ozs7QUFDQTs7Ozs7Ozs7Ozs7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQUE7QUFBQTtBQUVBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBTEE7QUFPQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUxBO0FBREE7QUFTQTtBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUxBO0FBREE7QUFqQkE7QUE4QkE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUFBO0FBQ0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBRkE7QUFLQTtBQUdBO0FBVkE7QUFoQ0E7QUE2Q0E7Ozs7OztBQXBEQTtBQUNBO0FBQ0E7QUFxREE7QUFDQTtBQUNBO0FBRkE7QUFDQTs7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }

})