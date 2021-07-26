(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_entity_notices_add_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['errors', 'successMessage', 'errorMessage', 'currency', 'procurementtypes', 'categories', 'classifications'],
  components: {
    userlayout: _Layouts_entityLayout__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      form: this.$inertia.form({
        title: '',
        limit: '',
        close_date: '',
        close_time: '',
        currency: '',
        bidvalue: '',
        noticetype: '',
        procurementtype: '',
        bidsecurity: '',
        validityperiod: '',
        sitevisitlocation: '',
        site_visit_date: '',
        site_visit_time: '',
        instructions: '',
        description: '',
        classification: '',
        filename: null,
        products: []
      }),
      clienttypes: ['Domestic', 'International'],
      periodlist: ['30', '60', '90'],
      bondcheck: '',
      sitevisitcheck: '',
      productlist: [],
      addModel: false,
      name: '',
      quantity: '',
      select: ''
    };
  },
  methods: {
    addProduct: function addProduct() {
      this.productlist.push({
        name: this.name,
        quantity: this.quantity,
        categories: this.select
      });
      this.name = "";
      this.quantity = "";
      this.select = "";
      this.addModel = false;
    },
    deleteProduct: function deleteProduct(key) {
      this.productlist.splice(1, key);
    },
    submit: function submit() {
      this.form.products = this.productlist;
      this.form.post(this.$route('procurementnotice.store'), {});
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

/***/ "./resources/js/Pages/Accounts/entity/notices/add.vue":
/*!************************************************************!*\
  !*** ./resources/js/Pages/Accounts/entity/notices/add.vue ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _add_vue_vue_type_template_id_521d2fb1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add.vue?vue&type=template&id=521d2fb1& */ "./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=template&id=521d2fb1&");
/* harmony import */ var _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./add.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _add_vue_vue_type_template_id_521d2fb1___WEBPACK_IMPORTED_MODULE_0__.render,
  _add_vue_vue_type_template_id_521d2fb1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/entity/notices/add.vue"
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

/***/ "./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./add.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=template&id=521d2fb1&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=template&id=521d2fb1& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_521d2fb1___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_521d2fb1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_521d2fb1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./add.vue?vue&type=template&id=521d2fb1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=template&id=521d2fb1&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=template&id=521d2fb1&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/entity/notices/add.vue?vue&type=template&id=521d2fb1& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
                      [_vm._v("New")]
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
                      _c("v-card-title", [
                        _c("div", [_vm._v("New Procurement Notice")])
                      ]),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        [
                          _c(
                            "v-row",
                            [
                              _c(
                                "v-col",
                                [
                                  _c("v-text-field", {
                                    attrs: {
                                      label: "Title",
                                      outlined: "",
                                      "error-messages": _vm.errors.title
                                    },
                                    model: {
                                      value: _vm.form.title,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "title", $$v)
                                      },
                                      expression: "form.title"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                [
                                  _c("v-text-field", {
                                    attrs: {
                                      label: "Participation Limit",
                                      outlined: "",
                                      "error-messages": _vm.errors.limit
                                    },
                                    model: {
                                      value: _vm.form.limit,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "limit", $$v)
                                      },
                                      expression: "form.limit"
                                    }
                                  })
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
                                [
                                  _c("v-text-field", {
                                    attrs: {
                                      label: "Closing Date",
                                      type: "date",
                                      outlined: "",
                                      "error-messages": _vm.errors.close_date
                                    },
                                    model: {
                                      value: _vm.form.close_date,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "close_date", $$v)
                                      },
                                      expression: "form.close_date"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                [
                                  _c("v-text-field", {
                                    attrs: {
                                      label: "Closing time",
                                      type: "time",
                                      outlined: "",
                                      "error-messages": _vm.errors.close_time
                                    },
                                    model: {
                                      value: _vm.form.close_time,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "close_time", $$v)
                                      },
                                      expression: "form.close_time"
                                    }
                                  })
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
                                [
                                  _c("v-select", {
                                    attrs: {
                                      items: _vm.currency,
                                      "item-text": "name",
                                      "item-value": "id",
                                      label: "Currency of trade",
                                      outlined: "",
                                      "error-messages": _vm.errors.currency
                                    },
                                    model: {
                                      value: _vm.form.currency,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "currency", $$v)
                                      },
                                      expression: "form.currency"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                [
                                  _c("v-text-field", {
                                    attrs: {
                                      label: "Estimate Bid value",
                                      outlined: "",
                                      "error-messages": _vm.errors.bidvalue
                                    },
                                    model: {
                                      value: _vm.form.bidvalue,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "bidvalue", $$v)
                                      },
                                      expression: "form.bidvalue"
                                    }
                                  })
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
                                [
                                  _c("v-select", {
                                    attrs: {
                                      items: _vm.clienttypes,
                                      label: "Notice type",
                                      outlined: "",
                                      "error-messages": _vm.errors.noticetype
                                    },
                                    model: {
                                      value: _vm.form.noticetype,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "noticetype", $$v)
                                      },
                                      expression: "form.noticetype"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                [
                                  _c("v-select", {
                                    attrs: {
                                      items: _vm.procurementtypes,
                                      "item-text": "name",
                                      "item-value": "id",
                                      label: "Procurement type",
                                      outlined: "",
                                      "error-messages":
                                        _vm.errors.procurementtype
                                    },
                                    model: {
                                      value: _vm.form.procurementtype,
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.form,
                                          "procurementtype",
                                          $$v
                                        )
                                      },
                                      expression: "form.procurementtype"
                                    }
                                  })
                                ],
                                1
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _vm.form.procurementtype == "2"
                            ? _c(
                                "v-row",
                                [
                                  _c(
                                    "v-col",
                                    [
                                      _c(
                                        "v-radio-group",
                                        {
                                          attrs: { row: "" },
                                          model: {
                                            value: _vm.bondcheck,
                                            callback: function($$v) {
                                              _vm.bondcheck = $$v
                                            },
                                            expression: "bondcheck"
                                          }
                                        },
                                        [
                                          _c("v-radio", {
                                            attrs: {
                                              label:
                                                "Yes we require Bid Security",
                                              value: "Y"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _c("v-radio", {
                                            attrs: {
                                              label:
                                                "No we do not require Bid Security",
                                              value: "N"
                                            }
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
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.bondcheck == "Y"
                            ? _c(
                                "v-row",
                                [
                                  _c(
                                    "v-col",
                                    [
                                      _c("v-text-field", {
                                        attrs: {
                                          label: "Bid Security Value",
                                          outlined: "",
                                          "error-messages":
                                            _vm.errors.bidsecurity
                                        },
                                        model: {
                                          value: _vm.form.bidsecurity,
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.form,
                                              "bidsecurity",
                                              $$v
                                            )
                                          },
                                          expression: "form.bidsecurity"
                                        }
                                      })
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-col",
                                    [
                                      _c("v-select", {
                                        attrs: {
                                          label: "Bid Validity Period (days)",
                                          items: _vm.periodlist,
                                          outlined: "",
                                          "error-messages":
                                            _vm.errors.validityperiod
                                        },
                                        model: {
                                          value: _vm.form.validityperiod,
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.form,
                                              "validityperiod",
                                              $$v
                                            )
                                          },
                                          expression: "form.validityperiod"
                                        }
                                      })
                                    ],
                                    1
                                  )
                                ],
                                1
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _c(
                            "v-row",
                            [
                              _c(
                                "v-col",
                                [
                                  _c("v-select", {
                                    attrs: {
                                      label: "Classification",
                                      items: _vm.classifications,
                                      "item-text": "name",
                                      "item-value": "id",
                                      outlined: "",
                                      "error-messages":
                                        _vm.errors.classification
                                    },
                                    model: {
                                      value: _vm.form.classification,
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.form,
                                          "classification",
                                          $$v
                                        )
                                      },
                                      expression: "form.classification"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                [
                                  _c("v-file-input", {
                                    attrs: {
                                      "show-size": "",
                                      counter: "",
                                      outlined: "",
                                      label: "Attach SBD Document",
                                      "prepend-icon": "mdi-paperclip",
                                      accept: ".pdf",
                                      "error-messages": _vm.errors.filename
                                    },
                                    model: {
                                      value: _vm.form.filename,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "filename", $$v)
                                      },
                                      expression: "form.filename"
                                    }
                                  })
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
                                [
                                  _c(
                                    "v-radio-group",
                                    {
                                      attrs: { row: "" },
                                      model: {
                                        value: _vm.sitevisitcheck,
                                        callback: function($$v) {
                                          _vm.sitevisitcheck = $$v
                                        },
                                        expression: "sitevisitcheck"
                                      }
                                    },
                                    [
                                      _c("v-radio", {
                                        attrs: {
                                          label: "Yes we require site visit",
                                          value: "Y"
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c("v-radio", {
                                        attrs: {
                                          label:
                                            "No we do not require site visit",
                                          value: "N"
                                        }
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
                          _vm.sitevisitcheck == "Y"
                            ? _c(
                                "v-row",
                                [
                                  _c(
                                    "v-col",
                                    [
                                      _c("v-text-field", {
                                        attrs: {
                                          label: "Site visit location",
                                          outlined: "",
                                          "error-messages":
                                            _vm.errors.sitevisitlocation
                                        },
                                        model: {
                                          value: _vm.form.sitevisitlocation,
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.form,
                                              "sitevisitlocation",
                                              $$v
                                            )
                                          },
                                          expression: "form.sitevisitlocation"
                                        }
                                      })
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-col",
                                    [
                                      _c("v-text-field", {
                                        attrs: {
                                          label: "Site Visit Date",
                                          type: "date",
                                          outlined: "",
                                          "error-messages":
                                            _vm.errors.site_visit_date
                                        },
                                        model: {
                                          value: _vm.form.site_visit_date,
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.form,
                                              "site_visit_date",
                                              $$v
                                            )
                                          },
                                          expression: "form.site_visit_date"
                                        }
                                      })
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "v-col",
                                    [
                                      _c("v-text-field", {
                                        attrs: {
                                          label: "Site Visit Time",
                                          type: "time",
                                          outlined: "",
                                          "error-messages":
                                            _vm.errors.site_visit_time
                                        },
                                        model: {
                                          value: _vm.form.site_visit_time,
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.form,
                                              "site_visit_time",
                                              $$v
                                            )
                                          },
                                          expression: "form.site_visit_time"
                                        }
                                      })
                                    ],
                                    1
                                  )
                                ],
                                1
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _c(
                            "v-row",
                            [
                              _c(
                                "v-col",
                                [
                                  _c("v-textarea", {
                                    attrs: {
                                      label: "Response Instructions",
                                      outlined: "",
                                      "error-messages": _vm.errors.instructions
                                    },
                                    model: {
                                      value: _vm.form.instructions,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "instructions", $$v)
                                      },
                                      expression: "form.instructions"
                                    }
                                  })
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
                                [
                                  _c("v-textarea", {
                                    attrs: {
                                      label: "Procurement Notice Description",
                                      outlined: "",
                                      "error-messages": _vm.errors.description
                                    },
                                    model: {
                                      value: _vm.form.description,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "description", $$v)
                                      },
                                      expression: "form.description"
                                    }
                                  })
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
                                [
                                  _c(
                                    "v-card",
                                    [
                                      _c(
                                        "v-card-title",
                                        { staticClass: "blue lighten-3" },
                                        [
                                          _c("div", [
                                            _vm._v("Product/Service Required")
                                          ]),
                                          _vm._v(" "),
                                          _c("v-spacer"),
                                          _vm._v(" "),
                                          _c(
                                            "v-btn",
                                            {
                                              staticClass: "mx-2",
                                              attrs: {
                                                fab: "",
                                                dark: "",
                                                depressed: "",
                                                color: "indigo"
                                              },
                                              on: {
                                                click: function($event) {
                                                  _vm.addModel = true
                                                }
                                              }
                                            },
                                            [
                                              _c(
                                                "v-icon",
                                                { attrs: { dark: "" } },
                                                [
                                                  _vm._v(
                                                    "\n                                     mdi-plus\n                                 "
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
                                                        _c("th", [
                                                          _vm._v("Product")
                                                        ]),
                                                        _vm._v(" "),
                                                        _c("th", [
                                                          _vm._v("Quantity")
                                                        ]),
                                                        _vm._v(" "),
                                                        _c("th", [
                                                          _vm._v("Categories")
                                                        ]),
                                                        _vm._v(" "),
                                                        _c("th")
                                                      ])
                                                    ]),
                                                    _vm._v(" "),
                                                    _c(
                                                      "tbody",
                                                      [
                                                        _vm.productlist.length >
                                                        0
                                                          ? _vm._l(
                                                              _vm.productlist,
                                                              function(
                                                                product,
                                                                key
                                                              ) {
                                                                return _c(
                                                                  "tr",
                                                                  { key: key },
                                                                  [
                                                                    _c("td", [
                                                                      _vm._v(
                                                                        "\n                                                    " +
                                                                          _vm._s(
                                                                            product.name
                                                                          ) +
                                                                          "\n                                                "
                                                                      )
                                                                    ]),
                                                                    _vm._v(" "),
                                                                    _c("td", [
                                                                      _vm._v(
                                                                        "\n                                                    " +
                                                                          _vm._s(
                                                                            product.quantity
                                                                          ) +
                                                                          "\n                                                "
                                                                      )
                                                                    ]),
                                                                    _vm._v(" "),
                                                                    _c("td", [
                                                                      product
                                                                        .categories
                                                                        .length >
                                                                      0
                                                                        ? _c(
                                                                            "div",
                                                                            _vm._l(
                                                                              product.categories,
                                                                              function(
                                                                                cat
                                                                              ) {
                                                                                return _c(
                                                                                  "div",
                                                                                  {
                                                                                    key:
                                                                                      cat.id
                                                                                  },
                                                                                  [
                                                                                    _vm._v(
                                                                                      "\n                                                            " +
                                                                                        _vm._s(
                                                                                          cat.name
                                                                                        ) +
                                                                                        "\n                                                        "
                                                                                    )
                                                                                  ]
                                                                                )
                                                                              }
                                                                            ),
                                                                            0
                                                                          )
                                                                        : _vm._e()
                                                                    ]),
                                                                    _vm._v(" "),
                                                                    _c(
                                                                      "td",
                                                                      [
                                                                        _c(
                                                                          "v-btn",
                                                                          {
                                                                            attrs: {
                                                                              fab:
                                                                                "",
                                                                              dark:
                                                                                "",
                                                                              depressed:
                                                                                "",
                                                                              color:
                                                                                "error"
                                                                            },
                                                                            on: {
                                                                              click: function(
                                                                                $event
                                                                              ) {
                                                                                return _vm.deleteProduct(
                                                                                  key
                                                                                )
                                                                              }
                                                                            }
                                                                          },
                                                                          [
                                                                            _c(
                                                                              "v-icon",
                                                                              {
                                                                                attrs: {
                                                                                  dark:
                                                                                    ""
                                                                                }
                                                                              },
                                                                              [
                                                                                _vm._v(
                                                                                  "\n                                                         mdi-delete\n                                                     "
                                                                                )
                                                                              ]
                                                                            )
                                                                          ],
                                                                          1
                                                                        )
                                                                      ],
                                                                      1
                                                                    )
                                                                  ]
                                                                )
                                                              }
                                                            )
                                                          : [
                                                              _c("tr", [
                                                                _c(
                                                                  "td",
                                                                  {
                                                                    staticClass:
                                                                      "text-center red--text pa-5",
                                                                    attrs: {
                                                                      colspan:
                                                                        "4"
                                                                    }
                                                                  },
                                                                  [
                                                                    _vm._v(
                                                                      " No Products Added As Yet"
                                                                    )
                                                                  ]
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
                              )
                            ],
                            1
                          )
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
                              attrs: {
                                color: "error",
                                rounded: "",
                                depressed: "",
                                href: _vm.$route("procurementnotice.index")
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
                              attrs: {
                                color: "success",
                                rounded: "",
                                depressed: ""
                              },
                              on: { click: _vm.submit }
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
              attrs: { "max-width": "600" },
              model: {
                value: _vm.addModel,
                callback: function($$v) {
                  _vm.addModel = $$v
                },
                expression: "addModel"
              }
            },
            [
              _c(
                "v-card",
                [
                  _c(
                    "v-card-title",
                    [
                      _c("div", [_vm._v("Add Product")]),
                      _vm._v(" "),
                      _c("v-spacer"),
                      _vm._v(" "),
                      _c(
                        "v-btn",
                        {
                          attrs: { icon: "" },
                          on: {
                            click: function($event) {
                              _vm.addModel = false
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
                        attrs: { label: "Product Name", outlined: "" },
                        model: {
                          value: _vm.name,
                          callback: function($$v) {
                            _vm.name = $$v
                          },
                          expression: "name"
                        }
                      }),
                      _vm._v(" "),
                      _c("v-text-field", {
                        attrs: {
                          label: "Quantity",
                          outlined: "",
                          type: "number"
                        },
                        model: {
                          value: _vm.quantity,
                          callback: function($$v) {
                            _vm.quantity = $$v
                          },
                          expression: "quantity"
                        }
                      }),
                      _vm._v(" "),
                      _c("v-combobox", {
                        attrs: {
                          items: _vm.categories,
                          "item-value": "id",
                          "item-text": "name",
                          label: "Select Categories",
                          multiple: "",
                          chips: ""
                        },
                        model: {
                          value: _vm.select,
                          callback: function($$v) {
                            _vm.select = $$v
                          },
                          expression: "select"
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
                          attrs: { small: "", color: "error" },
                          on: {
                            click: function($event) {
                              _vm.addModel = false
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
                          attrs: {
                            small: "",
                            color: "success",
                            loading: _vm.form.processing,
                            disabled: _vm.form.processing
                          },
                          on: { click: _vm.addProduct }
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
                  attrs: { href: _vm.$route("admin.home") }
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