<?php
namespace SkillDisplay\Blog\ViewHelpers\Format;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * Modifies the case of an input string to upper- or lowercase or capitalization.
 * The default transformation will be uppercase as in ``mb_convert_case`` [1].
 *
 * Possible modes are:
 *
 * ``lower``
 *   Transforms the input string to its lowercase representation
 *
 * ``upper``
 *   Transforms the input string to its uppercase representation
 *
 * Note that the behavior will be the same as in the appropriate PHP function ``mb_convert_case`` [1];
 * especially regarding locale and multibyte behavior.
 *
 * @see http://php.net/manual/function.mb-convert-case.php [1]
 *
 * = Examples =
 *
 * <code title="Example">
 * <f:format.case>Some Text with miXed case</f:format.case>
 * </code>
 * <output>
 * SOME TEXT WITH MIXED CASE
 * </output>
 *
 * <code title="Example with given mode">
 * <f:format.case mode="capital">someString</f:format.case>
 * </code>
 * <output>
 * SomeString
 * </output>
 *
 * @api
 */
class CaseViewHelper extends AbstractViewHelper
{
    /**
     * Directs the input string being converted to "lowercase"
     */
    const CASE_LOWER = 'lower';

    /**
     * Directs the input string being converted to "UPPERCASE"
     */
    const CASE_UPPER = 'upper';


    /**
     * Output is escaped already. We must not escape children, to avoid double encoding.
     *
     * @var bool
     */
    protected $escapeChildren = false;

    /**
     * Initialize ViewHelper arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument('value', 'string', 'The input value. If not given, the evaluated child nodes will be used.', false, null);
        $this->registerArgument('mode', 'string', 'The case to apply, must be one of this\' CASE_* constants. Defaults to uppercase application.', false, self::CASE_UPPER);
    }

    /**
     * Changes the case of the input string
     *
     * @return string the altered string.
     * @api
     */
    public function render()
    {
        return static::renderStatic(
            [
                'value' => $this->arguments['value'],
                'mode' => $this->arguments['mode']
            ],
            $this->buildRenderChildrenClosure(),
            $this->renderingContext
        );
    }

    /**
     * Changes the case of the input string
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     * @throws InvalidVariableException
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $value = $arguments['value'];
        $mode = $arguments['mode'];

        if ($value === null) {
            $value = $renderChildrenClosure();
        }

        switch ($mode) {
            case self::CASE_LOWER:
                $output = mb_strtolower($value, 'utf-8');
                break;
            case self::CASE_UPPER:
                $output = mb_strtoupper($value, 'utf-8');
                break;
            default:
                throw new InvalidVariableException('The case mode "' . $mode . '" supplied to Fluid\'s format.case ViewHelper is not supported.', 1358349150);
        }

        return $output;
    }
}