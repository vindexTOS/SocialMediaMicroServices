namespace MyKeyBox.Shared.Abstractions.Exception;

public class CustomException:System.Exception
{
    protected CustomException(string message) : base(message) { }
}