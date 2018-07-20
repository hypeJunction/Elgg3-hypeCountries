<?php

namespace hypeJunction\Countries;

/**
 * @property string $street_address
 * @property string $extended_address
 * @property string $locality
 * @property string $region
 * @property string $postal_code
 * @property string $country_code
 */
class Address implements \Serializable {

	/**
	 * Formats address into a envelope label
	 * @return string
	 */
	public function format() {

		$country = '';
		if ($this->country_code) {
			$country = elgg_echo("country:$this->country_code");
		}

		$rows = [];
		$rows[] = [$this->street_address];
		$rows[] = [$this->extended_address];
		$rows[] = [$this->locality, $this->region];
		$rows[] = [$this->postal_code, $country];

		foreach ($rows as &$row) {
			$row = implode(', ', array_filter($row));
		}

		return implode('<br />', array_filter($rows));
	}

	/**
	 * Export to array
	 * @return array
	 */
	public function toArray() {
		return [
			'street_address' => $this->street_address,
			'extended_address' => $this->extended_address,
			'locality' => $this->locality,
			'region' => $this->region,
			'postal_code' => $this->postal_code,
			'country_code' => $this->country_code,
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function serialize() {
		return serialize($this->toArray());
	}

		/**
	 * {@inheritdoc}
	 */
	public function unserialize($serialized) {
		$data = unserialize($serialized);

		$this->street_address = $data['street_address'];
		$this->extended_address = $data['extended_address'];
		$this->locality = $data['locality'];
		$this->region = $data['region'];
		$this->postal_code = $data['postal_code'];
		$this->country_code = $data['country_code'];
	}

}
