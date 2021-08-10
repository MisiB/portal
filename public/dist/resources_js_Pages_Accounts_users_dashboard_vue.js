(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Accounts_users_dashboard_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/bankDetails.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/bankDetails.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      shownotice: false,
      detailsModel: true
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/topup.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/topup.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['type'],
  data: function data() {
    return {
      topupDialog: false
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../Layouts/userlayout */ "./resources/js/Pages/Layouts/userlayout.vue");
/* harmony import */ var _Components_bankDetails__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../Components/bankDetails */ "./resources/js/Components/bankDetails.vue");
/* harmony import */ var _Components_topup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../Components/topup */ "./resources/js/Components/topup.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['errors', 'successMessage', 'errorMessage', 'data'],
  components: {
    userlayout: _Layouts_userlayout__WEBPACK_IMPORTED_MODULE_0__.default,
    bankDetails: _Components_bankDetails__WEBPACK_IMPORTED_MODULE_1__.default,
    topup: _Components_topup__WEBPACK_IMPORTED_MODULE_2__.default
  },
  data: function data() {
    return {
      selected: [2],
      items: [{
        action: '15 min',
        headline: 'Brunch this weekend?',
        subtitle: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?",
        title: 'Ali Connors'
      }],
      changeModel: false,
      awaitingModel: false,
      filter: '',
      reg_id: '',
      loading: false
    };
  },
  methods: {
    changeCategory: function changeCategory(id) {
      this.reg_id = id;
      this.changeModel = true;
    },
    chooseCategory: function chooseCategory(id) {
      var _this = this;

      var data = {
        category_id: id,
        registration_id: this.reg_id
      };
      this.loading = true;
      this.$inertia.post('/bidders/changeCategory', data).then(function () {
        _this.loading = false;
        _this.changeModel = false;
      });
    },
    checkAwaiting: function checkAwaiting() {
      console.log(this.countAwaiting);

      if (this.countAwaiting > 0) {
        this.awaitingModel = true;
      }
    }
  },
  computed: {
    filterCategories: function filterCategories() {
      var _this2 = this;

      var categorylist = this.data.categorylist;

      if (this.filter != '') {
        return categorylist.filter(function (category) {
          return !category.name.toUpperCase().indexOf(_this2.filter.toUpperCase()) || !category.code.toUpperCase().indexOf(_this2.filter.toUpperCase());
        });
      } else {
        return categorylist;
      }
    },
    leadClass: function leadClass() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return 'd-flex justify-center subtitle-1';

        case 'sm':
          return 'd-flex justify-center subtitle-1';

        case 'md':
          return 'd-flex justify-center subtitle-1';

        case 'lg':
          return 'd-flex justify-center headline';

        case 'xl':
          return 'd-flex justify-center body-1';
      }
    },
    countAwaiting: function countAwaiting() {
      return this.data.awaiting.cost;
    }
  },
  mounted: function mounted() {
    this.checkAwaiting();
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

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.ACTIVE[data-v-cbecdc66]{\r\n    color: #00C853;\n}\n.BARRED[data-v-cbecdc66]{\r\n    color: red;\n}\n.PENDING[data-v-cbecdc66]{\r\n    color: orange;\n}\n.APPROVED[data-v-cbecdc66]{\r\n    color: green;\n}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_cbecdc66_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_cbecdc66_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_cbecdc66_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./resources/js/Components/bankDetails.vue":
/*!*************************************************!*\
  !*** ./resources/js/Components/bankDetails.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _bankDetails_vue_vue_type_template_id_f892f6ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./bankDetails.vue?vue&type=template&id=f892f6ea& */ "./resources/js/Components/bankDetails.vue?vue&type=template&id=f892f6ea&");
/* harmony import */ var _bankDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./bankDetails.vue?vue&type=script&lang=js& */ "./resources/js/Components/bankDetails.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _bankDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _bankDetails_vue_vue_type_template_id_f892f6ea___WEBPACK_IMPORTED_MODULE_0__.render,
  _bankDetails_vue_vue_type_template_id_f892f6ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/bankDetails.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Components/topup.vue":
/*!*******************************************!*\
  !*** ./resources/js/Components/topup.vue ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _topup_vue_vue_type_template_id_d9fcf8d6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./topup.vue?vue&type=template&id=d9fcf8d6& */ "./resources/js/Components/topup.vue?vue&type=template&id=d9fcf8d6&");
/* harmony import */ var _topup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./topup.vue?vue&type=script&lang=js& */ "./resources/js/Components/topup.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _topup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _topup_vue_vue_type_template_id_d9fcf8d6___WEBPACK_IMPORTED_MODULE_0__.render,
  _topup_vue_vue_type_template_id_d9fcf8d6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/topup.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Accounts/users/dashboard.vue":
/*!*********************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/dashboard.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _dashboard_vue_vue_type_template_id_cbecdc66_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dashboard.vue?vue&type=template&id=cbecdc66&scoped=true& */ "./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=template&id=cbecdc66&scoped=true&");
/* harmony import */ var _dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./dashboard.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=script&lang=js&");
/* harmony import */ var _dashboard_vue_vue_type_style_index_0_id_cbecdc66_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css& */ "./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _dashboard_vue_vue_type_template_id_cbecdc66_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _dashboard_vue_vue_type_template_id_cbecdc66_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "cbecdc66",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Accounts/users/dashboard.vue"
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

/***/ "./resources/js/Components/bankDetails.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/Components/bankDetails.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_bankDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./bankDetails.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/bankDetails.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_bankDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Components/topup.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/Components/topup.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_topup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./topup.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/topup.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_topup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css&":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css& ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_cbecdc66_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=style&index=0&id=cbecdc66&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/Components/bankDetails.vue?vue&type=template&id=f892f6ea&":
/*!********************************************************************************!*\
  !*** ./resources/js/Components/bankDetails.vue?vue&type=template&id=f892f6ea& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_bankDetails_vue_vue_type_template_id_f892f6ea___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_bankDetails_vue_vue_type_template_id_f892f6ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_bankDetails_vue_vue_type_template_id_f892f6ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./bankDetails.vue?vue&type=template&id=f892f6ea& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/bankDetails.vue?vue&type=template&id=f892f6ea&");


/***/ }),

/***/ "./resources/js/Components/topup.vue?vue&type=template&id=d9fcf8d6&":
/*!**************************************************************************!*\
  !*** ./resources/js/Components/topup.vue?vue&type=template&id=d9fcf8d6& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_topup_vue_vue_type_template_id_d9fcf8d6___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_topup_vue_vue_type_template_id_d9fcf8d6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_topup_vue_vue_type_template_id_d9fcf8d6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./topup.vue?vue&type=template&id=d9fcf8d6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/topup.vue?vue&type=template&id=d9fcf8d6&");


/***/ }),

/***/ "./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=template&id=cbecdc66&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=template&id=cbecdc66&scoped=true& ***!
  \****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_template_id_cbecdc66_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_template_id_cbecdc66_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_template_id_cbecdc66_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=template&id=cbecdc66&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=template&id=cbecdc66&scoped=true&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/bankDetails.vue?vue&type=template&id=f892f6ea&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/bankDetails.vue?vue&type=template&id=f892f6ea& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
    "div",
    [
      _c(
        "v-card",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.detailsModel,
              expression: "detailsModel"
            }
          ],
          staticClass: "red lighten-4 mb-5 mt-5",
          attrs: { flat: "" }
        },
        [
          _c(
            "v-card-text",
            [
              _c(
                "v-card-title",
                [
                  _c("div", [_vm._v("Important Notice")]),
                  _c("v-spacer"),
                  _c(
                    "v-btn",
                    {
                      attrs: { icon: "" },
                      on: {
                        click: function($event) {
                          _vm.detailsModel = false
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
              _c("p", [
                _vm._v(
                  "PLEASE NOTE IF YOU WISH PAY VIA THE BANK EITHER BY DIRECT DEPOSIT,INTERNET BANKING OR  TRANSFERS MAKE SURE TO ENTER YOUR PRAZ NUMBER  AS THE TRANSACTION DESCRIPTION. THIS WILL ALLOW OUR SYSTEM TO AUTOMATICAL IDENTIFY YOUR PAYMENT"
                )
              ])
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
                  attrs: { text: "", color: "primary" },
                  on: {
                    click: function($event) {
                      _vm.shownotice = true
                    }
                  }
                },
                [_vm._v("\n                View Bank Details\n            ")]
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
            value: _vm.shownotice,
            callback: function($$v) {
              _vm.shownotice = $$v
            },
            expression: "shownotice"
          }
        },
        [
          _c(
            "v-card",
            [
              _c("v-card-title", [_vm._v("Bank Details")]),
              _vm._v(" "),
              _c("v-card-text", [
                _c("p", [
                  _c("b", [
                    _vm._v(
                      " SUPPLIER REGISTRATIONS,SPOC,CONTRACT & ESTABLISHMENT FEES"
                    )
                  ]),
                  _c("br"),
                  _vm._v("\n                    PAYMENT INSTRUCTIONS:"),
                  _c("br"),
                  _vm._v(
                    "\n                    BANK NAME: COMMERCIAL BANK OF ZIMBABWE"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    ACCOUNT NAME: PROCUREMENT REGULATORY AUTHORITY OF ZIMBABWE"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    ACCOUNT NUMBER: 01121064850020"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    BRANCH: KWAME NKRUMAH\n                "
                  )
                ]),
                _vm._v(" "),
                _c("p", [
                  _c("b", [_vm._v("BID BOND SECURITY")]),
                  _c("br"),
                  _vm._v("\n                    PAYMENT INSTRUCTIONS:"),
                  _c("br"),
                  _vm._v(
                    "\n                    BANK NAME: COMMERCIAL BANK OF ZIMBABWE"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    ACCOUNT NAME: PROCUREMENT REGULATORY AUTHORITY OF ZIMBABWE"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    ACCOUNT NUMBER: 01121064850030"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    BRANCH: KWAME NKRUMAH\n                "
                  )
                ]),
                _vm._v(" "),
                _c("p", [
                  _c("b", [_vm._v("FCA ACCOUNT (USD DEPOSITS)")]),
                  _c("br"),
                  _vm._v("\n                    PAYMENT INSTRUCTIONS:"),
                  _c("br"),
                  _vm._v(
                    "\n                    BANK NAME: COMMERCIAL BANK OF ZIMBABWE"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    ACCOUNT NAME: PROCUREMENT REGULATORY AUTHORITY OF ZIMBABWE"
                  ),
                  _c("br"),
                  _vm._v(
                    "\n                    ACCOUNT NUMBER: 01121064850040"
                  ),
                  _c("br"),
                  _vm._v("\n                    BRANCH: KWAME NKRUMAH"),
                  _c("br"),
                  _vm._v("\n                    BRANCH SORT CODE:6101"),
                  _c("br"),
                  _vm._v(
                    "\n                    SWIFT CODE: COBZZWHAXXX\n                "
                  )
                ])
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/topup.vue?vue&type=template&id=d9fcf8d6&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/topup.vue?vue&type=template&id=d9fcf8d6& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
    "span",
    [
      _c(
        "v-row",
        [
          _c(
            "v-col",
            { attrs: { cols: "12" } },
            [
              _c(
                "v-btn",
                {
                  staticClass: "white--text",
                  attrs: { block: "", depressed: "", small: "", text: "" },
                  on: {
                    click: function($event) {
                      _vm.topupDialog = true
                    }
                  }
                },
                [_vm._v("How to top up")]
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
            value: _vm.topupDialog,
            callback: function($$v) {
              _vm.topupDialog = $$v
            },
            expression: "topupDialog"
          }
        },
        [
          _c(
            "v-card",
            [
              _c(
                "v-card-title",
                [
                  _c("div", [_vm._v("How to top up")]),
                  _c("v-spacer"),
                  _c(
                    "v-btn",
                    {
                      attrs: { icon: "" },
                      on: {
                        click: function($event) {
                          _vm.topupDialog = false
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
                _vm.type == "zwl_nonrefundable"
                  ? _c(
                      "div",
                      [
                        _c("div", { staticClass: "font-bold" }, [
                          _vm._v(
                            "This wallet can be use to settle the following:"
                          )
                        ]),
                        _vm._v(" "),
                        _c("ol", [
                          _c("li", [_vm._v(" SUPPLIER REGISTRATIONS ")]),
                          _vm._v(" "),
                          _c("li", [_vm._v(" BID ESTABLISHMENT FEES")]),
                          _vm._v(" "),
                          _c("li", [_vm._v("SPOC FEES")]),
                          _vm._v(" "),
                          _c("li", [_vm._v("TRAINING FEES")]),
                          _vm._v(" "),
                          _c("li", [_vm._v("CONTRACT FEES")])
                        ]),
                        _vm._v(" "),
                        _c(
                          "v-alert",
                          {
                            attrs: {
                              border: "top",
                              color: "red lighten-2",
                              dark: ""
                            }
                          },
                          [
                            _vm._v(
                              "\n                           Please note when making a bank transfer enter  your PR number only on the description for your transfer\n                           "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "headline mt-4" }, [
                          _vm._v("Banking Details")
                        ]),
                        _vm._v(" "),
                        _c("div", [_vm._v("  CURRENCY: ZIM DOLLAR (ZWL)")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("ACCOUNT NUMBER: 10721064850020")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("BRANCH SORT CODE: 6101")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("SWIFT CODE: COBZZWHAXXX")])
                      ],
                      1
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.type == "usd_nonrefundable"
                  ? _c(
                      "div",
                      [
                        _c("div", { staticClass: "font-bold" }, [
                          _vm._v(
                            "This wallet can be use to settle the following:"
                          )
                        ]),
                        _vm._v(" "),
                        _c("ol", [
                          _c("li", [_vm._v(" SUPPLIER REGISTRATIONS ")]),
                          _vm._v(" "),
                          _c("li", [_vm._v(" BID ESTABLISHMENT FEES")]),
                          _vm._v(" "),
                          _c("li", [_vm._v("SPOC FEES")]),
                          _vm._v(" "),
                          _c("li", [_vm._v("TRAINING FEES")]),
                          _vm._v(" "),
                          _c("li", [_vm._v("CONTRACT FEES")])
                        ]),
                        _vm._v(" "),
                        _c(
                          "v-alert",
                          {
                            attrs: {
                              border: "top",
                              color: "red lighten-2",
                              dark: ""
                            }
                          },
                          [
                            _vm._v(
                              "\n                           Please note when making a bank transfer enter  your PR number only on the description for your transfer\n                           "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "headline mt-4" }, [
                          _vm._v("Banking Details")
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
                        _c("div", [_vm._v("SWIFT CODE: COBZZWHAXXX")]),
                        _vm._v(">\n                     ")
                      ],
                      1
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.type == "usd_refundable"
                  ? _c(
                      "div",
                      [
                        _c("div", { staticClass: "font-bold" }, [
                          _vm._v(
                            "This wallet can be use to settle the following:"
                          )
                        ]),
                        _vm._v(" "),
                        _c("ol", [_c("li", [_vm._v(" BID BOND ONLY")])]),
                        _vm._v(" "),
                        _c(
                          "v-alert",
                          {
                            attrs: {
                              border: "top",
                              color: "red lighten-2",
                              dark: ""
                            }
                          },
                          [
                            _vm._v(
                              "\n                           Please note when making a bank transfer enter  your PR number only on the description for your transfer\n                           "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "headline mt-4" }, [
                          _vm._v("Banking Details")
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
                      ],
                      1
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.type == "zwl_refundable"
                  ? _c(
                      "div",
                      [
                        _c("div", { staticClass: "font-bold" }, [
                          _vm._v(
                            "This wallet can be use to settle the following:"
                          )
                        ]),
                        _vm._v(" "),
                        _c("ol", [_c("li", [_vm._v(" BID BOND ONLY")])]),
                        _vm._v(" "),
                        _c(
                          "v-alert",
                          {
                            attrs: {
                              border: "top",
                              color: "red lighten-2",
                              dark: ""
                            }
                          },
                          [
                            _vm._v(
                              "\n                           Please note when making a bank transfer enter  your PR number only on the description for your transfer\n                           "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "headline mt-4" }, [
                          _vm._v("Banking Details")
                        ]),
                        _vm._v(" "),
                        _c("div", [_vm._v("  CURRENCY: ZIM DOLLAR (ZWL)")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("ACCOUNT NUMBER: 10721064850118")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("BRANCH SORT CODE: ---")]),
                        _vm._v(" "),
                        _c("div", [_vm._v("SWIFT CODE: ------")])
                      ],
                      1
                    )
                  : _vm._e()
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=template&id=cbecdc66&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Accounts/users/dashboard.vue?vue&type=template&id=cbecdc66&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************************/
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
          _vm.successMessage
            ? _c(
                "v-alert",
                { attrs: { dense: "", text: "", type: "success" } },
                [_vm._v("\n        " + _vm._s(_vm.successMessage) + "\n    ")]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.errorMessage
            ? _c("v-alert", { attrs: { dense: "", text: "", type: "error" } }, [
                _vm._v("\n        " + _vm._s(_vm.errorMessage) + "\n    ")
              ])
            : _vm._e(),
          _vm._v(" "),
          _c(
            "v-card",
            { staticClass: "grey lighten-4 mb-4", attrs: { flat: "" } },
            [
              _c(
                "v-card-text",
                [
                  _c(
                    "v-layout",
                    { staticClass: "pa-3", attrs: { wrap: "" } },
                    [
                      _c("v-flex", { attrs: { sm12: "", md9: "" } }, [
                        _c("div", { staticClass: "display-1 black--text" }, [
                          _vm._v(_vm._s(_vm.data.company.name))
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "d-flex" }, [
                          _c("div", { staticClass: "title" }, [
                            _vm._v(_vm._s(_vm.data.company.regnumber))
                          ]),
                          _c(
                            "div",
                            { class: "title ml-3 " + _vm.data.company.status },
                            [_vm._v(_vm._s(_vm.data.company.status))]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "v-flex",
                        { attrs: { sm12: "", md3: "" } },
                        [
                          _c(
                            "inertia-link",
                            {
                              staticClass:
                                "v-btn v-btn--block v-btn--has-bg theme--light v-size--default primary",
                              attrs: { href: _vm.$route("documents.index") }
                            },
                            [_vm._v("SUPPLIER REGISTRATION")]
                          ),
                          _vm._v(" "),
                          _c(
                            "inertia-link",
                            {
                              staticClass:
                                "mt-2 v-btn v-btn--block v-btn--has-bg theme--light v-size--default success",
                              attrs: { href: _vm.$route("Mytenders.index") }
                            },
                            [_vm._v("TENDER MANAGAMENT")]
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
            [
              _c(
                "v-col",
                { attrs: { cols: "6", md: "3" } },
                [
                  _c(
                    "v-card",
                    {
                      staticClass: "light-blue rounded-none",
                      attrs: { flat: "" }
                    },
                    [
                      _c(
                        "v-card-title",
                        { staticClass: "rounded-none d-flex justify-center" },
                        [_c("div", [_vm._v("Nonrefundable wallet")])]
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        { staticClass: "text-center" },
                        [
                          _c("div", { staticClass: "text-center" }, [
                            _c("div", { class: _vm.leadClass }, [
                              _c("div", { staticClass: "mr-2" }, [
                                _vm._v("ZWL")
                              ]),
                              _c("div", [
                                _vm._v(
                                  _vm._s(_vm.data.zwl_nonrefundable_balance)
                                )
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c("topup", { attrs: { type: "zwl_nonrefundable" } })
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
                "v-col",
                { attrs: { cols: "6", md: "3" } },
                [
                  _c(
                    "v-card",
                    {
                      staticClass: "red accent-2 rounded-none",
                      attrs: { flat: "" }
                    },
                    [
                      _c(
                        "v-card-title",
                        { staticClass: "rounded-none d-flex justify-center" },
                        [_c("div", [_vm._v("Nonrefundable wallet")])]
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        { staticClass: "text-center" },
                        [
                          _c("div", { staticClass: "text-center" }, [
                            _c("div", { class: _vm.leadClass }, [
                              _c("div", { staticClass: "mr-2" }, [
                                _vm._v("USD")
                              ]),
                              _c("div", [
                                _vm._v(
                                  _vm._s(_vm.data.usd_nonrefundable_balance)
                                )
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c("topup", { attrs: { type: "usd_nonrefundable" } })
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
                "v-col",
                { attrs: { cols: "6", md: "3" } },
                [
                  _c(
                    "v-card",
                    { staticClass: "indigo rounded-none", attrs: { flat: "" } },
                    [
                      _c(
                        "v-card-title",
                        { staticClass: "rounded-none d-flex justify-center" },
                        [_c("div", [_vm._v("Refundable wallet")])]
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        { staticClass: "text-center" },
                        [
                          _c("div", { staticClass: "text-center" }, [
                            _c("div", { class: _vm.leadClass }, [
                              _c("div", { staticClass: "mr-2" }, [
                                _vm._v("ZWL")
                              ]),
                              _c("div", [
                                _vm._v(_vm._s(_vm.data.zwl_refundable_balance))
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c("topup", { attrs: { type: "zwl_refundable" } })
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
                "v-col",
                { attrs: { md3: "", sm12: "" } },
                [
                  _c(
                    "v-card",
                    {
                      staticClass: "green lighten-1 rounded-none",
                      attrs: { flat: "" }
                    },
                    [
                      _c(
                        "v-card-title",
                        { staticClass: "rounded-none d-flex justify-center" },
                        [_c("div", [_vm._v("Refundable wallet")])]
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        { staticClass: "text-center" },
                        [
                          _c("div", { staticClass: "text-center" }, [
                            _c("div", { class: _vm.leadClass }, [
                              _c("div", { staticClass: "mr-2" }, [
                                _vm._v("USD")
                              ]),
                              _c("div", [
                                _vm._v(_vm._s(_vm.data.usd_refundable_balance))
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c("topup", { attrs: { type: "usd_refundable" } })
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
            [
              _c(
                "v-col",
                { attrs: { cols: "12" } },
                [
                  _c(
                    "v-card",
                    {
                      staticClass: "mt-3",
                      attrs: { outlined: "", elevation: "0" }
                    },
                    [
                      _c(
                        "v-toolbar",
                        {
                          attrs: { color: "blue lighten-2", dark: "", flat: "" }
                        },
                        [
                          _c("v-toolbar-title", [
                            _vm._v(" Registered Categories")
                          ])
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("v-card-text", [
                        _vm.data.registrations.length > 0
                          ? _c(
                              "div",
                              _vm._l(_vm.data.registrations, function(reg) {
                                return _c(
                                  "div",
                                  { key: reg.id },
                                  [
                                    _c(
                                      "v-row",
                                      { staticClass: "pt-3 pb-3 border-b" },
                                      [
                                        _c(
                                          "v-col",
                                          { attrs: { cols: "12", md: "7" } },
                                          [
                                            _c("div", [
                                              _vm._v(_vm._s(reg.category.name))
                                            ]),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "black--text" },
                                              [
                                                _vm._v(
                                                  _vm._s(reg.category.code)
                                                )
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "v-col",
                                          { attrs: { sm: "6", md: "3" } },
                                          [
                                            _c(
                                              "div",
                                              { staticClass: "d-flex" },
                                              [
                                                _c("div", [
                                                  _c("div", [
                                                    _c("small", [
                                                      _vm._v(
                                                        _vm._s(reg.expire_year)
                                                      )
                                                    ])
                                                  ]),
                                                  _vm._v(" "),
                                                  _c(
                                                    "div",
                                                    { class: "" + reg.status },
                                                    [
                                                      _vm._v(
                                                        "\n                               " +
                                                          _vm._s(reg.status) +
                                                          "\n                           "
                                                      )
                                                    ]
                                                  )
                                                ]),
                                                _vm._v(" "),
                                                _c("div", [
                                                  reg.status == "PENDING"
                                                    ? _c(
                                                        "div",
                                                        [
                                                          _c(
                                                            "v-tooltip",
                                                            {
                                                              attrs: {
                                                                top: ""
                                                              },
                                                              scopedSlots: _vm._u(
                                                                [
                                                                  {
                                                                    key:
                                                                      "activator",
                                                                    fn: function(
                                                                      ref
                                                                    ) {
                                                                      var on =
                                                                        ref.on
                                                                      var attrs =
                                                                        ref.attrs
                                                                      return [
                                                                        _c(
                                                                          "v-btn",
                                                                          _vm._g(
                                                                            _vm._b(
                                                                              {
                                                                                attrs: {
                                                                                  icon:
                                                                                    ""
                                                                                }
                                                                              },
                                                                              "v-btn",
                                                                              attrs,
                                                                              false
                                                                            ),
                                                                            on
                                                                          ),
                                                                          [
                                                                            _c(
                                                                              "v-icon",
                                                                              {
                                                                                attrs: {
                                                                                  color:
                                                                                    "blue lighten-1"
                                                                                }
                                                                              },
                                                                              [
                                                                                _vm._v(
                                                                                  "\n                                               mdi-information\n                                           "
                                                                                )
                                                                              ]
                                                                            )
                                                                          ],
                                                                          1
                                                                        )
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
                                                              _c("span", [
                                                                _vm._v(
                                                                  "Your account Documents are in the process of being verified you will be notified via email"
                                                                )
                                                              ])
                                                            ]
                                                          )
                                                        ],
                                                        1
                                                      )
                                                    : _vm._e()
                                                ])
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "v-col",
                                          { attrs: { sm: "6", md: "2" } },
                                          [
                                            reg.status == "APPROVED"
                                              ? _c(
                                                  "div",
                                                  [
                                                    _c(
                                                      "v-btn",
                                                      {
                                                        staticClass: "success",
                                                        attrs: {
                                                          rounded: "",
                                                          block: "",
                                                          "x-small": "",
                                                          link: "",
                                                          href: _vm.$route(
                                                            "supplierCertificates.show",
                                                            reg.uuid
                                                          )
                                                        }
                                                      },
                                                      [_vm._v("Download")]
                                                    )
                                                  ],
                                                  1
                                                )
                                              : _vm._e(),
                                            _vm._v(" "),
                                            reg.printed == 0
                                              ? _c(
                                                  "div",
                                                  [
                                                    _c(
                                                      "v-btn",
                                                      {
                                                        staticClass: "mt-1",
                                                        attrs: {
                                                          "x-small": "",
                                                          rounded: "",
                                                          block: "",
                                                          outlined: "",
                                                          color: "change"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            return _vm.changeCategory(
                                                              reg.id
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Change Category"
                                                        )
                                                      ]
                                                    )
                                                  ],
                                                  1
                                                )
                                              : _vm._e()
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
                              0
                            )
                          : _c("div", [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "pa-5 red lighten-4 red--text text-center"
                                },
                                [
                                  _c("div", [
                                    _vm._v(
                                      " No registrations found  for the current year "
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    [
                                      _c(
                                        "inertia-link",
                                        {
                                          staticClass:
                                            "v-btn v-btn--is-elevated v-btn--has-bg v-btn--rounded theme--light v-size--small primary",
                                          attrs: {
                                            href: _vm.$route("documents.index")
                                          }
                                        },
                                        [_vm._v("Register Now")]
                                      )
                                    ],
                                    1
                                  )
                                ]
                              )
                            ])
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
            "v-dialog",
            {
              attrs: { "max-width": "600" },
              model: {
                value: _vm.changeModel,
                callback: function($$v) {
                  _vm.changeModel = $$v
                },
                expression: "changeModel"
              }
            },
            [
              _c(
                "v-card",
                [
                  _c(
                    "v-card-title",
                    [
                      _c("div", [_vm._v("Category Change")]),
                      _c("v-spacer"),
                      _c(
                        "v-btn",
                        {
                          attrs: { small: "", icon: "" },
                          on: {
                            click: function($event) {
                              _vm.changeModel = false
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
                      _c(
                        "div",
                        [
                          _c("v-text-field", {
                            attrs: { outlined: "", label: "Search" },
                            model: {
                              value: _vm.filter,
                              callback: function($$v) {
                                _vm.filter = $$v
                              },
                              expression: "filter"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _vm._l(_vm.filterCategories, function(cat) {
                        return _c(
                          "div",
                          { key: cat.id, staticClass: "pa-3" },
                          [
                            _c(
                              "v-row",
                              [
                                _c("v-col", { attrs: { cols: "10" } }, [
                                  _c("div", [_vm._v(_vm._s(cat.name))]),
                                  _vm._v(" "),
                                  _c("div", [
                                    _c("small", [_vm._v(_vm._s(cat.code))])
                                  ])
                                ]),
                                _vm._v(" "),
                                _c(
                                  "v-col",
                                  { attrs: { cols: "2" } },
                                  [
                                    _c(
                                      "v-btn",
                                      {
                                        attrs: {
                                          rounded: "",
                                          color: "primary",
                                          depressed: "",
                                          small: "",
                                          loading: _vm.loading,
                                          disabled: _vm.loading
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.chooseCategory(cat.id)
                                          }
                                        }
                                      },
                                      [_vm._v("choose")]
                                    )
                                  ],
                                  1
                                )
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c("v-divider")
                          ],
                          1
                        )
                      })
                    ],
                    2
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
                value: _vm.awaitingModel,
                callback: function($$v) {
                  _vm.awaitingModel = $$v
                },
                expression: "awaitingModel"
              }
            },
            [
              _c(
                "v-card",
                { attrs: { outlined: "", elevation: "0" } },
                [
                  _c(
                    "v-toolbar",
                    { attrs: { color: "red lighten-2", dark: "", flat: "" } },
                    [
                      _c("v-toolbar-title", [
                        _vm._v("Invoices Awaiting Verification")
                      ]),
                      _vm._v(" "),
                      _c("v-spacer"),
                      _vm._v(" "),
                      _c(
                        "v-btn",
                        {
                          attrs: { icon: "" },
                          on: {
                            click: function($event) {
                              _vm.awaitingModel = false
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
                    _c(
                      "div",
                      { staticClass: "red--text pl-1 pr-1 pt-5 pb-5" },
                      [
                        _vm._v(
                          "\n                              You have invoices with bank payments awaiting verification, This means the bank reference numbers you entered was not found. We will attempt to locate your payment manually however this might take time. You can quicken the payment verification process by asking for the correct reference number from your bank and manually input it by clicking the verify button\n                          "
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "text-center" },
                      [
                        _c(
                          "v-btn",
                          {
                            attrs: {
                              rounded: "",
                              outlined: "",
                              color: "primary",
                              link: "",
                              href: _vm.$route("awaiting.index")
                            }
                          },
                          [_vm._v("View Invoices")]
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