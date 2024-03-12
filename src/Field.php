<?php

namespace YMartini\Nova\Fields\QRCodeReader;

use Laravel\Nova;

/**
 * @method static self make(Nova\Fields\Field $field)
 */
class Field extends Nova\Fields\Field
{
    public $component = 'qr-code-reader-field';

    protected array $fieldDependencies = []; // fuk u nova

    protected Nova\Fields\Field $field;

    public function __construct(Nova\Fields\Field $field)
    {
        parent::__construct($field->name, $field->attribute, $field->resolveCallback);

        $this->field = $field;
    }

    public function resolve($resource, $attribute = null){
        $this->field->resolve($resource, $attribute);
    }

    public function resolveForDisplay($resource, $attribute = null)
    {
        $this->field->resolveForDisplay($resource, $attribute);
    }

    public function rules(...$rules)
    {
        return $this->field->rules(...$rules);
    }

    public function getRules(Nova\Http\Requests\NovaRequest $request)
    {
        return $this->field->getRules($request);
    }

    public function getCreationRules(Nova\Http\Requests\NovaRequest $request)
    {
        return $this->field->getCreationRules($request);
    }

    public function creationRules($rules)
    {
        return $this->field->creationRules(...$rules);
    }

    public function getUpdateRules(Nova\Http\Requests\NovaRequest $request)
    {
        return $this->field->getUpdateRules($request);
    }

    public function updateRules($rules)
    {
        return $this->field->updateRules(...$rules);
    }

    public function getValidationAttribute(Nova\Http\Requests\NovaRequest $request)
    {
        return $this->field->getValidationAttribute($request);
    }

    public function getValidationAttributeNames(Nova\Http\Requests\NovaRequest $request)
    {
        return $this->field->getValidationAttributeNames($request);
    }

    public function validationKey()
    {
        return $this->field->validationKey();
    }

    public function __call($method, $parameters)
    {
        if (method_exists($this->field, $method)) {
            return call_user_func_array($this->field->$method, $parameters);
        }

        return parent::__call($method, $parameters);
    }

    function __get($name)
    {
        return $this->$name ?? $this->field->$name;
    }

    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'field' => $this->field->jsonSerialize(),
            ]
        );
    }
}
