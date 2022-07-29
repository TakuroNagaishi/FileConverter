<?php

class File
{
    protected static $extension;
    protected static $separator = ",";
    protected static $file_header = '';
    protected $filename;
    protected $body;

    private const MODE_READ = "r";
    private const MODE_WRITE = "w";

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function getFileName(): string
    {
        return $this->filename;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function write(): void
    {
        $file = fopen($this->filename, self::MODE_WRITE);

        fwrite($file, $this->body);

        fclose($file);
    }

    public static function readAll(string $file_path): string
    {
        return file_get_contents($file_path);
    }

    public function readAsLines(): array
    {
        $rtn = [];

        $file = fopen($this->filename, self::MODE_READ);

        while ($line = fgets($file)) {
            $rtn[] = $line;
        }

        fclose($file);

        return $rtn;
    }

    public function readAsCells(): array
    {
        $rtn = [];

        $lines = $this->readAsLines();

        foreach ($lines as $line) {
            $rtn[] = explode(static::$separator, rtrim($line, PHP_EOL));
        }

        return $rtn;
    }
}
