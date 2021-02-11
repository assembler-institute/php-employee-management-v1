if (isset($_SERVER['REQUEST_METHOD']))
  {
    switch ($_SERVER['REQUEST_METHOD'])
    {
      case 'PUT':
        if ('application/x-www-form-urlencoded' === $this->getContentType())
        {
          parse_str($this->getContent(), $request_vars );
        }
        break;
      case 'DELETE':
        if ('application/x-www-form-urlencoded' === $this->getContentType())
        {
          parse_str($this->getContent(), $request_vars );
        }
        break;
    }
  ... more code ...
}