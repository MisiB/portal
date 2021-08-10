(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_users_tenders_fees_receiptingold_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../Layouts/userlayout */ "./resources/js/Pages/Layouts/userlayout.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['errors', 'successMessage', 'errorMessage', 'balance', 'totalDue', 'totalPaid', 'due', 'ENABLE_ECOCASH', 'currency', 'type'],
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
      bankform: true,
      bankDialog: false,
      mobileDialog: false,
      mobileForm: true,
      mode: ''
    };
  },
  methods: {
    addtransfer: function addtransfer() {
      var _this = this;

      if (this.$refs.bankform.validate()) {
        this.loading = true;
        var formdata = new FormData();
        formdata.append('proof', this.pop);
        formdata.append('bank', this.bank);
        formdata.append('referencenumber', this.referencenumber);
        formdata.append('date', this.date);
        formdata.append('type', this.type);
        this.$inertia.post('/bidders/TenderBankpayments', formdata, {
          onSuccess: function onSuccess(page) {
            _this.loading = false;
          },
          onError: function onError(error) {
            _this.loading = false;
          }
        });
      }
    },
    showMobile: function showMobile(mode) {
      this.mode = mode;
      this.mobileDialog = true;
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

/***/ "./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue":
/*!**************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _receiptingold_vue_vue_type_template_id_9118023c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./receiptingold.vue?vue&type=template&id=9118023c& */ "./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=template&id=9118023c&");
/* harmony import */ var _receiptingold_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./receiptingold.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _receiptingold_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _receiptingold_vue_vue_type_template_id_9118023c___WEBPACK_IMPORTED_MODULE_0__.render,
  _receiptingold_vue_vue_type_template_id_9118023c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue"
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

/***/ "./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_receiptingold_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./receiptingold.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_receiptingold_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=template&id=9118023c&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=template&id=9118023c& ***!
  \*********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_receiptingold_vue_vue_type_template_id_9118023c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_receiptingold_vue_vue_type_template_id_9118023c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_receiptingold_vue_vue_type_template_id_9118023c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./receiptingold.vue?vue&type=template&id=9118023c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=template&id=9118023c&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=template&id=9118023c&":
/*!************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/tenders/fees/receiptingold.vue?vue&type=template&id=9118023c& ***!
  \************************************************************************************************************************************************************************************************************************************************/
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
    { attrs: { title: "Receipting" } },
    [
      _c(
        "v-container",
        [
          _vm.errorMessage
            ? _c("v-alert", { attrs: { color: "error" } }, [
                _vm._v(
                  "\n            " + _vm._s(_vm.errorMessage) + "\n        "
                )
              ])
            : _vm._e(),
          _vm._v(" "),
          _vm.successMessage
            ? _c("v-alert", { staticClass: "success", attrs: { dark: "" } }, [
                _vm._v(
                  "\n            " + _vm._s(_vm.successMessage) + "\n        "
                )
              ])
            : _vm._e(),
          _vm._v(" "),
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
                          href: _vm.$route("dashboard")
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
                          href: _vm.$route("Tenderpayment.index")
                        }
                      },
                      [_vm._v("Tender Fee Invoice")]
                    ),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      { attrs: { text: "", link: "", disabled: "" } },
                      [_vm._v("Tender Fees")]
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
            [
              _c(
                "v-col",
                { staticClass: "col-md-8 offset-md-2", attrs: { cols: "12" } },
                [
                  _c(
                    "v-card",
                    { staticClass: "mt-5" },
                    [
                      _c("v-card-title", [_vm._v("  Receipting")]),
                      _vm._v(" "),
                      _c("v-divider"),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        [
                          _c(
                            "v-row",
                            { staticClass: "mt-4" },
                            [
                              _c("v-col", { attrs: { sm: "8" } }, [
                                _c("div", { staticClass: "title" }, [
                                  _vm._v("Total Due")
                                ])
                              ]),
                              _vm._v(" "),
                              _c("v-spacer"),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                {
                                  staticClass: "text-right",
                                  attrs: { sm: "4" }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "headline red--text" },
                                    [
                                      _c("small", [
                                        _vm._v(_vm._s(_vm.currency))
                                      ]),
                                      _vm._v(" " + _vm._s(_vm.totalDue))
                                    ]
                                  )
                                ]
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "v-row",
                            { staticClass: "mt-4" },
                            [
                              _c("v-col", { attrs: { sm: "8" } }, [
                                _c("div", { staticClass: "title" }, [
                                  _vm._v("Total Paid")
                                ])
                              ]),
                              _vm._v(" "),
                              _c("v-spacer"),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                {
                                  staticClass: "text-right",
                                  attrs: { sm: "4" }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "headline green--text" },
                                    [
                                      _c("small", [
                                        _vm._v(_vm._s(_vm.currency))
                                      ]),
                                      _vm._v(" " + _vm._s(_vm.totalPaid))
                                    ]
                                  )
                                ]
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "v-row",
                            { staticClass: "mt-4" },
                            [
                              _c("v-col", { attrs: { sm: "8" } }, [
                                _c("div", { staticClass: "title" }, [
                                  _vm._v("Balance")
                                ])
                              ]),
                              _vm._v(" "),
                              _c("v-spacer"),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                {
                                  staticClass: "text-right",
                                  attrs: { sm: "4" }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "headline red--text" },
                                    [
                                      _c("small", [
                                        _vm._v(_vm._s(_vm.currency))
                                      ]),
                                      _vm._v(" " + _vm._s(_vm.due))
                                    ]
                                  )
                                ]
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _vm.due > 0
                            ? _c(
                                "v-card",
                                { staticClass: "text-center mt-4" },
                                [
                                  _c("v-card-title", [
                                    _c(
                                      "h5",
                                      {
                                        staticClass:
                                          "headline mt-5 font-weight-black"
                                      },
                                      [_vm._v("Payment Options")]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "v-card-text",
                                    { staticClass: "text-center" },
                                    [
                                      _vm.balance > 0
                                        ? _c(
                                            "div",
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "headline green--text"
                                                },
                                                [_vm._v("Suspense Balance")]
                                              ),
                                              _c("v-spacer"),
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "headline green--text"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(_vm.currency) +
                                                      _vm._s(_vm.balance)
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "v-btn",
                                                {
                                                  attrs: {
                                                    color: "primary",
                                                    large: "",
                                                    link: "",
                                                    href: _vm.$route(
                                                      "TenderBankpayments.edit",
                                                      _vm.type
                                                    )
                                                  }
                                                },
                                                [_vm._v("Settle Invoice")]
                                              )
                                            ],
                                            1
                                          )
                                        : _c(
                                            "div",
                                            [
                                              _c(
                                                "v-card",
                                                { staticClass: "mt-4" },
                                                [
                                                  _c(
                                                    "v-card-text",
                                                    [
                                                      _c(
                                                        "v-row",
                                                        [
                                                          _c(
                                                            "v-col",
                                                            {
                                                              attrs: {
                                                                cols: "6",
                                                                sm: "3"
                                                              }
                                                            },
                                                            [
                                                              _c("v-img", {
                                                                attrs: {
                                                                  "lazy-src":
                                                                    "/img/upload.jpg",
                                                                  "max-height":
                                                                    "50",
                                                                  "max-width":
                                                                    "100",
                                                                  src:
                                                                    "/img/upload.jpg"
                                                                }
                                                              })
                                                            ],
                                                            1
                                                          ),
                                                          _vm._v(" "),
                                                          _c(
                                                            "v-col",
                                                            {
                                                              attrs: {
                                                                cols: "6",
                                                                sm: "6"
                                                              }
                                                            },
                                                            [
                                                              _c(
                                                                "div",
                                                                {
                                                                  staticClass:
                                                                    "headline"
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    "bank payments"
                                                                  )
                                                                ]
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(" "),
                                                          _c(
                                                            "v-col",
                                                            {
                                                              attrs: {
                                                                cols: "12",
                                                                sm: "3"
                                                              }
                                                            },
                                                            [
                                                              _c(
                                                                "v-btn",
                                                                {
                                                                  staticClass:
                                                                    "blue white--text",
                                                                  attrs: {
                                                                    rounded: "",
                                                                    block: "",
                                                                    depressed:
                                                                      ""
                                                                  },
                                                                  on: {
                                                                    click: function(
                                                                      $event
                                                                    ) {
                                                                      _vm.bankDialog = true
                                                                    }
                                                                  }
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    "CHOOSE"
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
                                                  )
                                                ],
                                                1
                                              ),
                                              _vm._v(" "),
                                              _vm.ENABLE_ECOCASH
                                                ? _c(
                                                    "div",
                                                    [
                                                      _vm.currency !== "USD"
                                                        ? _c(
                                                            "v-card",
                                                            {
                                                              staticClass:
                                                                "mt-4"
                                                            },
                                                            [
                                                              _c(
                                                                "v-card-text",
                                                                [
                                                                  _c(
                                                                    "v-row",
                                                                    [
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "6",
                                                                            sm:
                                                                              "3"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "v-img",
                                                                            {
                                                                              attrs: {
                                                                                "lazy-src":
                                                                                  "/img/ecocash.jpg",
                                                                                "max-height":
                                                                                  "50",
                                                                                "max-width":
                                                                                  "100",
                                                                                src:
                                                                                  "/img/ecocash.jpg"
                                                                              }
                                                                            }
                                                                          )
                                                                        ],
                                                                        1
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "6",
                                                                            sm:
                                                                              "6"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "div",
                                                                            {
                                                                              staticClass:
                                                                                "headline"
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                "ecocash"
                                                                              )
                                                                            ]
                                                                          )
                                                                        ]
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "12",
                                                                            sm:
                                                                              "3"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "v-btn",
                                                                            {
                                                                              staticClass:
                                                                                "blue white--text",
                                                                              attrs: {
                                                                                rounded:
                                                                                  "",
                                                                                block:
                                                                                  "",
                                                                                depressed:
                                                                                  ""
                                                                              },
                                                                              on: {
                                                                                click: function(
                                                                                  $event
                                                                                ) {
                                                                                  return _vm.showMobile(
                                                                                    "ECOCASH"
                                                                                  )
                                                                                }
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                "CHOOSE"
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
                                                              )
                                                            ],
                                                            1
                                                          )
                                                        : _vm._e(),
                                                      _vm._v(" "),
                                                      _vm.currency !== "USD"
                                                        ? _c(
                                                            "v-card",
                                                            {
                                                              staticClass:
                                                                "mt-4"
                                                            },
                                                            [
                                                              _c(
                                                                "v-card-text",
                                                                [
                                                                  _c(
                                                                    "v-row",
                                                                    [
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "6",
                                                                            sm:
                                                                              "3"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "v-img",
                                                                            {
                                                                              attrs: {
                                                                                "lazy-src":
                                                                                  "/img/onemoney.jpg",
                                                                                "max-height":
                                                                                  "50",
                                                                                "max-width":
                                                                                  "100",
                                                                                src:
                                                                                  "/img/onemoney.jpg"
                                                                              }
                                                                            }
                                                                          )
                                                                        ],
                                                                        1
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "6",
                                                                            sm:
                                                                              "6"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "div",
                                                                            {
                                                                              staticClass:
                                                                                "headline"
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                "onemonay"
                                                                              )
                                                                            ]
                                                                          )
                                                                        ]
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "12",
                                                                            sm:
                                                                              "3"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "v-btn",
                                                                            {
                                                                              staticClass:
                                                                                "blue white--text",
                                                                              attrs: {
                                                                                rounded:
                                                                                  "",
                                                                                block:
                                                                                  "",
                                                                                depressed:
                                                                                  ""
                                                                              },
                                                                              on: {
                                                                                click: function(
                                                                                  $event
                                                                                ) {
                                                                                  return _vm.showMobile(
                                                                                    "ONEMONEY"
                                                                                  )
                                                                                }
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                "CHOOSE"
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
                                                              )
                                                            ],
                                                            1
                                                          )
                                                        : _vm._e(),
                                                      _vm._v(" "),
                                                      _vm.currency == "USD"
                                                        ? _c(
                                                            "v-card",
                                                            {
                                                              staticClass:
                                                                "mt-4"
                                                            },
                                                            [
                                                              _c(
                                                                "v-card-text",
                                                                [
                                                                  _c(
                                                                    "v-row",
                                                                    [
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "6",
                                                                            sm:
                                                                              "3"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "v-img",
                                                                            {
                                                                              attrs: {
                                                                                "lazy-src":
                                                                                  "/img/visa.jpg",
                                                                                "max-height":
                                                                                  "50",
                                                                                "max-width":
                                                                                  "100",
                                                                                src:
                                                                                  "/img/visa.jpg"
                                                                              }
                                                                            }
                                                                          )
                                                                        ],
                                                                        1
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "6",
                                                                            sm:
                                                                              "6"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "div",
                                                                            {
                                                                              staticClass:
                                                                                "headline"
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                "payment gateway"
                                                                              )
                                                                            ]
                                                                          )
                                                                        ]
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "v-col",
                                                                        {
                                                                          attrs: {
                                                                            cols:
                                                                              "12",
                                                                            sm:
                                                                              "3"
                                                                          }
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "inertia-link",
                                                                            {
                                                                              staticClass:
                                                                                "blue white--text v-btn v-btn--block v-btn--has-bg v-btn--rounded theme--light v-size--default",
                                                                              attrs: {
                                                                                href: _vm.$route(
                                                                                  "paynow_initiate"
                                                                                )
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                "CHOOSE"
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
                                                              )
                                                            ],
                                                            1
                                                          )
                                                        : _vm._e()
                                                    ],
                                                    1
                                                  )
                                                : _vm._e()
                                            ],
                                            1
                                          )
                                    ]
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
          ),
          _vm._v(" "),
          _c(
            "v-dialog",
            {
              attrs: { "max-width": "600" },
              model: {
                value: _vm.bankDialog,
                callback: function($$v) {
                  _vm.bankDialog = $$v
                },
                expression: "bankDialog"
              }
            },
            [
              _c(
                "v-form",
                {
                  ref: "bankform",
                  attrs: { "lazy-validation": "" },
                  model: {
                    value: _vm.bankform,
                    callback: function($$v) {
                      _vm.bankform = $$v
                    },
                    expression: "bankform"
                  }
                },
                [
                  _c(
                    "v-card",
                    [
                      _c("v-card-title", [
                        _vm._v("Capture Bank Transaction Details")
                      ]),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        [
                          _c("div", { staticClass: "red--text" }, [
                            _vm._v(
                              "\n                                                       Please upload  your bank reference number and proof of payment"
                            ),
                            _c("br"),
                            _vm._v(
                              "\n                                                       Please make sure you are capturing funds that you deposited in our " +
                                _vm._s(_vm.type) +
                                " account in order to complete this transaction\n                                                  "
                            )
                          ]),
                          _vm._v(" "),
                          _c("v-text-field", {
                            staticClass: "mt-4",
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
                          _c("v-text-field", {
                            attrs: {
                              label: "Bank Name",
                              outlined: "",
                              rules: _vm.bankRules
                            },
                            model: {
                              value: _vm.bank,
                              callback: function($$v) {
                                _vm.bank = $$v
                              },
                              expression: "bank"
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "v-dialog",
                            {
                              ref: "dialog",
                              attrs: {
                                "return-value": _vm.date,
                                persistent: "",
                                width: "290px"
                              },
                              on: {
                                "update:returnValue": function($event) {
                                  _vm.date = $event
                                },
                                "update:return-value": function($event) {
                                  _vm.date = $event
                                }
                              },
                              scopedSlots: _vm._u([
                                {
                                  key: "activator",
                                  fn: function(ref) {
                                    var on = ref.on
                                    var attrs = ref.attrs
                                    return [
                                      _c(
                                        "v-text-field",
                                        _vm._g(
                                          _vm._b(
                                            {
                                              attrs: {
                                                rules: _vm.dateRules,
                                                label: "Transaction Date",
                                                "prepend-inner-icon":
                                                  "mdi-calendar",
                                                readonly: "",
                                                outlined: ""
                                              },
                                              model: {
                                                value: _vm.date,
                                                callback: function($$v) {
                                                  _vm.date = $$v
                                                },
                                                expression: "date"
                                              }
                                            },
                                            "v-text-field",
                                            attrs,
                                            false
                                          ),
                                          on
                                        )
                                      )
                                    ]
                                  }
                                }
                              ]),
                              model: {
                                value: _vm.modal,
                                callback: function($$v) {
                                  _vm.modal = $$v
                                },
                                expression: "modal"
                              }
                            },
                            [
                              _vm._v(" "),
                              _c(
                                "v-date-picker",
                                {
                                  attrs: { scrollable: "" },
                                  model: {
                                    value: _vm.date,
                                    callback: function($$v) {
                                      _vm.date = $$v
                                    },
                                    expression: "date"
                                  }
                                },
                                [
                                  _c("v-spacer"),
                                  _vm._v(" "),
                                  _c(
                                    "v-btn",
                                    {
                                      attrs: { text: "", color: "primary" },
                                      on: {
                                        click: function($event) {
                                          _vm.modal = false
                                        }
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                                Cancel\n                                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-btn",
                                    {
                                      attrs: { text: "", color: "primary" },
                                      on: {
                                        click: function($event) {
                                          return _vm.$refs.dialog.save(_vm.date)
                                        }
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                                OK\n                                            "
                                      )
                                    ]
                                  )
                                ],
                                1
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c("v-file-input", {
                            attrs: {
                              label: "Attach Proof of Payment",
                              rules: _vm.popRule
                            },
                            model: {
                              value: _vm.pop,
                              callback: function($$v) {
                                _vm.pop = $$v
                              },
                              expression: "pop"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-actions",
                        [
                          _c(
                            "v-btn",
                            {
                              staticClass: "error",
                              attrs: { rounded: "", depressed: "" },
                              on: {
                                click: function($event) {
                                  _vm.bankDialog = false
                                }
                              }
                            },
                            [_vm._v("Cancel")]
                          ),
                          _vm._v(" "),
                          _c("v-spacer"),
                          _vm._v(" "),
                          _c(
                            "v-btn",
                            {
                              staticClass: "success",
                              attrs: { rounded: "", depressed: "" },
                              on: { click: _vm.addtransfer }
                            },
                            [_vm._v("Submit")]
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
            "v-dialog",
            {
              attrs: { "max-width": "400" },
              model: {
                value: _vm.mobileDialog,
                callback: function($$v) {
                  _vm.mobileDialog = $$v
                },
                expression: "mobileDialog"
              }
            },
            [
              _c(
                "v-form",
                {
                  key: "mobileForm",
                  attrs: { "lazy-validation": "" },
                  model: {
                    value: _vm.mobileForm,
                    callback: function($$v) {
                      _vm.mobileForm = $$v
                    },
                    expression: "mobileForm"
                  }
                },
                [
                  _c(
                    "v-card",
                    [
                      _c(
                        "v-card-title",
                        [
                          _c("h5", [_vm._v(_vm._s(_vm.mode))]),
                          _c("v-spacer"),
                          _vm._v(" "),
                          _c(
                            "v-btn",
                            {
                              attrs: { icon: "" },
                              on: {
                                click: function($event) {
                                  _vm.mobileDialog = false
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
                      _c(
                        "v-card-text",
                        [
                          _c("v-text-field", {
                            attrs: {
                              label: "Mobile Number",
                              "prepend-inner-icon": "mdi-cellphone",
                              outlined: "",
                              rules: _vm.phoneRules
                            },
                            model: {
                              value: _vm.phone,
                              callback: function($$v) {
                                _vm.phone = $$v
                              },
                              expression: "phone"
                            }
                          }),
                          _vm._v(" "),
                          _c("v-text-field", {
                            attrs: {
                              label: "Amount",
                              "prepend-inner-icon": "mdi-currency-usd",
                              outlined: "",
                              rules: _vm.amountRules
                            },
                            model: {
                              value: _vm.amount,
                              callback: function($$v) {
                                _vm.amount = $$v
                              },
                              expression: "amount"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-actions",
                        [
                          _c(
                            "v-btn",
                            {
                              staticClass: "error",
                              attrs: { rounded: "", depressed: "" },
                              on: {
                                click: function($event) {
                                  _vm.mobileDialog = false
                                }
                              }
                            },
                            [_vm._v("Cancel")]
                          ),
                          _vm._v(" "),
                          _c("v-spacer"),
                          _vm._v(" "),
                          _c(
                            "v-btn",
                            {
                              staticClass: "success",
                              attrs: { rounded: "", depressed: "" },
                              on: { click: _vm.addtransfer }
                            },
                            [_vm._v("Submit")]
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



/***/ })

}]);