(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_welcome_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['title'],
  watch: {
    title: {
      immediate: true,
      handler: function handler(title) {
        document.title = title;
      }
    }
  },
  data: function data() {
    return {
      drawer: false
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/welcome.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/welcome.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layouts_welcome__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Layouts/welcome */ "./resources/js/Pages/Layouts/welcome.vue");
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
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['notices', 'errors', 'errorMessage', 'successMessage'],
  components: {
    welcomelayout: _Layouts_welcome__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      types: ['REGISTRATION', 'SPOC', 'ESTABLISHMENT FEE', 'BIDBOND'],
      form: this.$inertia.form({
        type: '',
        code: ''
      }),
      title: 'Welcome'
    };
  },
  methods: {
    verify: function verify() {
      var _this = this;

      this.form.get(this.$route('verifydata'), {
        onSuccess: function onSuccess(page) {
          if (_this.errorMessage) {
            vue__WEBPACK_IMPORTED_MODULE_1__.default.swal('Warning', _this.errorMessage, 'error');
          }
        },
        onError: function onError(page) {}
      });
    }
  },
  computed: {
    headercss: function headercss() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return 'headline mt-4 font-weight-bold';

        case 'sm':
          return 'headline mt-4 font-weight-bold';

        case 'md':
          return 'display-2 mt-8 font-weight-bold';

        case 'lg':
          return 'display-2 mt-8 font-weight-bold';

        case 'xl':
          return 'display-2 mt-8 font-weight-bold';
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.link[data-v-51137543]{\n    text-decoration: none;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_style_index_0_id_51137543_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_style_index_0_id_51137543_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_style_index_0_id_51137543_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./resources/js/Pages/Layouts/welcome.vue":
/*!************************************************!*\
  !*** ./resources/js/Pages/Layouts/welcome.vue ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _welcome_vue_vue_type_template_id_51137543_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./welcome.vue?vue&type=template&id=51137543&scoped=true& */ "./resources/js/Pages/Layouts/welcome.vue?vue&type=template&id=51137543&scoped=true&");
/* harmony import */ var _welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./welcome.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Layouts/welcome.vue?vue&type=script&lang=js&");
/* harmony import */ var _welcome_vue_vue_type_style_index_0_id_51137543_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css& */ "./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _welcome_vue_vue_type_template_id_51137543_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _welcome_vue_vue_type_template_id_51137543_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "51137543",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Layouts/welcome.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/welcome.vue":
/*!****************************************!*\
  !*** ./resources/js/Pages/welcome.vue ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _welcome_vue_vue_type_template_id_f8506a2e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./welcome.vue?vue&type=template&id=f8506a2e& */ "./resources/js/Pages/welcome.vue?vue&type=template&id=f8506a2e&");
/* harmony import */ var _welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./welcome.vue?vue&type=script&lang=js& */ "./resources/js/Pages/welcome.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _welcome_vue_vue_type_template_id_f8506a2e___WEBPACK_IMPORTED_MODULE_0__.render,
  _welcome_vue_vue_type_template_id_f8506a2e___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/welcome.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Layouts/welcome.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/welcome.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./welcome.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/welcome.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/Pages/welcome.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./welcome.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/welcome.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css& ***!
  \*********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_style_index_0_id_51137543_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=style&index=0&id=51137543&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/Layouts/welcome.vue?vue&type=template&id=51137543&scoped=true&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Pages/Layouts/welcome.vue?vue&type=template&id=51137543&scoped=true& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_template_id_51137543_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_template_id_51137543_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_template_id_51137543_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./welcome.vue?vue&type=template&id=51137543&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=template&id=51137543&scoped=true&");


/***/ }),

/***/ "./resources/js/Pages/welcome.vue?vue&type=template&id=f8506a2e&":
/*!***********************************************************************!*\
  !*** ./resources/js/Pages/welcome.vue?vue&type=template&id=f8506a2e& ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_template_id_f8506a2e___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_template_id_f8506a2e___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_welcome_vue_vue_type_template_id_f8506a2e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./welcome.vue?vue&type=template&id=f8506a2e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/welcome.vue?vue&type=template&id=f8506a2e&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=template&id=51137543&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Layouts/welcome.vue?vue&type=template&id=51137543&scoped=true& ***!
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
    "v-app",
    [
      _c(
        "v-app-bar",
        { attrs: { dense: "", app: "", height: "100", light: "", flat: "" } },
        [
          _c(
            "v-toolbar-title",
            [_c("v-img", { attrs: { src: "/img/logo.png", width: "120" } })],
            1
          ),
          _vm._v(" "),
          _c(
            "span",
            { staticClass: "hidden-sm-and-up" },
            [
              _c("v-app-bar-nav-icon", {
                on: {
                  click: function($event) {
                    _vm.drawer = !_vm.drawer
                  }
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("v-spacer"),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "hidden-xs-only" },
            [
              _c(
                "inertia-link",
                {
                  staticClass:
                    "pa-3 blue-grey--text link font-weight-bold title",
                  attrs: { href: _vm.$route("welcome") }
                },
                [_vm._v("Home")]
              ),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    " pa-3 blue-grey--text link font-weight-bold title",
                  attrs: { href: _vm.$route("tenders") }
                },
                [_vm._v("Tenders")]
              ),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "pa-3 blue-grey--text  link font-weight-bold title",
                  attrs: { href: _vm.$route("awards") }
                },
                [_vm._v("Contracts")]
              ),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass:
                    "pa-3 blue-grey--text link font-weight-bold title",
                  attrs: { href: _vm.$route("suppliers") }
                },
                [_vm._v("Suppliers")]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-btn",
            {
              attrs: {
                href: _vm.$route("register"),
                depressed: "",
                color: "success"
              }
            },
            [_vm._v("Register")]
          ),
          _vm._v(" "),
          _c(
            "v-btn",
            {
              staticClass: "ml-2",
              attrs: {
                href: _vm.$route("login"),
                color: "primary",
                depressed: ""
              }
            },
            [_vm._v("Login")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-navigation-drawer",
        {
          staticClass: "green",
          attrs: { app: "" },
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
                  staticClass: "v-list-item v-list-item--link theme--light",
                  attrs: { href: _vm.$route("welcome") }
                },
                [_vm._v("Home")]
              ),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass: "v-list-item v-list-item--link theme--light",
                  attrs: { href: _vm.$route("tenders") }
                },
                [_vm._v("Tenders")]
              ),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass: "v-list-item v-list-item--link theme--light",
                  attrs: { href: _vm.$route("awards") }
                },
                [_vm._v("Contracts")]
              ),
              _vm._v(" "),
              _c(
                "inertia-link",
                {
                  staticClass: "v-list-item v-list-item--link theme--light",
                  attrs: { href: _vm.$route("suppliers") }
                },
                [_vm._v("Suppliers")]
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-main", [_vm._t("default")], 2)
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/welcome.vue?vue&type=template&id=f8506a2e&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/welcome.vue?vue&type=template&id=f8506a2e& ***!
  \**************************************************************************************************************************************************************************************************************/
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
    "welcomelayout",
    { attrs: { title: _vm.title } },
    [
      _c(
        "v-container",
        [
          _c(
            "v-sheet",
            { staticClass: "text-center pa-10", attrs: { height: "300" } },
            [
              _c("div", { class: _vm.headercss }, [
                _vm._v("Procurement Regulatory Authority of Zimbabwe")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "headline" }, [
                _vm._v("Public Procurement Portal")
              ]),
              _vm._v(" "),
              _c(
                "v-row",
                { staticClass: "mt-2" },
                [
                  _c(
                    "v-col",
                    { attrs: { md: "4", "offset-md": "4" } },
                    [
                      _c(
                        "v-row",
                        [
                          _c(
                            "v-col",
                            [
                              _c(
                                "v-btn",
                                {
                                  attrs: {
                                    color: "success",
                                    depressed: "",
                                    block: "",
                                    href: _vm.$route("register")
                                  }
                                },
                                [_vm._v("REGISTER")]
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "v-col",
                            [
                              _c(
                                "v-btn",
                                {
                                  attrs: {
                                    color: "primary",
                                    depressed: "",
                                    block: "",
                                    href: _vm.$route("login")
                                  }
                                },
                                [_vm._v("LOGIN")]
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
                    [
                      _c("v-card-title", [_vm._v("Verify Certificate")]),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        [
                          _c(
                            "v-row",
                            [
                              _c(
                                "v-col",
                                { attrs: { md: "4", sm: "12" } },
                                [
                                  _c("v-select", {
                                    attrs: {
                                      outlined: "",
                                      label: " Select Certificate Type",
                                      "error-messages": _vm.errors.type,
                                      items: _vm.types
                                    },
                                    model: {
                                      value: _vm.form.type,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "type", $$v)
                                      },
                                      expression: "form.type"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                { attrs: { md: "6", sm: "12" } },
                                [
                                  _c("v-text-field", {
                                    attrs: {
                                      outlined: "",
                                      label: "Certificate Number",
                                      "error-messages": _vm.errors.code
                                    },
                                    model: {
                                      value: _vm.form.code,
                                      callback: function($$v) {
                                        _vm.$set(_vm.form, "code", $$v)
                                      },
                                      expression: "form.code"
                                    }
                                  })
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-col",
                                { attrs: { md: "2", sm: "12" } },
                                [
                                  _c(
                                    "v-btn",
                                    {
                                      attrs: {
                                        outlined: "",
                                        "x-large": "",
                                        block: "",
                                        rounded: "",
                                        loading: _vm.form.processing,
                                        disabled: _vm.form.processing
                                      },
                                      on: { click: _vm.verify }
                                    },
                                    [_vm._v("Verify")]
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
          ),
          _vm._v(" "),
          _c(
            "v-row",
            { staticClass: "mt-4" },
            [
              _c(
                "v-col",
                {
                  staticClass: "text-center",
                  attrs: { md: "4", "offset-md": "4" }
                },
                [
                  _c("div", { staticClass: "display-1" }, [
                    _vm._v("Banking Details")
                  ])
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
              _c(
                "v-col",
                { attrs: { md: "6", sm: "12", xs: "12" } },
                [
                  _c(
                    "v-card",
                    { staticClass: "grey lighten-3", attrs: { flat: "" } },
                    [
                      _c("v-card-title", [_vm._v("Refundable FEEs(USD)")]),
                      _vm._v(" "),
                      _c("v-card-text", [
                        _c("div", { staticClass: "text-h5 text--primary" }, [
                          _vm._v("BID BONDS only")
                        ]),
                        _vm._v(" "),
                        _c("div", [
                          _vm._v("  CURRENCY: UNITED STATES DOLLARS (USD)")
                        ]),
                        _vm._v(" "),
                        _c("div", [_vm._v("ACCOUNT NUMBER: 10721064850128")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("BRANCH SORT CODE: 6101")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("SWIFT CODE: COBZZWHAXXX")])
                      ])
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-col",
                { attrs: { md: "6", sm: "12", xs: "12" } },
                [
                  _c(
                    "v-card",
                    { staticClass: "grey lighten-3", attrs: { flat: "" } },
                    [
                      _c("v-card-title", [_vm._v("Refundable FEEs(ZWL)")]),
                      _vm._v(" "),
                      _c("v-card-text", [
                        _c("div", { staticClass: "text-h5 text--primary" }, [
                          _vm._v("BID BONDS only")
                        ]),
                        _vm._v(" "),
                        _c("div", [_vm._v("  CURRENCY: ZIM DOLLAR (ZWL)")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("ACCOUNT NUMBER: 10721064850118")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("BRANCH SORT CODE: ---")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("SWIFT CODE: ------")])
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
            { staticClass: "mt-4" },
            [
              _c(
                "v-col",
                { attrs: { md: "6", sm: "12", xs: "12" } },
                [
                  _c(
                    "v-card",
                    { staticClass: "grey lighten-3", attrs: { flat: "" } },
                    [
                      _c("v-card-title", [_vm._v("Nonrefundable FEEs(USD)")]),
                      _vm._v(" "),
                      _c("v-card-text", [
                        _c("div", { staticClass: "text-h6 text--primary" }, [
                          _vm._v(
                            "REGISTRATIONS, BID ESTABLISHMENT FEES; TRAINING FEES; AND ADMIN FEES (Contract, SPOC & Other Admin Fees)"
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", [
                          _vm._v("  CURRENCY: UNITED STATES DOLLARS (USD)")
                        ]),
                        _vm._v(" "),
                        _c("div", [_vm._v("ACCOUNT NUMBER: 10721064850108")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("BRANCH SORT CODE: 6101")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("SWIFT CODE: COBZZWHAXXX")])
                      ])
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-col",
                { attrs: { md: "6", sm: "12", xs: "12" } },
                [
                  _c(
                    "v-card",
                    { staticClass: "grey lighten-3", attrs: { flat: "" } },
                    [
                      _c("v-card-title", [_vm._v("Nonrefundable FEEs(ZWL)")]),
                      _vm._v(" "),
                      _c("v-card-text", [
                        _c("div", { staticClass: "text-h6 text--primary" }, [
                          _vm._v(
                            "REGISTRATIONS, BID ESTABLISHMENT FEES; TRAINING FEES; AND ADMIN FEES (Contract, SPOC & Other Admin Fees)"
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", [_vm._v("  CURRENCY: ZIM DOLLAR (ZWL)")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("ACCOUNT NUMBER: 10721064850020")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("BRANCH SORT CODE: 6101")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("SWIFT CODE: COBZZWHAXXX")])
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
            { staticClass: "mt-4" },
            [
              _c(
                "v-col",
                [
                  _c(
                    "v-card",
                    { attrs: { color: "success" } },
                    [
                      _c("v-card-text", [
                        _c(
                          "div",
                          { staticClass: "d-flex" },
                          [
                            _c("div", { staticClass: "text-h5" }, [
                              _vm._v("Downlod the latest Government Gazette ")
                            ]),
                            _vm._v(" "),
                            _c("v-spacer"),
                            _vm._v(" "),
                            _c(
                              "v-btn",
                              {
                                staticClass: "primary",
                                attrs: { href: "./gazzates/file.pdf" }
                              },
                              [_vm._v("Download")]
                            )
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          [
                            _vm._v(
                              "Please note the government gazette might not show real time registrations. To access real time  supplier registrations "
                            ),
                            _c(
                              "v-btn",
                              {
                                attrs: {
                                  text: "",
                                  href: _vm.$route("suppliers")
                                }
                              },
                              [_vm._v("CLICK HERE")]
                            )
                          ],
                          1
                        )
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
            { staticClass: "mt-4" },
            [
              _c(
                "v-col",
                [
                  _c(
                    "v-card",
                    [
                      _c(
                        "v-card-title",
                        { staticClass: "indigo darken-3 white--text" },
                        [_c("div", [_vm._v("Latest Procurement Notices")])]
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
                                        _c("th", [_vm._v("Title")]),
                                        _vm._v(" "),
                                        _c("th", [_vm._v("Closing Date")]),
                                        _vm._v(" "),
                                        _c("th", [_vm._v("Active Status")]),
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
                                        _vm.notices.length > 0
                                          ? _vm._l(_vm.notices, function(
                                              notice
                                            ) {
                                              return _c(
                                                "tr",
                                                { key: notice.id },
                                                [
                                                  _c("td", [
                                                    _vm._v(
                                                      "\n                                  " +
                                                        _vm._s(notice.title) +
                                                        "\n                              "
                                                    )
                                                  ]),
                                                  _vm._v(" "),
                                                  _c("td", [
                                                    _vm._v(
                                                      "\n                                  " +
                                                        _vm._s(
                                                          notice.close_date
                                                        ) +
                                                        " " +
                                                        _vm._s(
                                                          notice.close_time
                                                        ) +
                                                        "\n                              "
                                                    )
                                                  ]),
                                                  _vm._v(" "),
                                                  _c("td", [
                                                    _vm._v(
                                                      "\n                                  " +
                                                        _vm._s(notice.active) +
                                                        "\n                              "
                                                    )
                                                  ]),
                                                  _vm._v(" "),
                                                  _c("td", [
                                                    _vm._v(
                                                      "\n                                  " +
                                                        _vm._s(notice.status) +
                                                        " \n                              "
                                                    )
                                                  ]),
                                                  _vm._v(" "),
                                                  _c(
                                                    "td",
                                                    [
                                                      _c(
                                                        "inertia-link",
                                                        {
                                                          staticClass:
                                                            "v-btn v-btn--has-bg theme--light v-size--small primary",
                                                          attrs: {
                                                            href: _vm.$route(
                                                              "notice",
                                                              notice.uuid
                                                            )
                                                          }
                                                        },
                                                        [_vm._v("View")]
                                                      )
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
                                                    staticClass:
                                                      "pa-5 text-center red--text",
                                                    attrs: { colspan: "4" }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "No procurement notices found"
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