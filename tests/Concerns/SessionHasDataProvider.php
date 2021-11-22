<?php

namespace Tests\Concerns;

use Illuminate\Support\Str;

trait SessionHasDataProvider
{
    public function invalidProcessData(): array
    {
        return [
            'Payer name is required' => $this->getInvalidRequiredFieldCase('payer.name'),
            'Payer name is not a string' => $this->getInvalidTypeFieldCase('payer.name', 'a string', ['nested']),
            'Payer name is too long' => $this->getInvalidMaxLengthFieldCase('payer.name', 80, Str::random(81)),
            'Payer surname is required' => $this->getInvalidRequiredFieldCase('payer.surname'),
            'Payer surname is not a string' => $this->getInvalidTypeFieldCase('payer.surname', 'a string', ['nested']),
            'Payer surname is too long' => $this->getInvalidMaxLengthFieldCase('payer.surname', 80, Str::random(81)),
            'Payer document type is required' => $this->getInvalidRequiredFieldCase('payer.documentType'),
            'Payer document type is invalid' => $this->getInvalidSelectFieldCase('payer.documentType', 'XXX'),
            'Payer document is required' => $this->getInvalidRequiredFieldCase('payer.document'),
            'Payer document is not a string' => $this->getInvalidTypeFieldCase('payer.document', 'a string', ['nested']),
            'Payer document is too long' => $this->getInvalidMaxLengthFieldCase('payer.document', 20, Str::random(21)),
            'Payer email is required' => $this->getInvalidRequiredFieldCase('payer.email'),
            'Payer email is not an email' => $this->getInvalidTypeFieldCase('payer.email', 'a valid email address', 'no.email'),
            'Payer email is too long' => $this->getInvalidMaxLengthFieldCase('payer.email', 120, Str::random(112) . '@test.com'),
            'Payer mobile is required' => $this->getInvalidRequiredFieldCase('payer.mobile'),
            'Payer mobile is not a string' => $this->getInvalidTypeFieldCase('payer.mobile', 'a string', ['nested']),
            'Payer mobile is too long' => $this->getInvalidMaxLengthFieldCase('payer.mobile', 20, Str::random(21)),
            'Instrument payment method id is required' => $this->getInvalidRequiredFieldCase('instrument.paymentMethodId'),
            'Instrument payment method id is invalid' => $this->getInvalidSelectFieldCase('instrument.paymentMethodId', 2000),
            'Instrument card number is required' => $this->getInvalidRequiredFieldCase('instrument.card.number'),
            'Instrument card number is not a number' => $this->getInvalidTypeFieldCase('instrument.card.number', 'a number', 'not numeric'),
            'Instrument card number is too short' => $this->getInvalidSizeBetweenFieldCase('instrument.card.number', 10, 19, Str::repeat('4', 9)),
            'Instrument card number is too long' => $this->getInvalidSizeBetweenFieldCase('instrument.card.number', 10, 19, Str::repeat('4', 20)),
            'Instrument card cvv is not a number' => $this->getInvalidTypeFieldCase('instrument.card.cvv', 'a number', 'not numeric'),
            'Instrument card cvv is too short' => $this->getInvalidSizeFieldCase('instrument.card.cvv', 3, '12'),
            'Instrument card cvv is too long' => $this->getInvalidSizeFieldCase('instrument.card.cvv', 3, '1234'),
            'Instrument expiration is invalid' => $this->getInvalidFormatFieldCase('instrument.card.expiration', '23/12'),
        ];
    }

    protected function getInvalidRequiredFieldCase(string $field): array
    {
        $value = $this->getValue($field);
        $message = sprintf('The %s field is required.', $this->getFormattedFieldToMessage($field));

        return compact('value', 'field', 'message');
    }

    protected function getInvalidTypeFieldCase(string $field, string $type, $invalidValue): array
    {
        $value = $this->getValue($field, $invalidValue);
        $message = sprintf('The %s must be %s.', $this->getFormattedFieldToMessage($field), $type);

        return compact('value', 'field', 'message');
    }

    protected function getInvalidMaxLengthFieldCase(string $field, int $size, $invalidValue): array
    {
        $value = $this->getValue($field, $invalidValue);
        $message = sprintf(
            'The %s must not be greater than %s characters.',
            $this->getFormattedFieldToMessage($field),
            $size
        );

        return compact('value', 'field', 'message');
    }

    protected function getInvalidSizeFieldCase(string $field, int $size, $invalidValue): array
    {
        $value = $this->getValue($field, $invalidValue);
        $message = sprintf(
            'The %s must be %s digits.',
            $this->getFormattedFieldToMessage($field),
            $size
        );

        return compact('value', 'field', 'message');
    }

    protected function getInvalidSizeBetweenFieldCase(string $field, int $minSize, int $maxSize, $invalidValue): array
    {
        $value = $this->getValue($field, $invalidValue);
        $message = sprintf(
            'The %s must be between %s and %s digits.',
            $this->getFormattedFieldToMessage($field),
            $minSize,
            $maxSize
        );

        return compact('value', 'field', 'message');
    }

    protected function getInvalidSelectFieldCase(string $field, $invalidValue): array
    {
        $value = $this->getValue($field, $invalidValue);
        $message = sprintf('The selected %s is invalid.', $this->getFormattedFieldToMessage($field));

        return compact('value', 'field', 'message');
    }

    protected function getInvalidFormatFieldCase(string $field, $invalidValue): array
    {
        $value = $this->getValue($field, $invalidValue);
        $message = sprintf('The %s format is invalid.', $this->getFormattedFieldToMessage($field));

        return compact('value', 'field', 'message');
    }

    protected function getValue(string $field, $value = null): array
    {
        $keys = (array)explode('.', $field);

        foreach (array_reverse($keys) as $key) {
            $value = [$key => $value];
        }

        return $value;
    }

    protected function getFormattedFieldToMessage(string $field): string
    {
        return Str::of($field)->snake()->replace('_', ' ');
    }
}
