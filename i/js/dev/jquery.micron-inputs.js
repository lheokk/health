/*
 *
 * @autor Guzenko Yuriy - sakkarem@gmail.com
 *
 */
$(document).ready(function() 
{
    if ($.browser.msie && parseFloat($.browser.version) < 8)
    {
        // Do nothing for ie6 and ie7
    }
    else
    {
        function ApplyMicronInputs(self, isCheckbox)
        {
            self.removeClass("micron-inputs");
            classes = self.attr("class");
            styles  = self.attr("style");
            self.wrap('<div/>');
       
            self.parent().addClass(isCheckbox ? "micron-inputs-checkbox" : "micron-inputs-radio");
            self.parent().addClass(classes);
            self.parent().attr("style", styles);
       
            self.parent().append("<div class='" + (isCheckbox ? "micron-inputs-checkbox-inner" : "micron-inputs-radio-inner") + "'/>");
       
            self.attr("class", "");
            self.fadeTo(0, 0.0);
        }

        $(".micron-inputs").each(function(index)
        {
            if ($(this).prop("tagName").toLowerCase() == "input" && $(this).attr("type") == "checkbox")
            {
                ApplyMicronInputs($(this), true);
            }
            else if ($(this).prop("tagName").toLowerCase() == "input" && $(this).attr("type") == "radio")
            {
                ApplyMicronInputs($(this), false);
            }
            else
            {
                $(this).find("input:checkbox").each(function()
                {
                    ApplyMicronInputs($(this), true);
                });
                $(this).find("input:radio").each(function()
                {
                    ApplyMicronInputs($(this), false);
                });
            }
        });
       
        function OnHighlight(self, checked, disabled, focus)
        {
            self.removeClass("micron-inputs-uncheched");
            self.removeClass("micron-inputs-uncheched-highlight");
            self.removeClass("micron-inputs-cheched");
            self.removeClass("micron-inputs-cheched-highlight");

            if (checked)
            {
                self.addClass(focus && !disabled ? "micron-inputs-cheched-highlight" : "micron-inputs-cheched");
            }
            else
            {
                self.addClass(focus && !disabled ? "micron-inputs-uncheched-highlight" : "micron-inputs-uncheched");
            }

            self.fadeTo(0, disabled ? 0.5 : 1.0);
        }
       
        $(".micron-inputs-checkbox input, .micron-inputs-radio input").focusin( function() 
        {
            $(this).attr("focused", "1");
            OnHighlight($(this).parent(), $(this).is(':checked'), $(this).is(':disabled'), true) 
        });
        $(".micron-inputs-checkbox input, .micron-inputs-radio input").blur(    function() 
        { 
            $(this).attr("focused", "0");
            OnHighlight($(this).parent(), $(this).is(':checked'), $(this).is(':disabled'), false) 
        });
       
        $(".micron-inputs-checkbox input, .micron-inputs-radio input").each(function()
        {
            var self = $(this);
       
            if ($(this).parent().prop("tagName").toLowerCase() == "label")
            {
                self = $(this).parent();
            }
            else if ($(this).parent().parent().prop("tagName").toLowerCase() == "label")
            {
                self = $(this).parent().parent();
            }
            else if ($(this).parent().parent().parent().prop("tagName").toLowerCase() == "label")
            {
                self = $(this).parent().parent().parent();
            }
            else if ($(this).parent().parent().parent().parent().prop("tagName").toLowerCase() == "label")
            {
                self = $(this).parent().parent().parent().parent();
            }

            self.mouseenter(function() 
            {
               s = $(this).prop("tagName").toLowerCase() == "input" ? $(this) : $(this).find("input");
               s.attr("hovered", "1");
               OnHighlight(s.parent(), s.is(':checked'), s.is(':disabled'), true); 
            });
            self.mouseleave(function() 
            {
               s = $(this).prop("tagName").toLowerCase() == "input" ? $(this) : $(this).find("input");
               s.attr("hovered", "0");
               OnHighlight(s.parent(), s.is(':checked'), s.is(':disabled'), false); 
            });
        });

        $(".micron-inputs-checkbox input, .micron-inputs-radio input").change(function() 
        { 
            $("input[name='" + $(this).attr("name") + "']").each(function() // for radio button to redraw unchecked inputs
            {
                OnHighlight($(this).parent(), $(this).is(':checked'), $(this).is(':disabled'), $(this).attr("focused") == "1" ? true : $(this).attr("hovered") == "1");
            });
        });
       
        $(".micron-inputs-checkbox input, .micron-inputs-radio input").each(function() 
        { 
            OnHighlight($(this).parent(), $(this).is(':checked'), $(this).is(':disabled'), false); 
        });
    }
});
