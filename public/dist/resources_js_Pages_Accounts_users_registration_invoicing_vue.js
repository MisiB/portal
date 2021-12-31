(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_users_registration_invoicing_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['errors', 'successMessage', 'errorMessage', 'documents', 'invoices', 'totalinvoiced', 'totalreceipted', 'wallet', 'balance'],
  components: {
    userlayout: _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      loading: false,
      code: '',
      id: '',
      confirmDelete: false
    };
  },
  methods: {
    printInvoice: function printInvoice(inv) {
      window.open(this.$route('Invoicing.show', $inv), '_blank');
    },
    deleteInv: function deleteInv(id, code) {
      var _this = this;

      vue__WEBPACK_IMPORTED_MODULE_1__.default.swal({
        title: 'Are you sure?',
        text: "You want to delete " + code,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if (result.isConfirmed) {
          _this.loading = true;

          _this.$inertia["delete"](_this.$route('Invoicing.destroy', id), {
            onSuccess: function onSuccess() {
              _this.loading = false;
            },
            onError: function onError() {
              _this.loading = false;
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

/***/ "./resources/js/Pages/Accounts/users/registration/invoicing.vue":
/*!**********************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/registration/invoicing.vue ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _invoicing_vue_vue_type_template_id_fd590b2a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./invoicing.vue?vue&type=template&id=fd590b2a& */ "./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=template&id=fd590b2a&");
/* harmony import */ var _invoicing_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./invoicing.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _invoicing_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _invoicing_vue_vue_type_template_id_fd590b2a___WEBPACK_IMPORTED_MODULE_0__.render,
  _invoicing_vue_vue_type_template_id_fd590b2a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/users/registration/invoicing.vue"
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

/***/ "./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_invoicing_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./invoicing.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_invoicing_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=template&id=fd590b2a&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=template&id=fd590b2a& ***!
  \*****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_invoicing_vue_vue_type_template_id_fd590b2a___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_invoicing_vue_vue_type_template_id_fd590b2a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_invoicing_vue_vue_type_template_id_fd590b2a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./invoicing.vue?vue&type=template&id=fd590b2a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=template&id=fd590b2a&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=template&id=fd590b2a&":
/*!********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/registration/invoicing.vue?vue&type=template&id=fd590b2a& ***!
  \********************************************************************************************************************************************************************************************************************************************/
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
    { attrs: { title: "Invoicing" } },
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
                  _c("v-stepper-step", { attrs: { step: "2" } }, [
                    _c("small", [_vm._v("Invoicing")])
                  ]),
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
          ),
          _vm._v(" "),
          _c(
            "v-card",
            { staticClass: "mt-5" },
            [
              _c(
                "v-card-title",
                [
                  _c(
                    "v-row",
                    { staticClass: "pa-3" },
                    [
                      _c("v-col", { attrs: { cols: "12", md: "10" } }, [
                        _c("div", { staticClass: "title" }, [
                          _vm._v("Invoicing")
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "v-col",
                        { attrs: { cols: "12", md: "2" } },
                        [
                          _c(
                            "inertia-link",
                            {
                              staticClass:
                                "white--text v-btn v-btn--block v-btn--has-bg v-btn--rounded theme--light v-size--small blue",
                              attrs: { href: _vm.$route("Invoicing.create") }
                            },
                            [_vm._v("Choose Category")]
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
              _c("v-divider"),
              _vm._v(" "),
              _c("v-card-text", [
                _vm.invoices.length > 0
                  ? _c(
                      "div",
                      [
                        _vm._l(_vm.invoices, function(inv) {
                          return _c(
                            "div",
                            { key: inv.id },
                            [
                              _c(
                                "v-row",
                                { staticClass: "mb-1 mt-1" },
                                [
                                  _c(
                                    "v-col",
                                    { attrs: { cols: "12", sm: "2" } },
                                    [
                                      _c("div", { staticClass: "grey--text" }, [
                                        _c("small", [_vm._v("Date")])
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        { staticClass: "black--text" },
                                        [
                                          _vm._v(
                                            _vm._s(
                                              _vm._f("formatDate")(
                                                inv.created_at
                                              )
                                            )
                                          )
                                        ]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-col",
                                    { attrs: { cols: "12", sm: "5" } },
                                    [
                                      _c("div", { staticClass: "grey--text" }, [
                                        _c("small", [
                                          _vm._v(_vm._s(inv.category.name))
                                        ])
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        { staticClass: "black--text" },
                                        [_vm._v(_vm._s(inv.category.code))]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-col",
                                    { attrs: { cols: "6", sm: "2" } },
                                    [
                                      _c("div", { staticClass: "grey--text" }, [
                                        _c("small", [_vm._v("Invoice number")])
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        { staticClass: "black--text" },
                                        [_vm._v(_vm._s(inv.invoice_number))]
                                      ),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "red--text" }, [
                                        _vm._v(_vm._s(inv.settlement))
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-col",
                                    {
                                      staticClass: "text-right",
                                      attrs: { cols: "6", sm: "3" }
                                    },
                                    [
                                      _c(
                                        "div",
                                        [
                                          _c("small", [
                                            _vm._v(_vm._s(inv.currency.name))
                                          ]),
                                          _vm._v(" " + _vm._s(inv.cost) + " "),
                                          _c(
                                            "v-btn",
                                            {
                                              attrs: {
                                                small: "",
                                                fab: "",
                                                color: "error",
                                                rounded: "",
                                                depressed: ""
                                              },
                                              on: {
                                                click: function($event) {
                                                  return _vm.deleteInv(
                                                    inv.id,
                                                    inv.category.code
                                                  )
                                                }
                                              }
                                            },
                                            [
                                              _c("v-icon", [
                                                _vm._v("mdi-close")
                                              ])
                                            ],
                                            1
                                          )
                                        ],
                                        1
                                      )
                                    ]
                                  )
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c("v-divider")
                            ],
                            1
                          )
                        }),
                        _vm._v(" "),
                        _c(
                          "v-row",
                          { staticClass: "mt-4" },
                          [
                            _c("v-col", { attrs: { sm: "10" } }, [
                              _c("div", { staticClass: "title" }, [
                                _vm._v("Total Due")
                              ])
                            ]),
                            _vm._v(" "),
                            _c("v-spacer"),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { staticClass: "text-right", attrs: { sm: "2" } },
                              [
                                _c("div", { staticClass: "headline" }, [
                                  _c("small", [
                                    _vm._v(
                                      _vm._s(_vm.invoices[0].currency.name)
                                    )
                                  ]),
                                  _vm._v(" " + _vm._s(_vm.totalinvoiced))
                                ])
                              ]
                            )
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("v-divider"),
                        _vm._v(" "),
                        _c(
                          "v-row",
                          { staticClass: "mt-4" },
                          [
                            _c("v-col", { attrs: { sm: "10" } }, [
                              _c("div", { staticClass: "title" }, [
                                _vm._v("Total Paid")
                              ])
                            ]),
                            _vm._v(" "),
                            _c("v-spacer"),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { staticClass: "text-right", attrs: { sm: "2" } },
                              [
                                _c("div", { staticClass: "headline" }, [
                                  _c("small", [
                                    _vm._v(
                                      _vm._s(_vm.invoices[0].currency.name)
                                    )
                                  ]),
                                  _vm._v(" " + _vm._s(_vm.totalreceipted))
                                ])
                              ]
                            )
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("v-divider"),
                        _vm._v(" "),
                        _c(
                          "v-row",
                          { staticClass: "mt-4" },
                          [
                            _c("v-col", { attrs: { sm: "10" } }, [
                              _c("div", { staticClass: "title" }, [
                                _vm._v("Balance")
                              ])
                            ]),
                            _vm._v(" "),
                            _c("v-spacer"),
                            _vm._v(" "),
                            _c(
                              "v-col",
                              { staticClass: "text-right", attrs: { sm: "2" } },
                              [
                                _c("div", { staticClass: "headline" }, [
                                  _c("small", [
                                    _vm._v(
                                      _vm._s(_vm.invoices[0].currency.name)
                                    )
                                  ]),
                                  _vm._v(
                                    " " +
                                      _vm._s(
                                        _vm.totalinvoiced - _vm.totalreceipted
                                      )
                                  )
                                ])
                              ]
                            )
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("v-divider")
                      ],
                      2
                    )
                  : _c("div", { staticClass: "pa-lg-16" }, [
                      _c(
                        "p",
                        {
                          staticClass:
                            " pa-10 red lighten-5 red--text text-center"
                        },
                        [
                          _vm._v(
                            "\n                        No items added to invoice as yet\n                      "
                          )
                        ]
                      )
                    ])
              ]),
              _vm._v(" "),
              _vm.invoices.length > 0
                ? _c(
                    "v-card-actions",
                    [
                      _c(
                        "v-btn",
                        {
                          staticClass: "white--text",
                          attrs: {
                            color: "blue",
                            depressed: "",
                            large: "",
                            link: "",
                            href: _vm.$route(
                              "Invoicing.show",
                              _vm.invoices[0].invoice_number
                            ),
                            loading: _vm.loading,
                            disabled: _vm.loading
                          }
                        },
                        [_vm._v("Print Invoice")]
                      ),
                      _vm._v(" "),
                      _c("v-spacer"),
                      _vm._v(" "),
                      _c(
                        "inertia-link",
                        {
                          staticClass:
                            "v-btn v-btn--is-depressed v-btn--has-bg theme--light v-size--default  success",
                          attrs: { href: _vm.$route("payment") }
                        },
                        [_vm._v("Make Payment")]
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
      ),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { "max-width": "400" },
          model: {
            value: _vm.confirmDelete,
            callback: function($$v) {
              _vm.confirmDelete = $$v
            },
            expression: "confirmDelete"
          }
        },
        [
          _c(
            "v-card",
            [
              _c("v-card-title", [_vm._v("Confirm Delete")]),
              _vm._v(" "),
              _c("v-card-text", [
                _c("div", [
                  _vm._v(
                    "Are you sure you want to delete " +
                      _vm._s(_vm.code) +
                      "  from your invoice"
                  )
                ])
              ]),
              _vm._v(" "),
              _c(
                "v-card-actions",
                [
                  _c(
                    "v-btn",
                    {
                      staticClass: "white--text",
                      attrs: { rounded: "", depressed: "", color: "red" },
                      on: {
                        click: function($event) {
                          _vm.confirmDelete = false
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
                      staticClass: "white--text",
                      attrs: {
                        rounded: "",
                        depressed: "",
                        color: "green",
                        loading: _vm.loading,
                        disabled: _vm.loading
                      },
                      on: {
                        click: function($event) {
                          return _vm.deleteInv()
                        }
                      }
                    },
                    [_vm._v("Confirm")]
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