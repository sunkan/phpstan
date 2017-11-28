<?php declare(strict_types = 1);

namespace PHPStan\Type;

use PHPStan\TrinaryLogic;

class FalseBooleanType extends BooleanType
{

	public function describe(): string
	{
		return 'false';
	}

	public function isSuperTypeOf(Type $type): TrinaryLogic
	{
		if ($type instanceof self) {
			return TrinaryLogic::createYes();
		}

		if ($type instanceof TrueBooleanType) {
			return TrinaryLogic::createNo();
		}

		if ($type instanceof BooleanType) {
			return TrinaryLogic::createMaybe();
		}

		if ($type instanceof CompoundType) {
			return $type->isSubTypeOf($this);
		}

		return TrinaryLogic::createNo();
	}

}
