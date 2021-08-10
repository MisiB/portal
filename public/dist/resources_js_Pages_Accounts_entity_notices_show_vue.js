(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_entity_notices_show_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layouts_entityLayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../Layouts/entityLayout */ "./resources/js/Pages/Layouts/entityLayout.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['errors', 'successMessage', 'errorMessage', 'notice', 'spoc', 'establishment'],
  components: {
    userlayout: _Layouts_entityLayout__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {};
  },
  methods: {
    download: function download() {
      var path = '/' + this.notice.filename;
      window.open(path);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/entityLayout.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/entityLayout.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['title'],
  data: function data() {
    return {
      drawer: null,
      items: [],
      messages: 2,
      snackbar: true,
      message: 'test message'
    };
  },
  watch: {
    title: {
      immediate: true,
      handler: function handler(title) {
        document.title = title;
      }
    },
    user: {}
  },
  methods: {},
  computed: {
    user: function user() {
      return this.$page.props.user;
    }
  }
});

/***/ }),

/***/ "./resources/js/Pages/Accounts/entity/notices/show.vue":
/*!*************************************************************!*\
  !*** ./resources/js/Pages/Accounts/entity/notices/show.vue ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _show_vue_vue_type_template_id_29a0291d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./show.vue?vue&type=template&id=29a0291d& */ "./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=template&id=29a0291d&");
/* harmony import */ var _show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./show.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _show_vue_vue_type_template_id_29a0291d___WEBPACK_IMPORTED_MODULE_0__.render,
  _show_vue_vue_type_template_id_29a0291d___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/entity/notices/show.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Layouts/entityLayout.vue":
/*!*****************************************************!*\
  !*** ./resources/js/Pages/Layouts/entityLayout.vue ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _entityLayout_vue_vue_type_template_id_5a43a65c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./entityLayout.vue?vue&type=template&id=5a43a65c& */ "./resources/js/Pages/Layouts/entityLayout.vue?vue&type=template&id=5a43a65c&");
/* harmony import */ var _entityLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./entityLayout.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Layouts/entityLayout.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _entityLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _entityLayout_vue_vue_type_template_id_5a43a65c___WEBPACK_IMPORTED_MODULE_0__.render,
  _entityLayout_vue_vue_type_template_id_5a43a65c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Layouts/entityLayout.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./show.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Layouts/entityLayout.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/entityLayout.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_entityLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./entityLayout.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/entityLayout.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_entityLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=template&id=29a0291d&":
/*!********************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=template&id=29a0291d& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_show_vue_vue_type_template_id_29a0291d___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_show_vue_vue_type_template_id_29a0291d___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_show_vue_vue_type_template_id_29a0291d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./show.vue?vue&type=template&id=29a0291d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=template&id=29a0291d&");


/***/ }),

/***/ "./resources/js/Pages/Layouts/entityLayout.vue?vue&type=template&id=5a43a65c&":
/*!************************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/entityLayout.vue?vue&type=template&id=5a43a65c& ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_entityLayout_vue_vue_type_template_id_5a43a65c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_entityLayout_vue_vue_type_template_id_5a43a65c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_entityLayout_vue_vue_type_template_id_5a43a65c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./entityLayout.vue?vue&type=template&id=5a43a65c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/entityLayout.vue?vue&type=template&id=5a43a65c&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=template&id=29a0291d&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/show.vue?vue&type=template&id=29a0291d& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "userlayout",
    { attrs: { title: "Dashboard" } },
    [
      _c(
        "v-container",
        [
          _c(
            "v-card",
            { attrs: { flat: "" } },
            [
              _c("v-card-text", [
                _c(
                  "div",
                  { staticClass: "d-flex" },
                  [
                    _c(
                      "v-btn",
                      {
                        attrs: {
                          text: "",
                          link: "",
                          href: _vm.$route("entity.home")
                        }
                      },
                      [_vm._v("Dashboard")]
                    ),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      {
                        attrs: {
                          text: "",
                          link: "",
                          href: _vm.$route("procurementnotice.index")
                        }
                      },
                      [_vm._v("List")]
                    ),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      { attrs: { text: "", link: "", disabled: "" } },
                      [_vm._v("Show")]
                    )
                  ],
                  1
                )
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-row",
            { staticClass: "mt-4" },
            [
              _c(
                "v-col",
                [
                  _c(
                    "v-card",
                    { attrs: { flat: "" } },
                    [
                      _c(
                        "v-card-title",
                        [
                          _c("div", [_vm._v("Procurement Notice")]),
                          _vm._v(" "),
                          _c("v-spacer"),
                          _vm._v(" "),
                          _c(
                            "v-btn",
                            {
                              attrs: {
                                small: "",
                                rounded: "",
                                color: "info",
                                depressed: ""
                              },
                              on: { click: _vm.download }
                            },
                            [_vm._v("Download")]
                          ),
                          _vm._v(" "),
                          _vm.notice.status == "PENDING"
                            ? _c(
                                "v-btn",
                                {
                                  staticClass: "ml-2",
                                  attrs: {
                                    small: "",
                                    rounded: "",
                                    color: "primary",
                                    depressed: ""
                                  }
                                },
                                [_vm._v("Edit")]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.notice.status == "PENDING"
                            ? _c(
                                "inertia-link",
                                {
                                  staticClass:
                                    "ml-2 v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small success",
                                  attrs: {
                                    href: _vm.$route(
                                      "procurementnotice.edit",
                                      _vm.notice.id
                                    )
                                  }
                                },
                                [_vm._v("Publish")]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.notice.status == "PENDING"
                            ? _c(
                                "v-btn",
                                {
                                  staticClass: "ml-2",
                                  attrs: {
                                    small: "",
                                    rounded: "",
                                    color: "error",
                                    depressed: ""
                                  }
                                },
                                [_vm._v("Delete")]
                              )
                            : _vm._e()
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        [
                          _c("v-simple-table", {
                            scopedSlots: _vm._u([
                              {
                                key: "default",
                                fn: function() {
                                  return [
                                    _c("tbody", [
                                      _c("tr", [
                                        _c("th", [_vm._v("Title")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.title) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Closing Date")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.close_date) +
                                              "\n                               " +
                                              _vm._s(_vm.notice.close_time) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Status")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.status) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Tender Number")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.tendernumber) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Procurement Type")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(
                                                _vm.notice.procurementtype.name
                                              ) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Client Type")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.noticetype) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Classification")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(
                                                _vm.notice.classification.name
                                              ) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Bid Value")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.currency.name) +
                                              " " +
                                              _vm._s(_vm.notice.bidvalue) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Bid Security")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.currency.name) +
                                              " " +
                                              _vm._s(_vm.notice.bidsecurity) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [
                                          _vm._v("Calculated SPOC fee")
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.currency.name) +
                                              " " +
                                              _vm._s(_vm.spoc) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [
                                          _vm._v("Calculated Establishment Fee")
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.currency.name) +
                                              " " +
                                              _vm._s(_vm.establishment) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Description")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.description) +
                                              "\n                           "
                                          )
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c("tr", [
                                        _c("th", [_vm._v("Instructions")]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            "\n                               " +
                                              _vm._s(_vm.notice.instructions) +
                                              "\n                           "
                                          )
                                        ])
                                      ])
                                    ])
                                  ]
                                },
                                proxy: true
                              }
                            ])
                          }),
                          _vm._v(" "),
                          _c("div", { staticClass: "headline mt-5 ml-2" }, [
                            _vm._v("Products/Services")
                          ]),
                          _vm._v(" "),
                          _c("v-simple-table", {
                            scopedSlots: _vm._u([
                              {
                                key: "default",
                                fn: function() {
                                  return [
                                    _c("thead", [
                                      _c("tr", [
                                        _c("th", [_vm._v("Product Name")]),
                                        _vm._v(" "),
                                        _c("th", [_vm._v("Quantity")]),
                                        _vm._v(" "),
                                        _c("th", [
                                          _vm._v("Required PRAZ Categories")
                                        ])
                                      ])
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "tbody",
                                      _vm._l(_vm.notice.products, function(
                                        product
                                      ) {
                                        return _c("tr", { key: product.id }, [
                                          _c("td", [
                                            _vm._v(_vm._s(product.name))
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(_vm._s(product.quantity))
                                          ]),
                                          _vm._v(" "),
                                          _c(
                                            "td",
                                            _vm._l(product.categories, function(
                                              cat
                                            ) {
                                              return _c(
                                                "div",
                                                { key: cat.id },
                                                [
                                                  _c("div", [
                                                    _vm._v(
                                                      _vm._s(
                                                        cat.category.name
                                                      ) +
                                                        "(" +
                                                        _vm._s(
                                                          cat.category.code
                                                        ) +
                                                        ")"
                                                    )
                                                  ])
                                                ]
                                              )
                                            }),
                                            0
                                          )
                                        ])
                                      }),
                                      0
                                    )
                                  ]
                                },
                                proxy: true
                              }
                            ])
                          })
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/entityLayout.vue?vue&type=template&id=5a43a65c&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/entityLayout.vue?vue&type=template&id=5a43a65c& ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-app",
    { attrs: { id: "inspire" } },
    [
      _c(
        "v-app-bar",
        {
          attrs: {
            app: "",
            "clipped-left": "",
            flat: "",
            fixed: "",
            color: "white",
            light: "",
            height: "100"
          }
        },
        [
          _c(
            "v-toolbar-title",
            [_c("v-img", { attrs: { src: "/img/logo.png", width: "120" } })],
            1
          ),
          _vm._v(" "),
          _c("v-app-bar-nav-icon", {
            on: {
              click: function($event) {
                _vm.drawer = !_vm.drawer
              }
            }
          }),
          _vm._v(" "),
          _c("v-spacer"),
          _vm._v(" "),
          _c(
            "v-badge",
            {
              attrs: {
                content: _vm.messages,
                value: _vm.messages,
                color: "red",
                overlap: ""
              }
            },
            [
              _c(
                "v-btn",
                {
                  attrs: {
                    icon: "",
                    link: "",
                    href: _vm.$route("Notifications.index")
                  }
                },
                [_c("v-icon", [_vm._v("mdi-bell-ring")])],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-menu",
            {
              attrs: {
                bottom: "",
                origin: "center center",
                transition: "scale-transition"
              },
              scopedSlots: _vm._u([
                {
                  key: "activator",
                  fn: function(ref) {
                    var on = ref.on
                    var attrs = ref.attrs
                    return [
                      _c(
                        "v-btn",
                        _vm._g(
                          _vm._b(
                            { attrs: { color: "primary", dark: "", text: "" } },
                            "v-btn",
                            attrs,
                            false
                          ),
                          on
                        ),
                        [
                          _c("v-icon", [_vm._v("mdi-account")]),
                          _vm._v(
                            "\n                    " +
                              _vm._s(_vm.user.name) +
                              "\n                    " +
                              _vm._s(_vm.user.surname) +
                              "\n                "
                          )
                        ],
                        1
                      )
                    ]
                  }
                }
              ])
            },
            [
              _vm._v(" "),
              _c(
                "v-list",
                [
                  _c(
                    "v-list-item",
                    [
                      _c(
                        "inertia-link",
                        {
                          staticClass: "v-list-item theme--light",
                          attrs: { href: _vm.$route("profile.index") }
                        },
                        [_vm._v("Profile Settings")]
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-list-item",
                    [
                      _c(
                        "inertia-link",
                        {
                          staticClass: "v-list-item theme--light",
                          attrs: {
                            href: "/logout",
                            method: "post",
                            as: "button",
                            type: "button"
                          }
                        },
                        [_vm._v("Logout")]
                      )
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-navigation-drawer",
        {
          staticClass: "green darken-3",
          attrs: { app: "", clipped: "", width: "150" },
          model: {
            value: _vm.drawer,
            callback: function($$v) {
              _vm.drawer = $$v
            },
            expression: "drawer"
          }
        },
        [
          _c(
            "v-list",
            [
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light  pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("entity.home") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-view-dashboard")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v(" Dashboard")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _vm._l(_vm.user.role.modules, function(module) {
                return _c(
                  "v-menu",
                  {
                    key: module.id,
                    attrs: {
                      bottom: "",
                      origin: "center center",
                      transition: "scale-transition"
                    },
                    scopedSlots: _vm._u(
                      [
                        {
                          key: "activator",
                          fn: function(ref) {
                            var on = ref.on
                            var attrs = ref.attrs
                            return [
                              _c(
                                "div",
                                _vm._g(
                                  _vm._b(
                                    {
                                      staticClass:
                                        "v-list-item v-list-item--link theme--light  pt-1 pb-1 pl-2 pr-0 d-flex white--text"
                                    },
                                    "div",
                                    attrs,
                                    false
                                  ),
                                  on
                                ),
                                [
                                  _c("v-icon", {
                                    domProps: {
                                      textContent: _vm._s(module.icon)
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "ml-2" }, [
                                    _vm._v(_vm._s(module.name))
                                  ])
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c("v-divider")
                            ]
                          }
                        }
                      ],
                      null,
                      true
                    )
                  },
                  [
                    _vm._v(" "),
                    _c(
                      "v-list",
                      _vm._l(module.submodules, function(submodule) {
                        return _c(
                          "inertia-link",
                          {
                            key: submodule.id,
                            staticClass:
                              "v-list-item v-list-item--link theme--light",
                            attrs: { href: _vm.$route(submodule.url) }
                          },
                          [
                            _c(
                              "v-list-item-icon",
                              [_c("v-icon", [_vm._v(_vm._s(submodule.icon))])],
                              1
                            ),
                            _vm._v(" "),
                            _c("v-list-item-title", [
                              _vm._v(_vm._s(submodule.name))
                            ])
                          ],
                          1
                        )
                      }),
                      1
                    ),
                    _vm._v(" "),
                    _c("v-divider")
                  ],
                  1
                )
              }),
              _vm._v(" "),
              _c("v-divider")
            ],
            2
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-main", { staticClass: "grey lighten-3" }, [_vm._t("default")], 2)
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);