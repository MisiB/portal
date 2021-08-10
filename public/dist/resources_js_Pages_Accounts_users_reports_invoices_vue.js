(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_users_reports_invoices_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../Layouts/userlayout */ "./resources/js/Pages/Layouts/userlayout.vue");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['errors', 'successMessage', 'errorMessage', 'user', 'invoices'],
  components: {
    userlayout: _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      loading: false,
      receiptModel: false,
      receipts: []
    };
  },
  methods: {
    openReceipts: function openReceipts(receipts) {
      this.receiptModel = true;
      this.receipts = receipts;
    },
    cancelInvoice: function cancelInvoice(id) {
      var _this = this;

      vue__WEBPACK_IMPORTED_MODULE_1__.default.swal({
        title: 'Are you sure?',
        text: "You want to Cancel Invoice ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel'
      }).then(function (result) {
        if (result.isConfirmed) {
          _this.loading = true;

          _this.$inertia["delete"](_this.$route('reportInvoices.destroy', id), {
            onSuccess: function onSuccess(page) {
              if (_this.successMessage) {
                vue__WEBPACK_IMPORTED_MODULE_1__.default.swal('Success', _this.successMessage, 'success');
              }

              if (_this.errorMessage) {
                vue__WEBPACK_IMPORTED_MODULE_1__.default.swal('Error', _this.errorMessage, 'error');
              }
            }
          });
        } else {
          _this.loading = false;
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

/***/ "./resources/js/Pages/Accounts/users/reports/invoices.vue":
/*!****************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/reports/invoices.vue ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _invoices_vue_vue_type_template_id_3915fb0d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./invoices.vue?vue&type=template&id=3915fb0d& */ "./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=template&id=3915fb0d&");
/* harmony import */ var _invoices_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./invoices.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _invoices_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _invoices_vue_vue_type_template_id_3915fb0d___WEBPACK_IMPORTED_MODULE_0__.render,
  _invoices_vue_vue_type_template_id_3915fb0d___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/users/reports/invoices.vue"
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

/***/ "./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_invoices_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./invoices.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_invoices_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=template&id=3915fb0d&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=template&id=3915fb0d& ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_invoices_vue_vue_type_template_id_3915fb0d___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_invoices_vue_vue_type_template_id_3915fb0d___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_invoices_vue_vue_type_template_id_3915fb0d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./invoices.vue?vue&type=template&id=3915fb0d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=template&id=3915fb0d&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=template&id=3915fb0d&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/reports/invoices.vue?vue&type=template&id=3915fb0d& ***!
  \**************************************************************************************************************************************************************************************************************************************/
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
    { attrs: { title: "Invoices Report" } },
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
                          href: _vm.$route("dashboard")
                        }
                      },
                      [_vm._v("Dashboard")]
                    ),
                    _vm._v(" "),
                    _c(
                      "v-btn",
                      { attrs: { text: "", link: "", disabled: "" } },
                      [_vm._v("Invoices")]
                    )
                  ],
                  1
                )
              ])
            ],
            1
          ),
          _vm._v(" "),
          _vm.errorMessage
            ? _c(
                "v-alert",
                {
                  staticClass: "mt-4",
                  attrs: { color: "red lighten-2", dark: "" }
                },
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
                  staticClass: "mt-4",
                  attrs: { color: "green lighten-2", dark: "" }
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
            "v-card",
            { staticClass: "mt-5", attrs: { flat: "" } },
            [
              _c(
                "v-card-text",
                [
                  _c("v-simple-table", {
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function() {
                          return [
                            _c("thead", [
                              _c("tr", [
                                _c("th", [_vm._v("Date")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Invoice Number")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Description")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Amount")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Status")]),
                                _vm._v(" "),
                                _c("th")
                              ])
                            ]),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              [
                                _vm.invoices.length > 0
                                  ? _vm._l(_vm.invoices, function(inv) {
                                      return _c(
                                        "tr",
                                        {
                                          key: inv.id,
                                          staticClass: "pt-2 pb-2"
                                        },
                                        [
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(
                                                _vm._f("formatDate")(
                                                  inv.created_at
                                                )
                                              )
                                            )
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(_vm._s(inv.invoice_number))
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _c("div", [
                                              _vm._v(_vm._s(inv.category.code))
                                            ]),
                                            _vm._v(" "),
                                            _c("div", [
                                              _c("small", [
                                                _vm._v(
                                                  _vm._s(inv.category.name)
                                                )
                                              ])
                                            ])
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(
                                              _vm._s(inv.currency.name) +
                                                _vm._s(inv.cost)
                                            )
                                          ]),
                                          _vm._v(" "),
                                          _c("td", [
                                            _vm._v(_vm._s(inv.status))
                                          ]),
                                          _vm._v(" "),
                                          _c(
                                            "td",
                                            { staticClass: "d-flex" },
                                            [
                                              inv.status == "AWAITING"
                                                ? _c(
                                                    "v-btn",
                                                    {
                                                      staticClass:
                                                        "white--text mt-1 ml-1",
                                                      attrs: {
                                                        color: "error",
                                                        depressed: "",
                                                        small: "",
                                                        loading: _vm.loading,
                                                        disabled: _vm.loading
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          return _vm.cancelInvoice(
                                                            inv.id
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [_vm._v("CANCEL")]
                                                  )
                                                : _vm._e(),
                                              _vm._v(" "),
                                              inv.status != "CANCELLED"
                                                ? _c(
                                                    "v-btn",
                                                    {
                                                      staticClass:
                                                        "white--text mt-1 ml-1",
                                                      attrs: {
                                                        color: "green",
                                                        depressed: "",
                                                        small: "",
                                                        link: "",
                                                        href: _vm.$route(
                                                          "Invoicing.show",
                                                          inv.invoice_number
                                                        )
                                                      }
                                                    },
                                                    [_vm._v("Print")]
                                                  )
                                                : _vm._e(),
                                              _vm._v(" "),
                                              _c(
                                                "v-btn",
                                                {
                                                  staticClass:
                                                    "white--text mt-1 mb-1 ml-1",
                                                  attrs: {
                                                    color: "blue",
                                                    depressed: "",
                                                    small: "",
                                                    link: "",
                                                    href: _vm.$route(
                                                      "reportInvoices.show",
                                                      inv.invoice_number
                                                    )
                                                  }
                                                },
                                                [_vm._v("Check")]
                                              ),
                                              _vm._v(" "),
                                              inv.receipts.length > 0
                                                ? _c(
                                                    "v-btn",
                                                    {
                                                      staticClass:
                                                        "mt-1 mb-1 ml-1",
                                                      attrs: {
                                                        depressed: "",
                                                        small: "",
                                                        link: "",
                                                        href: _vm.$route(
                                                          "reportReceipts.show",
                                                          inv.invoice_number
                                                        )
                                                      }
                                                    },
                                                    [_vm._v("Print receipts")]
                                                  )
                                                : _vm._e()
                                            ],
                                            1
                                          )
                                        ]
                                      )
                                    })
                                  : [
                                      _c("tr", [
                                        _c(
                                          "td",
                                          {
                                            staticClass: "text-center red-text",
                                            attrs: { colspan: "6" }
                                          },
                                          [_vm._v("No invoices found as yet")]
                                        )
                                      ])
                                    ]
                              ],
                              2
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
      ),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { "max-width": "800" },
          model: {
            value: _vm.receiptModel,
            callback: function($$v) {
              _vm.receiptModel = $$v
            },
            expression: "receiptModel"
          }
        },
        [
          _c(
            "v-card",
            [
              _c(
                "v-card-title",
                [
                  _c("div", [_vm._v("Receipts")]),
                  _vm._v(" "),
                  _c("v-spacer"),
                  _vm._v(" "),
                  _c(
                    "v-btn",
                    {
                      attrs: { icon: "" },
                      on: {
                        click: function($event) {
                          _vm.receiptModel = false
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
                  _c("v-simple-table", {
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function() {
                          return [
                            _c("thead", [
                              _c("tr", [
                                _c("th", [_vm._v("Date")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Recipt Number")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Type")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Method")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Amount")]),
                                _vm._v(" "),
                                _c("th")
                              ])
                            ]),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.receipts, function(rcpt) {
                                return _c("tr", { key: rcpt.id }, [
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        _vm._f("formatDate")(rcpt.created_at)
                                      )
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(_vm._s(rcpt.receiptnumber))
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [_vm._v(_vm._s(rcpt.type))]),
                                  _vm._v(" "),
                                  _c("td", [_vm._v(_vm._s(rcpt.method))]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(rcpt.currency) +
                                        _vm._s(rcpt.amount)
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    [
                                      _c(
                                        "v-btn",
                                        {
                                          staticClass: "white--text mt-1",
                                          attrs: {
                                            color: "green",
                                            depressed: "",
                                            small: "",
                                            link: "",
                                            href: _vm.$route(
                                              "reportReceipts.show",
                                              rcpt.receiptnumber
                                            )
                                          }
                                        },
                                        [_vm._v("Print")]
                                      )
                                    ],
                                    1
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