(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_users_payments_internal_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../Layouts/userlayout */ "./resources/js/Pages/Layouts/userlayout.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['errors', 'successMessage', 'errorMessage', 'currency', 'balance', 'due'],
  components: {
    userlayout: _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      loading: false,
      disabled: true,
      value: 0,
      menu: false,
      modal: false,
      menu2: false,
      referencenumber: '',
      referenceRules: [function (v) {
        return !!v || 'Bank Reference Number Required';
      }],
      bank: '',
      bankRules: [function (v) {
        return !!v || 'Bank Name Required';
      }],
      date: '',
      dateRules: [function (v) {
        return !!v || 'transaction date Required';
      }],
      pop: null,
      popRule: [function (v) {
        return !!v || 'Upload proof of payment';
      }],
      form: true,
      alert: true,
      addPop: false,
      transfers: []
    };
  },
  methods: {
    processPayment: function processPayment() {
      var _this = this;

      this.loading = true;
      this.$inertia.put('/bidders/Bankpayments/1', {
        onSuccess: function onSuccess(page) {
          _this.loading = false;
        },
        onError: function onError(errors) {
          _this.loading = false;
        }
      });
    },
    upload: function upload() {
      var _this2 = this;

      this.loading = true;
      var formadata = new FormData();
      formadata.append('referencenumber', this.referencenumber);
      this.$inertia.post('/bidders/Bankpayments', formadata, {
        onSuccess: function onSuccess(page) {
          _this2.loading = false;
        },
        onError: function onError(errors) {
          _this2.loading = false;
        }
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/userlayout.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/userlayout.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      snackbar: true,
      showModel: false
    };
  },
  watch: {
    title: {
      immediate: true,
      handler: function handler(title) {
        document.title = title;
      }
    }
  },
  methods: {},
  computed: {
    user: function user() {
      return this.$page.props.user;
    },
    notifications: function notifications() {
      return this.$page.props.notifications;
    },
    comments: function comments() {
      return this.$page.props.comments;
    },
    commentscount: function commentscount() {
      return this.$page.props.comments.length;
    }
  }
});

/***/ }),

/***/ "./resources/js/Pages/Accounts/users/payments/internal.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/payments/internal.vue ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _internal_vue_vue_type_template_id_4e6ef418_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./internal.vue?vue&type=template&id=4e6ef418&scoped=true& */ "./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=template&id=4e6ef418&scoped=true&");
/* harmony import */ var _internal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./internal.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _internal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _internal_vue_vue_type_template_id_4e6ef418_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _internal_vue_vue_type_template_id_4e6ef418_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "4e6ef418",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/users/payments/internal.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Layouts/userlayout.vue":
/*!***************************************************!*\
  !*** ./resources/js/Pages/Layouts/userlayout.vue ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _userlayout_vue_vue_type_template_id_6c7579e4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./userlayout.vue?vue&type=template&id=6c7579e4& */ "./resources/js/Pages/Layouts/userlayout.vue?vue&type=template&id=6c7579e4&");
/* harmony import */ var _userlayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./userlayout.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Layouts/userlayout.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _userlayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _userlayout_vue_vue_type_template_id_6c7579e4___WEBPACK_IMPORTED_MODULE_0__.render,
  _userlayout_vue_vue_type_template_id_6c7579e4___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Layouts/userlayout.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_internal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./internal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_internal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Layouts/userlayout.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/userlayout.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_userlayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./userlayout.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/userlayout.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_userlayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=template&id=4e6ef418&scoped=true&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=template&id=4e6ef418&scoped=true& ***!
  \************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_internal_vue_vue_type_template_id_4e6ef418_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_internal_vue_vue_type_template_id_4e6ef418_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_internal_vue_vue_type_template_id_4e6ef418_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./internal.vue?vue&type=template&id=4e6ef418&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=template&id=4e6ef418&scoped=true&");


/***/ }),

/***/ "./resources/js/Pages/Layouts/userlayout.vue?vue&type=template&id=6c7579e4&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/userlayout.vue?vue&type=template&id=6c7579e4& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_userlayout_vue_vue_type_template_id_6c7579e4___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_userlayout_vue_vue_type_template_id_6c7579e4___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_userlayout_vue_vue_type_template_id_6c7579e4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./userlayout.vue?vue&type=template&id=6c7579e4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/userlayout.vue?vue&type=template&id=6c7579e4&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=template&id=4e6ef418&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/payments/internal.vue?vue&type=template&id=4e6ef418&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************************/
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
    { attrs: { title: "Bank Payments" } },
    [
      _c(
        "v-container",
        [
          _vm.errorMessage
            ? _c(
                "v-alert",
                { attrs: { border: "top", color: "red lighten-2", dark: "" } },
                [
                  _vm._v(
                    "\n            " + _vm._s(_vm.errorMessage) + "\n        "
                  )
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.successMessage
            ? _c(
                "v-alert",
                {
                  attrs: { border: "top", color: "green lighten-2", dark: "" }
                },
                [
                  _vm._v(
                    "\n            " + _vm._s(_vm.successMessage) + "\n        "
                  )
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "v-stepper",
            { attrs: { "alt-labels": "" } },
            [
              _c(
                "v-stepper-header",
                [
                  _c(
                    "v-stepper-step",
                    {
                      attrs: {
                        step: "1",
                        complete: "",
                        "complete-icon": "mdi-check"
                      }
                    },
                    [_c("small", [_vm._v("Document Upload")])]
                  ),
                  _vm._v(" "),
                  _c("v-divider"),
                  _vm._v(" "),
                  _c(
                    "v-stepper-step",
                    {
                      attrs: {
                        step: "2",
                        complete: "",
                        "complete-icon": "mdi-check"
                      }
                    },
                    [_c("small", [_vm._v("Invoicing")])]
                  ),
                  _vm._v(" "),
                  _c("v-divider"),
                  _vm._v(" "),
                  _c("v-stepper-step", { attrs: { step: "3" } }, [
                    _c("small", [_vm._v(" Payment")])
                  ]),
                  _vm._v(" "),
                  _c("v-divider"),
                  _vm._v(" "),
                  _c("v-stepper-step", { attrs: { step: "4" } }, [
                    _c("small", [_vm._v("Finish")])
                  ])
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
        "v-row",
        [
          _c(
            "v-col",
            { attrs: { cols: "", md: "8", "offset-md": "2" } },
            [
              _c(
                "v-form",
                {
                  ref: "form",
                  attrs: { "lazy-validation": "" },
                  model: {
                    value: _vm.form,
                    callback: function($$v) {
                      _vm.form = $$v
                    },
                    expression: "form"
                  }
                },
                [
                  _c(
                    "v-card",
                    [
                      _c(
                        "v-app-bar",
                        {
                          staticClass: "cyan accent-4 white--text",
                          attrs: { flat: "" }
                        },
                        [
                          _c("v-toolbar-title", [_vm._v("Bank Payments")]),
                          _vm._v(" "),
                          _c("v-spacer"),
                          _vm._v(" "),
                          _c(
                            "inertia-link",
                            {
                              staticClass:
                                "white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small red",
                              attrs: { href: _vm.$route("Invoicing.index") }
                            },
                            [_vm._v("Back")]
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        [
                          _c(
                            "v-card",
                            { attrs: { flat: "", outlined: "" } },
                            [
                              _c("v-card-subtitle", [_vm._v("Total Invoice")]),
                              _vm._v(" "),
                              _c(
                                "v-card-text",
                                { staticClass: "headline red--text" },
                                [
                                  _c(
                                    "v-row",
                                    [
                                      _c(
                                        "v-col",
                                        { attrs: { cols: "12", md: "8" } },
                                        [_vm._v("Amount Due")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "v-col",
                                        {
                                          staticClass: "text-right",
                                          attrs: { cols: "12", md: "4" }
                                        },
                                        [
                                          _vm._v(
                                            _vm._s(_vm.currency) +
                                              _vm._s(_vm.due)
                                          )
                                        ]
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
                          _vm.balance > 0
                            ? _c(
                                "div",
                                [
                                  _c(
                                    "v-card",
                                    {
                                      staticClass: "mt-5",
                                      attrs: { flat: "", outlined: "" }
                                    },
                                    [
                                      _c("v-card-subtitle", [
                                        _vm._v(
                                          "Funds available in your suspense account"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "v-card-text",
                                        { staticClass: "headline green--text" },
                                        [
                                          _c(
                                            "v-row",
                                            [
                                              _c(
                                                "v-col",
                                                {
                                                  attrs: { cols: "12", md: "8" }
                                                },
                                                [_vm._v("Balance")]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "v-col",
                                                {
                                                  staticClass: "text-right",
                                                  attrs: { cols: "12", md: "4" }
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(_vm.currency) +
                                                      _vm._s(_vm.balance)
                                                  )
                                                ]
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
                                    "v-card",
                                    {
                                      staticClass: "mt-5",
                                      attrs: { flat: "", outlined: "" }
                                    },
                                    [
                                      _c(
                                        "v-card-actions",
                                        [
                                          _c(
                                            "inertia-link",
                                            {
                                              staticClass:
                                                "white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red",
                                              attrs: {
                                                href: _vm.$route(
                                                  "Invoicing.index"
                                                )
                                              }
                                            },
                                            [_vm._v("Back")]
                                          ),
                                          _vm._v(" "),
                                          _c("v-spacer"),
                                          _vm._v(" "),
                                          _c(
                                            "v-btn",
                                            {
                                              attrs: {
                                                rounded: "",
                                                color: "success",
                                                depressed: "",
                                                loading: _vm.loading,
                                                disabled: _vm.loading
                                              },
                                              on: { click: _vm.processPayment }
                                            },
                                            [_vm._v("Continue")]
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
                            : _c(
                                "div",
                                { staticClass: "mt-5" },
                                [
                                  _vm.balance == 0
                                    ? _c(
                                        "v-alert",
                                        {
                                          staticClass: "red--text",
                                          attrs: {
                                            border: "left",
                                            "close-text": "Close Alert",
                                            color: "white",
                                            dark: "",
                                            dismissible: ""
                                          },
                                          model: {
                                            value: _vm.alert,
                                            callback: function($$v) {
                                              _vm.alert = $$v
                                            },
                                            expression: "alert"
                                          }
                                        },
                                        [
                                          _c("ol", [
                                            _c("li", [
                                              _vm._v(
                                                " In order for us to quickly identify your payment please enter your Bank transaction reference, for non cbz account holders this usually starts with your bank initials and for CBZ bank holders enter Host reference number from your proof of payment"
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("li", [
                                              _vm._v(
                                                "For payments done using ZIPIT please enter your STANCODE as your bank reference"
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("li", [
                                              _vm._v(
                                                "International Clients can enter reference from their proof of transfer"
                                              )
                                            ])
                                          ])
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("v-text-field", {
                                    attrs: {
                                      label: "Reference Number",
                                      outlined: "",
                                      rules: _vm.referenceRules
                                    },
                                    model: {
                                      value: _vm.referencenumber,
                                      callback: function($$v) {
                                        _vm.referencenumber = $$v
                                      },
                                      expression: "referencenumber"
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("p")
                                ],
                                1
                              )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _vm.balance == 0
                        ? _c(
                            "v-card-actions",
                            [
                              _c(
                                "inertia-link",
                                {
                                  staticClass:
                                    "white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red",
                                  attrs: { href: _vm.$route("Invoicing.index") }
                                },
                                [_vm._v("Back")]
                              ),
                              _vm._v(" "),
                              _c("v-spacer"),
                              _vm._v(" "),
                              _c(
                                "v-btn",
                                {
                                  staticClass: "success",
                                  attrs: {
                                    rounded: "",
                                    depressed: "",
                                    loading: _vm.loading,
                                    disabled: _vm.loading
                                  },
                                  on: { click: _vm.upload }
                                },
                                [_vm._v("Submit")]
                              )
                            ],
                            1
                          )
                        : _vm._e()
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/userlayout.vue?vue&type=template&id=6c7579e4&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/userlayout.vue?vue&type=template&id=6c7579e4& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
                content: _vm.commentscount,
                value: _vm.commentscount,
                color: "red",
                overlap: ""
              }
            },
            [
              _c(
                "v-btn",
                {
                  attrs: { icon: "", link: "" },
                  on: {
                    click: function($event) {
                      _vm.showModel = true
                    }
                  }
                },
                [_c("v-icon", [_vm._v("mdi-email")])],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-badge",
            {
              attrs: {
                content: _vm.notifications,
                value: _vm.notifications,
                color: "green",
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
                            "\n                      " +
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
                          attrs: { href: _vm.$route("profile.companyindex") }
                        },
                        [_vm._v("Company Settings")]
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
                  attrs: { href: _vm.$route("dashboard") }
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
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("reportInvoices.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-receipt")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v("  Invoices")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("reportPayments.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-credit-card-settings-outline")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v(" Payments")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("reportDocuments.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-folder-open")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v(" Documents")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("reportUsers.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-account-multiple-plus")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v("Users")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("reportStatement.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-file-cabinet")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v("Statement")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("Mytenders.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-bell-plus")]),
                  _c("div", { staticClass: "ml-2" }, [_vm._v("Tenders")])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider"),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex",
                  attrs: { href: _vm.$route("TenderFees.index") }
                },
                [
                  _c("v-icon", [_vm._v("mdi-file-document-multiple")]),
                  _c("div", { staticClass: "ml-2" }, [
                    _vm._v("Tender Payments")
                  ])
                ],
                1
              ),
              _vm._v(" "),
              _c("v-divider")
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-main", { staticClass: "grey lighten-3" }, [_vm._t("default")], 2),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { "max-width": "600" },
          model: {
            value: _vm.showModel,
            callback: function($$v) {
              _vm.showModel = $$v
            },
            expression: "showModel"
          }
        },
        [
          _c(
            "v-card",
            [
              _c(
                "v-card-title",
                { staticClass: "red white--text" },
                [
                  _c("div", [_vm._v("Attention")]),
                  _c("v-spacer"),
                  _c(
                    "v-btn",
                    {
                      attrs: { icon: "" },
                      on: {
                        click: function($event) {
                          _vm.showModel = false
                        }
                      }
                    },
                    [_c("v-icon", [_vm._v("mdi-close")])],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c("v-card-text", [
                _vm.commentscount > 0
                  ? _c(
                      "div",
                      _vm._l(_vm.comments, function(comment) {
                        return _c(
                          "div",
                          { key: comment.id, staticClass: "pb-5 pt-5" },
                          [
                            _c("div", { staticClass: "font-weight-bold" }, [
                              _vm._v(_vm._s(comment.comment))
                            ]),
                            _vm._v(" "),
                            _c("div", [
                              _vm._v(
                                _vm._s(_vm._f("formatDate")(comment.created_at))
                              )
                            ]),
                            _vm._v(" "),
                            _c("v-divider")
                          ],
                          1
                        )
                      }),
                      0
                    )
                  : _c("div", [
                      _c("div", { staticClass: "text-center red--text pa-5" }, [
                        _vm._v(
                          "\n                       No Document Comments\n                   "
                        )
                      ])
                    ]),
                _vm._v(" "),
                _c("div")
              ])
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

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);