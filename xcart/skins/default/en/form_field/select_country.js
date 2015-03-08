/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Country selector controller
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

function StateSelector(countrySelectorId, stateSelectorId, stateInputId)
{
  this.countrySelectBox = jQuery('#' + countrySelectorId);
  this.stateSelectBox = jQuery('#' + stateSelectorId);
  this.stateInputBox = jQuery('#' + stateInputId);

  if (this.stateSelectBox.length == 0) {
    return;
  }

  if (this.stateSelectBox.val()) {
    this.stateSelectBoxValue = this.stateSelectBox.val();

  } else if (this.stateSelectBox.attr('data-value')) {
    this.stateSelectBoxValue = this.stateSelectBox.attr('data-value');
  }

  this.stateInputBoxValue = this.stateInputBox.val();

  // Event handlers
  var o = this;

  this.countrySelectBox.change(
    function(event) {
      return o.changeCountry(this.value);
    }
  );

  this.stateSelectBox.change(
    function(event) {
      return o.changeState(this.value);
    }
  );

  this.stateSelectBox.getParentBlock = function() {
    return o.getParentBlock(this);
  }

  this.stateInputBox.getParentBlock = function() {
    return o.getParentBlock(this);
  }

  this.countrySelectBox.change();

  // Re-initialize state selector's CommonElement object initial value
  var elm = new CommonElement(this.stateSelectBox[0]);
  elm.bindElement(this.stateSelectBox[0]);
  elm.saveValue();
}

StateSelector.prototype.countrySelectBox = null;
StateSelector.prototype.stateSelectBox = null;
StateSelector.prototype.stateInputBox = null;
StateSelector.prototype.stateSavedValue = null;

StateSelector.prototype.getParentBlock = function(selector)
{
  var block = selector.closest('li');

  if (!block.length) {
    block = selector.closest('div');
  }

  return block;
}

StateSelector.prototype.changeState = function(state)
{
  if (-1 == state) {
    this.stateInputBox.getParentBlock().show();

  } else {
    this.stateInputBox.getParentBlock().hide();
  }
}

StateSelector.prototype.changeCountry = function(country)
{
  if (this.getParentBlock(this.countrySelectBox).filter(':visible').length) {
    if (statesList[country]) {

      this.removeOptions();
      this.addStates(statesList[country]);

      this.stateSelectBox.getParentBlock().show();
      this.stateSelectBox.change();

    } else {

      this.stateSelectBox.getParentBlock().hide();
      this.stateInputBox.getParentBlock().show();
    }
  }
}

StateSelector.prototype.removeOptions = function()
{
  var s = this.stateSelectBox.get(0);

  if (this.stateSelectBox.val()) {
    this.stateSavedValue = this.stateSelectBox.val();

  } else {
    this.stateSavedValue = this.stateSelectBoxValue;
  }

  if (s) {
    for (var i = s.options.length - 1; i >= 0; i--) {
      s.options[i] = null;
    }
  }
}

StateSelector.prototype.addDefaultOptions = function()
{
//    this.stateSelectBox.get(0).options[0] = new Option('Select one', '');
//    this.stateSelectBox.get(0).options[1] = new Option('Other', '-1');
}

StateSelector.prototype.addStates = function(states)
{
  this.addDefaultOptions();

  var s = this.stateSelectBox.get(0);
  if (s) {
    var added = s.options.length;
    var i = 0;

    if (states) {
      for (var id in states) {
        s.options[i + added] = new Option(states[id].name, states[id].key);
        i++;
      }
    }
  }

  this.stateSelectBox.val(this.stateSavedValue);
  if (!this.stateSelectBox.val() && this.stateSelectBox.get(0).options.length > 0) {
    this.stateSelectBox.val(this.stateSelectBox.get(0).options[0].value);
  }
}

jQuery(document).ready(function () {
  UpdateStatesList();
});

