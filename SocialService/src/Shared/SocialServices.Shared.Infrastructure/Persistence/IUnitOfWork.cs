namespace SocialServices.Shared.Infrastructure.Persistence;

public interface IUnitOfWork
{
    public Task<bool> SaveChangesAsync();
}