<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Support\Facades\DB;

class Profile {

    public $id;
    public $type;
    public $first_name;
    public $last_name;

    /**
     * Profile constructor.
     * @param $first_name
     * @param $last_name
     */
    public function __construct($first_name, $last_name) {
        $this->id = strtolower($first_name . "." . $last_name);
        $this->type = 1;
        $this->first_name = ucfirst($first_name);
        $this->last_name = strtoupper($last_name);
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getType(): int {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void {
        $this->last_name = $last_name;
    }

    /**
     * @param string $last_name
     */
    public function getCompleteName(): string {
        return $this->first_name . " " . $this->last_name;
    }

    public function create(): bool {
        $request = "INSERT INTO `account`(`id`, `type`, `first_name`, `last_name`) VALUES (?, ?, ?, ?)";
        return DB::statement($request, [$this->id, $this->type, $this->first_name, $this->last_name]);
    }

    public function remove(): bool {
        $request = "DELETE FROM `account` WHERE id = ?";
        return DB::statement($request, [$this->id]);
    }

    public static function load($id): object {
        $request = "SELECT * FROM `account` WHERE id = ?";
        $results = DB::select($request, [$id]);

        return count($results) > 0 ? $results[0] : null;
    }

    public static function build($data): Profile {
        $profile = new Profile($data->first_name, $data->last_name);

        $profile->setId($data->id);
        $profile->setType($data->type);
        $profile->setFirstName($data->first_name);
        if ($data->last_name != null) $profile->setLastName($data->last_name);

        return $profile;
    }

    public static function list(): array {
        $request = "SELECT * FROM `account` ORDER BY id";
        return DB::select($request);
    }

    public function session_push(): void {
        session()->put("account", $this);
    }

    public static function session_get(): Profile {
        return session()->has("account") ? session()->get("account") : null;
    }

    public static function session_delete(): void {
        if (session()->has("account")) session()->remove("account");
    }
}
