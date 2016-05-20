<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Cronjob;

class GeneratePDF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate_pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate pdf from html';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // get all cron that not yet complete
        $jobs = Cronjob::where('type', $this->signature)
            ->whereNull('completed_at')
            ->get();

        foreach ($jobs as $job) {

            $job->executed_at = date('Y-m-d H:i:s');
            $job->save();

            $this->_generatePdf($job);

            // mark it as completed
            $job->completed_at = date('Y-m-d H:i:s');
            $job->save();
        }
    }

    protected function _generatePdf(Cronjob $job)
    {
        $data = json_decode($job->data, 1);

        $path = storage_path('files/users/' . $job->user_id . '/pdf');
        @mkdir($path, 0755, true);

        $html_file = storage_path('files/users/' . $job->user_id . '/html/' . $data['html']);

        $file = 'your-awesome-pdf-file.pdf';

        $cmd_output = exec(base_path('bin/wkhtmltopdf') . ' ' . $html_file . ' ' . $path . '/' . $file);

        unlink($html_file); // remove temporary html file
    }
}