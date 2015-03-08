{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Measure info
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<div class="speed"></div>
<p class="date">{formatDate(lastDate)}</p>
<p class="completed">{t(#Benchmark completed in #)} <span class="score{if:isHighScore()} score-high{end:}">{measure.total}</span> {t(#ms#)}</p>
<p class="info">{t(#Benchmark result under 3000ms is considered good#)}</p>
<div class="buttons buttons-rerun">
  <widget class="\XLite\View\Button\Link" location="{buildURL(#measure#,#measure#)}" label="{t(#Run Benchmark again#)}" style="main-button" />
  <widget
    class="\XLite\View\Tooltip"
    id="measure-help-text"
    text="{t(#The benchmark evaluates server environment#):h}"
    caption="{t(#What is benchmark?#)}"
    isImageTag="false"
    className="help" />
</div>
{if:getHostingScore()}
<hr />
<p class="compare">{t(#Compare your result with other servers#)}:<span class="mark">*</span></p>
<table cellspacing="0" >
  <tr FOREACH="getHostingScore(),score" title="{score.name}">
    <td class="name">
      {if:score.link}
        <a href="{score.link}">{score.name}</a>
      {else:}
        {score.name}
      {end:}
    </td>
    <td class="dash">&mdash;</td>
    <td><span class="score">{score.score}</span> {t(#ms#)}</td>
  </tr>
</table>

<span class="note"><span class="mark">*</span> {t(#The values are average#)}</span>
{end:}
<span class="help-text" style="display: none;">{t(#The benchmark evaluates server environment#):h}</span>
