<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class InstallerController extends Controller
{
    public function index()
    {
        return view('Installer.index');
    }

    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'hostname'   => 'required|string',
            'port'       => 'required|numeric',
            'connection' => 'required|string',
            'database'   => 'required|string',
            'username'   => 'required|string',
            'password'   => 'required|string',
        ]);

        // Update the .env file with database details
        $this->updateEnv([
            'DB_CONNECTION' => $request->connection,
            'DB_HOST'       => $request->hostname,
            'DB_PORT'       => $request->port,
            'DB_DATABASE'   => $request->database,
            'DB_USERNAME'   => $request->username,
            'DB_PASSWORD'   => $request->password,
        ]);

        $this->createInstalledFile();

        // Run the database migration (optional)
        Artisan::call('migrate:fresh', ['--force' => true]);

        // Delete the SQLite database file if it exists
        $this->deleteSQLiteDatabase();

        return redirect()->route('home')->with('success', 'Database configuration updated successfully!');
    }

    protected function createInstalledFile()
    {
        // Create a file named installed.php in the public directory
        $installedPath = public_path('installed.php');
        $data = [
            'db_host'       => env('DB_HOST'),
            'db_port'       => env('DB_PORT'),
            'db_connection' => env('DB_CONNECTION'),
            'db_database'   => env('DB_DATABASE'),
            'db_username'   => env('DB_USERNAME'),
            'db_password'   => env('DB_PASSWORD'),
        ];

        // Create the installed.php file and write the data
        File::put($installedPath, "<?php\n\nreturn " . var_export($data, true) . ";\n");
    }

    protected function deleteSQLiteDatabase()
    {
        // Check if the SQLite database file exists
        $sqliteFilePath = database_path('database.sqlite');

        if (file_exists($sqliteFilePath)) {
            File::delete($sqliteFilePath);
        }
    }

    protected function updateEnv(array $data)
    {
        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        foreach ($data as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            $replacement = "{$key}={$value}";
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= "\n{$key}={$value}";
            }
        }

        File::put($envPath, $envContent);
    }
}
