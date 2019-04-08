<?php

namespace AppBundle\PropelModels\Base;

use \Exception;
use \PDO;
use AppBundle\PropelModels\UserProfile as ChildUserProfile;
use AppBundle\PropelModels\UserProfileQuery as ChildUserProfileQuery;
use AppBundle\PropelModels\Map\UserProfileTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'user_profile' table.
 *
 *
 *
 * @method     ChildUserProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUserProfileQuery orderByAboutMe($order = Criteria::ASC) Order by the about_me column
 * @method     ChildUserProfileQuery orderByProfession($order = Criteria::ASC) Order by the profession column
 * @method     ChildUserProfileQuery orderByBirthDate($order = Criteria::ASC) Order by the birth_date column
 * @method     ChildUserProfileQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildUserProfileQuery groupById() Group by the id column
 * @method     ChildUserProfileQuery groupByAboutMe() Group by the about_me column
 * @method     ChildUserProfileQuery groupByProfession() Group by the profession column
 * @method     ChildUserProfileQuery groupByBirthDate() Group by the birth_date column
 * @method     ChildUserProfileQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildUserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserProfileQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserProfileQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserProfileQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserProfile findOne(ConnectionInterface $con = null) Return the first ChildUserProfile matching the query
 * @method     ChildUserProfile findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUserProfile matching the query, or a new ChildUserProfile object populated from the query conditions when no match is found
 *
 * @method     ChildUserProfile findOneById(int $id) Return the first ChildUserProfile filtered by the id column
 * @method     ChildUserProfile findOneByAboutMe(string $about_me) Return the first ChildUserProfile filtered by the about_me column
 * @method     ChildUserProfile findOneByProfession(string $profession) Return the first ChildUserProfile filtered by the profession column
 * @method     ChildUserProfile findOneByBirthDate(string $birth_date) Return the first ChildUserProfile filtered by the birth_date column
 * @method     ChildUserProfile findOneByUserId(int $user_id) Return the first ChildUserProfile filtered by the user_id column *

 * @method     ChildUserProfile requirePk($key, ConnectionInterface $con = null) Return the ChildUserProfile by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserProfile requireOne(ConnectionInterface $con = null) Return the first ChildUserProfile matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserProfile requireOneById(int $id) Return the first ChildUserProfile filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserProfile requireOneByAboutMe(string $about_me) Return the first ChildUserProfile filtered by the about_me column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserProfile requireOneByProfession(string $profession) Return the first ChildUserProfile filtered by the profession column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserProfile requireOneByBirthDate(string $birth_date) Return the first ChildUserProfile filtered by the birth_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserProfile requireOneByUserId(int $user_id) Return the first ChildUserProfile filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserProfile[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUserProfile objects based on current ModelCriteria
 * @method     ChildUserProfile[]|ObjectCollection findById(int $id) Return ChildUserProfile objects filtered by the id column
 * @method     ChildUserProfile[]|ObjectCollection findByAboutMe(string $about_me) Return ChildUserProfile objects filtered by the about_me column
 * @method     ChildUserProfile[]|ObjectCollection findByProfession(string $profession) Return ChildUserProfile objects filtered by the profession column
 * @method     ChildUserProfile[]|ObjectCollection findByBirthDate(string $birth_date) Return ChildUserProfile objects filtered by the birth_date column
 * @method     ChildUserProfile[]|ObjectCollection findByUserId(int $user_id) Return ChildUserProfile objects filtered by the user_id column
 * @method     ChildUserProfile[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserProfileQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \AppBundle\PropelModels\Base\UserProfileQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AppBundle\\PropelModels\\UserProfile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserProfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserProfileQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserProfileQuery) {
            return $criteria;
        }
        $query = new ChildUserProfileQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUserProfile|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserProfileTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserProfileTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserProfile A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, about_me, profession, birth_date, user_id FROM user_profile WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUserProfile $obj */
            $obj = new ChildUserProfile();
            $obj->hydrate($row);
            UserProfileTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUserProfile|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserProfileTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserProfileTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UserProfileTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UserProfileTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserProfileTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the about_me column
     *
     * Example usage:
     * <code>
     * $query->filterByAboutMe('fooValue');   // WHERE about_me = 'fooValue'
     * $query->filterByAboutMe('%fooValue%', Criteria::LIKE); // WHERE about_me LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aboutMe The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterByAboutMe($aboutMe = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aboutMe)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserProfileTableMap::COL_ABOUT_ME, $aboutMe, $comparison);
    }

    /**
     * Filter the query on the profession column
     *
     * Example usage:
     * <code>
     * $query->filterByProfession('fooValue');   // WHERE profession = 'fooValue'
     * $query->filterByProfession('%fooValue%', Criteria::LIKE); // WHERE profession LIKE '%fooValue%'
     * </code>
     *
     * @param     string $profession The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterByProfession($profession = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($profession)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserProfileTableMap::COL_PROFESSION, $profession, $comparison);
    }

    /**
     * Filter the query on the birth_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthDate('2011-03-14'); // WHERE birth_date = '2011-03-14'
     * $query->filterByBirthDate('now'); // WHERE birth_date = '2011-03-14'
     * $query->filterByBirthDate(array('max' => 'yesterday')); // WHERE birth_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterByBirthDate($birthDate = null, $comparison = null)
    {
        if (is_array($birthDate)) {
            $useMinMax = false;
            if (isset($birthDate['min'])) {
                $this->addUsingAlias(UserProfileTableMap::COL_BIRTH_DATE, $birthDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthDate['max'])) {
                $this->addUsingAlias(UserProfileTableMap::COL_BIRTH_DATE, $birthDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserProfileTableMap::COL_BIRTH_DATE, $birthDate, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserProfileTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserProfileTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserProfileTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUserProfile $userProfile Object to remove from the list of results
     *
     * @return $this|ChildUserProfileQuery The current query, for fluid interface
     */
    public function prune($userProfile = null)
    {
        if ($userProfile) {
            $this->addUsingAlias(UserProfileTableMap::COL_ID, $userProfile->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user_profile table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserProfileTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserProfileTableMap::clearInstancePool();
            UserProfileTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserProfileTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserProfileTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserProfileTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserProfileTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserProfileQuery
