<?php
/**
 * Advertikon setable.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace advertikon\sql;


trait SetAble {
	private $data = [];
	private $processed = [];

	public function field( $field ) {
		$item = new InsertFieldValue( $this );
		$this->data[] = $item;
		return $item->field( $field );
	}

	public function set( $field, $value = null ) {
		if ( is_array( $field ) && is_null( $value ) ) {
			$this->field( array_keys( $field ) )->value( array_values( $field )  );

		} else {
			$this->field( $field )->value( $value );
		}

		return $this;
	}

	private function processData() {
		$this->processed = [];

		/** @var InsertFieldValue $item */
		foreach( $this->data as $item ) {
			$field = $item->getField();
			$value = $item->getValue();

			if ( is_array( $field ) ) {
				for( $i = 0; $i < count( $field ); $i++ ) {
					if ( $this->isMultidim( $value ) ) {
						$this->addToProcessed( $field[ $i ], $value, $i );

					} else {
						$this->addToProcessed( $field[ $i ], $value[ $i ] );
					}
				}

			} else {
				$this->addToProcessed( $field, $value );
			}
		}
	}

	private function addToProcessed( $field, $value, $index = null ) {
		if ( !isset( $this->processed[ $field ] ) ) {
			$this->processed[ $field ] = [];
		}

		if ( is_array( $value ) ) {
			if ( $this->isMultidim( $value ) ) {
				foreach ( $value as $v ) {
					$this->processed[ $field ][] = $v[ $index ];
				}

			} else {
				$this->processed[ $field ] = array_merge( $this->processed[ $field ], $value );
			}

		} else {
			$this->processed[ $field ][] = $value;
		}
	}

	private function isMultidim( array $a ) {
		foreach ( $a as $item ) {
			if ( is_array( $item ) ) return true;
		}

		return false;
	}
}