function _vivadashboard(t, e) {
    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
}
var _vivadashboarddata = function () {
    function t(t, e) {
        for (var s = 0; s < e.length; s++) {
            var n = e[s];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
        }
    }
    return function (e, s, n) {
        return s && t(e.prototype, s), n && t(e, n), e
    }
}(),
    vivadashboardalldata = function () {
        function t() {
            _vivadashboard(this, t)
        }
        return _vivadashboarddata(t, [{
            key: "init",
            value: function (t, e) {
                this.jQuery = $ = t,
                    this.$PAGE = e,
                    this.jCall = null,
                    this.ajaxHTML = null,
                    this._initListeners()
            }
        }, {
            key: "_initListeners",
            value: function () {
                this.$PAGE = this.jQuery("body");
                var that = this;
                var count= 1;
                $('[name="assignsubmission_viva_enabled"]').parent().hide();
                $('[title="Help with File submissions Viva video"]').parent().hide();
                that._vivacheck('.assigne_turn_on_viva[type="checkbox"]');
                // that._loadvivadata();
                // that._loadviva();            
                this.$PAGE.on('click','.assigne_turn_on_viva[type="checkbox"]',function(){ 
                     that._vivacheck(this);
                });
                this.$PAGE.on('click','[vivamoreqst]',function(){ 
                     ++count;
                     that._vivamoreqst(count);
                });
                this.$PAGE.on('click','.vivafelement [vivaqstrm]',function(){ 
                  var removeid=$(this).attr("remove-id");
                   $('#questionfitem'+removeid).remove();
                });  
            }
        },
        {
                key: "_vivamoreqst",
                value: function (count) {
                    var that = this;        
                    $('.vivafelement').append('<div id="questionfitem'+count+'" class="form-group row fitem questionfitem'+count+'"><div class="col-md-3 col-form-label d-flex pb-0 pr-md-0"><label id="id_examplefield_label" class="d-inline word-break " for="id_examplefield">Question </label><div class="form-label-addon d-flex align-items-center align-self-start"></div></div><div class="col-md-9 form-inline align-items-start felement" data-fieldtype="text"><input type="text" class="form-control " name="question_other[]" id="examplefield" value=""><button type="button" class="btn btn-danger m-10" vivaqstrm remove-id="'+count+'">Remove</button><div class="form-control-feedback invalid-feedback" id="id_error_examplefield"></div></div></div>');
                }
        },
        {
                key: "_vivacheck",
                value: function (itemcheck) {
                    var that = this;
                    if($(itemcheck).is(":checked")){
                        $('[name="assignsubmission_viva_enabled"]').attr('checked','true')
                        $('.vivafelement').show();
                        if(!$(".vivafelement input[name='question_1']").val()){
                            $(".vivafelement input[name='question_1']").attr('required','true');
                        }
                        
                     }else{
                        $('.vivafelement').hide();
                        $(".vivafelement input[name='question_1']").removeAttr("required");
                        $('[name="assignsubmission_viva_enabled"]').removeAttr('checked')
                     }
                       
                }
        }
            ,{
            key: "_vivaRequest",
            value: function (wsfunction, data) {
                if (this.applang) {
                    data.lang = this.applang;
                }
                try {
                    data['sesskey'] = M.cfg.sesskey;
                } catch (err) {
                    data = [];
                    data['sesskey'] = M.cfg.sesskey;
                }
                var returndata = {
                    "wsfunction": wsfunction,
                    "wsargs": data
                }
                if (this.logintoken) {
                    returndata.wstoken = this.logintoken;
                }
                return JSON.stringify(returndata);
            }
        }, {
            key: "_APICall",
            value: function (requestdata, success) {
                if (this.jCall) {
                    // this.jCall.abort();
                }
                this.jCall = $.ajax({
                    "url": M.cfg.wwwroot + "/local/viva/classes/vivaajax.php",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": requestdata,
                    beforeSend: function () {
                        //console.log("request beforeSend");
                    },
                    success: function (data, textStatus, jqXHR) {
                        if (data.code != 200) {
                            // displayToast(data.error.title, data.error.message, "error");
                        } else {
                            success(data);
                        }
                    }, error: function () {
                        //console.log("request error");
                        return null;
                    }, complete: function () {
                        //console.log("request complete");
                    }
                });
            }
        }]), t
    }();
!function (t) {
    t(function () {
        t("[viva]").each(function () {
            (new vivadashboardalldata).init(t, t(this))
        }), window.errors && window.errors.length && e.showMessage("Please correct the following errors:", window.errors)
    })
}(jQuery);
