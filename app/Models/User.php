<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $contact
 * @property string|null $region_code
 * @property int $status
 * @property string|null $language
 * @property int $dark_mode
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read string $full_name
 * @property-read string $profile_image
 * @property-read mixed $role_name
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 *
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereContact($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDarkMode($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLanguage($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRegionCode($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 *
 * @mixin Eloquent
 *
 * @property int $is_default_admin
 *
 * @method static Builder|User whereIsDefaultAdmin($value)
 */
class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia, HasRoles;

    protected $table = 'users';

    const PROFILE = 'profile';

    const LETTER_OF_EMPLOYMENT = "employer_letter";

    const ADMIN = 1;

    const CLIENT = 2;

    const LANGUAGES = [
        'en' => 'English',
        'es' => 'Spanish',
        'fr' => 'French',
        'de' => 'German',
        'ru' => 'Russian',
        'pt' => 'Portuguese',
        'ar' => 'Arabic',
        'zh' => 'Chinese',
        'tr' => 'Turkish',
    ];

    const LANGUAGES_IMAGE = [
        'en' => 'web/media/flags/united-states.svg',
        'es' => 'web/media/flags/spain.svg',
        'fr' => 'web/media/flags/france.svg',
        'de' => 'web/media/flags/germany.svg',
        'ru' => 'web/media/flags/russia.svg',
        'pt' => 'web/media/flags/portugal.svg',
        'ar' => 'web/media/flags/iraq.svg',
        'zh' => 'web/media/flags/china.svg',
        'tr' => 'web/media/flags/turkey.svg',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'region_code',
        'status',
        'password',
        'language',
        'dark_mode',
        'is_default_admin',
        'region',
        'date_of_birth',
        'practice',
        'practice_number',
        'address',
        'zip_code',
        'state',
        'authorization_number',
        'facility_name',
        'employer_letter',
        'registration_number',
        'license_number',
        'occupation',
        'gender',
        'tittle',
        'town',
        'catergory',
        'retention_number',
    ];

    protected $appends = ['full_name', 'profile_image'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'region' => 'required',
        'date_of_birth' => 'required',
        'practice' => 'nullable',
        'practice_number' => 'nullable',
        'address' => 'required',
        'zip_code' => 'required',
        'state' => 'required',
        'authorization_number' => 'nullable',
        'facility_name' => 'nullable',
        'employer_letter' => 'nullable',
        'registration_number' => 'nullable',
        'license_number' => 'nullable',
        'occupation' => 'nullable',
        'gender' => 'required',
        'tittle' => 'required',
        'town' => 'required',
        'catergory' => 'required',
        'email' => 'required|email:filter|unique:users,email',
        'password' => 'required|same:password_confirmation|min:6',
        'retention_number' => 'nullable',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'contact' => 'string',
        'region_code' => 'string',
        'status' => 'integer',
        'language' => 'string',
        'dark_mode' => 'integer',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'is_default_admin' => 'integer',
        'region' => 'string',
        'date_of_birth' => 'string',
        'practice' => 'string',
        'practice_number' => 'string',
        'address' => 'string',
        'zip_code' => 'string',
        'state' => 'string',
        'authorization_number' => 'string',
        'facility_name' => 'string',
        'employer_letter' => 'string',
        'registration_number' => 'string',
        'license_number' => 'string',
        'occupation' => 'string',
        'gender' => 'string',
        'tittle' => 'string',
        'town' => 'string',
        'catergory' => 'string',
        'retention_number' => 'string',

    ];

    public function getProfileImageAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PROFILE)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/avatar.png');
    }

    public function getRoleNameAttribute()
    {
        $role = $this->roles()->first();

        if (!empty($role)) {
            return $role->display_name;
        }
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'user_id');
    }

    public function education(): HasOne
    {
        return $this->hasOne(Education::class, 'user_id');
    }
}
