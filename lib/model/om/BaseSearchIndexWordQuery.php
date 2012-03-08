<?php


/**
 * Base class that represents a query for the 'search_index_words' table.
 *
 * 
 *
 * @method     SearchIndexWordQuery orderBySearchIndexId($order = Criteria::ASC) Order by the search_index_id column
 * @method     SearchIndexWordQuery orderByWord($order = Criteria::ASC) Order by the word column
 * @method     SearchIndexWordQuery orderByCount($order = Criteria::ASC) Order by the count column
 * @method     SearchIndexWordQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SearchIndexWordQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     SearchIndexWordQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     SearchIndexWordQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     SearchIndexWordQuery groupBySearchIndexId() Group by the search_index_id column
 * @method     SearchIndexWordQuery groupByWord() Group by the word column
 * @method     SearchIndexWordQuery groupByCount() Group by the count column
 * @method     SearchIndexWordQuery groupByCreatedAt() Group by the created_at column
 * @method     SearchIndexWordQuery groupByUpdatedAt() Group by the updated_at column
 * @method     SearchIndexWordQuery groupByCreatedBy() Group by the created_by column
 * @method     SearchIndexWordQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     SearchIndexWordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SearchIndexWordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SearchIndexWordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SearchIndexWordQuery leftJoinSearchIndex($relationAlias = null) Adds a LEFT JOIN clause to the query using the SearchIndex relation
 * @method     SearchIndexWordQuery rightJoinSearchIndex($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SearchIndex relation
 * @method     SearchIndexWordQuery innerJoinSearchIndex($relationAlias = null) Adds a INNER JOIN clause to the query using the SearchIndex relation
 *
 * @method     SearchIndexWordQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SearchIndexWordQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SearchIndexWordQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     SearchIndexWordQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SearchIndexWordQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SearchIndexWordQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     SearchIndexWord findOne(PropelPDO $con = null) Return the first SearchIndexWord matching the query
 * @method     SearchIndexWord findOneOrCreate(PropelPDO $con = null) Return the first SearchIndexWord matching the query, or a new SearchIndexWord object populated from the query conditions when no match is found
 *
 * @method     SearchIndexWord findOneBySearchIndexId(int $search_index_id) Return the first SearchIndexWord filtered by the search_index_id column
 * @method     SearchIndexWord findOneByWord(string $word) Return the first SearchIndexWord filtered by the word column
 * @method     SearchIndexWord findOneByCount(int $count) Return the first SearchIndexWord filtered by the count column
 * @method     SearchIndexWord findOneByCreatedAt(string $created_at) Return the first SearchIndexWord filtered by the created_at column
 * @method     SearchIndexWord findOneByUpdatedAt(string $updated_at) Return the first SearchIndexWord filtered by the updated_at column
 * @method     SearchIndexWord findOneByCreatedBy(int $created_by) Return the first SearchIndexWord filtered by the created_by column
 * @method     SearchIndexWord findOneByUpdatedBy(int $updated_by) Return the first SearchIndexWord filtered by the updated_by column
 *
 * @method     array findBySearchIndexId(int $search_index_id) Return SearchIndexWord objects filtered by the search_index_id column
 * @method     array findByWord(string $word) Return SearchIndexWord objects filtered by the word column
 * @method     array findByCount(int $count) Return SearchIndexWord objects filtered by the count column
 * @method     array findByCreatedAt(string $created_at) Return SearchIndexWord objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return SearchIndexWord objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return SearchIndexWord objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return SearchIndexWord objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSearchIndexWordQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSearchIndexWordQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'rapila', $modelName = 'SearchIndexWord', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SearchIndexWordQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SearchIndexWordQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SearchIndexWordQuery) {
			return $criteria;
		}
		$query = new SearchIndexWordQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$search_index_id, $word] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SearchIndexWord|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SearchIndexWordPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SearchIndexWordPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    SearchIndexWord A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `SEARCH_INDEX_ID`, `WORD`, `COUNT`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `search_index_words` WHERE `SEARCH_INDEX_ID` = :p0 AND `WORD` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new SearchIndexWord();
			$obj->hydrate($row);
			SearchIndexWordPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    SearchIndexWord|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(SearchIndexWordPeer::SEARCH_INDEX_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(SearchIndexWordPeer::WORD, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(SearchIndexWordPeer::SEARCH_INDEX_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(SearchIndexWordPeer::WORD, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the search_index_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySearchIndexId(1234); // WHERE search_index_id = 1234
	 * $query->filterBySearchIndexId(array(12, 34)); // WHERE search_index_id IN (12, 34)
	 * $query->filterBySearchIndexId(array('min' => 12)); // WHERE search_index_id > 12
	 * </code>
	 *
	 * @see       filterBySearchIndex()
	 *
	 * @param     mixed $searchIndexId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterBySearchIndexId($searchIndexId = null, $comparison = null)
	{
		if (is_array($searchIndexId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SearchIndexWordPeer::SEARCH_INDEX_ID, $searchIndexId, $comparison);
	}

	/**
	 * Filter the query on the word column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWord('fooValue');   // WHERE word = 'fooValue'
	 * $query->filterByWord('%fooValue%'); // WHERE word LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $word The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByWord($word = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($word)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $word)) {
				$word = str_replace('*', '%', $word);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SearchIndexWordPeer::WORD, $word, $comparison);
	}

	/**
	 * Filter the query on the count column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCount(1234); // WHERE count = 1234
	 * $query->filterByCount(array(12, 34)); // WHERE count IN (12, 34)
	 * $query->filterByCount(array('min' => 12)); // WHERE count > 12
	 * </code>
	 *
	 * @param     mixed $count The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByCount($count = null, $comparison = null)
	{
		if (is_array($count)) {
			$useMinMax = false;
			if (isset($count['min'])) {
				$this->addUsingAlias(SearchIndexWordPeer::COUNT, $count['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($count['max'])) {
				$this->addUsingAlias(SearchIndexWordPeer::COUNT, $count['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SearchIndexWordPeer::COUNT, $count, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $createdAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SearchIndexWordPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SearchIndexWordPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SearchIndexWordPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $updatedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SearchIndexWordPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SearchIndexWordPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SearchIndexWordPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
	 * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
	 * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
	 * </code>
	 *
	 * @see       filterByUserRelatedByCreatedBy()
	 *
	 * @param     mixed $createdBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(SearchIndexWordPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(SearchIndexWordPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SearchIndexWordPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
	 * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
	 * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by > 12
	 * </code>
	 *
	 * @see       filterByUserRelatedByUpdatedBy()
	 *
	 * @param     mixed $updatedBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(SearchIndexWordPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(SearchIndexWordPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SearchIndexWordPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related SearchIndex object
	 *
	 * @param     SearchIndex|PropelCollection $searchIndex The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterBySearchIndex($searchIndex, $comparison = null)
	{
		if ($searchIndex instanceof SearchIndex) {
			return $this
				->addUsingAlias(SearchIndexWordPeer::SEARCH_INDEX_ID, $searchIndex->getId(), $comparison);
		} elseif ($searchIndex instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SearchIndexWordPeer::SEARCH_INDEX_ID, $searchIndex->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySearchIndex() only accepts arguments of type SearchIndex or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SearchIndex relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function joinSearchIndex($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SearchIndex');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SearchIndex');
		}

		return $this;
	}

	/**
	 * Use the SearchIndex relation SearchIndex object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SearchIndexQuery A secondary query class using the current class as primary query
	 */
	public function useSearchIndexQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSearchIndex($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SearchIndex', 'SearchIndexQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(SearchIndexWordPeer::CREATED_BY, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SearchIndexWordPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUserRelatedByCreatedBy() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function joinUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserRelatedByCreatedBy');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'UserRelatedByCreatedBy');
		}

		return $this;
	}

	/**
	 * Use the UserRelatedByCreatedBy relation User object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUserRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserRelatedByCreatedBy', 'UserQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(SearchIndexWordPeer::UPDATED_BY, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SearchIndexWordPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUserRelatedByUpdatedBy() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function joinUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserRelatedByUpdatedBy');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'UserRelatedByUpdatedBy');
		}

		return $this;
	}

	/**
	 * Use the UserRelatedByUpdatedBy relation User object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUserRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserRelatedByUpdatedBy', 'UserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SearchIndexWord $searchIndexWord Object to remove from the list of results
	 *
	 * @return    SearchIndexWordQuery The current query, for fluid interface
	 */
	public function prune($searchIndexWord = null)
	{
		if ($searchIndexWord) {
			$this->addCond('pruneCond0', $this->getAliasedColName(SearchIndexWordPeer::SEARCH_INDEX_ID), $searchIndexWord->getSearchIndexId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(SearchIndexWordPeer::WORD), $searchIndexWord->getWord(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     SearchIndexWordQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(SearchIndexWordPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     SearchIndexWordQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SearchIndexWordPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SearchIndexWordQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SearchIndexWordPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SearchIndexWordQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SearchIndexWordPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SearchIndexWordQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SearchIndexWordPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SearchIndexWordQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SearchIndexWordPeer::CREATED_AT);
	}

} // BaseSearchIndexWordQuery