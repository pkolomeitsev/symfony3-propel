<?php
/**
 * @author Pavel K <p.kolomeitsev@gmail.com>
 * 2019
 */

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Propel\Bundle\PropelBundle\Command\WrappedCommand;
use Propel\Generator\Command\DatabaseReverseCommand as BaseDatabaseReverseCommand;

class DatabaseReverseCommand extends WrappedCommand
{
    const DEFAULT_OUTPUT_DIRECTORY = 'src/AppBundle/Resources/config';
    const DEFAULT_DATABASE_NAME = 'default';
    const DEFAULT_SCHEMA_NAME = 'symfony-propel-schema';
    const DEFAULT_NAMESPACE = 'AppBundle\PropelModels';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();

        $this->setName('custom-propel:database:reverse')
            ->setDescription('Reverse-engineer a XML schema file based on given database. Uses given `connection` as name, as dsn or your `reverse.connection` configuration in propel config as connection.')
            ->addArgument(
                'connection',
                InputArgument::OPTIONAL,
                'Connection name or dsn to use. Example: \'mysql:host=127.0.0.1;dbname=test;user=root;password=foobar\' (don\'t forget the quote for dsn)',
                'default'
            )
            ->addOption('output-dir',       null, InputOption::VALUE_REQUIRED, 'The output directory', self::DEFAULT_OUTPUT_DIRECTORY)
            ->addOption('database-name',    null, InputOption::VALUE_REQUIRED, 'The database name to reverse', self::DEFAULT_DATABASE_NAME)
            ->addOption('schema-name',      null, InputOption::VALUE_REQUIRED, 'The schema name to generate', self::DEFAULT_SCHEMA_NAME)
            ->addOption('namespace',        null, InputOption::VALUE_OPTIONAL, 'The PHP namespace to use for generated models')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function createSubCommandInstance()
    {
        return new BaseDatabaseReverseCommand();
    }

    /**
     * {@inheritdoc}
     */
    protected function getSubCommandArguments(InputInterface $input)
    {
        return array(
            '--output-dir'      => $input->getOption('output-dir'),
            '--database-name'   => $input->getOption('database-name'),
            '--schema-name'     => $input->getOption('schema-name'),
            '--namespace'     => $input->getOption('namespace'),
            // this one is an argument, so no leading '--'
            'connection'        => $this->getDsn($input->getArgument('connection')),
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = parent::execute($input, $output);

        // add namespace to schema file
        $file = self::DEFAULT_OUTPUT_DIRECTORY . '/' . self::DEFAULT_SCHEMA_NAME . '.xml';
        if (is_writable($file)) {
            $xml = simplexml_load_file($file);
            $xml->addAttribute('namespace', self::DEFAULT_NAMESPACE);
            $xml->saveXML($file);
        }

        return $result;
    }

}